<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm main-nav">
            <div class="container">
                <a class="navbar-brand text-primary font-weight-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mx-auto items-center">
                         <li class="nav-item dropdown">
                            <a href="/" class="nav-link">Home</a>
                         </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="dropdown-shop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-shop">
                                <a class="dropdown-item" href="/shop">Shop Categoty</a>
                                <a class="dropdown-item" href="#">Product Detail</a>
                                <a class="dropdown-item" href="#">Confirmation</a>
                            </div>
                         </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="dropdown-blog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-blog">
                                <a class="dropdown-item" href="#">Blog</a>
                                <a class="dropdown-item" href="#">Blog Detail</a>
                            </div>
                         </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="dropdown-pages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-pages">
                                    <!-- Authentication Links -->
                                @guest
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                @else
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                @endguest
                            </div>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link">Contact</a>
                         </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                       <li class="nav-item">
                           <a href="#" class="nav-link p-0">
                               <img src="./ico/shopping-cart.svg" alt="" width="22px">
                               <span class="badge badge-pill badge-primary">4</span>
                               @if(Auth::check())
                               <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle p-0 pl-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form1').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form1" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @if(Auth::user()->is_admin == 1)
                                    <a href="/admin" class="dropdown-item">Admin</a>
                                    @endif
                                </div>           
                               </li>
                               @endif
                           </a>                         
                       </li>
                    </ul>
                </div>
            </div>
        </nav>