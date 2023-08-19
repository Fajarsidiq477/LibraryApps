<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sijambu | Books</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body data-source="userIndex">
        
        <div class="navbar navbar-upper bg-primary py-2">
            <div class="container">
                <a class="navbar-brand text-light" href="#">SIJAMBU IPAI</a>

                <div class="d-flex dropdown px-2">
                    <a
                        class="nav-link d-flex justify-content-between align-items-center"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <div class="avatar">
                            <i class="bi bi-person"></i>
                        </div>

                        <div class="col text-center">
                            <i class="bi bi-list"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="profile.html"
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

        <main>
            <div class="container mt-3">
                <!-- Search and Filter -->
                <div
                    class="d-flex justify-content-between align-items-start my-2"
                >
                    <div class="col-10 col-md-4">
                        <search-form
                            searchFrom="{{ route('searchBookData') }}"
                            displayTo="#main-content"
                            token="{{ csrf_token() }}"
                        ></search-form>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <button
                            class="btn bg-secondary text-white ms-auto"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight"
                            data-source="filter"
                            aria-controls="offcanvasRight"
                        >
                            <i class="bi bi-filter"></i>
                            <span class="d-none d-sm-inline-block">Filter</span>
                        </button>
                    </div>
                </div>

                <div
                    id="resultMessageField"
                    class="ms-3 my-2 d-flex align-items-center"
                ></div>

                <div
                    class="row row-gap-3 justify-content-between"
                    id="main-content"
                >
                    <!-- Main content disini, pake javascript -->
                </div>

                <!-- pagination -->
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

        <aside-canvas
            class="offcanvas offcanvas-end"
            tabindex="-1"
            id="offcanvasRight"
        ></aside-canvas>

        <script>
            const mainContent = document.querySelector("#main-content");
            let html = ``;

            const bookData = {
                bookId: "sip-123",
                bookName: "Islam Yang Disalahpahami",
                bookYear: "2005",
                bookGenre: "Aqidah, Akhlak",
                bookAuthor: "M. Quraish Shihab",
                bookPublisher: "Lentera Hati",
                bookStatus: "Tersedia",
                bookDetailUrl: `/users/book-detail.html`,
                bookFavoriteUrl: `/link/link`,
            };

            for (let i = 0; i < 10; i++) {
                html += `
                    <div class="col-12 col-md-5 d-block border-bottom border-3">
                        <book-card 
                            bookId="${bookData.bookId}"
                            bookName="${bookData.bookName}"
                            bookYear="${bookData.bookYear}"
                            bookGenre="${bookData.bookGenre}"
                            bookAuthor="${bookData.bookAuthor}"
                            bookPublisher="${bookData.bookPublisher}"
                            bookStatus="${bookData.bookStatus}"
                            bookDetailUrl="${bookData.bookDetailUrl}"
                            bookFavoriteUrl=${bookData.Url}
                            bookFavorite=true
                        >
                        </book-card>
                    </div>
                `;
            }

            mainContent.innerHTML = html;
        </script>
    </body>
</html>
