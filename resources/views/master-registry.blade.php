<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>@yield('title')</title>
</head>

<body>

    <section class="formulaire">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div>
                    <strong>Message Success</strong> <br>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        @if (session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div>
                <strong>Alert</strong> <br>
                {{ session('errors') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
  

      
        @yield('content')
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
                margin: 50px auto;
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
                /*  border-radius: 20px; */
                gap: 20px;
                padding: 20px;
            }

            #objet,
            #image {
                width: 100%;
                border-radius: 10px;
                height: 40px;
            }

            textarea {
                width: 100%;
                border-radius: 20px;
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
        </style>
    </section>

</body>

</html>
