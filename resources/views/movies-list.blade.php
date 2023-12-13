@extends('layouts.app')

@section('content')
<div class="blockpage">
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <h1>Liste des films</h1>
    {{--@json($movies);--}}
    <div class="moviesList">
        @foreach($movies as $movie)
            <a href="{{ route('currentMovie', $movie->id) }}" class="movie">
                <div>
                    <h2 class="bold">{{ $movie->name }}</h2>
                    <img src="{{ $movie->poster }}" alt="">
                    <p><span class="bold">Synopsis :</span> {{ $movie->description }}</p>
                    <p><span class="bold">Actors :</span> {{ $movie->actors }}</p>
                    <p><span class="bold">Director :</span> {{ $movie->director }}</p>
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
