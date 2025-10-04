<x-layout>
    <x-slot:heading>
        Create a new post
    </x-slot:heading>

    <form method="POST" action="/post/store">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <p class="mt-1 text-sm/6 text-gray-400">Input the new text to update</p>
                <x-form-field>
                    <x-form-label for="title">Title</x-form-label>
                    <x-form-input 
                        id="title" 
                        type="text" 
                        name="title" 
                        placeholder="I was once a good boy">
                    </x-form-input>
                    <x-form-error name="title" />
                </x-form-field>

                <x-form-field>
                    <x-form-label for="tags">Tags</x-form-label>
                    <select name="tags[]" id="tags" multiple class="text-black">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </x-form-field>                

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-button href="/post" class="text-sm/6 font-semibold">Cancel</x-button>
                    
                    <x-form-button
                            type="submit"
                            >Save
                    </x-form-button>
                </div>
            </div>
        </div>
    </form>
</x-layout>