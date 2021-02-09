<x-app-layout>
    <x-slot name="title">
       Category: {{ $category->name }}
    </x-slot>

    <div class="posts">
        <x-post-list :posts="$posts"></x-post-list>
    </div>

</x-app-layout>