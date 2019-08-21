@extends('layouts.app')

@section('content')

    <div class="container col-md-4">
        <div class="card card-header border-secondary mt-2">
            <span><strong> {{ $quark->user->duckname }} </strong>   a écrit :</span>
            <span class="date">{{ $quark->created_at->diffForHumans() }}</span>
            <span required class="primary mt-2 mb-2"
                  style="margin-left: 10px;">{{ $quark->message }}</span>
            <img class="photo" src="{{ $quark->photo }}">
        </div>
    </div>

    @foreach ($quark->children as $child_quark)
        <div class="container col-md-4">
            <div class="card card-header border-gray mt-2">
                <span><strong>{{ $child_quark->user->duckname }}</strong> a répondu :</span>
                <span
                    class="date mb-3">{{ $child_quark->created_at->diffForHumans() }}</span>
                <div>{{ $child_quark->photo  }}</div>
                <div class="mb-4">{{ $child_quark->message  }}</div>
                <form action="{{ route('quarks.destroy', $quark) }}" method="POST">
                    @csrf
                    @method('delete')
                    @if(Auth::check() and $quark->user->id == Auth::user()->id and Gate::check('$child_quark', $quark)->id)
                        <button class="btn btn-sm btn-danger col-md-2 mt-1" type="submit"
                                style="float: right; margin-left: 600px; width: 80px;">
                            Supprimer
                        </button>
                    @endif
                </form>
            </div>
        </div>
    @endforeach

    @auth
        <div class="container mt-4 col-md-4">
            <div class="row">
                <div class="span4 well" style="padding-bottom:0">
                    <form accept-charset="UTF-8" action="{{ route('quarks.store') }}" method="POST">
                        <input type="hidden" name="parent_id" id="parent_id" value="{{ $quark->id }}">
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
                        <div class="form-group green-border-focus input-group mb-3">
                            <input type="text" class="col-md-4 form-control"
                                   name="photo"
                                   placeholder="Colle ton lien image ici !" aria-label="Username"
                                   aria-describedby="basic-addon1">
                            <button class="btn btn-sm btn-secondary col-md-2 " id="reply"
                                    style="float: right; margin-left: 440px; width: 80px; "
                                    type="submit">
                                Répondre !
                            </button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth


@endsection
