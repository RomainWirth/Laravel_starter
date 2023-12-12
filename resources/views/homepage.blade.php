@extends('layouts.app')

@section('content')
<div class="blockpage">
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <h1>{!! $name !!}</h1>
    <div>
        <p>Home page</p>
        <p>Current UNIX Timestamp is {{ time() }}</p>
    </div>
</div>
@endsection
