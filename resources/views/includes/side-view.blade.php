<div class="view__side">
    <div class="search-container">
        <form class="search-form" method="GET">
            <input name="search" type="text" placeholder="Search..."/>
            <button type="submit" class="btn btn-search">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="24px" height="24px">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="most-viewed">
        <h5>Most viewed posts</h5>
        <ul class="list">
            @foreach($mostViewedPosts as $mostViewedPost)
                <li class="item">
                    <div class="title">
                       <a href="{{ route('post.show', ['category'=>$mostViewedPost->category->name, 'slug'=>$mostViewedPost->slug]) }}">
                        {{ $loop->index+1 . '. ' . $mostViewedPost->title }}</a> 
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
                    <a href="{{ route('category.show', ['category'=>$category->name])}}">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>