<ul class="posts-list">
    @forEach($posts as $post)
        <li class="post">
            <a href="{{ route('post.show', ['category'=>$post->category->name, 'slug'=>$post->slug])}}">
                <div class="header">
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
                        @if( $post->viewsCount() >= 0) 
                            view
                        @else 
                            views 
                        @endif
                    </div>
                </div>
            </a>                   
            <div class="preview">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non consectetur velit. Maecenas ut molestie diam. Nullam in libero aliquam, facilisis ante in, fermentum lorem. Cras eget faucibus eros. Suspendisse vel consectetur dui. Etiam at nisl luctus, suscipit libero vitae, viverra ligula. Phasellus vitae imperdiet ante, finibus faucibus arcu.    
            </div>
        </li>
    @endforEach
</ul>
{{$posts->links()}}