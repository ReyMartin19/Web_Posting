@extends('layouts.layout')
@section('title', 'My Posts')
@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 p-2">
    @foreach ($posts as $post)
        <div class="rounded-lg p-4 bg-gray-500/50 shadow-lg hover:shadow-xl transition duration-300 hover:bg-gray-500/70">
            <a href="/post/{{ $post->id }}" class="block">
                <h3 class="text-white font-semibold text-lg mb-2">{{ $post->title }}</h3>

                <div class="flex flex-wrap gap-1 mb-3">
                    @foreach ($post->tags as $tag)
                        <span class="text-gray-300 text-xs px-2 py-1 bg-gray-600/50 rounded-full">{{ $tag->name }}</span>
                    @endforeach
                </div>

                <p class="text-sm text-blue-400">— {{ $post->user->name }}</p>
            </a>
        </div>
    @endforeach
</div>
@endsection