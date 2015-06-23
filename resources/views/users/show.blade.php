@extends('_layouts.default')

@section('page_title', 'User show')

@section('content')

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        <strong>Имя:</strong>&nbsp;{{ $user->name }}
                    </p>
                    <p>
                        <strong>Никнейм:</strong>&nbsp;{{ $user->nickname }}
                    </p>
                    <p>
                        <strong>E-mail:</strong>&nbsp;{{ $user->email }}
                    </p>
                    <p>
                        <a href="{{ route('users.edit', $user->nickname) }}" class="btn btn-info">
                            <i class="fa fa-fw fa-pencil"></i>&nbsp;Редактировать
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection