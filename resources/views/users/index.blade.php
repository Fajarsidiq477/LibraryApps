@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection

@section('main')
    <div id="dataBody" data-source="userIndex"></div>

    <div class="container mt-3">
        <!-- Search and Filter -->
        <div class="d-flex justify-content-between align-items-start my-2">
            <div class="col-10 col-md-4">
                <search-form searchFrom="{{ route('searchBookData') }}" displayTo="#main-content" displayMode="user"
                    token="{{ csrf_token() }}"></search-form>

            </div>
            <div class="col-2 d-flex justify-content-end">
                <button class="btn bg-secondary text-white ms-auto" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" data-source="filter" aria-controls="offcanvasRight">
                    <i class="bi bi-filter"></i>
                    <span class="d-none d-sm-inline-block">Filter</span>
                </button>
            </div>
        </div>

        <div id="resultMessageField" class="ms-3 my-2"></div>

        <div class="row row-gap-3 justify-content-between" id="main-content">
            <!-- Main content disini, pake javascript -->

        </div>

        <!-- <button id="load-more">Load More</button> -->
        <!-- <div class="auto-load text-center">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div> -->
    </div>
@endsection

@section('footer')
    <aside-canvas class="offcanvas offcanvas-end" tabindex="-1" displayTo="#main-content" id="offcanvasRight"
        genres="{{ $genres }}" filterFrom="{{ route('filterBookData') }}" token="{{ csrf_token() }}"></aside-canvas>

    <script>

    var page = 1;
    var loading = false;

    function loadMoreData() {
        if (!loading) {
            loading = true;
            page++;

            $.ajax({
                url: '/?page=' + page,
                method: 'get',
                dataType: 'json',
                success: function (data) {
                    if (data.length > 0) {
                        data.forEach(function (item) {
                        // Buat elemen div dengan atribut yang sesuai
                        var bookCard = $('<div class="col-12 col-md-5 d-block border-bottom border-3"></div>');
                        bookCard.html('<book-card ' +
                            'bookId="' + item.id + '" ' +
                            'bookName="' + item.title + '" ' +
                            'bookYear="' + item.publication_year + '" ' +
                            'bookGenre="' + item.category + '" ' +
                            'bookAuthor="' + item.author + '" ' +
                            'bookPublisher="' + item.publisher + '" ' +
                            'bookStatus="' + item.book_status + '" ' +
                            'bookDetailURL="/book/' + item.book_code + '" ' +
                            'bookFavoriteUrl="..." ' +
                            'bookFavorite=false ' +
                            'bookCover="' + '/storage/book_covers/' + item.cover + '" ' +
                            '></book-card>');

                                // Tambahkan elemen ke kontainer
                                $('#main-content').append(bookCard);
                            });
                        loading = false;
                    } else {
                        $('#load-more').hide(); // Sembunyikan tombol jika tidak ada data lagi
                    }
                }
            });
        }
    }

    $(document).ready(function () {
        loadMoreData();

        $('#load-more').click(function () {
            loadMoreData();
        });

        // Deteksi scroll ke akhir halaman dan muat data tambahan
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                loadMoreData();
            }
        });
    });


        // $.ajax({
        //     url: "/get-book",
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(data) {

        //         console.log(data);

        //         const html = data.data.map((d) => {
        //             return `
        //             <div class="col-12 col-md-5 d-block border-bottom border-3">
        //                 <book-card 
        //                     bookId="${d.id}"
        //                     bookName="${d.title}"
        //                     bookYear="${d.publication_year}"
        //                     bookGenre="${d.category}"
        //                     bookAuthor="${d.author}"
        //                     bookPublisher="${d.publisher}"
        //                     bookStatus="${d.book_status}"
        //                     bookDetailURL="{{ route('bookDetail') }}/${d.book_code}"
        //                     bookFavoriteUrl="..."
        //                     bookFavorite=false
        //                     bookCover={{ asset('storage/book_covers/${d.cover}') }}
        //                 >
        //                 </book-card>
        //             </div>
        //             `;
        //         }).join(' ');
        //         const mainContent = document.querySelector("#main-content");


        //         mainContent.innerHTML = html;

        //     }
        // });
    </script>
@endsection
