@extends('layouts.app')


@section('breadcrumbs')
    {{ Breadcrumbs::render('search') }}
@endsection


@section('content')
    @if(isset($searchData) && !empty($searchData)) 
        <h2>
            Search results: {{ $searchData }}
        </h2>
    @endif
    
    @if( isset($posts) && $posts->items() !== null && !empty($posts->items()))
        <div class="posts">
            <div class="posts">
                <x-post-list :posts="$posts"></x-post-list>
            </div>
        </div>
    @else
        <div>
            No posts fond !
        </div>
    @endif

@endsection