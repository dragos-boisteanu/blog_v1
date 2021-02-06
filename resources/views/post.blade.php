<x-app-layout>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>

    <div>
        {{ $post->content }}
    </div>
    

</x-app-layout>