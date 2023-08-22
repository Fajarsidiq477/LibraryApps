<aside class="left-bar">
    <div class="left-bar-content">
        <a href="{{ route('user.activity') }}" class="left-bar-link @if( Route::currentRouteName() === 'activity' ) active @endif">
            <i class="bi bi-house-fill"></i>
            <span class="d-none d-md-inline-block ml-4">Beranda</span>
        </a>
        <a href="{{ route('user.borrowed') }}" class="left-bar-link @if( Route::currentRouteName() === 'borrowed' ) active @endif">
            <i class="bi bi-bookmarks-fill"></i>
            <span class="d-none d-md-inline-block ml-4">Dipinjam</span>
        </a>
        <a href="{{ route('user.history') }}" class="left-bar-link @if( Route::currentRouteName() === 'history' ) active @endif">
            <i class="bi bi-clock-fill"></i>
            <span class="d-none d-md-inline-block ml-4">Riwayat</span>
        </a>
        <a href="{{ route('user.favorite') }}" class="left-bar-link @if( Route::currentRouteName() === 'favorite' ) active @endif">
            <i class="bi bi-star-fill"></i>
            <span class="d-none d-md-inline-block ml-4">Favorit</span>
        </a>
    </div>
</aside>