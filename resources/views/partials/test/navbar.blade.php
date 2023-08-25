<div class="navbar navbar-upper bg-primary py-2">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ url('/') }}">SIJAMBU IPAI</a>

        <div class="d-flex dropdown px-2">
            <a
                class="nav-link d-flex justify-content-between align-items-center"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <div class="avatar">
                    <i class="bi bi-person"></i>
                </div>

                <div class="col text-center">
                    <i class="bi bi-list"></i>
                </div>
            </a>
            <ul class="dropdown-menu">
                @if (Auth::check())


                    
                @if (Auth::user()->role == 2)
                    <li>
                        <a class="dropdown-item" href="{{ route('user.profile') }}"
                        >Akun</a
                        >
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.activity') }}">Aktivitas</a>
                    </li>
                @endif

                @if (Auth::user()->role == 0 || Auth::user()->role == 1 )
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.index') }}">Admin Dashboard</a>
                    </li>
                @endif
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
                @else 
                <li>
                    <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>