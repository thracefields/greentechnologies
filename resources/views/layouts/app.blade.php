<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @include('layouts.includes.css')

    <!-- Scripts -->
    @include('layouts.includes.js-head')
</head>
<body>
    <div id="app">
        <!-- Header -->
        @include('layouts.includes.header')
            
        <!-- Nav -->
        @include('layouts.includes.nav')

        <!-- Main -->
        <main class="py-4 p-2">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.includes.footer')
    </div>

    <!-- Scripts -->
    @include('layouts.includes.js-body')

</body>
</html>
