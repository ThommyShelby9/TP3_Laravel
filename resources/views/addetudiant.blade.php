@extends('master')
@section('content')
    <div class="container">
        @if (@isset($id))
            <section class="view__detail">
                <div class="container">
                    <div class="view__detail__content mt-5">
                        <div class="view__detail__img">
                            <img src="{{ asset($data['photo']) }}" alt="" width="250px">
                        </div>
                        <div class="view__detail__right">
                            <div class="view__detail__rigth__item">
                                <h2>NOM :</h2>
                                <p>{{ $data['name'] }}</p>
                            </div>
                            <div class="view__detail__rigth__item">
                                <h2>PRENOM :</h2>
                                <p>{{ $data['surname'] }}</p>
                            </div>
                            <div class="view__detail__rigth__item">
                                <h2>SPECIALITÉ :</h2>
                                <p>{{ $data['speciality'] }}</p>
                            </div>
                            <div class="view__detail__rigth__item">
                                <h2>DATE DE NAISSANCE :</h2>
                                <p>{{ $data['birthday'] }}</p>
                            </div>
                            <div class="view__detail__rigth__item">
                                <h2>BIO :</h2>
                                <p>{{ $data['bio'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group mt-5">
                        <a href="{{ route('index') }}">
                            <button class="btn btn-sm btn-outline-secondary">Retour</button>
                        </a>
                        <a
                            @if ($id < count($student)) href="{{ route('etudiant', ['id' => $data['id'] + 1]) }}"
                            @elseif($id == count($student)) href="{{ route('etudiant', [1]) }}" @endif>
                            <button class="btn btn-sm btn-outline-secondary">Suivant</button>
                        </a>
                    </div>
                </div>
            </section>
        @else
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
                <form method="POST" action="{{ route('getetudiant') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" placeholder="Nom" id="objet" name="name">
                    <input type="text" placeholder="Prenom" id="objet" name="surname">
                    <input type="text" placeholder="Spécialité" id="objet" name="speciality">
                    <input type="text" placeholder="Date de naissance" id="objet" name="birthday">
                    <input type="text" placeholder="Hobbies" name="hobbies" id="hobbies">
                    <input type="file" placeholder="Photo de l'étudiant" name="photo" id="photo">
                    <textarea name="bio" id="" cols="30" rows="5" placeholder="Bio"></textarea>
                    <button type="submit" id="btn_register">Ajouter</button>
                </form>
            </section>
        @endif
    </div>
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
@endsection
