<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sijambu | Books</title>
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
                            <a class="dropdown-item" href="http://localhost:9000/users/">Akun</a>
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

        <main>
            <div class="container">
                <div
                    class="row gap-3 justify-content-center pt-4"
                    id="main-content"
                >
                    <!-- Main content disini, pake javascript -->
                </div>
                <nav aria-label="Page navigation example" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link page-prev pr-5"><</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link page-next" href="#">></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </main>

        <aside class="aside-bar overflow-hidden">
            <button class="btn btn-close" data-dismiss=".aside-bar"></button>

            <div class="aside-content"></div>
        </aside>

        <!-- Icons -->
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

        <!-- SweetAlert for deleteconfirmation -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            // icons
            feather.replace();

            // Grid mode
            const createGridCard = () => {
                return `
                    <div class="col-12 col-md-5 p-3 bg-book-cover grid">
                        <a onclick="bookDetailAside(1)" style="text-decoration:none" class="book-field text-dark">
                            <div class="row justify-content-center">
                                <div class="col text-center">
                                    <div>
                                        <img
                                            src="http://placehold.co/160x225"
                                            alt="book cover"
                                            class="img-fluid"
                                        />
                                    </div>

                                    <div class="book-description mt-2">
                                        <h4 class="book-title">
                                            Islam Yang Disalahpahami
                                        </h4>
                                        <p class="book-year">2005</p>
                                        <h5 class="book-author">
                                            M. Quraish Shihab
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
            };

            const createListCard = () => {
                return `
                    <div class="col-12 col-md-5 border-bottom border-3 list">
                        <a onclick="bookDetailAside(1)" style="text-decoration:none" class="book-field text-dark">
                            <div class="row mb-2">
                                <div class="col col-md-5">
                                    <img
                                        src="http://placehold.co/160x225"
                                        alt="book cover"
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="col col-md-7 pt-2">
                                    <h4 class="book-title">
                                        Islam Yang Disalahpahami
                                    </h4>
                                    <h5 class="book-author">M. Quraish Shihab</h5>
                                    <p class="book-year">2005</p>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
            };

            // implementing card to #main-content for example
            const mainContent = document.querySelector("#main-content");

            for (let i = 0; i < 10; i++) {
                mainContent.innerHTML += createListCard();
            }

            // Switch Status
            const switchStatus = document.querySelector(".switch-status");

            const selectListMode = () => {
                switchStatus.classList.remove("grid");
                mainContent.innerHTML = "";

                for (let i = 0; i < 10; i++) {
                    mainContent.innerHTML += createListCard();
                }
            };

            const selectGridMode = () => {
                switchStatus.classList.add("grid");
                mainContent.innerHTML = "";

                for (let i = 0; i < 10; i++) {
                    mainContent.innerHTML += createGridCard();
                }
            };

            // Function for close and show aside
            const asideButtonClose = document.querySelector(".btn-close");
            asideButtonClose.addEventListener("click", function () {
                let asideBarEl = this.getAttribute("data-dismiss");

                const asideBar = document.querySelector(asideBarEl);
                asideBar.classList.remove("show");
            });

            const asideButtonShow = document.querySelector(".btn-show");
            asideButtonShow.addEventListener("click", function () {
                let asideBarEl = this.getAttribute("data-show");
                const asideBar = document.querySelector(asideBarEl);

                asideBar.querySelector(".aside-content").innerHTML = `
                        <div
                            class="d-flex justify-content-center pb-3"
                            style="border-bottom: 2px solid rgba(0, 0, 0, 0.7)"
                        >
                            <span style="margin-right: 1rem">Filter</span>
                            <i data-feather="filter"></i>
                        </div>

                        <div class="container mt-3" style="height: 50vh">
                            <h5>Status</h5>
                            <div class="d-flex justify-content-between">
                                <label for="filterStatus">Tersedia</label>
                                <input
                                    type="checkbox"
                                    id="filterStatus"
                                    class="filterCheck"
                                />
                            </div>
                        </div>

                        <button class="btn btn-filter-submit">Terapkan</button>
                `;

                asideBar.classList.add("show");
            });

            const asideEl = document.querySelector(".aside-bar");

            const bookDetailAside = (id) => {
                let data = [];

                data[id] = {
                    bookName: "Islam Yang Disalahpahami",
                    bookYear: 2005,
                    bookGenre: "Aqidah",
                    bookAuthor: "M. Quraish Shihab",
                    bookPublisher: "Lentera Hati",
                    bookStatus: "Tersedia",
                };

                asideEl.querySelector(".aside-content").innerHTML = `

                    <div class="book-detail text-center px-4">
                        <div class="aside-header">
                            <span
                                class="d-inline-block bg-secondary badge py-2 px-4 rounded text-light mb-2"
                                >${data[id].bookGenre}</span
                            >
                            <img
                                src="http://placehold.co/160x225"
                                class="d-block mx-auto img-fluid mb-2"
                                alt="book-cover"
                            />

                            <div
                                class="d-flex justify-content-center align-items-center gap-2"
                            >
                                <a
                                    href="#"
                                    class="badge bg-secondary"
                                    style="text-decoration: none"
                                    >
                                    <i data-feather="bookmark"></i>
                                    <span>Simpan</span>
                                </a
                                >
                                <a
                                    href="#"
                                    class="badge bg-secondary"
                                    style="text-decoration: none"
                                    >Sitasi</a
                                >
                            </div>
                        </div>
                        <div class="aside-description text-start mt-4">
                            <h4 class="book-title">${data[id].bookName}</h4>
                            <p class="book-year">${data[id].bookYear}</p>
                            <h5 class="book-author">${data[id].bookAuthor}</h5>
                            <p class="book-publisher fw-bold">${data[id].bookPublisher}</p>
                            <p class="book-status">
                                <span>Status</span>
                                <span class="badge bg-secondary">${data[id].bookStatus}</span>
                            </p>
                        </div>
                    </div>
                `;

                asideEl.classList.add("show");
                return 1;
            };
        </script>
    </body>
</html>
