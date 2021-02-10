<header>
    <div class="logo">
        <a href="{{ route('home')}}"><img src="{{asset('storage/logo.png')}}"/></a>
    </div>
    @auth
        <div class="user-area">
            <div id="header-dropdown" class="header__dropdown">
                <div class="dropdown__header">
                    <div class="text">
                        username
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
                            <a href="/">Account</a>
                        </li>
                        <li>
                            <a href="/">Dashboard</a>
                        </li>
                        <li>
                            <a href="/">Read later</a>
                        </li>
                        <li>
                            <a href="/">Logout</a>
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

{{-- <script>
    let displayDropdownContent = false;

    const headerDropdown = document.querySelector('.header__dropdown');
    const dropdownContent = document.querySelector('.dropdown__content');

    headerDropdown.addEventListener('click', function() {
        if(!displayDropdownContent) {
            dropdownContent.style.display = "block"
            displayDropdownContent = true;
        }else {
            dropdownContent.style.display = "none"
            displayDropdownContent = false;
        }
    });

    window.onclick = function(event) {
        if (event.target.id != 'header-dropdown' && !headerDropdown.contains(event.target)) {
            if(displayDropdownContent) {
                dropdownContent.style.display = "none";
                displayDropdownContent = false;
            }            
        }
    }
</script> --}}