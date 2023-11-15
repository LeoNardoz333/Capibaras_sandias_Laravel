<nav class="navbar navbar-expand-lg sticky-top" style="height: 60px; background-color: #FFAFAF">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><span class="Titulo-pagina fs-4 fw-bold">Capibaras y Sandías</span></a>
      <span style="font-size: 25px;">🍉</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="" style="color: #461421;" aria-current="page">Capibaras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="" style="color: #461421;;" aria-current="page">Sandías</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="" style="color: #461421;;" aria-current="page">Opiniones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="" style="color: #461421;;" aria-current="page">¿Preguntas?</a>
          </li>
          <li class="nav-item">
            <form action="" method="post">
              @csrf
              <button type="submit" class="btn btn-salir">Iniciar sesión</button>
            </form>
          </li>
          <li class="nav-item">
            <!-- <span>Usuario: auth()->user()->username</span> -->
          </li>
        </ul>
      </div>
    </div>
  </nav>