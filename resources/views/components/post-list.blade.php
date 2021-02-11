<ul class="posts-list">
    @forEach($posts as $post)
        <li class="post">
            <a href="{{ route('post.show', ['category'=>$post->category->name, 'slug'=>$post->slug])}}">
                <x-post-header :post="$post"></x-post-header>
            </a>                   
            <div class="preview">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non consectetur velit. Maecenas ut molestie diam. Nullam in libero aliquam, facilisis ante in, fermentum lorem. Cras eget faucibus eros. Suspendisse vel consectetur dui. Etiam at nisl luctus, suscipit libero vitae, viverra ligula. Phasellus vitae imperdiet ante, finibus faucibus arcu.    
            </div>
        </li>
    @endforEach
</ul>
{{$posts->links()}}