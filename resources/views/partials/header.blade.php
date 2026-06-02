<div>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-3 py-2 border-bottom">
    <div class="container-fluid">

        <!-- LOGO -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" class="me-2" style="height:40px;">
            <span class="fw-bold">
                <span class="text-dark">Law</span><span class="text-primary">Sync</span>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <!-- LEFT MENU -->
            <ul class="navbar-nav me-auto ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ipc') }}">IPC Acts</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Family Law</a></li>
                        <li><a class="dropdown-item" href="#">Criminal Law</a></li>
                        <li><a class="dropdown-item" href="#">Civil Law</a></li>
                        <li><a class="dropdown-item" href="#">Corporate Law</a></li>
                    </ul>
                </li>
            </ul>
            
            <!-- RIGHT SIDE -->
            <div class="d-flex align-items-center gap-3">

                @guest
                    <a href="{{ route('register') }}" class="btn btn-primary px-4">Sign Up</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-dark px-4">Login</a>
                @endguest

                @if(auth()->check())
                    <span>Hi {{ auth()->user()->name }}</span>
                @endif

                @auth

                    {{-- CUSTOMER --}}
                    @if(auth()->user()->role === 'customer')
                        <a href="{{ route('customer.bookings') }}" class="btn btn-outline-primary">
                            My Appointments
                        </a>

                        <a href="{{ route('customer.dashboard') }}" class="btn btn-dark">
                            Dashboard
                        </a>
                    @endif


                    {{-- LAWYER --}}
                    @if(auth()->user()->role === 'lawyer')

                        @if(auth()->user()->lawyer)
                            <a href="{{ route('lawyer.dashboard') }}" class="btn btn-dark">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('lawyer.create') }}" class="btn btn-warning">
                                Setup Profile
                            </a>
                        @endif

                    @endif


                    {{-- ADMIN --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">
                            Admin Panel
                        </a>
                    @endif


                    {{-- LOGOUT --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                    </form>

                @endauth

            </div>
        </div>
    </div>
</nav>
</div>