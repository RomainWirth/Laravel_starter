@extends('layouts.app')

@section('content')
<div class="blockpage">
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <h1>Liste des films</h1>
    {{--@json($movies);--}}
    <div class="moviesList">
        @foreach($movies as $item)
            <a href="" class="movie">
                <div>
                    <h2 class="bold">{{ $item->name }}</h2>
                    <img src="{{ $item->poster }}" alt="">
                    <p><span class="bold">Synopsis :</span> {{ $item->description }}</p>
                    <p><span class="bold">Actors :</span> {{ $item->actors }}</p>
                    <p><span class="bold">Director :</span> {{ $item->director }}</p>
                    <p><span class="bold">Released on :</span> {{ $item->releaseddate }}</p>
                    <p><span class="bold">Rating :</span> {{ $item->contentrating }}</p>
                    <p><span class="bold">Type :</span> {{ $item->contenttype }}</p>
                    <p><span class="bold">Genre :</span> {{ $item->genre }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
