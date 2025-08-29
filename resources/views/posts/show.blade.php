@extends('layouts.app')
@section('content')
<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
        </div>
    </header>


    <div class="p-4 bg-white shadow rounded">
        <p>{{ $post->body }}</p>
        <span class="text-sm text-gray-400">
            By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}
        </span>
    </div>
</div>