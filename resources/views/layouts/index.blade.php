@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-white">Listado Empleados</h2>
                </div>
                <div class="col-6">
                    <form action="{{ route('logout') }}" method="POST" class="mt-2" style="float: right;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>                    
                </div>
            </div>            
        </div>
        <div>
            <a href="{{route('empleados.create')}}" class="btn btn-primary">Crear Empleado</a>
        </div>
    </div>

    <div class="col-12 mt-4">
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
                <th>Acciones</th>
            </tr>
            @foreach ($empleados as $e)
            
            <tr class="{{ !$e->activo ? 'disabled-row' : '' }}">
                <td class="fw-bold">{{$e->codigo}}</td>
                <td>{{$e->nombre}}</td>
                <td>{{$e->salario_dolares}}</td>
                <td>{{$e->salario_pesos}}</td>
                <td>{{$e->direccion}}</td>
                <td>{{$e->estado}}</td>
                <td>{{$e->ciudad}}</td>
                <td>{{$e->celular}}</td>
                <td>{{$e->correo}}</td>
                
                
                <td>
                    @if ($e->activo)
                        <a href="{{route('empleados.show',$e->id)}}" class="btn btn-info btn-sm">Detalle</a>
                        <a href="{{route('empleados.status',$e)}}" class="btn btn-light btn-sm">Desactivar</a>
                        <a href="{{route('empleados.edit',$e->id)}}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{route('empleados.destroy', $e)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    @else
                        <a href="{{route('empleados.status',$e)}}" class="btn btn-success btn-sm">Activar</a>
                    @endif
                </td>
            </tr>
            @endforeach            
        </table>
    </div>
</div>
@endsection