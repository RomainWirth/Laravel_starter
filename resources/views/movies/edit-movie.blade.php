@extends('layouts.app')

@section('content')
<div class="blockpage">

    @if (isset($movie))
    <div class="heading">
        <h1 class="title">Update movie</h1>
        <a id="currentMovie" href="{{ route('currentMovie', $movie->id) }}" title="current movie">
            <p class="mainButton">Back</p>
        </a>
    </div>
    <form method="PUT" action="{{ route('updateMovie', $movie->id) }}" enctype="multipart/form-data" class="formulaire overflow-scroll">
        <!-- <input type="hidden" name="_method" value="PUT"> -->
        @method('PUT')
    @else
    <div class="heading">
        <h1 class="title">New entry</h1>
        <a id="mainList" href="{{ route('moviesList') }}" title="main list">
            <p class="mainButton">Back</p>
        </a>
    </div>
    <form method="POST" action="{{ route('saveMovie') }}" class="formulaire overflow-scroll">
    @endif
        @csrf
        <p>
            <label for="name">Title</label><br/>
            <input type="text" name="name" value="{{ isset($movie->name) ? $movie->name : old('name') }}" id="name" placeholder="Title of the movie" class="inputText">

            @error("title")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="poster" >Poster</label><br/>
            @if (isset($movie))
                <div class="image">
                    <img src="{{ $movie->poster }}" alt="alt="poster du film {{ $movie->name }}">
                </div>
            @endif
            <input type="url" name="poster" value="{{ isset($movie->poster) ? $movie->poster : old('poster') }}" id="poster" class="inputText">

            <!-- Le message d'erreur pour "picture" -->
            @error("poster")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="contenttype">Content Type</label><br/>
            <select name="contenttype" id="contenttype">
                <option value="{{ isset($movie->contenttype) ? $movie->contenttype : old('content type') }}">--select option--</option>
                <option value="TVSeries">TVSeries</option>
                <option value="Movie">Movie</option>
            </select>

            <!-- Le message d'erreur pour "content" -->
            @error("contenttype")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="description">Synopsis</label><br/>
            <input type="text" name="description" value="{{ isset($movie->description) ? $movie->description : old('Synopsis') }}" id="description" lang="en" placeholder="Synopsis of the movie" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("description")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="contentrating">Content Rating</label><br/>
            <select name="contentrating" id="contentrating">
                <option value="{{ isset($movie->contentrating) ? $movie->contentrating : old('content rating') }}">--select option--</option>
                <option value="7+">7+</option>
                <option value="13+">13+</option>
                <option value="16+">16+</option>
                <option value="18+">18+</option>
            </select>

            <!-- Le message d'erreur pour "content" -->
            @error("contentrating")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="genre">Genre</label><br/>
            <select name="genre" id="genre">
                <option value="{{ isset($movie->genre) ? $movie->genre : old('genre') }}">--select option--</option>
                <option value="Competition Reality TV">Competition Reality TV</option>
                <option value="Documentaries">Documentaries</option>
                <option value="Dramas">Dramas</option>
                <option value="Family Features">Family Features</option>
                <option value="Family Watch Together TV">Family Watch Together TV</option>
                <option value="Fantasy TV Shows">Fantasy TV Shows</option>
                <option value="Horror TV Serials">Horror TV Serials</option>
                <option value="Movies Based on Books">Movies Based on Books</option>
                <option value="Movies Based on Real Life">Movies Based on Real Life</option>
                <option value="Music & Musicals">Music & Musicals</option>
                <option value="Period Pieces">Period Pieces</option>
                <option value="Political Documentaries">Political Documentaries</option>
                <option value="Romantic Movies">Romantic Movies</option>
                <option value="Romantic TV Comedies">Romantic TV Comedies</option>
                <option value="Sci-Fi & Fantasy Anime">Sci-Fi & Fantasy Anime</option>
                <option value="Sci-Fi Movies">Sci-Fi Movies</option>
                <option value="Sitcoms">Sitcoms</option>
                <option value="Social Issue Dramas">Social Issue Dramas</option>
                <option value="Stand-Up Comedy">Stand-Up Comedy</option>
                <option value="Teen Movies">Teen Movies</option>
                <option value="True Crime Documentaries">True Crime Documentaries</option>
                <option value="TV Action & Adventure">TV Action & Adventure</option>
                <option value="TV Cartoons">TV Cartoons</option>
                <option value="TV Comedies">TV Comedies</option>
                <option value="TV Dramas">TV Dramas</option>
                <option value="TV Mysteries">TV Mysteries</option>
                <option value="TV Shows Based on Books">TV Shows Based on Books</option>
                <option value="TV Shows Based on Manga">TV Shows Based on Manga</option>
                <option value="TV Thrillers">TV Thrillers</option>
                <option value="US Movies">US Movies</option>
                <option value="Wedding & Romance Reality TV">Wedding & Romance Reality TV</option>
                <option value="Westerns">Westerns</option>
            </select>

            <!-- Le message d'erreur pour "content" -->
            @error("genre")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="formatedduration">Duration</label><br/>
            <input type="text" name="formatedduration" value="{{ isset($movie->formatedduration) ? $movie->formatedduration : old('duration') }}" id="formatedduration" placeholder="Duration" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("formatedduration")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="releaseddate">Released Date</label><br/>
            <input type="text" name="releaseddate" value="{{ isset($movie->releaseddate) ? $movie->releaseddate : old('released date') }}" id="releaseddate" placeholder="Released Date" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("releaseddate")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="actors">Actors</label><br/>
            <input type="text" name="actors" value="{{ isset($movie->actors) ? $movie->actors : old('actors') }}" id="actors" placeholder="Actors" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("actors")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="director">Director</label><br/>
            <input type="text" name="director" value="{{ isset($movie->director) ? $movie->director : old('director') }}" id="director" placeholder="Director" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("director")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="creator">Creator</label><br/>
            <input type="text" name="creator" value="{{ isset($movie->creator) ? $movie->creator : old('creator') }}" id="creator" placeholder="Creator" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("creator")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="audio">Audio</label><br/>
            <input type="text" name="audio" value="{{ isset($movie->audio) ? $movie->audio : old('audio') }}" id="audio" placeholder="Audio" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("audio")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="subtitles">Subtitles</label><br/>
            <input type="text" name="subtitles" value="{{ isset($movie->subtitles) ? $movie->subtitles : old('subtitles') }}" id="subtitles" placeholder="Subtitles" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("subtitles")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="numberofseasons">Number of Seasons</label><br/>
            <input type="text" name="numberofseasons" value="{{ isset($movie->numberofseasons) ? $movie->numberofseasons : old('number of seasons') }}" id="numberofseasons" placeholder="Number of Seasons" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("numberofseasons")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="seasonstartdate">Season Start Date</label><br/>
            <input type="text" name="seasonstartdate" value="{{ isset($movie->seasonstartdate) ? $movie->seasonstartdate : old('season start date') }}" id="seasonstartdate" placeholder="Season Start Date" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("seasonstartdate")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <input type="submit" name="validate" value="Post movie" class="submitButton">
    </form>
</div>
@endsection
