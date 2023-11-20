@if($categoria=='capibaras')
<nav class="navbar navbar-expand-lg sticky-top" style="height: 60px; background-color: #FACB4B">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><span class="Titulo-pagina fs-4 fw-bold">Capibaras y Sandías</span></a>
        <img style="width: 30px; height: 30px;" src="{{asset('img/iconos/carpincho.png')}}">
@else
<nav class="navbar navbar-expand-lg sticky-top" style="height: 60px; background-color: #FFAFAF">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><span class="Titulo-pagina-sandias fs-4 fw-bold">Capibaras y Sandías</span></a>
        <span style="font-size: 25px;">🍉</span>
@endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                @if($categoria=='capibaras')
                    @if (auth()->check())
                        <li class="nav-item mx-2">
                            <span style="color:#D26500; font-size:18px;">{{auth()->user()->username}}</span>
                        </li>
                        <form action="{{route('Logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-salir">Cerrar sesión</button>
                        </form>
                    @else
                    <li class="nav-item">
                        <form action="{{route('Login')}}" method="get">
                          @csrf
                          <button type="submit" class="btn btn-salir">Iniciar sesión</button>
                        </form>
                    </li>
                    @endif
                @elseif($categoria=='sandias')
                    @if (auth()->check())
                        <li class="nav-item mx-2">
                            <span style="color:#FF6161; font-size:18px;">{{auth()->user()->username}}</span>
                        </li>
                        <form action="{{route('Logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-salir-rosa">Cerrar sesión</button>
                        </form>
                    @else
                    <li class="nav-item">
                        <form action="{{route('Login')}}" method="get">
                          @csrf
                          <button type="submit" class="btn btn-salir-rosa">Iniciar sesión</button>
                        </form>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
