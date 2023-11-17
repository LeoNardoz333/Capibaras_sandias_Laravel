@extends('layouts.verde')
@section('container')
  <body>
    @if (session('success'))
    <div id="success-message" class="alert alert-success" style="display: none;">
        {{ session('success') }}
    </div>
    @endif
    <div class="mt-5 w-100 d-flex justify-content-center">
        <span class="Titulo-verde fw-bold text-center">Preguntas y respuestas</span>
    </div>
  <div id="chat-container" class="w-75 d-flex mx-auto mt-5">
    <div class="container">
        <div class="row justify-content-center no-padding-row">
          <div id="chat-container" class="w-100 h-100">
            <div id="chat-messages"></div>
            @if (auth()->check())
              @if (auth()->user()->permisos == 'admin')
                <div class="row no-gutters no-padding-row">
                  <div class="col-9">
                    <form action="{{route('ChatbotRespuesta',['suggestion'=>userInput])}}">
                        <input type="text" class="form-control w-100" style="padding-left: 17px;"
                        id="user-input" placeholder="Escribe tu pregunta..."
                        onkeydown="handleEnter(event)">
                    </form>
                  </div>
                  <div class="col-3">
                      <form action="{{route('ChatbotAlimentar')}}" class="m-0" method="get" >
                          <input type="submit" class="btn-custom btn-salir-verde w-100 m-0 no-padding-row" value="Alimentar chat">
                      </form>
                  </div>
                </div>
                @else
                <input class="w-100" type="text" id="user-input" placeholder="Escribe tu pregunta..." onkeydown="handleEnter(event)">
              @endif
            @endif
          </div>
        </div>
    </div>
    <div class="w-50">
        <div id="suggestions-container" class="w-100 h-100"></div>
    </div>
  </div>

  <script>

    function addMessage(sender, message) {
      var chatMessages = document.getElementById('chat-messages');
      var newMessage = document.createElement('div');
      newMessage.innerHTML = `<strong>${sender}:</strong> ${message}`;
      chatMessages.appendChild(newMessage);
    }

    function handleEnter(event) {
      if (event.key === 'Enter') {
        handleUserInput();
      }
    }

    function handleUserInput() {
    var userInput = document.getElementById('user-input').value;
    addMessage('Tú', userInput);
    document.getElementById('user-input').value = '';
    //let myr = "{{route('ChatbotRespuesta',['suggestion'=>userInput])}}";
    $.ajax({
        url: myr,$(this).attr("my";)
        type: 'GET',
        success: function (response) {
            addMessage('Capsan', response.respuesta);
        },handleUserInput
        error: function () {
            console.error(handleUserInput'Error al obtener la respuesta');
        }
    });
}

function handleSuggestionClick(suggestion) {
    addMessage('Tú', suggestion);
    $.ajax({
        url: {{route('ChatbotRespuesta',['suggestion'=>suggestion])}},
        type: 'GET',
        success: function (response) {
            addMessage('Capsan', response.respuesta);
        },
        error: function () {
            console.error('Error al obtener la respuesta');
        }
    });
}

    function addSuggestions(suggestions) {
      var suggestionsContainer = document.getElementById('suggestions-container');
      suggestionsContainer.innerHTML = '';

      suggestions.forEach(function (suggestion) {
        var suggestionElement = document.createElement('div');
        suggestionElement.className = 'suggestion';
        suggestionElement.textContent = suggestion;
        suggestionElement.addEventListener('click', function () {
          handleSuggestionClick(suggestion);
        });
        suggestionsContainer.appendChild(suggestionElement);
      });
    }

    var initialSuggestions = ['¿Qué comen los capibaras?', '¿Por qué capibaras y sandías?', '¿Es la sandía top tier?'];
    addSuggestions(initialSuggestions);

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
