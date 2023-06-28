@extends('layouts.master')

@section('header')
    @include('partials/navbar')
@endsection

@section('main')
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
@endsection

@section('footer')
    @include('partials/filter-aside')
@endsection

@section('script')
    <script>

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

        // Menambilkan filter sidebar
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

        // Menambilkan book detail sidebar sesuai id yang diklik
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
                        <h4 class="book-title"><a href="{{ url('detail-book-view') }}" class="text-dark">${data[id].bookName}</a></h4>
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
@endsection