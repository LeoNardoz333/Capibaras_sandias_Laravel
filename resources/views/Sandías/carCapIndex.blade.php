@php
    if($categoria=='capibaras')
    {
        $layout='layouts.app';
    }
    else if($categoria=='sandias')
    {
        $layout='layouts.rosa';
    }
@endphp
@extends($layout)
@section('container')
@if (session('success'))
<div id="success-message" class="alert alert-success" style="display: none;">
    {{ session('success') }}
</div>
@endif
<h1 class="text-center mt-3">Características</h1>
<div class="container">
    <form action="{{route('VerCar',['categoria'=>$categoria])}}" method="get">
        @if($categoria=='capibaras')
        <button class="btn mb-2" type="submit" style="background-color: #FACB4B;">
        @else
        <button class="btn mb-2" type="submit" style="background-color: #FE8D8D;">
        @endif
            <span class="p-4">Nueva</span>
        </button>
    </form>
    <table class="table table-responsive table-striped">
        <tr class="fila-superior">
            <td>Id</td>
            <td>Característica</td>
            <td>Descripción</td>
            <td>Ruta del icono</td>
            <td>Modificar</td>
        </tr>
        @foreach ($caracteristicas as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->caracteristica}}</td>
            <td>{{$car->descripcion}}</td>
            <td>{{$car->icono}}</td>
            <td>
                <div class="d-flex">
                    <a class="btn btn-success mx-1" href="{{route('PutCar',['id'=>$car->id])}}">
                        Editar</a>
                    <form class="formulario-eliminar" action="{{route('DeleteCar',['id'=>$car->id])}}"
                         method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mx-1">Eliminar</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    {{$caracteristicas->links('pagination::bootstrap-5')}}
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const formularios = document.querySelectorAll('.formulario-eliminar');

    formularios.forEach(formulario => {
    formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    Swal.fire({
    title: '¿Estás seguro?',
    text: '¡Esta acción no es reversible!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
    this.submit();
    }
    });
    });
    });
    });
    document.addEventListener("DOMContentLoaded", function() {
    var successMessage = document.getElementById("success-message");
        successMessage.style.display = "block";
    setTimeout(function() {
        successMessage.style.display = "none";
    }, 3000);
    });
</script>
@endsection
