<div class="view__side">
    <div class="search-container">
        <form class="search-form" method="GET">
            <input name="search" type="text" placeholder="Search..."/>
            <button type="submit" class="btn">Search</button>
        </form>
    </div>
    <div class="most-viewed">
        <h5>Most viewed posts</h5>
        <ul class="list">
            @foreach($mostViewedPosts as $mostViewedPost)
                <li class="item">
                    <div class="title">
                       <a href="{{ route('post.show', ['category'=>$mostViewedPost->category->name, 'slug'=>$mostViewedPost->slug]) }}">
                        {{ $loop->index+1 . ' . ' . $mostViewedPost->title }}</a> 
                    </div>
                    <div class="count">
                       {{ $mostViewedPost->viewsCount() }}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="categories">
        <h5>Categories</h5>
        <ul class="list">
            @foreach($categories as $category)
                <li class="item">
                    <a href="/">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>