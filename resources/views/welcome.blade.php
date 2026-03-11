<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Garage Project') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div class="container">
        <header class="header">
            <a class="brand" href="{{ url('/') }}">{{ config('app.name', 'Garage Project') }}</a>

            @if (Route::has('login'))
                <nav class="nav">
                    @auth
                        <a class="btn" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a class="btn" href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a class="btn" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="card">
            <h1>Welkom bij je Garage Project</h1>
            <p>
                Een eenvoudige startpagina om afspraken te plannen en je dashboard snel te bereiken.
            </p>

            <div class="actions">
                <a class="btn btn-primary" href="{{ url('/afspraak') }}">Maak een afspraak</a>
                <a class="btn" href="{{ url('/dashboard') }}">Naar dashboard</a>
            </div>

            <ul class="list">
                <li>Snelle toegang tot afspraken</li>
                <li>Duidelijke, rustige layout</li>
                <li>Klaar om verder uit te bouwen</li>
            </ul>
        </main>
    </div>
</body>
</html>
