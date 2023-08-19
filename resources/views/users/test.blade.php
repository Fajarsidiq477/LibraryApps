<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Sijambu | Books</title>
        <script defer src="{{ asset('./js/main2.js') }}"></script>
        <link href="{{ asset('./css/styles.css') }}" rel="stylesheet"></head>
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
            </div>
        </main>

        <aside-canvas
            class="offcanvas offcanvas-end"
            tabindex="-1"
            id="offcanvasRight"
        ></aside-canvas>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>


        $.ajax({
            url: "/get-buku",
            type: 'GET',
            dataType: 'json',
            success: function(data) {

                console.log(data);


                const html = data.data.map((d) => {
                    return `
                    <div class="col-12 col-md-5 d-block border-bottom border-3">
                        <book-card 
                            bookId="${d.id_buku}"
                            bookName="${d.judul_buku}"
                            bookYear="${d.thn_terbit}"
                            bookGenre="${d.kategori}"
                            bookAuthor="${d.penulis}"
                            bookPublisher="${d.penerbit}"
                            bookStatus="${d.status_buku}"
                            bookDetailUrl="..."
                            bookFavoriteUrl="..."
                            bookFavorite=false
                            bookCover={{ asset('cover_images/${d.cover_depan}') }}
            
                        >
                        </book-card>
                    </div>
                    `;
                })
            const mainContent = document.querySelector("#main-content");


            mainContent.innerHTML = html;

            }
        });
        </script>
    </body>
</html>
}}