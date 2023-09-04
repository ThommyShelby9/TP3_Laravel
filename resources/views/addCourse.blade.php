@extends('master')

@section('content')
<div class="container">
    <section class="formulaire">
        <form method="POST" action="{{ route('addCourse') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Cours" id="objet" name="name">
            <input type="text" placeholder="Masse Horaire" id="objet" name="masse">
            <input type="text" placeholder="Coefficient" id="objet" name="coefficient">
            <select name="category" id="" multiple>
                <option value="{{$category_data['id_categorie']}}" name="categorie">{{$category_data['nom_category']}}</option>
            </select>
            <button type="submit" id="btn_register">Ajouter</button>
        </form>
    </section>
</div>
@endsection
