@extends('layouts.app')

@section('content')
<div class="blockPage">
    {{--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>--}}

    <div class="profileContent">
        <div class="contentTop">
            <p class="p-6 text-gray-900 dark:text-gray-100">{{ __("You're logged in!") }}</p>
            <a href="{{ route('profile.edit') }}">
                {{ __('Profile') }}
            </a>
        </div>
        <div class="contentBottom">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>
    </div>
</div>
@endsection
