@extends('master')
@section('content')
<div class="container d-flex">
    <h2>{{$teacher_data['name']}}  {{$teacher_data['surname']}}</h2>
    <div class="content_right mt-5">
        <form action="{{route('get_affectation', ['id' => $id])}}" method="POST">
            @csrf
            <select class="form-select" multiple aria-label="Default select example" name="cours_id[]">
                <option selected>Choisissez un ou des cours</option>
                @foreach($cours as $item)
                <option value="{{$item['id']}}">{{$item['cours']}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary ">Attribuer</button>
        </form>
    </div>
       <div class="content_letf">
        <table class="table table-striped-columns mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom et Prénoms</th>
                    <th scope="col">Cours</th>
                </tr>
            </thead>
            @if (@isset($teacher_list))
                @foreach ($teacher_list as $item)
                    <tbody class="table-group-divide">
                        <tr>
                          <td>{{ $item->id }}</td>
                            <td>{{ $item->name.' '.$item->surname}}</td>
                            <td>
                                @foreach($item->see_affectation as $item)
                                <a href="">{{$item->get_cours->cours}}</a>
                                @endforeach
                            </td>
                            <th scope="col">
                          
                            </th>
                        </tr>
                    </tbody>
                @endforeach
            @endif
        </table> 
    </div>
</div>

<style>
    .container{
        gap: 80px;
    }
</style>
@endsection