<div class="navbar navbar-lower bg-secondary">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center" style="width: 100%">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link px-md-4 @if(Route::currentRouteName() === 'adminIndex') active @endif" aria-current="page" href="{{ route('adminIndex') }}">
                        <i data-feather="home"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-4 @if(Route::currentRouteName() === 'adminBooks') active @endif" href="{{ route('adminBooks') }}">
                        <i data-feather="book"></i>
                    </a>
                </li>
                @if (Auth::user()->role != 1)
                    <li class="nav-item">
                        <a class="nav-link px-md-4 @if(Route::currentRouteName() === 'adminUsers') active @endif" href="{{ route('adminUsers') }}">
                            <i data-feather="user"></i>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link px-md-4 @if(Route::currentRouteName() === 'adminLendBooks') active @endif" href="{{ route('adminLendBooks') }}">
                        <i data-feather="clock"></i>
                    </a>
                </li>
            </ul>

            @if (Route::currentRouteName() === 'adminBook')
                <div>
                    <a href="#" class="badge bg-primary d-none d-md-flex align-items-center justify-content-center" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-mode="add">
                        <span>Tambah Buku</span>
                        <i data-feather="plus"></i>
                    </a>
                </div>
            @elseif(Route::currentRouteName() === 'adminUsers')
                <div>
                    <a
                        href="#"
                        class="badge bg-primary d-none d-md-flex align-items-center btn-add-account justify-content-center"
                        style="text-decoration: none"
                        data-bs-toggle="modal"
                        data-bs-target="#myModal"
                        data-bs-mode="add"
                    >
                        <span>Tambah Akun</span>
                        <i data-feather="plus"></i>
                    </a>
                </div>
            @elseif(Route::currentRouteName() === 'adminLendBooks')
                <div>
                    <a
                        href="#"
                        class="badge bg-primary d-none d-md-flex align-items-center justify-content-center"
                        style="text-decoration: none"
                        data-bs-toggle="modal"
                        data-bs-target="#myModal"
                        data-bs-mode="add"
                    >
                        <span>Pinjam Buku</span>
                        <i data-feather="plus"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>