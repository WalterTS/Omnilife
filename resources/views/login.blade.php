@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="my-3">
            <h2 class="text-white text-center">Login</h2>
        </div>
        <div class="col-6 m-auto">
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Correo</label>
                    <input type="email" name="email" class="form-control">
                </div>
                
                <div class="form-group mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Entrar</button>
            </form>
        </div>
    </div>

    <div class="col-12 mt-4">
    
    </div>
</div>
@endsection