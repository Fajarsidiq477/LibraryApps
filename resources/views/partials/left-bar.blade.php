<aside class="left-bar">
    <div class="left-bar-content">
        <a href="{{ route('activity') }}" class="left-bar-link @if( Route::currentRouteName() === 'activity' ) active @endif">
            <i data-feather="home"></i>
            <span class="d-none d-md-inline-block ml-4">Beranda</span>
        </a>
        <a href="{{ route('borrowed') }}" class="left-bar-link @if( Route::currentRouteName() === 'borrowed' ) active @endif">
            <i data-feather="book"></i>
            <span class="d-none d-md-inline-block ml-4">Dipinjam</span>
        </a>
        <a href="{{ route('history') }}" class="left-bar-link @if( Route::currentRouteName() === 'history' ) active @endif">
            <i data-feather="clock"></i>
            <span class="d-none d-md-inline-block ml-4">Riwayat</span>
        </a>
        <a href="{{ route('favorite') }}" class="left-bar-link @if( Route::currentRouteName() === 'favorite' ) active @endif">
            <i data-feather="star"></i>
            <span class="d-none d-md-inline-block ml-4">Favorit</span>
        </a>
    </div>
</aside>