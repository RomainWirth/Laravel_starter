@extends('layouts.app')

@section('content')
<div class="blockPage">
    <div class="heading">
        <h1 class="title"><span class="bold">Movie details for :</span> {{ $movie->name }}</h1>
        {{--{{ dump($movie->name) }}--}}
        <a id="currentMovie" href="{{ route('moviesList') }}" title="current movie">
            <p class="mainButton">Back</p>
        </a>
    </div>
    <div class="movieDetails">
        <div class="image">
            <img src="{{ $movie->poster }}" alt="poster du film {{ $movie->name }}">
        </div>
        <div class="movieContent">
            <p><span class="bold">Synopsis :</span> {{ $movie->description }}</p>
            @if( $movie->actors )
                <p class="bold">Actors :</p>
                @foreach($movie->actors as $actors)
                    <span>{{ $actors->name }},</span>
                @endforeach
            @endif
            @if( $movie->director )
                <p><span class="bold">Director :</span> {{ $movie->director }}</p>
            @endif
            @if( $movie->creator )
                <p><span class="bold">Creator :</span> {{ $movie->creator }}</p>
            @endif
            <p><span class="bold">Released on :</span> {{ $movie->releaseddate }}</p>
            <p><span class="bold">Rating :</span> {{ $movie->contentrating }}</p>
            <p><span class="bold">Type :</span> {{ $movie->contenttype }}</p>
            @if($movie->contenttype == 'TVSeries')
                <p><span class="bold">Number of Seasons :</span> {{ $movie->numberofseasons }}</p>
                <p><span class="bold">Season starting date :</span> {{ $movie->seasonstartdate }}</p>
            @endif
            <p><span class="bold">Genre :</span> {{ $movie->genre->name }}</p>
        </div>
    </div>
    <div class="heading">
        <a id="editMovie" href="{{ route('editMovie', $movie->id) }}" title="Edit movie">
            <p class="mainButton">Update details</p>
        </a>
        <form method="POST" action="{{ route('deleteMovie', $movie->id) }}">
            @csrf
            @method("DELETE")
            <input type="submit" value="x Supprimer" class="mainButton">
        </form>
    </div>
</div>
@endsection
