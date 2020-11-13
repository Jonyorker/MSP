@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <p>Welcome {{ $user->name }}</p>
        </div>

        <div class="row justify-content-left">
            <p><a href="/info/{{ $user->id }}/edit">Modify User information</a></p>
        </div>

    </div>
@endsection
