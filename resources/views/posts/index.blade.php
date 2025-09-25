<x-layout>
    <x-slot:heading>
        My posts
    </x-slot:heading>

    <div class="grid grid-cols-4">
        @foreach ($posts as $post) 
            <div class="rounded-lg m-2 p-4 bg-gray-500/50">
                <p class="text-white mb-2">{{ $post->title }}</p>
                <p class="text-sm italic text-gray-300">{{ $post->user->name }}</p>
            </div>
        @endforeach
    </div>
</x-layout>