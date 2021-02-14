<nav class="dashboard-side-nav">
    <div class="nav__header">
        <div class="logo">
            <a href="{{ route('home')}}"><img src="{{asset('storage/logo.png')}}"/></a>
        </div>
        <div class="user">
            <a href="{{ route('client-user.edit') }}">
                <div>
                {{ Auth::user()->name }}
                </div>
                <div class="posts-count">
                    545
                </div>
            </a>
        </div>
    </div>
    <ul class="nav__list">
        <li class="nav__item">
            <a class="item__header" href="{{route('dashboard.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
                <div>
                    Dashboard
                </div>
            </a>
        </li>
        <li id="posts" class="nav__item">
            <div class="item__header">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                </svg>
                <div>
                    Posts
                </div>
            </div>
            <ul id="posts-submenu" class="nav__item-submenu">
                <li class="submenu__item">
                    <a href="{{route('admin-post.index')}}">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/>
                        </svg>
                        <div>
                            List
                        </div>
                        
                    </a>
                </li>
                <li class="submenu__item">
                    <a href="{{route('admin-post.create')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
                        </svg>
                        <div>
                            Create
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav__item">
            <div class="item__header">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 5v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.11 0-2 .9-2 2zm12 4c0 1.66-1.34 3-3 3s-3-1.34-3-3 1.34-3 3-3 3 1.34 3 3zm-9 8c0-2 4-3.1 6-3.1s6 1.1 6 3.1v1H6v-1z"/>
                </svg>
                <div>
                    Users
                </div>
            </div>
            <ul id="users-submenu" class="nav__item-submenu">
                <li class="submenu__item">
                    <a href="{{route('admin-user.index')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/>
                        </svg>
                        <div>
                            List
                        </div>
                    </a>
                </li>
                <li class="submenu__item">
                    <a href="{{route('admin-user.create')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="18px" height="18px">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
                        </svg>
                        <div>
                            Create
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav__item">
            <a class="item__header" href="{{route('admin-category.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                    <g>
                        <rect fill="none" height="24" width="24"/>
                        <path d="M20,6h-8l-2-2H4C2.9,4,2.01,4.9,2.01,6L2,18c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V8C22,6.9,21.1,6,20,6z M14,16H6v-2h8V16z M18,12H6v-2h12V12z"/>
                    </g>
                </svg>
                <div>
                    Categories
                </div>
            </a>
        </li>
    </ul>
</nav>