<x-layout>
    <x-slot:heading>
        <p >This post is made by {{ $post->user->name }}</p>
    </x-slot:heading>

    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
    <x-button href="/post/{{ $post->id }}/edit" class="m-2">
        Edit
    </x-button>

    <form method="POST" action="/post/{{ $post->id }}" class="inline">
        @method('DELETE')
        @csrf
        <x-form-button type="submit" class="m-2 bg-red-600 hover:bg-red-700">
            Delete
        </x-form-button>
    </form>
</x-layout>