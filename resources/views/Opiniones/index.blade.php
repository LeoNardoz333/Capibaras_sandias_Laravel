@extends('layouts.rosa')
@section('container')
<body>
    <div class="d-flex mt-4 mx-auto">
        @if(auth()->check())
        <form action="{{route('AddOpinion')}}" class="ms-auto me-3">
            <input type="submit" value="+ opinión" class="botonuwu-opinion">
        </form>
        @else
        <form action="{{route('Login')}}" class="ms-auto me-3">
            <input type="submit" value="+ opinión" class="botonuwu-opinion">
        </form>
        @endif
    </div>
    <div class="d-flex flex-row justify-content-center ancho-caracteristicas mx-auto text-center mt-2">
        <span class="Titulo-sandias fw-bold">Opiniones</span>
    </div>
    @foreach ($opiniones as $opinion)
    <div class="d-flex flex-column w-75 mx-auto borde-comentario px-2 pt-3 mt-4">
        <div class="flex-grow-1">
            <p style="font-size: 16px;"><span class="text-sandias">{{$opinion->usuario}}:</span>{{$opinion->opinion}}</p>
        </div>
        @if(auth()->check())
        <div class="d-flex align-content-end ">
            @if(auth()->user()->permisos=='admin')
            <form class="formulario-eliminar ms-auto" action="{{route('DeleteOpinion',['id'=>$opinion->id])}}"
                method="post">
               @csrf
               @method('DELETE')
               <button class="btn btn-danger my-2">Eliminar</button>
           </form>
            @elseif(auth()->user()->username==$opinion->usuario)
            <form class="formulario-eliminar ms-auto" action="{{route('DeleteOpinion',['id'=>$opinion->id])}}"
                method="post">
               @csrf
               @method('DELETE')
               <button class="btn btn-danger my-2">Eliminar</button>
            </form>
            @endif
        </div>
        @endif
    </div>
    @endforeach
    @php
        /*
    <div class="d-flex w-75 mx-auto borde-comentario px-2 pt-3 mt-4">
        <p><span class="text-sandias">Nardoz:</span>Definitivamente las capibaras y las sandías son la mejor combinación
        </p>
    </div>
    <div class="d-flex w-75 mx-auto borde-comentario px-2 mt-2 pt-3">
        <p><span class="text-sandias">Leoz:</span>Yo creo que deberíamos invadir Plonia, como país seríamos altamente capaces de ello,
             después de apoderarnos de toda Europa deberíamos de seguir con Argentina para
             quitarles todos sus capibaras y quedárnoslos nosotros >:)
        </p>
    </div>
    <div class="d-flex w-75 mx-auto borde-comentario px-2 mt-2 pt-3">
        <p><span class="text-sandias">はるか:</span>私 は カピバラ が 大 大 大 好き
            です。 かぴバラ は とても かわいい です よ。 カピバラ が ほしいです
        </p>
    </div>
        */
    @endphp
</body>
@endsection
