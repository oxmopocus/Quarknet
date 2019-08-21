@extends('layouts.app')

<style>
    .borderLeftRight {
        display: inline-block;
        position: relative;
        color: #474E51;
    }

    .borderLeftRight::after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #FFB641;
        transform-origin: bottom right;
        transition: transform 0.4s cubic-bezier(0.86, 0, 0.07, 1);
    }

    .borderLeftRight:hover::after {
        transform: scaleX(1);
        transform-origin: bottom left;
        background-color: #FFB641;
    }

    .photo {
        align-content: center;
        width: 50%;
        height: 50%;
    }

    span.date {
        font-style: italic;
        font-size: 10px;
    }

    h4 strong {
        color: #FFB641;
    }

    textarea {
        border: 1px solid #FFB641;
        color: #FFB641;
    }

    .green-border-focus .form-control:focus {
        border: 1px solid #FFB641;
        box-shadow: 0 0 0 0.2rem rgba(218, 186, 56, .25);
    }

    .custom-file .btn, .btn-outline-warning {
        font-weight: bold;
        background-color: transparent;
        color: #FFB641;
    !important;
        border-color: #FFB641;
    !important;
    }

    button.btn.btn-outline-warning:hover {
        color: #1b1e21;
    !important;
        background-color: #FFB641;
    !important;
        border-color: #FFB641;
    !important;
        font-weight: bold;
    }

</style>

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
                                    @if(Auth::check() and $quark->user->id == Auth::user()->id)
                                        <form action="{{ route('quarks.reply', $quark) }}" method="GET">
                                            <div class="card card-header border-secondary mt-2">
                                            <span
                                                style="margin-left: 10px;"><strong> {{ $quark->user->duckname }} </strong>   a écrit :</span>
                                                <span class="date ml-2">{{ $quark->created_at->diffForHumans() }}</span>
                                                <span required class="primary mt-2 mb-2"
                                                      style="margin-left: 10px;">{{ $quark->message }}</span>
                                                <img class="photo" src="{{ $quark->photo }}">

                                                <button class="btn btn-sm btn-secondary col-md-2 " id="reply"
                                                        style="float: right; margin-left: 610px; width: 80px; "
                                                        type="submit">
                                                    Répondre !
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                @endforeach

                                @foreach ($quark->children as $child_quark)

                                    <div class="card card-header border-gray mt-2">
                                        <span><strong>{{ $child_quark->user->duckname }}</strong> a répondu :</span>
                                        <span
                                            class="date mb-3">{{ $child_quark->created_at->diffForHumans() }}</span>
                                        <div>{{ $child_quark->photo  }}</div>
                                        <div class="mb-4">{{ $child_quark->message  }}</div>
                                    </div>

                                @endforeach

                                @if(Auth::check() and $quark->user->id == Auth::user()->id)
                                    <form action="{{ route('quarks.edit', $quark) }}" method="GET">
                                        @csrf
                                        @method('GET')
                                        <button class="btn btn-sm btn-primary col-md-2 mt-1" type="submit"
                                                style="float: right; margin-left: 600px; width: 80px;">Modifier
                                        </button>
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
                                        <button class="btn btn-sm btn-danger col-md-2" type="submit"
                                                style="float: right; margin-left: 600px; width: 80px;">Supprimer
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
