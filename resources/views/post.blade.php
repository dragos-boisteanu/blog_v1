<x-app-layout>
    <x-slot name="breadcrumb">
        {{ Breadcrumbs::render('post', $post) }}
    </x-slot>

    <div class="post___header post__header--not-link">
        <svg class='hideSvgSoThatItSupportsFirefox'>
            <filter id='sharpBlur'>
              <feGaussianBlur stdDeviation='3'></feGaussianBlur>
              <feColorMatrix type='matrix' values='1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 9 0'></feColorMatrix>
              <feComposite in2='SourceGraphic' operator='in'></feComposite>
            </filter>
          </svg>
        <div class="image" style="background-image: url({{ $post->image_url }})"></div>
        <div class="details-container">
            <div class="details">
                <h1 class="title">
                    {{ $post->title }}
                </h1>
                <div class="author">
                    Author name
                </div>
                <div class="date">
                    {{$post->created_at }}
                </div>
            </div>
        </div>
        <div class="category-name ">
            {{ $post->category->name}}
        </div>
        <div class="views-counter">
            {{ $post->viewsCount() }} 
            @if( $post->viewsCount() >= 0) 
                view
            @else 
                views 
            @endif
        </div>
    </div>
    <div class="post__content">
        {!! nl2br(e($post->content )) !!}
    </div>

</x-app-layout>