<x-app-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('post', $post) }}
    </x-slot>

    <div>
        {{ $post->content }}
    </div>
    

</x-app-layout>