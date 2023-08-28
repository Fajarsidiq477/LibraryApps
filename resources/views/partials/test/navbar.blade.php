<nav class="navbar navbar-upper navbar-expand-sm navb bg-primary">
  <div class="container ">
    <a class="navbar-brand text-white" href="{{ url('/') }}">SIJAMBU IPAI</a>
    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-sm-flex justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav align-items-sm-center">
        @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link fw-medium {{ request()->is('/') ? 'active' : ''}}" href="{{ route('user.index') }}">
                    <i class="bi bi-house"></i>
                    <span>Beranda</span>
                </a>
            </li>

            @if (Auth::user()->role == 0 || Auth::user()->role == 1 )
                @if (!request()->is('admin*'))
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="{{ route('admin.index') }}">
                            <i class="bi bi-speedometer2"></i>
                            <span>
                                Admin Dashboard
                            </span>
                        </a>
                    </li>
                @endif
            @endif
            @if (Auth::user()->role == 2)
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->is('profile') ? 'active' : ''}}" href="{{ route('user.profile') }}">
                        <i class="bi bi-person"></i>
                        <span>Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium {{ request()->is('activity*') ? 'active' : ''}}" href="{{ route('user.activity') }}">
                        <i class="bi bi-activity"></i>
                        <span>Aktivitas</span>
                    </a>
                </li>
            @endif

            
                <li class="nav-item dropdown d-none d-sm-block">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('storage/avatars/'. Auth::user()->profile_picture) }}" class="img-fluid rounded-circle" style="width:50px" alt="avatar">
                    </a>
                    <ul class="dropdown-menu bg-primary ">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li>
                                <button type="submit" class="dropdown-item text-white fw-medium">
                                    <span>Logout</span>
                                    <i class="bi bi-box-arrow-right"></i>
                                </button>
                            </li>
                        </form>

                    </ul>
                </li>

                {{-- logout button mobile --}}
                <li class="nav-item d-sm-none">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <li>
                            <button type="submit" class="nav-link fw-medium">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </button>
                        </li>
                    </form>
                </li>
                @else 
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('login') }}">
                        <span>Login</span>
                        <i class="bi bi-box-arrow-in-right"></i>
                    </a>
                </li>
        @endif
      </ul>
    </div>
  </div>
</nav>