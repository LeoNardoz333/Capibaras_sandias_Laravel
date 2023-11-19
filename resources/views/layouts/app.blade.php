<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Capibaras y sandías</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <style></style>
    </head>
    <body>
        @include('partials.navegacion')
        @if (session('status'))
        <div class="container mt-3" id="statusMessage">
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
        </div>
        </div>
        <script>
        setTimeout(function() {
        var statusMessage = document.getElementById('statusMessage');
        if (statusMessage) {
        statusMessage.classList.add('hidden');
        setTimeout(function() {
        statusMessage.style.display = 'none';
        }, 500);

        }
        }, 3000);
        </script>
        @endif
        @yield('container')
        @yield('js')
        <section>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ffaf2b " fill-opacity="1" d="M0,64L205.7,96L411.4,256L617.1,96L822.9,320L1028.6,64L1234.3,128L1440,32L1440,320L1234.3,320L1028.6,320L822.9,320L617.1,320L411.4,320L205.7,320L0,320Z"></path></svg>
        </section>
        <footer class="w-100 d-flex justify-content-center align-items-center footer-cap">
            <p class="fs-5 px-3 pt-3">
                Nardoz &copy; Todos los derechos reservados.
            </p>
        </footer>
    </body>
</html>
