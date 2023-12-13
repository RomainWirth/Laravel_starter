@extends('layouts.app')

@section('content')
<div class="blockpage">
    <h1 class="title">New entry</h1>
    <form method="POST" action="{{ route('saveMovie') }}" class="formulaire overflow-scroll">
        @csrf
        <p>
            <label for="name">Title</label><br/>
            <input type="text" name="name" value="" id="name" placeholder="Title of the movie" class="inputText">

            @error("title")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="poster" >Poster</label><br/>
            <input type="url" name="poster" id="poster" class="inputText">

            <!-- Le message d'erreur pour "picture" -->
            @error("poster")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="contenttype">Content Type</label><br/>
            <select name="contenttype" id="contenttype">
                <option value="">--select option--</option>
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
            <input type="text" name="description" id="description" lang="en" placeholder="Synopsis of the movie" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("description")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="contentrating">Content Rating</label><br/>
            <select name="contentrating" id="contentrating">
                <option value="">--select option--</option>
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
                <option value="">--select option--</option>
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
            <input type="text" name="formatedduration" value="" id="formatedduration" placeholder="Duration" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("formatedduration")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="releaseddate">Released Date</label><br/>
            <input type="text" name="releaseddate" value="" id="releaseddate" placeholder="Released Date" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("releaseddate")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="actors">Actors</label><br/>
            <input type="text" name="actors" value="" id="actors" placeholder="Actors" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("actors")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="director">Director</label><br/>
            <input type="text" name="director" value="" id="director" placeholder="Director" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("director")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="creator">Creator</label><br/>
            <input type="text" name="creator" value="" id="creator" placeholder="Creator" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("creator")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="audio">Audio</label><br/>
            <input type="text" name="audio" value="" id="audio" placeholder="Audio" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("audio")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="subtitles">Subtitles</label><br/>
            <input type="text" name="subtitles" value="" id="subtitles" placeholder="Subtitles" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("subtitles")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="numberofseasons">Number of Seasons</label><br/>
            <input type="text" name="numberofseasons" value="" id="numberofseasons" placeholder="Number of Seasons" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("numberofseasons")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="seasonstartdate">Season Start Date</label><br/>
            <input type="text" name="seasonstartdate" value="" id="seasonstartdate" placeholder="Season Start Date" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("seasonstartdate")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <input type="submit" name="validate" value="Post movie" class="submitButton">
    </form>
</div>
@endsection
