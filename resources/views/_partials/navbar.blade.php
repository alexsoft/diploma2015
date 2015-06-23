<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}" style="font-family: 'Gloria Hallelujah'">Cipher Chat</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    <li class="{{ Request::is('dialogs*') ? 'active' : '' }}">
                    <a href="{{ route('dialogs.index') }}">Диалоги</a>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} ({{ Auth::user()->nickname }}) <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('users.show', Auth::user()->nickname) }}"><i class="fa fa-fw fa-user"></i>&nbsp;Мой профиль</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}"><i class="fa fa-fw fa-sign-out"></i>&nbsp;Выйти</a></li>
                        </ul>
                    </li>
                @else
                    <li class="{{ Request::is('auth/login') ? 'active' : '' }}">
                        <a href="{{ url('auth/login') }}">Войти</a>
                    </li>
                    <li class="{{ Request::is('auth/signup') ? 'active' : '' }}">
                        <a href="{{ url('auth/signup') }}">Зарегистрироваться</a>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>