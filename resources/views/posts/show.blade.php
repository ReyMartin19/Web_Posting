<x-layout>
    <x-slot:heading>
        Post by {{ $post->user->name }}
    </x-slot:heading>

    <div class="w-full">
        <div class="flex gap-6">
            <div class="flex-1 p-6 border border-gray-700 rounded-lg">
                <h1 class="text-xl font-semibold text-white mb-4">{{ $post->title }}</h1>
                <div class="mb-4">
                    @foreach ($post->tags as $tag)
                        <p class="text-white">Tags: <span class="text-gray-500 rounded italic">{{ $tag->name }}</span></p>
                    @endforeach
                </div>
                @can('update', $post)
                    <x-button href="/post/{{ $post->id }}/edit" class="bg-gray-600">
                        Edit
                    </x-button>
                @endcan
                
                @can('delete', $post)
                    <form method="POST" action="/post/{{ $post->id }}" class="inline">
                        @method('DELETE')
                        @csrf
                        <x-form-button type="submit" class="m-2 bg-red-600 hover:bg-red-700">
                            Delete
                        </x-form-button>
                    </form>            
                @endcan
            </div>

            <div class="flex-1 bg-gray-800/50 p-6 border border-gray-700 rounded-lg overflow-y-auto">
                <h3 class="text-lg font-medium text-white mb-4">Add a Comment</h3>
                <form method="POST" action="/post/{{ $post->id }}/comment">
                    @csrf

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <x-form-field>
                        <x-form-input type="text" name="comment" placeholder="Your comment..." />
                    </x-form-field>

                    <div class="mt-4">
                        <x-form-button type="submit">Send</x-form-button>
                    </div>
                </form>

                <hR class="my-8 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-25 dark:via-neutral-400" />

                <div class="mt-8">
                    <h3 class="text-lg font-medium text-white mb-4">Comments</h3>
                
                    @forelse ($post->comments as $comment)
                        <div class="mb-4 p-3 rounded bg-gray-700/50">
                            <p class="text-gray-200">{{ $comment->comment }}</p>
                            <p class="text-sm text-gray-400 mt-1">
                                — {{ $comment->user->name ?? 'Anonymous' }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-400">No comments yet. Be the first!</p>
                    @endforelse
                </div>                
            </div>
        </div>
    </div>
</x-layout>