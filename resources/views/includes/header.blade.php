<header>
    <div class="navigation">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/movie-logo-film.png') }}" alt="logo">
            </a>
        </div>
        @if (Route::has('login'))
        <nav>
            <ul>
                <li class="mainButton">
                    <a id="homepage" href="{{ route('home') }}">Home</a>
                </li>
                <li class="mainButton">
                    <a id="movies" href="{{ route('moviesList') }}">Movies</a>
                </li>
                @auth
                    <li class="mainButton">
                        <a id="newMovie" href="{{ route('newMovie') }}" title="Add a movie">Add Movie</a>
                    </li>
                    <li class="mainButton">
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="mainButton">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                    @else
                    <li class="mainButton">
                        <a href="{{ route('login') }}">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="mainButton">
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </nav>
        @endif
    </div>
</header>
