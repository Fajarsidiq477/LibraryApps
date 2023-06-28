<div class="navbar navbar-upper bg-primary py-2">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ url('/') }}">SIJAMBU IPAI</a>

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

        <div
            class="dropdown text-center d-none d-lg-flex"
            style="background-color: transparent"
        >
            <a
                class="nav-link"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <i data-feather="bell"></i>
            </a>
            <ul
                class="dropdown-menu px-3"
                style="width: 300px; left: -200px"
            >
                <li>
                    <p class="dropdown-item fw-bold">Notifikasi</p>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <p class="m-0" style="font-size: 0.8rem">
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Amet quam illo ad aut rerum
                        perspiciatis quis praesentium quisquam quia
                        deserunt numquam cupiditate harum, consequuntur
                        dolorum aspernatur dolore inventore omnis
                        officia?
                        <span class="d-block text-secondary"
                            >6 Juli 2023</span
                        >
                    </p>
                </li>
            </ul>
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
                    <a class="dropdown-item" href="{{ url('profile') }}"
                        >Akun</a
                    >
                </li>
                <li>
                    <a class="dropdown-item" href="#">Aktivitas</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Keluar</a>
                </li>
            </ul>
        </div>
    </div>
</div>

@if (url()->current() !== url('profile') && url()->current() !== url('detail-book-view'))
    <nav>
        <div class="navbar navbar-lower bg-secondary py-2">
            <div class="container text-light">
                <div
                    class="row justify-content-between align-items-center"
                    style="width: 100%"
                >
                    <div class="col navbar-mode">
                        <div class="d-flex align-items-center gap-2">
                            <button
                                class="btn text-light p-1"
                                onclick="selectListMode()"
                            >
                                <i data-feather="list"></i>
                            </button>
                            <div class="switch-status switch"></div>

                            <button
                                class="btn text-light p-1"
                                onclick="selectGridMode()"
                            >
                                <i data-feather="grid"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col navbar-filter text-end">
                        <a
                            href="#"
                            class="text-light btn-show"
                            data-show=".aside-bar"
                            style="text-decoration: none"
                        >
                            <span>Filter</span>
                            <i data-feather="filter"></i>
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
        </div>
        <!-- End mobile appearance -->
    </nav>
@endif
