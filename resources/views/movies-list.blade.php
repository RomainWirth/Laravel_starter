@extends('layouts.app')

@section('content')
<div class="blockpage">
    <h1 class="title">Liste des films</h1>
    <div class="moviesList overflow-auto">
        @foreach($movies as $movie)
            <a href="{{ route('currentMovie', $movie->id) }}" class="movie">
                <div>
                    <h2 class="bold">{{ $movie->name }}</h2>
                    <img src="{{ $movie->poster }}" alt="">
                    <p><span class="bold">Synopsis :</span> {{ $movie->description }}</p>
                    @if( $movie->actors)
                        <p><span class="bold">Actors :</span> {{ $movie->actors }}</p>
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
                    <p><span class="bold">Genre :</span> {{ $movie->genre }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
