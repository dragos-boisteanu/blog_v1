<header>
    <div class="logo">
        <a href="{{ route('home')}}"><img src="{{asset('storage/logo.png')}}"/></a>
    </div>
    @auth
        <div class="user-area">
            <div id="header-dropdown" class="header__dropdown">
                <div class="dropdown__header">
                    <div class="text">
                        {{ Auth::user()->name}}
                    </div>
                    <div class="arrows">
                        <svg xmlns="http://www.w3.org/2000/svg" class="arrow-down" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                            <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="arrow-up" viewBox="0 0 24 24" fill="black" width="18px" height="18px">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z"/>
                        </svg>
                    </div>
                </div>
                <div class="dropdown__content">
                    <ul class="list">
                        <li>
                            <a href="{{ route('client-user.edit')}}">Account</a>
                        </li>
                        @if(Auth::user()->role_id != 3)
                            <li>
                                <a href="{{ route('dashboard.index')}}">Dashboard</a>
                            </li>
                        @endif
                        <li>
                            <a href="/read-later">Read later</a>
                        </li>
                        <li>
                            <a id="logout" href="/">Logout</a>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endauth

    @guest
        <div class="guest-area">
            <a href="{{ route('login') }}">
                Login / Register
            </a>
        </div>
    @endguest
   
</header>


@push('scripts')
    <script>

        const logout = document.getElementById('logout');
        const logoutForm = document.getElementById('logout-form');

        if(logout) {
            logout.addEventListener('click', (e) => {
                e.preventDefault();
                logoutForm.submit();
            })
        }
        
    </script>
@endpush
