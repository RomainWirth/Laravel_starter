@extends('layouts.app')

@section('content')
<div class="blockpage">
    <h1><span class="bold">Fiche du film :</span> {{ $movie->name }}</h1>
    <div class="movieDetails">
        <div class="image">
            <img src="{{ $movie->poster }}" alt="poster du film {{ $movie->name }}">
        </div>
        <div class="content">
            <p><span class="bold">Synopsis :</span> {{ $movie->description }}</p>
            <p><span class="bold">Actors :</span> {{ $movie->actors }}</p>
            @if( $movie->director )
                <p><span class="bold">Director :</span> {{ $movie->director }}</p>
            @endif
            <p><span class="bold">Released on :</span> {{ $movie->releaseddate }}</p>
            <p><span class="bold">Rating :</span> {{ $movie->contentrating }}</p>
            <p><span class="bold">Type :</span> {{ $movie->contenttype }}</p>
            @if($movie->contenttype == 'TVSeries')
                <p><span class="bold">Number of Seasons :</span> {{ $movie->numberofseasons }}</p>
                <p><span class="bold">Season starting date :</span> {{ $movie->seasonstartdate }}</p>
            @endif
            <p><span class="bold">Genre :</span> {{ $movie->genre }}</p>
        </div>
    </div>
</div>
@endsection
