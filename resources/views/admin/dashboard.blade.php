@extends('layouts.dashboard')

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@section('content')
    <div class="dashboard-details">
        <a href="{{ route('admin-post.index') }}" class="detail-card detail-card__posts">
            <span class="value">{{ $postsCount }}</span> 
            <span class="name">Post{{ $postsCount > 1 || $postsCount == 0 ? 's' : ''}}</span>
        </a>
        @can('see-users')
            <a href="{{ route('admin-categories.index') }}" class="detail-card detail-card__categories">
                <span class="value">{{ $categoriesCount }}</span> 
                <span class="name">Categorie{{ $categoriesCount > 1 || $categoriesCount == 0 ? 's' : ''}}</span>
            </a>
            <a href="{{ route('admin-users.index') }}" class="detail-card detail-card__users">
                <span class="value">{{ $usersCount }}</span>
                <span class="nmae">User{{ $usersCount > 1 || $usersCount == 0 ? 's' : ''}}</span>
            </a>
            <a href="{{ route('admin-users.authors') }}" class="detail-card detail-card__authors">
                <span class="value">{{ $authorsCount }}</span>
                <span class="name">Author {{ $authorsCount > 1 || $authorsCount == 0 ? 's' : ''}}</span>
            </a>
            <a href="{{ route('admin-users.admins') }}" class="detail-card detail-card__administrators">
                <span class="value">{{ $adminsCount }}</span>
                <span class="name">Administrator {{ $adminsCount > 1 || $adminsCount == 0 ? 's' : ''}}</span>
            </a>
        @else 
            <div href="{{ route('admin-categories.index') }}" class="detail-card detail-card__categories">
                <span class="value">{{ $categoriesCount }}</span> 
                <span class="name">Categorie{{ $categoriesCount > 1 || $categoriesCount == 0 ? 's' : ''}}</span>
            </div>
            <div href="{{ route('admin-users.index') }}" class="detail-card detail-card__users">
                <span class="value">{{ $usersCount }}</span>
                <span class="nmae">User{{ $usersCount > 1 || $usersCount == 0 ? 's' : ''}}</span>
            </div>
            <div href="{{ route('admin-users.authors') }}" class="detail-card detail-card__authors">
                <span class="value">{{ $authorsCount }}</span>
                <span class="name">Author {{ $authorsCount > 1 || $authorsCount == 0 ? 's' : ''}}</span>
            </div>
            <div class="detail-card detail-card__administrators">
                <span class="value">{{ $adminsCount }}</span>
                <span class="name">Administrator{{ $adminsCount > 1 || $adminsCount == 0 ? 's' : ''}}</span>
            </div>
        @endcan
    </div>
@endsection
