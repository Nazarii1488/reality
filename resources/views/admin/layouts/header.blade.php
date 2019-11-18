<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{route('index')}}">Reality</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{Request::is('*admin/offers*')?'active':''}}">
                <a class="nav-link" href="{{route('admin-offers')}}">Offers</a>
            </li>
            <li class="nav-item {{Request::is('*admin/article*')?'active':''}}">
                <a class="nav-link" href="{{route('admin-article')}}">Article</a>
            </li>
        </ul>
        <div class="form-inline mt-2 mt-md-0">
            <span class="nav-link" style="color: white;">{{Auth::user()->name}}</span>
            <a style="color: white;"
               class="nav-link waves-effect"
               href="{{ route('logout') }}"
               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                Exit
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>
@section('javascript')
    @parent

@stop
