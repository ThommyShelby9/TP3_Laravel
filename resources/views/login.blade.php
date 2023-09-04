@extends('master-registry')

@section('content')
<form method="POST" action="{{route('authentification')}}" enctype="multipart/form-data">
    <h2>Login</h2>
    @csrf
    <input type="email" placeholder="Email" id="objet" name="email" value="{{ old('email') }}">
    <input type="password" placeholder="Mot de Passe" id="objet" name="password">
    <p>
        <a href="{{route('email_verify')}}">Mot de passe oublié?</a>
    </p>
    <button type="submit" id="btn_register">S'inscrire</button>
    <p>
        <a href="{{route('register')}}">Pas encore de compte? S'inscrire</a>
    </p>
</form>
@endsection