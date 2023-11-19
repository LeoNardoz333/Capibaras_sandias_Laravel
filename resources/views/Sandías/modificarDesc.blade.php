@extends('layouts.modificar')
@section('container')
<body>
    @if($categoria === 'capibaras')
        <div class="d-flex w-50 mx-auto justify-content-center mt-3">
            <a href="/"><button class="botonuwu">Regresar</button></a>
        </div>
    @else
        <p>El valor de 'categoria' no es 'capibaras'.</p>
    @endif
</body>
@endsection
