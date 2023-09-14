@extends('master')
@section('content')
<div class="container d-flex">
    <div class="content_letf">
        <table class="table table-striped-columns mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom et Prénoms</th>
                    <th scope="col">Cours</th>
                </tr>
            </thead>
            @if (@isset($student))
                @foreach ($student as $item)
                    <tbody class="table-group-divide">
                        <tr>
                          <td>{{ $item->id }}</td>
                            <td>{{ $item->name.' '.$item->surname}}</td>
                            <td>
                                @foreach($item->see_attribute as $item)
                                <a href="">{{$item->get_cours->cours}}</a>
                                @endforeach
                            </td>
                            <th scope="col">
                              {{--   <div class="btn-group">
                                    <a href="{{ route('etudiant', ['id' => $item['id']]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Voir ++</button>
                                    </a>
                                    <a href="{{ route('getStudentInfo', ['id' => $item['id']])  }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
                                    </a> 
                                   <a href="{{ route('delete', ['id' => $item['id']])  }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Supprimer</button>
                                    </a> 
                                </div> --}}
                            </th>
                        </tr>
                    </tbody>
                @endforeach
            @endif
        </table> 
    </div>
    <div class="content_right mt-5">
        <form action="{{route('get_attribute')}}" method="POST">
            @csrf
            <select class="form-select" aria-label="Default select example" name="student_id">
                <option selected>Choisissez un étudiant</option>
                @foreach($etu as $item)
                <option value="{{$item['id']}}">{{$item['name']}}  {{$item['surname']}}</option>
                @endforeach
            </select>
            <select class="form-select" multiple aria-label="Default select example" name="cours_id[]">
                <option selected>Choisissez un ou des cours</option>
                @foreach($cours as $item)
                <option value="{{$item['id']}}">{{$item['cours']}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary ">Attribuer</button>
        </form>
    </div>
</div>

<style>
    .container{
        gap: 80px;
    }
</style>
@endsection