@extends('master-registry')
@section('content')
    <form action="{{ route('modify_password') }}" method="POST">
        @csrf
        <h2>Reset Password</h2>
      {{--   @if($user)
        <p>
            <h3>Bienvenue <strong>{{$user['firstname']}}</strong></h3>
        </p>
        @endif --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_password">
            <label for="exampleInputEmail1" class="form-label">Répétez le mot de passe</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new_password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection