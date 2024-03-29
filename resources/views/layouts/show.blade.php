@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12 mt-2">
        <a href="{{route('empleados.index')}}" class="btn btn-primary">Volver</a>
    </div>
    <div class="col-12 mt-2">
        <h1 class="text-center">{{$empleado->nombre}} [{{$empleado->codigo}}]</h1>
        <h3>Información:</h3>
    </div>

    <div class="col-12 my-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Salario Dolares</th>
                <th>Salario Pesos</th>
                <th>Direccion</th>
                <th>Estado</th>
                <th>Ciudad</th>
                <th>Celular</th>
                <th>Correo</th>                
            </tr>            
            <tr>
                <td class="fw-bold white">{{$empleado->codigo}}</td>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->salario_dolares}}</td>
                <td>{{$empleado->salario_pesos}}</td>
                <td>{{$empleado->direccion}}</td>
                <td>{{$empleado->estado}}</td>
                <td>{{$empleado->ciudad}}</td>
                <td>{{$empleado->celular}}</td>
                <td>{{$empleado->correo}}</td>                
            </tr>            
        </table>
    </div>
    <div class="col-12">
        <h2 class="text-center">Proyección salarial a 6 meses</h2>
        @php            
            $dataMxn = implode(', ', $salaryProjectionMXN);
            $dataUsd = implode(', ', $salaryProjectionUSD);
        @endphp
        <input type="hidden" id="projection-mxn" value="{{$dataMxn}}">
        <input type="hidden" id="projection-usd" value="{{$dataUsd}}">
        <div class="row">
            <div class="col-6">
                <h4 class="text-center">MXN</h4>
                <ul>                
                @foreach ($salaryProjectionMXN as $s)
                    <li><h5>Mes {{ $loop->iteration }}:</h5> ${{$s}}</li>
                @endforeach
                </ul>
                <div class="col-12">
                    <canvas id="mxnChart" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="col-6">
                <h4 class="text-center">USD</h4>
                <ul>                
                @foreach ($salaryProjectionUSD as $s)
                    <li><h5>Mes {{ $loop->iteration }}:</h5> ${{$s}}</li>
                @endforeach
                </ul>
                <div class="col-12">
                    <canvas id="usdChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection