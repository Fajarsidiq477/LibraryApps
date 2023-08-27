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
            url: "/get-book",
            type: 'GET',
            dataType: 'json',
            success: function(data) {

                const html = data.data.map((d) => {
                    return `
                    <div class="col-12 col-md-5 d-block border-bottom border-3">
                        <book-card 
                            bookId="${d.id}"
                            bookName="${d.title}"
                            bookYear="${d.publication_year}"
                            bookGenre="Kategori"
                            bookAuthor="${d.author}"
                            bookPublisher="${d.publisher}"
                            bookStatus="${d.book_status}"
                            bookDetailUrl="{{ url('/book/${d.book_code}') }}"
                            bookFavoriteUrl="..."
                            bookFavorite=false
                            bookCover={{ asset('cover_images/${d.cover}') }}
            
                        >
                        </book-card>
                    </div>
                    `;
                })
            const mainContent = document.querySelector("#main-content");


            mainContent.innerHTML = html;

            }
        });

        function bookSave(nim, id_buku){

            $.ajax({
                url: '/save',
                type: "POST",
                headers: headers,
                data: {
                    nim     : nim,
                    id_buku : id_buku,
                },
                success: function (data) {
                    data = JSON.parse(JSON.stringify(data));
                    swalOption = {
                        title: data.message,
                        icon: "success",
                        button: "Oke!",
                    };
                    swal(swalOption);                    
                }
                ,
                error: function (data, textStatus, errorThrown) {
                    data = JSON.parse(JSON.stringify(data));
                    data = JSON.parse(JSON.stringify(data));
                    swalOption = {
                        title: data.message,
                        icon: "error",
                        button: "Baik",
                    };
                    swal(swalOption); 
                },
            });
        }
        </script>
@endsection
