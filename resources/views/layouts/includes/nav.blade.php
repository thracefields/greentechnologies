<nav id="main-nav" class="navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            @auth
            <div class="nav-item dropdown">
                <button class="btn green-accent-color-1 text-white dropdown-toggle" type="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> {{ mb_strlen(Auth::user()->name) >= 30 ? mb_substr(Auth::user()->name, 0, 30) . '...' : Auth::user()->name}}
                </button>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" class="text-dark" href="{{ route('stations.create') }}">Добави станция</a>
                    <a class="dropdown-item" class="text-dark" href="{{ route('indicators.create') }}">Добави измервания</a>
                    <a class="dropdown-item">
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-dark border-0 bg-white">Излез</button>
                        </form>
                    </a>
                </div>
            </div>
            @endauth
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('/') }}"><i class="fas fa-home"></i> Начало</a>
            </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('stations.index') }}">Метеорологични станции</a>
                </li>
            @endauth
            @auth
               @if (Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/login') }}">Админ</a>
                </li> 
               @endif 
            @endif
            @guest
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i> Влез</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('/register') }}"><i class="fas fa-user-plus"></i> Регистрирай се</a>
            </li>
            @endguest
        </ul>
    </div>
</nav>