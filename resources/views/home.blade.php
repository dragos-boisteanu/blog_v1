<x-app-layout>
    
        
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('home') }}
    </x-slot>

    <div class="posts">
        <div class="posts">
            <x-post-list :posts="$posts"></x-post-list>
        </div>
    </div>

</x-app-layout>