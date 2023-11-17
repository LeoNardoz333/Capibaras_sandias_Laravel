@extends('layouts.verde')
@section('container')
  <body>
    <div class="mt-5 w-100 d-flex justify-content-center">
        <span class="Titulo-verde fw-bold text-center">Preguntas y respuestas</span>
    </div>
  <div id="chat-container" class="w-75 d-flex mx-auto mt-5">
    <div class="container">
        <div class="row justify-content-center no-padding-row">
          <div id="chat-container" class="w-100 h-100">
            <div id="chat-messages"></div>
            <input type="text" id="user-input" placeholder="Escribe tu pregunta..." onkeydown="handleEnter(event)">
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
  
      addMessage('ChatBot', '¡Hola! Soy un ejemplo de respuesta del chatbot.');
    }
  
    function handleSuggestionClick(suggestion) {
      addMessage('Tú', suggestion);
      addMessage('ChatBot', '¡Hola! Soy un ejemplo de respuesta del chatbot.');
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
  </script>
  
  </body>
@endsection