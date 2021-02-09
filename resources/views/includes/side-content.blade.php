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
            <li class="item">
                <div>
                    1
                </div>
                <div>
                    Post title
                </div>
                <div>
                    200 views
                </div>
            </li>
            <li class="item">
                <div>
                    2
                </div>
                <div>
                    Post title 2
                </div>
                <div>
                    100 views
                </div>
            </li>
            <li class="item">
                <div>
                    3
                </div>
                <div>
                    Post title 3
                </div>
                <div>
                    50 views
                </div>
            </li>
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