@extends('layouts.modificar')
@section('container')
<body>
    <div class="container w-50">
        <form action="{{route('SaveDesc')}}" method="post">
            @csrf
            <input type="text" value="{{$categoria}}" name="categoria" hidden>
            <div class="form-group w-100 text-center mt-3 mb-3">
                <label for="descripcion" class="form-label mb-3 fs-2 ">Nueva descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" style="resize: none;"
                placeholder="Descripción general de los capibaras...">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div class="from-group mt-2">
                <button for="submit" class="btn" style="background-color: #FACB4B;">Guardar</button>
                <a href="/" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    @if($categoria == 'capibaras')
        <div class="w-100 mt-3 position-absolute bottom-0 "
        style="margin-left: 10px; margin-bottom:10px;">
            <a href="/"><button class="botonuwu">Regresar</button></a>
        </div>
    @else
        <p>El valor de 'categoria' no es 'capibaras'.</p>
    @endif
</body>
@endsection
