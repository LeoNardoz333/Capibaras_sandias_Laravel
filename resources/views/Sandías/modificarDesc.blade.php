@extends('layouts.modificar')
@section('container')
<body>
    <div class="container w-50">
        <form action="{{route('SaveDesc')}}" method="post">
            @csrf
            @php
                if($categoria=='capibaras')
                {
                    $holder='Descripción general de los capibaras...';
                }
                else {
                    $holder='Descripción general de las sandías...';
                }
            @endphp
            <input type="text" value="{{$categoria}}" name="categoria" hidden>
            <div class="form-group w-100 text-center mt-3 mb-3">
                <label for="descripcion" class="form-label mb-3 fs-2 ">Nueva descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control"
                placeholder="{{$holder}}">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div class="from-group mt-2">
                @if($categoria == 'capibaras')
                <button for="submit" class="btn" style="background-color: #FACB4B;">Guardar</button>
                <a href="/" class="btn btn-danger">Cancelar</a>
                @elseif($categoria == 'sandias')
                <button for="submit" class="btn" style="background-color: #FE8D8D;">Guardar</button>
                <a href="{{route('SandiasIndex')}}" class="btn btn-danger">Cancelar</a>
                @endif
            </div>
        </form>
    </div>
    @if($categoria == 'capibaras')
    <div class="w-100 mt-3 position-absolute bottom-0 "
    style="margin-left: 10px; margin-bottom:10px;">
        <a href="/"><button class="botonuwu">Regresar</button></a>
    </div>
    @elseif($categoria == 'sandias')
    <div class="w-100 mt-3 position-absolute bottom-0 "
    style="margin-left: 10px; margin-bottom:10px;">
        <a href="{{route('SandiasIndex')}}"><button class="botonuwu-sandias">Regresar</button></a>
    </div>
    @endif
</body>
@endsection
