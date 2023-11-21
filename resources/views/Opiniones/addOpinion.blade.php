@extends('layouts.rosa')
@section('container')
<body>
    <div class="d-flex flex-row justify-content-center ancho-caracteristicas mx-auto text-center">
        <span class="Titulo-sandias fw-bold mt-5">Agregar opinión</span>
    </div>
    <form action="{{route('SaveOpinion')}}" class="d-flex ms-0" method="post">
        @csrf
    <div class="formulario mt-4">
        <div class="mb-3 entrada mt-3">
            <span style="font-size: 18px">Opinión:</span>
            <textarea rows="4" class="margen-left w-100 borde-comentario" name="opinion" style="resize: none;"></textarea>
        </div>
            @error('opinion')
                <div class="mx-auto" style="color:red">{{ $message }}</div>
            @enderror
        <div class="d-flex mt-3">
            <div class="w-50">
                <div class="botonuwu-cancelar fw-bold text-center">
                    <a href="{{route('OpinionesIndex')}}" style="color: black; text-decoration:none;">
                        Cancelar
                    </a>
                </div>
            </div>
            <div class="w-50">
                <div class="d-flex justify-content-end">
                    <input type="submit" value="Publicar" class="botonuwu-publicar fw-bold">
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
@endsection
