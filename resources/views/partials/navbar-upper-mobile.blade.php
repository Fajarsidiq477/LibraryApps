<!-- Mobile appearance -->
    <div class="container">
        <div class="searchbar-mobile d-md-none input-group py-2">
            <button class="btn dropdown-toggle bg-secondary text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#">Action before</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Another action before</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="#">Separated link</a>
                </li>
            </ul>
            <input type="text" class="form-control" aria-label="Text input with 2 dropdown buttons" placeholder="Pencarian ...." />
            <button class="btn bg-secondary text-light" type="button">
                <i data-feather="search"></i>
            </button>
        </div>

        @if (Route::currentRouteName() === 'adminBooks')
            <div class="mt-2">
                <a href="#" class="badge bg-primary d-flex align-items-center d-md-none py-2 justify-content-center" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-mode="add">
                    <span>Tambah Buku</span>
                    <i data-feather="plus"></i>
                </a>
            </div>
        @elseif(Route::currentRouteName() === 'adminUsers')
            <div class="mt-2">
                <a
                    href="#"
                    class="badge bg-primary d-flex align-items-center d-md-none py-2 justify-content-center"
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
            <div class="mt-2">
                <a
                    href="#"
                    class="badge bg-primary d-flex align-items-center d-md-none py-2 justify-content-center"
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
<!-- End mobile appearance -->