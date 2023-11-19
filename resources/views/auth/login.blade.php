@extends('layouts.login')
@section('container')
<h1 class="text-center mt-5">Iniciar sesión</h1>
<div class="container w-25">
    <form action="{{route('IniciarLogin')}}" method="post">
        @csrf
        @if($errors->any())
            <div style="color: red" class="w-100 text-center ">{{ $errors->first('mensaje') }}</div>
        @endif
        <div class="from-group">
            <label for="username" class="form-label">Usuario</label>
            <input type="text" name="username" id="username" class="form-control"
            value="{{old('username')}}" placeholder="Crear un usuario">
            @error('username')
                <div style="color:red">{{$message}}</div>
            @enderror
        </div>
        <div class="from-group">
            <label for="password" class="form-label mt-2">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control"
            placeholder="Escribe tu contraseña">
            @error('password')
                <div style="color:red">{{$message}}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-between mt-2">
            <button for="submit" class="btn btn-primary mx-auto">Iniciar sesión</button>
            <a href="/" class="btn btn-danger mx-auto">Cancelar</a>
        </div>
    </form>
</div>
@endsection
