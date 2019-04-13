<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Начало</a>
            </li>
            @guest
            <li class="nav-item">
                    <a class="nav-link" href="#">Вход</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Регистрация</a>
            </li>
            @endguest
        </ul>
    </div>
</nav>