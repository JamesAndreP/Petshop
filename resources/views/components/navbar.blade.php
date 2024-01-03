<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="/" class="navbar-brand ms-lg-5">
        <h1 class="m-0 text-uppercase text-dark"><i class="bi bi-shop fs-1 text-primary me-3"></i>Hello Pets</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="nav-item dropdown">
        {{-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a> --}}
        @if(session()->has('username'))
        <a href="#" data-bs-toggle="dropdown">
            <x-notification />
        </a>
        @endif
        
    </div>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="/" class="nav-item nav-link {{Request::path() === '/' ? 'active' : null}}">Home</a>
            {{-- <a href="#" class="nav-item nav-link">About</a> --}}
            {{-- <a href="#" class="nav-item nav-link">Service</a> --}}
            <a href="view-posts" class="nav-item nav-link {{Request::path() === 'view-posts' ? 'active' : null}}">Pets</a>
            <a href="view-products" class="nav-item nav-link {{Request::path() === 'view-products' ? 'active' : null}}">Products</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                @if(session()->has('username'))
                <a href="#" data-bs-toggle="dropdown">
                    <x-notification />
                </a>
                @endif
                
            </div> --}}
            {{-- <a href="contact.html" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Contact <i class="bi bi-arrow-right"></i></a> --}}
            @if(session()->has('username'))
                <form action="{{url('/logout')}}" method="post" style="display: inherit">
                    @csrf
                    <button 
                        type="submit"
                        class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"
                    >
                        Logout
                    <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
            @else   
                <a 
                href="#" 
                class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"
                data-bs-toggle="modal" data-bs-target="#loginModal" >
                    Login 
                    <i class="bi bi-arrow-right"></i>
                </a>
            @endif
            {{-- <button type="button" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5"" data-bs-toggle="modal"
                data-src="" data-bs-target="#videoModal">
                <span>Login</span>
            </button> --}}
        </div>
    </div>
</nav>