<x-app-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('category', $category) }}
    </x-slot>

    <div class="posts">
        <x-post-list :posts="$posts"></x-post-list>
    </div>

</x-app-layout>