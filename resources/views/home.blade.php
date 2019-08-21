@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse mb-4">
                        <a href="{{ route('quarks.index') }}" class="nav-item nav-link borderLeftRight"><i
                                class="fas fa-list-ul"></i> Lister tous les Kwaks</a>
                        <a href="{{ route('quarks.create') }}" class="nav-item nav-link borderLeftRight"><i
                                class="fas fa-plus"></i> Créer un Kwak</a>
                        <a href="#" class="nav-item nav-link borderLeftRight"><i class="far fa-edit"></i> Modifier un
                            Kwak</a>
                        <a href="#" class="nav-item nav-link borderLeftRight"><i class="fas fa-trash-alt"></i> Supprimer
                            un Kwak</a>
                    </div>
                </nav>
                <div class="card">
                    <div class="card-header">Mur Kwak</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4><strong>Bienvenue mon canard !</strong> <img src="/img/duck.png" alt=""
                                                                         style="width: 20px; height: 20px;"></h4>
                    </div>
                </div>
                @auth
                    <div class="container mt-4">
                        <div class="row">
                            <div class="span4 well" style="padding-bottom:0">
                                <form accept-charset="UTF-8" action="{{ route('quarks.store') }}" method="POST">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group green-border-focus">
                                        <textarea class="span4 mb-4 form-control" id="message" name="message"
                                                  style="width: 730px; height: 150px;" placeholder=" Écris ton kwak !"
                                                  required rows="5"></textarea>
                                    </div>
                                    <div class="custom-file">
                                        <div class="form-group green-border-focus input-group mb-3">
                                            <input type="text" class="col-md-4 form-control"
                                                   name="photo"
                                                   placeholder="Colle ton lien image ici !" aria-label="Username"
                                                   aria-describedby="basic-addon1">
                                            <button class="btn btn-outline-warning col-md-2"
                                                    style="float: right; margin-left: 410px;" type="submit">
                                                Kwak !
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @endauth

                                @foreach ($quarks as $quark)
                                    <form action="{{ route('quarks.reply', $quark) }}" method="GET">
                                        <div class="card card-header border-secondary mt-2">
                                            <span><strong> {{ $quark->user->duckname }} </strong>   a écrit :</span>
                                            <span class="date">{{ $quark->created_at->diffForHumans() }}</span>
                                            <span required class="primary mt-2 mb-2">{{ $quark->message }}</span>
                                            <img class="photo" src="{{ $quark->photo }}">
                                            <button class="btn btn-sm btn-secondary col-md-2 " id="reply"
                                                    style="float: right; margin-left: 610px; width: 80px; "
                                                    type="submit">
                                                Répondre !
                                            </button>
                                            <form action="{{ route('quarks.edit', $quark) }}" method="GET">
                                                @csrf
                                                @method('GET')
                                                @if(Auth::check() and $quark->user->id == Auth::user()->id)
                                                    <button class="btn btn-sm btn-primary col-md-2 mt-1" type="submit"
                                                            style="float: right; margin-left: 610px; width: 80px;">
                                                        Modifier
                                                    </button>
                                                @endif
                                            </form>

                                            <form action="{{ route('quarks.show', $quark) }}" method="GET">
                                                @csrf
                                                @method('GET')
                                                <button class="btn btn-sm btn-warning col-md-2 mt-1" type="submit"
                                                        style="float: right; margin-left: 600px; width: 80px;">Voir le
                                                    Kwak
                                                </button>
                                            </form>

                                            <form action="{{ route('quarks.destroy', $quark) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                @if(Auth::check() and $quark->user->id == Auth::user()->id)

                                                    <button class="btn btn-sm btn-danger col-md-2 mt-1" type="submit"
                                                            style="float: right; margin-left: 600px; width: 80px;">
                                                        Supprimer
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
        </div>
@endsection
