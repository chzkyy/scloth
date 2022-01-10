<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="/">
            <span class="logo-text">
                SCloth
            </span>
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        @guest
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                            Category
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($category as $item)
                                <a class="dropdown-item" href="{{ route('catalogue' , [$item->id]) }}">
                                    {{ $item->category }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <!-- Mobile button -->
                <form class="form-inline d-sm-block d-md-none" action="{{ route('login') }}">
                    <button class="btn btn-login my-2 my-sm-0">
                        Login
                    </button>
                </form>
                <!-- Desktop Button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ route('login') }}">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                        Login
                    </button>
                </form>
            </div>
        @endguest

        @auth
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ $title === 'Catalogue' ? 'active' : '' }}" id="navbardrop" data-toggle="dropdown">
                            Category
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($category as $item)
                                <a class="dropdown-item" href="{{ route('catalogue' , [$item->id]) }}">
                                    {{ $item->category }}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-shopping-cart"></i>
                                Cart
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-history"></i>
                                Transaction History
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        @endauth

    </nav>
</div>
