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

            <nav class="nav header-actions">
                @auth
                    <a class="btn btn-primary" href="{{ url('/dashboard') }}">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn">Uitloggen</button>
                    </form>
                @else
                    <a class="btn btn-primary" href="{{ route('login') }}">Log in</a>
                    <a class="btn" href="{{ route('register') }}">Register</a>
                @endauth
            </nav>
        </header>

        <main class="card">
            <h1>Welkom bij BMperformace</h1>
            <p>
                <p>Welkom bij BMperformace! Hier kun je snel en gemakkelijk afspraken maken en beheren.</p>
            </p>


            <ul class="list">
                <li>Snelle toegang tot afspraken</li>
                <li>Klaar om verder uit te bouwen</li>
            </ul>
        </main>
    </div>
</body>
</html>
