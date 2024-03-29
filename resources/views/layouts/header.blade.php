<header class="mb-5">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="{{route('index')}}">Kvarturu y Nazara</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{Request::is('*offer*')?'active':''}}">
                    <a class="nav-link" href="{{route('offers')}}">Offer</a>
                </li>

                <li class="nav-item  {{Request::is('*article*')?'active':''}}">
                    <a class="nav-link " href="{{route('article')}}">Article</a>
                </li>
                @guest
                    <li class="nav-item {{Request::is('*login*')?'active':''}}">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item {{Request::is('*register*')?'active':''}}">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item {{Request::is('*viewUser*')?'active':''}} " >
                        <a class="nav-link" href="{{route('personal')}}">Kabinet</a>
                    </li>
                    @if(Auth::user() && Auth::user()->role == 'ADMIN')
                        <li class="nav-item{{Request::is('*admin/offers*')?'active':''}}">
                            <a class="nav-link" href="{{route('admin-offers')}}">Admin Panel</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            <form method="get" action="{{route ('offers-search')}}" class="form-inline mt-2 mt-md-0">
                <input name="search" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>
