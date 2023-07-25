<div class="navbar navbar-upper bg-primary py-2">
    <div class="container">
        <a class="navbar-brand text-light" href="#">SIJAMBU IPAI</a>

        <div class="col-md-6 d-none d-md-flex">
            <div class="input-group p-2">
                <button
                    class="btn dropdown-toggle bg-secondary text-light"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    Kategori
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#"
                            >Action before</a
                        >
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            >Another action before</a
                        >
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            >Something else here</a
                        >
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <a class="dropdown-item" href="#"
                            >Separated link</a
                        >
                    </li>
                </ul>
                <input
                    type="text"
                    class="form-control"
                    aria-label="Text input with 2 dropdown buttons"
                    placeholder="Pencarian ...."
                />
                <button
                    class="btn bg-secondary text-light"
                    type="button"
                >
                    <i data-feather="search"></i>
                </button>
            </div>
        </div>

        <div class="d-flex dropdown px-2">
            <a
                class="nav-link d-flex justify-content-between align-items-center"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <div class="avatar">
                    <!-- <img
                        src="https://placehold.co/200"
                        alt="avatar"
                        class="img-fluid"
                    /> -->
                    <i data-feather="user"></i>
                </div>

                <div class="col text-center">
                    <i data-feather="menu"></i>
                </div>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="#">Akun</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</div>
    <nav>
        <div class="navbar navbar-lower bg-secondary">
            <div class="container">
                <div
                    class="d-flex justify-content-between align-items-center"
                    style="width: 100%"
                >
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item">
                            <a
                                class="nav-link px-md-4"
                                aria-current="page"
                                href="{{ url('admin/dashboard') }}"
                            >
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link px-md-4 {{ url()->current() === url('book-view') ? 'active' : '' }}"
                                href="{{ url('book-view') }}"
                            >
                                <i data-feather="book"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link px-md-4 {{ url()->current() === url('admin-user-view') ? 'active' : '' }}"
                                href="{{ url('admin-user-view') }}"
                            >
                                <i data-feather="user"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link px-md-4 {{ url()->current() === url('lend-book-view') ? 'active' : '' }}"
                                href="{{ url('lend-book-view') }}"
                            >
                                <i data-feather="clock"></i>
                            </a>
                        </li>
                    </ul>
                    <div>
                        <a
                            href="#"
                            class="badge bg-primary d-none d-md-flex align-items-center justify-content-center"
                            style="text-decoration: none"
                            data-bs-toggle="modal"
                            data-bs-target="#myModal"
                            data-bs-mode="add"
                        >
                            @if (url()->current() === url('book-view'))
                                <span>Tambah Buku</span>
                            @elseif(url()->current() === url('admin-user-view'))
                                <span>Tambah User</span>
                            @else 
                                <span>Pinjam Buku</span>
                            @endif

                            <i data-feather="plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile appearance -->
        <div class="container">
            <div class="searchbar-mobile d-md-none input-group py-2">
                <button
                    class="btn dropdown-toggle bg-secondary text-light"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    Kategori
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#">Action before</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            >Another action before</a
                        >
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            >Something else here</a
                        >
                    </li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </li>
                </ul>
                <input
                    type="text"
                    class="form-control"
                    aria-label="Text input with 2 dropdown buttons"
                    placeholder="Pencarian ...."
                />
                <button class="btn bg-secondary text-light" type="button">
                    <i data-feather="search"></i>
                </button>
            </div>

            <div class="mt-2">
                <a
                    href="#"
                    class="badge bg-primary d-flex align-items-center d-md-none py-2 justify-content-center"
                    style="text-decoration: none"
                    data-bs-toggle="modal"
                    data-bs-target="#myModal"
                    data-bs-mode="add"
                >
                    @if (url()->current() === url('book-view'))
                        <span>Tambah Buku</span>
                    @elseif(url()->current() === url('admin-user-view'))
                        <span>Tambah User</span>
                    @else 
                        <span>Pinjam Buku</span>
                    @endif
                    <i data-feather="plus"></i>
                </a>
            </div>
        </div>
        <!-- End mobile appearance -->
    </nav>