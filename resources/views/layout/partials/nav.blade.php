<nav class="navbar sticky-top shadow-sm navbar-expand-lg navbar-light py-2">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid" src="{{asset('/images/logo.png')}}" alt="" width="100px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header01" aria-controls="header01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="header01">
            <ul class="navbar-nav ms-auto mt-3 mt-lg-0 mb-3 mb-lg-0 me-4">
                <li class="nav-item me-4"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item me-4"><a class="nav-link" href="#">Contact</a></li>
                @if (Cookie::get('token') == NULL)
                <li class="nav-item"><a class="nav-link" href="{{url('/userLogin')}}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="/userRegistration">Singup</a></li>
                @else
                <li class="nav-item me-4"><a class="nav-link" href="{{ url('/rentals') }}">Rentals</a></li>
                <div class="float-right h-auto d-flex">
                    <div class="user-dropdown">
                        <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                        <div class="user-dropdown-content ">
                            <a href="{{url('/userProfile')}}" class="side-bar-item">
                                <span class="side-bar-item-caption">Profile</span>
                            </a>
                            <a href="{{url("/logout")}}" class="side-bar-item">
                                <span class="side-bar-item-caption">Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif



            </ul>
        </div>

    </div>
</nav>
