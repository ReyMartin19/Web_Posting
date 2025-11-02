@extends('layouts.guest')
@section(section: 'content')

    <div class="flex gap-8 items-center">
        <div class="h-40 w-40">
            <img src="{{ asset('images/worlwide.png') }}" alt="">
        </div>
        <div class="flex flex-col gap-4">
            <div>
                <h1 class="text-4xl font-bold text-white mt-4">Welcome to GlobalConnect</h1>
                <p class="text-gray-400 mt-2">Connecting the world, one click at a time.</p>
            </div>
            <div>
                @guest
                    <a href="/login" class="mt-4 inline-block rounded-md bg-indigo-500 px-4 py-2 text-white hover:bg-indigo-400">Get Started</a>
                @endguest
            </div>
        </div>
    </div>
    
@endsection