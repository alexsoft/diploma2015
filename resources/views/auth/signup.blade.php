@extends('_layouts.default')

@section('page_title', 'Авторизация')

@section('content')

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">

            <div class="panel panel-default">
                <div class="panel-body">

                    {!! Form::open(['url' => 'auth/signup']) !!}

                        <div class="form-group">
                            {!! Form::label('nickname', 'Ник') !!}
                            {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Пароль') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Зарегистрироваться', ['class' => 'btn btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

@endsection