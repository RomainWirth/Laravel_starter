@extends('layouts.app')

@section('content')
<div class="blockpage">
    <h1 class="title">New entry</h1>
    <div>
        <p>
            <label for="title">Title</label><br/>
            <input type="text" name="title" value="" id="title" placeholder="Title of the movie">

            @error("title")
                <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="poster" >Poster</label><br/>
            <input type="url" name="poster" id="poster" >

            <!-- Le message d'erreur pour "picture" -->
            @error("poster")
                <span>{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="description">Synopsis</label><br/>
            <input type="text" name="description" id="description" lang="en" placeholder="Synopsis of the movie">

            <!-- Le message d'erreur pour "content" -->
            @error("description")
                <span>{{ $message }}</span>
            @enderror
        </p>
        <input type="submit" name="validate" value="Post movie">
    </div>
</div>
@endsection
