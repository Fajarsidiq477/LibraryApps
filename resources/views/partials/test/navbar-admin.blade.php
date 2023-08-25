<div class="navbar navbar-lower bg-secondary">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center" style="width: 100%">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link px-md-4 {{ request()->is('admin') ? 'active' : ''}}" aria-current="page" href="{{ route('admin.index') }}">
                        <i class="bi bi-house-fill"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-4 {{ request()->is('admin/books*') ? 'active' : ''}}" href="{{ route('books.index') }}">
                        <i class="bi bi-book-fill"></i>
                    </a>
                </li>
                @if (Auth::user()->role == 0)
                    <li class="nav-item">
                        <a class="nav-link px-md-4 {{ request()->is('admin/users*') ? 'active' : ''}}" href="{{ route('users.index') }}">
                            <i class="bi bi-person-fill"></i>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link px-md-4 {{ request()->is('admin/lend-books*') ? 'active' : ''}}" href="{{ route('lend-books.index') }}">
                        <i class="bi bi-clock-fill"></i>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>