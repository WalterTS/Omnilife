@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Empleado</h2>                        
        </div>
        <div>
            <a href="{{route('empleados.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error al registrar los datos del empleado:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <input type="hidden" id="tc" value="{{$tc}}">
    <form action="{{route('empleados.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Codigo:</strong>
                    <input type="text" name="codigo" class="form-control" placeholder="Codigo" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Salario en Dolares:</strong>
                    <input type="text" name="salario_dolares" id="salariodolares" class="form-control" placeholder="Salario en Dolares" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Salario en Pesos:</strong>
                    <input type="text" name="salario_pesos" id="salariopesos" class="form-control" placeholder="Salario en Pesos" readonly="readonly">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Direccion:</strong>
                    <input type="text" name="direccion" class="form-control" placeholder="Direccion" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Estado:</strong>
                    <input type="text" name="estado" class="form-control" placeholder="Estado" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Ciudad:</strong>
                    <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Celular:</strong>
                    <input type="text" name="celular" class="form-control" placeholder="Celular" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="correo" class="form-control" placeholder="Correo" >
                </div>
            </div>
            <input type="hidden" name="activo" value="1">
            <input type="hidden" name="eliminado" value="0">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection