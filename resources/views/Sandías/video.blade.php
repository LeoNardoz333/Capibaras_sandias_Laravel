@extends('layouts.app')
@section('container')
<body>
    <div class="mt-5 w-100 d-flex justify-content-center">
        <span class="Titulo fw-bold">Ver vídeo</span>
    </div>
    <div class="w-100 d-flex justify-content-center">
        <iframe class="video" width="889" height="500" src="https://www.youtube.com/embed/IaLGdRx7prA?si=7N-upl5nsJ9e_rbm"
        title="YouTube video player" frameborder="0" class="mx-auto mt-5"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe>
    </div>
    </section>
    <div class="w-100 margen-boton">
        <form action="/" class="w-100 d-flex justify-content-center">
            <input type="submit"¿ value="Regresar" class="botonuwu mt-5">
        </form>
    </div>
</body>¿
@endsection
