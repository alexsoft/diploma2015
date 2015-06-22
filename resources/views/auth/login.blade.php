@extends('_layouts.default')

@section('page_title', 'Авторизация')

@section('content')

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">

            <div class="panel panel-default">

                <div class="panel-body">

                    {!! Form::open() !!}

                        <div class="form-group">
                            {!! Form::label('nickname', 'Никнейм') !!}
                            {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Пароль') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>

                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('remember') !!} Запомнить меня
                            </label>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Войти', ['class' => 'btn btn-lg btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>
    </div>


@endsection