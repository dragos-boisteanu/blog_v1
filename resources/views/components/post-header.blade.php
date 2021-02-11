@props(['post'])

<div {{ $attributes->merge(['class' => 'post___header']) }}>
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
            <div class="title">
                {{ $post->title }}
            </div>
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
        @if( $post->viewsCount() == 1) 
            view
        @else 
            views 
        @endif
    </div>
</div>