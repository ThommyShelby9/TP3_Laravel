@extends('master')

@section('content')
<div class="container">
    <section class="formulaire">
        <form method="POST" action="{{route('send_teacher')}}" enctype="multipart/form-data">
            <h2>Ajout d'enseignant</h2>
            @csrf
            <input type="text" placeholder="Nom" id="objet" name="name">
            <input type="text" placeholder="Prénom" id="objet" name="surname">
            <input type="number" placeholder="Téléphone" id="objet" name="number">
            <input type="text" placeholder="Adresse" name="address" id="address">
            <button type="submit" id="btn_register">Ajouter</button>
        </form>
    </section>
</div>

@endsection
