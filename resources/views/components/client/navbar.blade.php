<header id="header" class="fixed-top @if(\Request()->routeIs('home')) header-transparent @endif">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="{{ route('home') }}">NewsDirect</a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('home') }}#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="{{ route('home') }}#categories">Categories</a></li>
                <li><a class="nav-link scrollto" href="{{ route('home') }}#team">Team</a></li>
                <li><a class="nav-link scrollto" href="{{ route('home') }}#contact">Contact</a></li>
                <li>
                    @guest
                    @else
                        <a class="nav-link" href="{{ route('backoffice.index') }}">Dashboard</a>
                    @endguest
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
