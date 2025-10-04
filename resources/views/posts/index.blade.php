<x-layout>
    <x-slot:heading>
        My posts
    </x-slot:heading>

    <div class="grid grid-cols-4">
        @foreach ($posts as $post)
            <div class="rounded-lg m-2 p-4 bg-gray-500/50">
                <a href="/post/{{ $post->id }}">
                    <p class="text-white mb-2">{{ $post->title }}</p>
                    @foreach ($post->tags as $tag)
                        <span class="bg-gray-600 px-2 py-1 rounded">{{ $tag->name }}</span>
                    @endforeach
                    <p class="text-sm italic text-gray-300">{{ $post->user->name }}</p>
                </a>
            </div>
        @endforeach
    </div>  
</x-layout>