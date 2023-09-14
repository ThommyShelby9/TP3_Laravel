@extends('master')
@section('content')
<div class="container">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div>
            <strong>Message Success</strong> <br>
            {{ session('message') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{--     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom_category" width="20px" placeholder="Ajoutez une catégorie ici!">
    <button type="submit" class="btn btn-primary  mt-3">Ajouter des catégories</button>
</form>
<a href="{{ route('course_view') }}">
    <button class="btn btn-primary  mt-3">Ajouter des cours</button>
</a>
<a href="{{route('view_attribution')}}">
    <button class="btn btn-primary  mt-3">Attribuer des cours</button>
</a> --}}
<a href="{{route('see_teacher_form')}}">
    <button class="btn btn-primary  mt-3">Ajouter des enseignants</button>
</a> 
<table class="table table-striped-columns mt-5">
    <thead>
        <tr>
            <th scope="col">Nom et Prénoms</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Adresse</th>
        </tr>
    </thead>
    @foreach ($teacher as $item)
    <tbody class="table-group-divide">
        <tr>
            <td>{{$item['name']}}  {{$item['surname']}}</td>
            <td>{{$item['number']}}</td>
            <td>{{$item['address']}}</td>
            <th scope="col">
                <div class="btn-group">
                    <a href="{{ route('affectation', ['id' => $item['id']]) }} ">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Affecter</button>
                    </a>
                </div>
            </th>
        </tr>
    </tbody>
    @endforeach
</table> 
</div>
</div>
@endsection