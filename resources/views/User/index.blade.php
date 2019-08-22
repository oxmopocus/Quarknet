@extends('layouts.app')

@section('content')


    <div class="container">
        <h1 class="mt-4">Mon compte</h1>

        <h2 class="mt-4">Vos informations personnelles</h2>

        <form class="mt-4">

            <div class="card mt-4" style="width: 18rem;">

                <div class="card-header">
                    Prénom :
                    <label for="name">{{ $user->name }}</label>
                </div>

                <div class="card-header">
                    Nom de famille :
                    <label for="lastname">{{ $user->lastname }}</label>
                </div>

                <div class="card-header">
                    Duckname:
                    <label for="lastname">{{ $user->duckname }}</label>
                </div>

                <div class="card-header">
                    Mot de passe :
                    <label for="exampleInputPassword1" type="password">************</label>
                </div>

                <a class="btn btn-outline-primary" href="{{ route('user.edit') }}">Modifier</a>

            </div>

        <!-- {{ $user->password }} -->

            <ul>
            </ul>
        </form>
    </div>
@endsection
