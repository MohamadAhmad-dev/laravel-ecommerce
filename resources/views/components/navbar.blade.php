    <nav>
        <div>
            <img src="{{asset('assets/images/Shopping-cart.png')}}">
        </div>

        <div id="linkForm">
            <div>
                <a href="{{route('home')}}">Home</a>
                @guest
                    <a href="{{route('login')}}">Login</a>
                    <a href="{{route('register')}}">Signup</a>
                @endguest

                @auth
                    @if (Auth::user()->role === 'admin')
                        <a href="{{route('admin.home')}}">Admin</a>
                    @endif
                @endauth
            </div>

            <div>
                 @auth

                    <form method="POST" action="{{route('logout')}}">
                        <button>Logout</button>
                    </form>

                @endauth
            </div>
    
            
           
        </div>

        
    </nav>
