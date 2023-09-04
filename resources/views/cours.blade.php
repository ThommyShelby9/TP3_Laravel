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
    <form action="{{route('addCategory')}}">
        @csrf
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom_category" width="20px">
        <button type="submit" class="btn btn-primary  mt-3">Ajouter des catégories</button>
    </form>
    <a href="{{ route('addCourse') }}">
        <button class="btn btn-primary  mt-3">Ajouter des cours</button>
    </a>
  <table class="table table-striped-columns mt-5">
        <thead>
            <tr>
                <th scope="col">Cours</th>
                <th scope="col">Masse horaire</th>
                <th scope="col">Coefficient</th>
                <th scope="col">Catégories</th>
            </tr>
        </thead>
        @if (@isset($cours))
            @foreach ($cours as $item)
                <tbody class="table-group-divide">
                    <tr>
                        <td>{{ $item['name'] }} {{ $item['surname'] }}</td>
                        <td>{{ $item['name'] }} {{ $item['surname'] }}</td>
                        <td>{{ $item['hobbies'] }}</td>
                        <td>{{ $item['speciality'] }}</td>
                        <th scope="col">
                            <div class="btn-group">
                                <a href="{{ route('etudiant', ['id' => $item['id']]) }}">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Voir ++</button>
                                </a>
                                <a href="{{ route('getStudentInfo', ['id' => $item['id']])  }}">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
                                </a> 
                               <a href="{{ route('delete', ['id' => $item['id']])  }}">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Supprimer</button>
                                </a> 
                            </div>
                        </th>
                    </tr>
                </tbody>
            @endforeach
        @endif
    </table> 
</div>
@endsection