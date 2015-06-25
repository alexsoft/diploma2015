@extends('_layouts.default')

@section('page_title',  'Редактировать ' . $user->name)

@section('content')

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    {!! Form::model($user, ['route' => ['users.update', $user->nickname], 'method' => 'PUT']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Имя') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection