@extends('layouts.app')


@section('content')

    <div class="container">
        <h1 class="mt-4">Modifier votre Kwak</h1>

        <form class="mt-4" method="POST" action="{{ route('quarks.update', $quark) }}">
            @csrf
            @method('PUT')

            <div class="form-row form-group">
                <label for="message">Message</label>
                <input type="text" required name="message" id="message" class="form-control mb-4" placeholder="{{ $quark->message }}"
                       value="{{ $quark->message }}">
            <button type="submit" class="btn btn-outline-success">Valider</button>
            </div>

        </form>
    </div>
@endsection
