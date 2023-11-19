@extends('layouts.app')
@section('container')
<body>
    @if (session('success'))
    <div id="success-message" class="alert alert-success" style="display: none;">
        {{ session('success') }}
    </div>
    @endif
    <div class="mt-5 w-100 d-flex justify-content-center">
        <span class="Titulo fw-bold">Capibaras</span>
    </div>
    @php
        $descripcionowo = DB::table('descripcions')->where('categoria','capibaras')->value('descripcion');
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
            <form action="{{route('VerDescripcion',['categoria'=>'capibaras'])}}" method="get">
              <div class="w-100 d-flex">
                  <input type="submit" class="botonuwu mt-3 mx-auto" value="Mod. descripción">
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
        <span class="Titulo fw-bold">Imágenes</span>
    </div>
    <hr class="mt-4">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active data-bs-interval=5000">
                <div class="row mx-2">
                    <div class="col-3">
                        <img src="./img/capibaras/1.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/2.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/3.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/4.jpeg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                </div>
            </div>
            <div class="carousel-item data-bs-interval=5000">
                <div class="row mx-2">
                    <div class="col-3">
                        <img src="./img/capibaras/5.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/6.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/7.webp" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/8.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                </div>
            </div>
            <div class="carousel-item data-bs-interval=5000">
                <div class="row mx-2">
                    <div class="col-3">
                        <img src="./img/capibaras/9.jpg" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/10.webp" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/11.webp" class="d-block img-fluit w-100 carousel-img-size" alt="...">
                    </div>
                    <div class="col-3">
                        <img src="./img/capibaras/12.webp" class="d-block img-fluit w-100 carousel-img-size" alt="...">
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
        <span class="Titulo fw-bold">Características</span>
    </div>
    <section class="container-fluid mt-3">
        <div class="row mx-auto ancho-caracteristicas fila mt-5">
            <div class="my-2 col-lg-6 col-md-12 col-sm-12 d-flex wrap">
                <img class="iconos" src="./img/iconos/fruta.png">
                <div>
                    <h2 class="fs-5 mt-1 px-4 pb-1"><strong>Alimentación</strong></h2>
                    <p class="px-4 parrafo-caracteristicas">Se alimenta principalmente
                         de plantas acuáticas, gramíneas y otras hierbas palustres. Pero
                         también consumen flores, frutos y semillas, y utiliza la corteza
                         de los árboles para roer y desgastar sus dientes incisivos.</p>
                </div>
            </div>
            <div class="my-2 col-lg-6 col-md-12 col-sm-12 d-flex wrap">
                <img class="iconos" src="./img/iconos/habitat.png">
                <div>
                    <h2 class="fs-5 mt-1 px-4 pb-1"><strong>Hábitat</strong></h2>
                    <p class="px-4 parrafo-caracteristicas">Vive cerca de un cuerpo de agua, debe haber
                        áreas cercanas para pastorear y alimentarse y zonas secas para descansar y
                         tener a las crias
                    </p>
                </div>
            </div>
            <div class="my-2 col-lg-6 col-md-12 col-sm-12 d-flex wrap">
                <img class="iconos" src="./img/iconos/comportamiento.png">
                <div>
                    <h2 class="fs-5 mt-1 px-4 pb-1"><strong>Comportamiento</strong></h2>
                    <p class="px-4 parrafo-caracteristicas">Es un animal gregario, vive en grupos numerosos de entre 6 a 30 individuos.
                        Suelen organizar el espacio donde viven.Pueden comunicarse entre ellos emitiendo señales.
                    </p>
                </div>
            </div>
            <div class="my-2 col-lg-6 col-md-12 col-sm-12 d-flex wrap">
                <img class="iconos" src="./img/iconos/reproduccion.png">
                <div>
                    <h2 class="fs-5 mt-1 px-4 pb-1"><strong>Reproducción</strong></h2>
                    <p class="px-4 parrafo-caracteristicas">Se pueden reproducir durante todo el año,
                        pero sobre todo en primavera-verano. Alcanzan
                         su madurez sexual entre el año y medio y dos de vida y el tipo de reproducción
                          que llevan involucra a un macho con varias hembras.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="w-100 margen-boton">
        <form action="video.html" class="w-100 d-flex justify-content-center">
            <input type="submit" value="Ver vídeo" class="botonuwu mt-5">
        </form>
    </div>
    <section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffaf2b " fill-opacity="1" d="M0,64L205.7,96L411.4,256L617.1,96L822.9,320L1028.6,64L1234.3,128L1440,32L1440,320L1234.3,320L1028.6,320L822.9,320L617.1,320L411.4,320L205.7,320L0,320Z"></path></svg>
    </section>
    <footer class="w-100 d-flex justify-content-center align-items-center footer-cap">
        <p class="fs-5 px-3 pt-3">
            Nardoz &copy; Todos los derechos reservados.
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
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
