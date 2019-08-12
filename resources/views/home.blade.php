@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mon compte</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Bienvenue mon canard ! <img src="/img/duck.png" alt="" style="width: 30px; height: 30px;" ></p>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
