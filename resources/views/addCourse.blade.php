@extends('master')

@section('content')
<div class="container">
    <section class="formulaire">
        <form method="POST" action="{{ route('addCourse') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Cours" id="objet" name="cours">
            <input type="text" placeholder="Masse Horaire" id="objet" name="masse">
            <input type="text" placeholder="Coefficient" id="objet" name="coefficient">
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected>Choisissez la catégorie</option>
                @foreach ($category_data as $category)
                <option value="{{$category['id_category']}}">{{$category['nom_category']}}</option>
                @endforeach
            </select>
            <button type="submit" id="btn_register">Ajouter</button>
        </form>
    </section>
</div>

@endsection
