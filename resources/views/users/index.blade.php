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
                <form action="/search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </form>
                <!-- <search-form searchFrom="{{ route('searchBookData') }}" displayTo="#main-content" displayMode="user"
                    token="{{ csrf_token() }}">
                </search-form> -->
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
            @if ($searchfilter == 'true')
                @foreach($books as $book)
                    <div class="col-12 col-md-5 d-block border-bottom border-3">
                        <book-card
                                bookId="{{$book->id}}"
                                bookName="{{$book->title}}"
                                bookYear="{{$book->publication_year}}"
                                bookCategory="{{$book->category}}"
                                bookAuthor="{{$book->author}}"
                                bookPublisher="{{$book->publisher}}"
                                bookStatus="{{$book->book_status}}"
                                bookDetailURL="/book/{{$book->book_code}}"
                                bookFavoriteUrl="..."
                                bookFavorite=false
                                bookCover="/storage/book_covers/{{$book->cover}}"
                                ></book-card>
                    </div>
                @endforeach
            @endif
        @if ($searchfilter == 'true')
            {{$books->appends(['search' => $search, 'available' => $available, 'category' => $category])->links()}}
        @endif
        </div>
    </div>
@endsection

@section('footer')
    <aside-canvas class="offcanvas offcanvas-end" tabindex="-1" displayTo="#main-content" id="offcanvasRight"
         filterFrom="{{ route('filterBookData') }}" token="{{ csrf_token() }}"></aside-canvas>

    @if ($searchfilter == 'false')
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
                                'bookCategory="' + item.category + '" ' +
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
    @else
        <script>
            if($('.page-link')[0] != null){
                $('.page-link')[0].innerHTML = "<";
                $('.page-link')[1].innerHTML = ">";
            }
        </script>
    @endif
@endsection
