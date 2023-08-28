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
        <a href="{{ route('addEtudiant') }}">
            <button class="btn btn-primary  mt-3">Ajouter</button>
        </a>
        <table class="table table-striped-columns mt-5">
            <thead>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Nom et Prénoms</th>
                    <th scope="col">Hobbies</th>
                    <th scope="col">Spécialités</th>
                </tr>
            </thead>
            @if (@isset($liste_etudiants))
                @foreach ($liste_etudiants as $item)
                    <tbody class="table-group-divide">
                        <tr>
                            <th scope="row"><img src="{{ asset($item['photo']) }}" class="img-thumbnail rounded-0"
                                    width="70px" alt=""></th>
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
