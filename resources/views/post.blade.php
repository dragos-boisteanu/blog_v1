@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('post', $post) }}
@endsection

@section('content')

    <x-post-header :post="$post" class="post__header--not-link"></x-post-header>

    <div class="post__content">
        {!! nl2br(e($post->content )) !!}
    </div>

@endsection
