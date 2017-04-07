<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('fmroorders') }}">Order List</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('fmroorders') }}">View All Orders</a></li>
        <li><a href="{{ URL::to('fmroorders/create') }}">Create a Order</a>
        <li><a href="{{ URL::to('fmroorderresults') }}">View All Results</a></li>
        <li><a href="{{ URL::to('getfmclosedorders') }}">Get all closed orders</a></li>
    </ul>
    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
        <!-- li><a href=" {url('/register') }}">Register</a></li -->
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>

</nav>
