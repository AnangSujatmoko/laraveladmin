<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    @vite(['resources/css/app.css'])
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                {{-- <a href="/" class="h1">{{ config('app.name') }}</a> --}}
                <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">
                <br>
                <a href="/" class="h1">Laravel 11.x</a>
            </div>
            <div class="card-body">
                @yield('main')
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>
