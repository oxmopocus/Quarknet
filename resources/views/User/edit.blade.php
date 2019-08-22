@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-4">Mon compte</h1>

    <h2 class="mt-4">Modifier vos informations personnelles</h2>


    <form class="mt-4" method="POST" action="{{route('user.update', $user)}}">
        @csrf
        @method('PUT')

        <div class="form-row form-group">
            <label required for="name">Prénom</label>
            <input type="text" name="name" id="name" class="form-control mb-4" required placeholder="First name"
                   value="{{ $user->name }}">
            <label required for="lastname">Nom</label>
            <input type="text" required name="lastname" id="lastname" class="form-control mb-4" placeholder="Last name"
                   value="{{ $user->lastname }}">
            <label required for="duckname">Duckname</label>
            <input type="text" required name="duckname" id="duckname" class="form-control mb-4" placeholder="Duckname"
                   value="{{ $user->duckname }}">
            <div class="form-group">
                <label required for="exampleInputPassword1">Mot de passe</label>
                <input required type="password" name="password" class="form-control mb-2" id="exampleInputPassword1"
                       placeholder="password">
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Modifier mes infos</button>
    </form>
</div>
@endsection

