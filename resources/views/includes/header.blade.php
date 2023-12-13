<header>
    <div class="navigation">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/movie-logo-film.png') }}" alt="logo">
            </a>
        </div>
        <nav>
            <ul>
                <li onclick="check_active('homepage')">
                    <a id="homepage" href="{{ route('home') }}">Home</a>
                </li>
                <li onclick="check_active('movies-list')">
                    <a id="movies" href="{{ route('moviesList') }}">Movies</a>
                </li>
                <li>
                    <a id="newMovie" href="{{ route('newMovie') }}">Add Movie</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
