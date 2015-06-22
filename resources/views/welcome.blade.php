@extends('_layouts.default')

@section('page_title', 'Cipher Chat')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h1>Добро пожаловать в Cipher Chat!</h1>
        </div>
    </div>

    <div class="row" style="margin: 25px 0;">
        <div class="col-sm-12 text-center">
            <a href="{{ url('auth/signup') }}" class="btn btn-lg btn-primary">Зарегистрироваться</a>
            <a href="{{ url('auth/login') }}" class="btn btn-default">Войти</a>
        </div>
    </div>

    <div class="row">
        @for($i = 0; $i < 3; $i++)
            <div class="col-sm-4">
                <h3><i class="fa fa-fw fa-lock"></i>&nbsp;Шифрование</h3>
                <p>Все сообщения зашифрованы!</p>
                <p>Для связи с сервером используется SSL защищённое соединение, а это значит, что никто не сможет увидеть Вашу переписку!</p>
            </div>
        @endfor
    </div>

@endsection