@extends('master-registry')

@section('content')
    <form method="POST" action="{{ route('storeUser') }}" enctype="multipart/form-data">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>storeUser
    @endif

     
        <h2>Register</h2>
        @csrf
        <input type="text" placeholder="Nom" id="objet" name="firstname" value="{{ old('firstname') }}">
        <input type="text" placeholder="Prenom" id="objet" name="lastname" value="{{ old('lastname') }}">
        <input type="email" placeholder="Email" id="objet" name="email" value="{{ old('email') }}">
        <input type="password" placeholder="Mot de passe" id="objet" name="password">
        <input type="password" placeholder="Confirmer votre mot de pass" id="objet" name="password_confirmation">
{{--         <input type="file" placeholder="Ajouter une image" name="avatar" id="image"> --}}
        <button type="submit" id="btn_register">S'inscrire</button>

        <p>
            <a href="{{ route('login') }}">Déjà un compte? Se connecter!</a>
        </p> 
    </form>
@endsection
