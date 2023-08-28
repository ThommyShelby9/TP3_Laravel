<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <title>@yield('title')</title>
</head>

<body>
    <header>
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-white bold" href="{{ route('index') }}">ECOLE 229</a>
            </div>
        </nav>
    </header>
</body>
@yield('content')
<script src="asset('js/bootstrap.min.js')"></script>
</html>
