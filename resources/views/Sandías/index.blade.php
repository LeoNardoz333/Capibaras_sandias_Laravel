@extends('layouts.rosa')
@section('container')
<body>@if (session('success'))
    <div id="success-message" class="alert alert-success" style="display: none;">
        {{ session('success') }}
    </div>
    @endif
    <div class="mt-5 w-100 d-flex justify-content-center">
        <span class="Titulo-sandias fw-bold">Sandías</span>
    </div>
    @php
        $descripcionowo = DB::table('descripcions')->where('categoria','sandias')->value('descripcion');
    @endphp
    @if (auth()->check())
        @if ($descripcionowo != null)
        <div class="mt-5 w-75 mx-auto">
            <span class="parrafo d-flex justify-content-center">
              {{$descripcionowo}}
            </span>
        </div>
        @endif
        @if (auth()->user()->permisos == 'admin')
            <form action="{{route('VerDescripcion',['categoria'=>'sandias'])}}" method="get">
              <div class="w-100 d-flex">
                  <input type="submit" class="botonuwu-sandias mt-3 mx-auto" value="Mod. descripción">
              </div>
            </form>
        @endif
    @elseif($descripcionowo != null)
    <div class="mt-5 w-75 mx-auto">
        <span class="parrafo d-flex justify-content-center">
          {{$descripcionowo}}
        </span>
    </div>
    @endif
    <!-- Carrusel -->
    <div class="mt-5 w-100 d-flex justify-content-center">
        <span class="Titulo-sandias fw-bold">Imágenes</span>
    </div>
    <hr class="mt-4">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active data-bs-interval=5000">
                <div class="row mx-2">
                    <div class="col-3">
                        <img src="/img/sandias/1.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/2.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/3.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/4.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                </div>
            </div>
            <div class="carousel-item data-bs-interval=5000">
                <div class="row mx-2">
                    <div class="col-3">
                        <img src="/img/sandias/5.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/6.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/7.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/8.webp" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                </div>
            </div>
            <div class="carousel-item data-bs-interval=5000">
                <div class="row mx-2">
                    <div class="col-3">
                        <img src="/img/sandias/9.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/10.jpeg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/11.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="/img/sandias/12.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <hr>
    <!-- Características -->
    <div class="mt-5 w-100 d-flex justify-content-center">
        <span class="Titulo-sandias fw-bold">Características</span>
    </div>
    @php
        $cars=DB::table('caracteristicas')->where('categoria','sandias')
        ->select('caracteristica','descripcion','icono')->get();
    @endphp
    <section class="container-fluid mt-3">
        <div class="row mx-auto ancho-caracteristicas fila mt-5">
            @if($cars->count()>0)
            @foreach ($cars as $car)
            <div class="my-2 col-lg-6 col-md-12 col-sm-12 d-flex wrap">
                <img class="iconos" src="/{{$car->icono}}">
                <div>
                    <h2 class="fs-5 mt-1 px-4 pb-1"><strong>{{$car->caracteristica}}</strong></h2>
                    <p class="px-4 parrafo-caracteristicas">{{$car->descripcion}}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
    @if(auth()->check() && auth()->user()->permisos == 'admin')
    <form action="{{route('CarIndex',['categoria'=>'sandias'])}}" method="get">
        <div class="w-100 d-flex">
            <input type="submit" class="botonuwu-sandias mt-3 mx-auto" value="Mod. Características">
        </div>
      </form>
    @endif
    <div class="w-100 margen-boton">
        <form action="{{route('Video')}}" class="w-100 d-flex justify-content-center">
            <input type="submit" value="Ver vídeo" class="botonuwu-sandias mt-5">
        </form>
    </div><script>
        document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.getElementById("success-message");
            successMessage.style.display = "block";
        setTimeout(function() {
            successMessage.style.display = "none";
        }, 3000);
    });
    </script>
</body>
@endsection
