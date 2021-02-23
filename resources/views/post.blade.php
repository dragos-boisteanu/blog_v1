@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('post', $post) }}
@endsection

@section('content')

    <x-post-header :post="$post" :zoom="false" class="post__header--not-link"></x-post-header>

    <div class="reading-list-action"> 
        @if ($post->isReadLater)
            <form method="POST" action="{{ route('client-read-later.delete') }}">
                @csrf
                @method('DELETE')

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <button type="submit" class="btn btn-read-later">Remove from read later</button>
            </form>
        @else
    
            <form method="POST" action="{{ route('client-read-later.store') }}">
                @csrf

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <button type="submit" class="btn btn-read-later">Read later</button>
            </form>

        @endif
    </div>
    
    <div class="post__content">
        {!! $post->content !!}
    </div>

@endsection
