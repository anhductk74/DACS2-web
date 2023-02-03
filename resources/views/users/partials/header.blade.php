    <div class="navbar">
        <div class="logo">
            <a href="{{ asset('/') }}"><img src="{{ asset('image/logo.png') }}" width="125px"></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="{{ asset('/') }}">Home</a></li>
                <li><a href="{{ asset('/products') }}">Products</a></li>
                <li><a href="{{ asset('/about') }}">About</a></li>
                <li><a href="{{ asset('/contact') }}">Contact</a></li>
                @if (Auth::user() == null)
                    <li><a href="{{ asset('/Account') }}">Account</a></li>
                @else
                    <li>{{ Auth::user()->name }}<a href="{{ route('logout') }}">(Logout)</a></li>
                @endif
            </ul>
        </nav>
        @if (Auth::user() != null)
            <a href="{{ asset('/cart') }}"><img src="{{ asset('image/cart.png') }}" width="30px" height="30px"></a>
        @endif
        <img src="{{ asset('image/menu.png') }}" class="menu-icon" onclick="menutoggle()">
    </div>
