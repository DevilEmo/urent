<nav class="navbar navbar-expand-md navbar-dark shadow-sm sticky-top" style="background-color:darkcyan;border-bottom: 3px solid darkcyan;font-size:18px;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav ml-auto">
                
                    <li class="nav-item {{ Request::is('posts') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ url('posts' )}}">Home</a>
                    </li>
                    
                @guest
                    <li class="nav-item {{ Request::is('posts/create') ? 'active' : ''}}">
                        <a class="nav-link" href="/posts/create">Create</a>
                    </li>
                    <li class="nav-item {{ Request::is('login') ? 'active' : ''}}">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item {{ Request::is('register') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    
                @if (Auth::user()->usertype === 'landlord')
                    <li class="nav-item {{ Request::is('posts/create') ? 'active' : ''}}">
                        <a class="nav-link" href="/posts/create">Create</a>
                    </li>
                    <li class="nav-item {{ Request::is('landlord') ? 'active' : ''}}">
                        <a class="nav-link" href="/landlord">MyPost</a>
                    </li>
                @elseif (Auth::user()->usertype === 'admin')
                    <li class="nav-item {{ Request::is('admin/posts') ? 'active' : ''}}">
                        <a class="nav-link" href="/admin/posts">Posts</a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/users') ? 'active' : ''}}">
                        <a class="nav-link"  href="/admin/users">Users</a>
                    </li>
                @endif
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/setting/{{Auth::user()->id}}" class="dropdown-item">Account Settings</a>
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
        </div>
    </div>
</nav>
