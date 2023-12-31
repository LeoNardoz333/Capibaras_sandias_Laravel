<nav class="navbar navbar-expand-lg sticky-top" style="height: 60px; background-color: #7ad197">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><span class="Titulo-pagina-verde fs-4 fw-bold">Capibaras y Sandías</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link active" href="/" style="color: #0c2008;" aria-current="page">Capibaras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('SandiasIndex')}}" style="color: #0c2008;" aria-current="page">Sandías</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('OpinionesIndex')}}" style="color: #0c2008;" aria-current="page">Opiniones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('ChatbotIndex')}}" style="color: #0c2008;" aria-current="page">¿Preguntas?</a>
          </li>
          @if (auth()->check())
              <li class="nav-item mx-2">
                  <span style="color:#286630; font-size:18px;">{{auth()->user()->username}}</span>
              </li>
              <form action="{{route('Logout')}}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-salir-verde">Cerrar sesión</button>
              </form>
          @else
          <li class="nav-item">
              <form action="{{route('Login')}}" method="get">
                @csrf
                <button type="submit" class="btn btn-salir-verde">Iniciar sesión</button>
              </form>
          </li>
          @endif
          <li class="nav-item">
            <!-- <span>Usuario: auth()->user()->username</span> -->
          </li>
        </ul>
      </div>
    </div>
  </nav>
