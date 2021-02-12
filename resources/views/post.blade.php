<x-app-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('post', $post) }}
    </x-slot>

    <x-post-header :post="$post" class="post__header--not-link"></x-post-header>

    <div class="post__content">
        {!! nl2br(e($post->content )) !!}
    </div>

</x-app-layout>