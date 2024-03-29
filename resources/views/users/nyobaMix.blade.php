@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection

@section('main')
    <div id="dataBody" data-source="userIndex"></div>

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
@endsection

@section('footer')
    <aside-canvas
            class="offcanvas offcanvas-end"
            tabindex="-1"
            id="offcanvasRight"
        ></aside-canvas>

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
@endsection
