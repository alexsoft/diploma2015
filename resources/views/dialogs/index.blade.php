@extends('_layouts.default')

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            @foreach($users as $user)
                {{ $user->nickname }}
            @endforeach
        </div>
    </div>

@endsection