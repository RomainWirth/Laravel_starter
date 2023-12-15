@extends('layouts.app')

@section('content')
<div class="blockPage">

    @if (isset($movie))
    <div class="heading">
        <h1 class="title">Update movie</h1>
        <a id="currentMovie" href="{{ route('currentMovie', $movie->id) }}" title="current movie">
            <p class="mainButton">Back</p>
        </a>
    </div>
    <form method="POST" action="{{ route('updateMovie', $movie->id) }}" enctype="multipart/form-data" class="formulaire overflow-scroll">
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
            <label for="name" class="bold">Title</label><br/>
            <input type="text" name="name" value="{{ isset($movie->name) ? $movie->name : old('name') }}" id="name" placeholder="Title of the movie" class="inputText">

            @error("title")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="poster" class="bold">Poster</label><br/>
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
            <label for="contenttype" class="bold">Content Type</label><br/>
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
            <label for="description"  class="bold">Synopsis</label><br/>
            <input type="text" name="description" value="{{ isset($movie->description) ? $movie->description : old('Synopsis') }}" id="description" lang="en" placeholder="Synopsis of the movie" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("description")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="contentrating"  class="bold">Content Rating</label><br/>
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
            <label for="genre"  class="bold">Genre</label><br/>
            <select name="genre" id="genre">
                <option value="{{ isset($movie->genre_id) ? $movie->genre : old('genre') }}">--select option--</option>
                @foreach($genres as $key => $value)
                    <option value="{{ $key }}" {{ isset($movie) && $movie->genre_id == $key ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>

            <!-- Le message d'erreur pour "content" -->
            @error("genre")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="formatedduration"  class="bold">Duration</label><br/>
            <input type="text" name="formatedduration" value="{{ isset($movie->formatedduration) ? $movie->formatedduration : old('duration') }}" id="formatedduration" placeholder="Duration" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("formatedduration")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="releaseddate" class="bold">Released Date</label><br/>
            <input type="text" name="releaseddate" value="{{ isset($movie->releaseddate) ? $movie->releaseddate : old('released date') }}" id="releaseddate" placeholder="Released Date" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("releaseddate")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="actors" class="bold">Actors</label><br/>
            @if (isset($movie->actors))
                <input
                    type="text"
                    name="actors"
                    value="@foreach ($movie->actors as $actors) {{$actors->name}}, @endforeach"
                    id="actors"
                    placeholder="Actors"
                    class="inputText">
            @else
                <input
                    type="text"
                    name="actors"
                    id="actors"
                    placeholder="Actors"
                    class="inputText">
            @endif

            <!-- Le message d'erreur pour "content" -->
            @error("actors")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="director" class="bold">Director</label><br/>
            <input type="text" name="director" value="{{ isset($movie->director) ? $movie->director : old('director') }}" id="director" placeholder="Director" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("director")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="creator" class="bold">Creator</label><br/>
            <input type="text" name="creator" value="{{ isset($movie->creator) ? $movie->creator : old('creator') }}" id="creator" placeholder="Creator" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("creator")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="audio" class="bold">Audio</label><br/>
            <input type="text" name="audio" value="{{ isset($movie->audio) ? $movie->audio : old('audio') }}" id="audio" placeholder="Audio" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("audio")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="subtitles" class="bold">Subtitles</label><br/>
            <input type="text" name="subtitles" value="{{ isset($movie->subtitles) ? $movie->subtitles : old('subtitles') }}" id="subtitles" placeholder="Subtitles" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("subtitles")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="numberofseasons" class="bold">Number of Seasons</label><br/>
            <input type="text" name="numberofseasons" value="{{ isset($movie->numberofseasons) ? $movie->numberofseasons : old('number of seasons') }}" id="numberofseasons" placeholder="Number of Seasons" class="inputText">

            <!-- Le message d'erreur pour "content" -->
            @error("numberofseasons")
            <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="seasonstartdate" class="bold">Season Start Date</label><br/>
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
