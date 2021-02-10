<x-app-layout>
    
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('search') }}
    </x-slot>
    
    @if(isset($searchData) && !empty($searchData)) 
        <h2>
            Search results: {{ $searchData }}
        </h2>
    @endif
    

    @if(isset($posts) && !empty($posts))
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


   

</x-app-layout>