@extends('layouts.verde')
@section('container')
<h1 class="text-center mt-5">Alimentar Chatbot</h1>
<div class="container w-50">
    <form action="{{route('ChatbotInsertar')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="pregunta" class="form-label">Pregunta</label>
            <textarea name="pregunta" id="pregunta" class="form-control" style="resize: none;"
            placeholder="Escribe la pregunta...">{{ old('pregunta') }}</textarea>
            @error('pregunta')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="respuesta" class="form-label">Respuesta</label>
            <textarea name="respuesta" id="respuesta" class="form-control"
            placeholder="Respuesta que tendrá el chatbot...">{{ old('respuesta') }}</textarea>
            @error('respuesta')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="from-group mt-2">
            <button for="submit" class="btn btn-primary">Guardar</button>
            <a href="{{route('ChatbotIndex')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection