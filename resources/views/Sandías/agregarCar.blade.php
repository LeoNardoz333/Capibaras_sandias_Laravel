@extends('layouts.modificar')
@section('container')
<body>
    <h1 class="text-center mt-5 mb-3">Agregar Característica</h1>
    <div class="container w-50">
        <form action="{{route('SaveCar')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{$categoria}}" name="categoria" hidden>
            <div class="from-group">
                <label for="caracteristica" class="form-label fs-5 ">Característica</label>
                <input type="text" name="caracteristica" id="caracteristica" class="form-control"
                value="{{old('caracteristica')}}" placeholder="Escribe el título de la característica...">
                @error('caracteristica')
                    <div style="color:red">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group w-100 mt-3 mb-3">
                <label for="caracteristica" class="form-label fs-5 ">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" style="resize: none;"
                placeholder="Describe la/las Características...">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div class="from-group mb-4">
                <label for="icono" class="form-label fs-5 ">Icono</label>
                <input type="file" name="icono" accept="image/*" class="form-control">
                @error('icono')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div class="from-group mt-2">
                @if($categoria == 'capibaras')
                <button for="submit" class="btn" style="background-color: #FACB4B;">Guardar</button>
                <a href="/" class="btn btn-danger">Cancelar</a>
                @else
                <button for="submit" class="btn" style="background-color: #FE8D8D;">Guardar</button>
                <a href="SandiasIndex" class="btn btn-danger">Cancelar</a>
                @endif
            </div>
        </form>
    </div>
    @if($categoria == 'capibaras')
        <div class="w-100 mt-3 position-absolute bottom-0 "
        style="margin-left: 10px; margin-bottom:10px;">
            <a href="/"><button class="botonuwu">Regresar</button></a>
        </div>
    @else
    <div class="w-100 mt-3 position-absolute bottom-0 "
    style="margin-left: 10px; margin-bottom:10px;">
        <a href="{{route('SandiasIndex')}}"><button class="botonuwu-sandias">Regresar</button></a>
    @endif
</body>
@endsection
