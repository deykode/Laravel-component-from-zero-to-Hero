@extends('layouts.app')
@section('content')
    <div>
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold">Edit Post</h2>
            </div>
        </header>

        <form method="POST" action="{{ route('posts.update', $post) }}" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-semibold">Title</label>
                <input type="text" name="title" id="title" class="w-full border rounded p-2"
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body" class="block font-semibold">Body</label>
                <textarea name="body" id="body" rows="5"
                    class="w-full border rounded p-2">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Publish
            </button>
        </form>
    </div>
@endsection