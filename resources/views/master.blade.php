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
    @if ($errors->any())
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    @yield('content')
    
</body>


<script src="asset('js/bootstrap.min.js')"></script>

</html>

<style>
    * {
        color: black;
        position: relative;
        box-sizing: border-box;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 16px;
        margin: 0;
        padding: 0;
    }

    .formulaire {
        padding: 0 30px;
        margin: 20px auto;
        margin-top: 100px;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
    }

    .formulaire form {
        color: black !important;
        width: 400px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        box-shadow: 0 0 5px #000000;
        gap: 20px;
        padding: 20px;
    }

    #objet,
    #hobbies,
    #photo,
    #image,
    #address {
        width: 100%;
        border-radius: 10px;
        height: 40px;
    }

    textarea {
        width: 100%;
        border-radius: 10px;
    }

    #btn_register {
        padding: 5px 10px;
        border-radius: 10px;
        cursor: pointer;
        box-shadow: 0 0 5px #68c3ff;
        background-color: rgb(63, 61, 61);
        color: white;
    }

    #btn_register:hover {
        background-color: #68c3ff;
        color: black;
        box-shadow: 0 0 5px rgb(63, 61, 61);
    }

    .view__detail__content {
        border: 1px solid black;
        display: flex;
        padding: 20px;
        gap: 40px;
    }

    .view__detail__img {
        width: 250px;
        border-radius: 10px;
    }

    .view__detail__img img {
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
    }

    .view__detail__right {
        display: flex;
        flex-direction: column;
    }

    .view__detail__rigth__item {
        display: flex;
        gap: 10px;
        text-align: center;
        align-items: center;
    }

    .view__detail__rigth__item p {
        padding: 10px;
        margin-top: 10px
    }
</style>
