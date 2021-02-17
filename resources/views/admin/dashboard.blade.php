<x-dashboard-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('dashboard') }}
    </x-slot>

    <div class="dashboard-details">
        <a href="{{ route('admin-post.index') }}" class="detail-card posts-card">
            <span class="value">23</span> 
            <span class="name">Posts</span>
        </a>
        @can('see-users')
            <a href="{{ route('admin-categories.index') }}" class="detail-card categories-card">
                <span class="value">14</span> 
                <span class="name">Categories</span>
            </a>
            <a href="{{ route('admin-users.index') }}" class="detail-card users-card">
                <span class="value">100</span>
                <span class="nmae">Users</span>
            </a>
            <a href="{{ route('admin-users.authors') }}" class="detail-card authors-card">
                <span class="value">10</span>
                <span class="name">Authors</span>
            </a>
        @else 
            <div href="{{ route('admin-categories.index') }}" class="detail-card categories-card">
                <span class="value">14</span> 
                <span class="name">Categories</span>
            </div>
            <div href="{{ route('admin-users.index') }}" class="detail-card users-card">
                <span class="value">100</span>
                <span class="nmae">Users</span>
            </div>
            <div href="{{ route('admin-users.authors') }}" class="detail-card authors-card">
                <span class="value">10</span>
                <span class="name">Authors</span>
            </div>
        @endcan
    </div>
</x-dashboard-layout>
