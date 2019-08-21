@extends('layouts.app')
@section('content')
    <div class="container col-md-4">
        <div class="card card-header border-secondary mt-2">
            <span style="margin-left: 10px;"><strong> {{ $quark->user->duckname }} </strong>   a écrit :</span>
            <span class="date ml-2">{{ $quark->created_at->diffForHumans() }}</span>
            <span required class="primary mt-2 mb-2"
                  style="margin-left: 10px;">{{ $quark->message }}</span>
            <img class="photo" src="{{ $quark->photo }}">

            <button class="btn btn-sm btn-secondary col-md-2 " id="reply"
                    style="float: right; margin-left: 440px; width: 80px; "
                    type="submit">
                Répondre !
            </button>
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
            </div>
        </div>
    @endforeach
@endsection
