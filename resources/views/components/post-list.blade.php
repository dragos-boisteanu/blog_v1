<ul class="posts-list">
    @forEach($posts as $post)
        <li class="post" id="{{ $post->id }}">
            <a href="{{ route('post.show', ['category'=>$post->category->name, 'slug'=>$post->slug])}}">
                <x-post-header :post="$post"></x-post-header>
            </a>                   
            <div class="preview">
               {{ $post->preview }}
            </div>
            @if ($post->isReadLater)
                <div>
                    <form method="POST" action="{{ route('client-read-later.delete') }}">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit">Remove from read later</button>
                    </form>
                </div>
            @else
                <div>
                    <form method="POST" action="{{ route('client-read-later.store') }}">
                        @csrf

                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit">Read later</button>
                    </form>
                </div>
            @endif
            
           
        </li>
    @endforEach
</ul>
{{$posts->links()}}