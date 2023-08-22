<div class="navbar navbar-lower bg-secondary">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center" style="width: 100%">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link px-md-4 @if(Route::currentRouteName() === 'admin.index') active @endif" aria-current="page" href="{{ route('admin.index') }}">
                        <i class="bi bi-house-fill"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-md-4 @if(Route::currentRouteName() === 'books.index') active @endif" href="{{ route('books.index') }}">
                        <i class="bi bi-book-fill"></i>
                    </a>
                </li>
                @if (Auth::user()->role != 1)
                    <li class="nav-item">
                        <a class="nav-link px-md-4 @if(Route::currentRouteName() === 'admin.users') active @endif" href="{{ route('admin.users') }}">
                            <i class="bi bi-person-fill"></i>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link px-md-4 @if(Route::currentRouteName() === 'admin.lend.books') active @endif" href="{{ route('admin.lend.books') }}">
                        <i class="bi bi-clock-fill"></i>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>