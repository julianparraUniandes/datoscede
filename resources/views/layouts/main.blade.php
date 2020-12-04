<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @isset($title)
                {{ $title }} | 
            @endisset
            {{ config('app.name', 'Centro de Estudios Económicos CEDE -Facultad de Economía de la Universidad de Los Andes') }}
        </title>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
          
            ga('create', '{{config('services.g-analytics.key')}}', 'auto');
            ga('send', 'pageview');
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/styles-main.css') }}">
        <link rel="shortcut icon" href="https://www.uniandes.edu.co/sites/default/files/favicon.ico" type="image/ico">
        {{-- <link rel="stylesheet" href="{{ asset('css/styles-main.css') }}">       --}}
        @yield('head')
</head>
<body>
    @include('web.include.header')
    <main>
        @yield('content')
    </main>
    @include('web.include.footer')
    <script src="{{ asset('js/jquery-latest.js') }}" text="text/javascript"></script>
    <script src="{{ asset('js/menu.js') }}" text="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    @yield('script')
</body>

</html>