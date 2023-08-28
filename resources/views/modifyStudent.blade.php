@extends('master')
@section('content')
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
        <section class="formulaire">
            <form method="POST" action="{{ route('modifyStudent', ['id' => $data['id']]) }}" enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="Nom" id="objet" name="name" value="{{ $data['name'] }}">
                <input type="text" placeholder="Prenom" id="objet" name="surname" value="{{ $data['surname'] }}">
                <input type="text" placeholder="Spécialité" id="objet" name="speciality"
                    value="{{ $data['speciality'] }}">
                <input type="text" placeholder="Date de naissance" id="objet" name="birthday"
                    value="{{ $data['birthday'] }}">
                <input type="text" placeholder="Hobbies" name="hobbies" id="hobbies" value="{{ $data['hobbies'] }}">
                <input type="file" placeholder="Photo de l'étudiant" name="photo" id="photo"
                    value="{{ $data['photo'] }}">
                <textarea name="bio" id="" cols="30" rows="5" placeholder="Bio" value="{{ $data['bio'] }}"></textarea>
                <button type="submit" id="btn_register">Modifier</button>
            </form>
        </section>


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
                border-radius: 20px;
                gap: 20px;
                padding: 20px;
            }

            #objet,
            #hobbies,
            #photo,
            #image {
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
        </style>
    @endsection
