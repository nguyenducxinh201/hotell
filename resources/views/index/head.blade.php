<header>
        <div class="container">
            <div class="logo">
                <img src="{{Asset('image/index/logo.png')}}">
            </div>
            <div class="logo support">
                <p>Hổ trợ khách hàng <br>
                0905 443 136</p>
            </div>
            <div class="login">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <a href="{{ url('/user/login') }}">Login</a>
                            <a href="{{ url('user/register') }}">Register</a>
                        @else
                            @if(Auth::user()->role==1)
                                    {{ Auth::user()->name }}<span class="caret"></span>
                                        <form id="logout-form" action="{{ url('user/logout') }}" method="POST" >
                                            {{ csrf_field() }}
                                            <input type="submit" name="" value="Log out">
                                        </form>
                            @endif
                        @endif
            </div>
        </div>
    </header>