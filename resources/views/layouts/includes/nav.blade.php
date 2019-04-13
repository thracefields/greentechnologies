<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">{{ mb_strlen(Auth::user()->name) >= 30 ? mb_substr(Auth::user()->name, 0, 30) . '...' : Auth::user()->name}}</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item">
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger">Излез</button>
                        </form>
                    </a>
                </div>
            </li>
            @endauth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Начало</a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Вход</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">Регистрация</a>
            </li>
            @endguest
        </ul>
    </div>
</nav>