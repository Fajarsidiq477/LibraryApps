@if ( Request::route()->getName() !== 'bookDetail')
    <nav>
        <div class="navbar navbar-lower bg-secondary py-2">
            <div class="container text-light">
                <div
                    class="row justify-content-between align-items-center"
                    style="width: 100%"
                >
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

@else 
    <nav>
        <div class="navbar navbar-lower bg-secondary py-2">
            <div class="container text-light justify-content-center">
                <h3>Detail Buku</h3>
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