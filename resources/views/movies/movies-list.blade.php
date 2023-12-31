@extends('layouts.app')

@section('content')
<div class="blockPage">
    <h1 class="title">All movies</h1>
    <div class="moviesList overflow-auto">
        @foreach($movies as $movie)
            <a href="{{ route('currentMovie', $movie->id) }}" class="movie">
                <div>
                    <h2 class="bold">{{ $movie->name }}</h2>
                    <img src="{{ $movie->poster }}" alt="poster du film {{ $movie->name }}">
                    <p><span class="bold">Synopsis :</span> {{ $movie->description }}</p>
                    @if( $movie->actors)
                        <p class="bold">
                            Actors :
                        </p>
                        @foreach($movie->actors as $actor)
                            <span>{{ $actor->name }}</span>
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
                    <p><span class="bold">Genre :</span> {{ $movie->genre->name }}</p>
                </div>
            </a>
            {{--<form method="POST" action="{{ route('movies.destroy', $post) }}">
                @csrf
                @method("DELETE")
                <input type="submit" value="x Supprimer">
            </form>--}}
        @endforeach
    </div>
</div>
@endsection
