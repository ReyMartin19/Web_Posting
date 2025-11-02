@extends('layouts.layout')
@section('content')
    
    <form method="POST" action="/post/{{ $post->id }}">
        @method('PUT')
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
                        value="{{ $post->title }}" 
                    />
                    <x-form-error name="title" />
                </x-form-field>
    
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-button href="/post" class="text-sm/6 font-semibold">Cancel</x-button>
                    <x-form-button type="submit">Save</x-form-button>
                </div>
            </div>
        </div>
    </form>
    
@endsection