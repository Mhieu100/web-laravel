<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!-- icon -->
    <link rel="icon" href="{{ asset('assets/img/favcion.png') }}" type="image/x-icon" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}" />

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}">

    <!-- Alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

    {{-- <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    @livewireStyles
</head>

<body style="background-color: hsl(0, 0%, 96%)">
    <div id="app">

        @include('layouts.inc.frontend.navbar')

        <main>
            @yield('content')
        </main>

        @include('layouts.inc.frontend.footer')
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>

    <!-- Jquery Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>

    <script>
        window.addEventListener('message', event => {
            if(event.detail){
                alertify.set('notifier', 'position', 'top-right');
                alertify.notify(event.detail.text, event.detail.type);
            }
        })
    </script>
    @yield('script')
    @livewireScripts
    @stack('scripts')
</body>

</html>
