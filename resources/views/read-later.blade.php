@extends('layouts.app')


@section('breadcrumbs')
    {{ Breadcrumbs::render('read-later') }}
@endsection


@section('content')
    <div class="posts">
        <x-post-list :posts="$posts"></x-post-list>
    </div>
@endsection


@push('scripts')

@endpush