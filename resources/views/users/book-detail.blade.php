<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sijambu | Books</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script defer src="{{ asset('js/vendor.js') }}"></script>
        <script defer src="{{ asset('js/main.js') }}"></script>
        <link href="{{ asset('css/bundle.f17d4bb1aecc90e8c307.css') }}" rel="stylesheet"></head>
    <body>
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
                            <a class="dropdown-item" href="#">Akun</a>
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

        <main>
            <div class="container mt-4 py-4">
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-4 text-center">
                        <img
                            src="http://placehold.co/160x225"
                            alt="Book Cover"
                            class="book-detail-cover"
                        />
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <h3>Islam yang Disalahpahami</h3>
                        <p class="book-author">M.Quraish Shihab</p>

                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Facilis voluptatum pariatur repellendus
                            aperiam ipsa illo beatae ratione earum? Dolorum
                            exercitationem temporibus, nisi rerum necessitatibus
                            explicabo quasi eveniet, quisquam animi molestias
                            consectetur totam tenetur? Aut odit aliquam culpa?
                            Voluptatum aut in quasi itaque maiores hic
                            consequuntur illum. Culpa ipsa praesentium
                            distinctio dignissimos maiores unde iure animi
                            similique consequatur. Molestiae hic omnis nihil,
                            animi quod soluta asperiores ex necessitatibus
                            fugiat explicabo sed nobis consectetur, debitis
                            sequi similique quae accusamus non minus odit. Sit
                            fuga animi mollitia quasi repudiandae! Minima cum
                            quisquam beatae omnis deserunt neque illum
                            laudantium impedit, asperiores velit veniam nulla!
                        </p>

                        <div>
                            <a href="#" class="badge bg-secondary">Simpan</a>
                            <a href="#" class="badge bg-secondary">Sitasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Icons -->
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

        <script>
            // icons
            feather.replace();
        </script>
    </body>
</html>
