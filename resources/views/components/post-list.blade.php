<ul class="posts-list">
    @forEach($posts as $post)
        <li class="post">
            <a href="{{ route('post.show', ['category'=>$post->category->name, 'slug'=>$post->slug])}}">
                <x-post-header :post="$post"></x-post-header>
            </a>                   
            <div class="preview">
               {{ $post->preview }}
            </div>
        </li>
    @endforEach
</ul>
{{$posts->links()}}