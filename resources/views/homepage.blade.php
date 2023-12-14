@extends('layouts.app')

@section('content')
<div class="blockpage">
    <div class="mainPage">
        <h1 id="mainTitle">Welcome</h1>
        <a href="{{ route('moviesList') }}">
            <p class="mainButton" id="homePageButton">ENTER</p>
        </a>
    </div>
</div>
@endsection
