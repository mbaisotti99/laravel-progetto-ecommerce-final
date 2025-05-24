<header>

    <nav>
        <ul class="navBar cleanList">
            <li>
                <a href="/" class="navLink">
                    Home
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorie
                </a>
                <ul class="dropdown-menu">
                    @foreach ($cats as $cat )
                    <li><a class="dropdown-item" href="{{route("products.filtered", $cat )}}">{{ ucfirst($cat->value) }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{route("chiSiamo")}}" class="navLink">
                    Chi siamo
                </a>
            </li>
            <li>
                <a href="{{route("contatti")}}" class="navLink">
                    Contatti
                </a>
            </li>
        </ul>
    </nav>

    <div class="tools">
        <ul class="toolsLinks cleanList">
            <li>
                @if (Auth::check())
                <a href="{{route("user.details")}}">
                    <i class="bi bi-person-circle"></i>
                </a>
                @else
                <a href="{{ route("login") }}" class="btn btn-primary fs-3">
                    Accedi
                </a>
                @endif
            </li>
            <li>
                <a href="{{route("user.orders")}}">
                    <i class="bi bi-card-checklist"></i>
                </a>
            </li>
            <li>
                <a href="{{route("user.cart")}}">
                    <i class="bi bi-cart2"></i>
                </a>
            </li>
        </ul>
    </div>

</header>