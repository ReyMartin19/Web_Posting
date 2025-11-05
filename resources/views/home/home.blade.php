@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 p-2">
        @foreach ($posts as $post)
            <div class="rounded-lg m-2 p-4 bg-gray-500/50">
                <a href="/post/{{ $post->id }}">
                    <p class="text-white">{{ $post->title }}</p>
                    @foreach ($post->tags as $tag)
                        <span class="text-gray-300 text-sm italic">{{ $tag->name }}</span>
                    @endforeach
                    <p class="text-sm  text-blue-400 mt-2">--{{ $post->user->name }}</p>
                </a>
            </div>
        @endforeach
    </div>  
@endsection