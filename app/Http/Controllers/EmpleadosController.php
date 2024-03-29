<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = Empleado::all();
        return view('layouts/index',['empleados' => $emp]);
    }
    
    
    public function status(Empleado $empleado)
    {        
        $empleado->update(["activo" => !$empleado->activo]);
        return redirect()->route('empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        return view('layouts/create',["tc" => $this->getTc()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {           
        $request->validate([
            'codigo' => 'required|unique:empleados',
            'nombre' => 'required|regex:/^[a-zA-Z0-9 ]*$/u',
            'salario_dolares' => 'required|numeric|gt:0',
            'salario_pesos' => 'required|numeric|gt:0',
            'direccion' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'celular' => 'required|numeric|digits:10',
            'correo' => 'required|email'
        ]);
        Empleado::create($request->all());
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        $salaryProjectionMXN = array();
        $salaryProjectionUSD= array();
        $salaryIncrease = 2;

        for ($i=1; $i <= 6; $i++) {
            $percentageIncrease = ($salaryIncrease * $i) / 100;            
            $salaryProjectionMXN[] = $empleado->salario_pesos + ($empleado->salario_pesos * $percentageIncrease);            
            $salaryProjectionUSD[] = $empleado->salario_dolares + ($empleado->salario_dolares * $percentageIncrease);            
        }        
        return view('layouts/show',['empleado' => $empleado, 'salaryProjectionMXN' => $salaryProjectionMXN,'salaryProjectionUSD' => $salaryProjectionUSD]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        return view('layouts/edit',['empleado' => $empleado,'tc' => $this->getTc()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required|regex:/^[a-zA-Z0-9 ]*$/u',
            'salario_dolares' => 'required|numeric|gt:0',
            'salario_pesos' => 'required|numeric|gt:0',
            'direccion' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
            'celular' => 'required|numeric|digits:10',
            'correo' => 'required|email'
        ]);
        $empleado->update($request->all());
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }

    private function getTc(){
        $rs = Http::get('https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno', [
            'token' => 'a7202b5f7fe91fb972ccdbbbc676d1d66af03ac51467ae2e2b19e36365a6ac8f'
        ]);
        $rs =  json_decode($rs->body());        
        return $rs->bmx->series[0]->datos[0]->dato;
    }
}
