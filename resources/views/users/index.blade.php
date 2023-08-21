
@extends('layouts.master')

@section('header')
    @include('partials.navbar')
@endsection

@section('main')
    <div class="container">
        
        <div class="row gap-3 justify-content-center pt-4" id="main-content">

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
    @include('partials.filter-aside')
@endsection

@section('script')
    <script>

        //get data buku
        const book = [];

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


        const createListCard = (book, i) => {
            
            return `
                <div class="col-12 col-md-5 border-bottom border-3 list">
                    <a onclick="bookDetailAside(book, ${i})" style="text-decoration:none" class="book-field text-dark">
                        <div class="row mb-2">
                            <div class="col col-md-5">
                                <img
                                    src="{{ asset('cover_images/${book[i].cover}') }}"
                                    alt="book cover"
                                    class="img-fluid"
                                    width="100"
                                />
                            </div>
                            <div class="col col-md-7 pt-2">
                                <h4 class="book-title">
                                    ${book[i].title}
                                </h4>
                                <h5 class="book-author">${book[i].author}</h5>
                                <p class="book-year">${book[i].publication_year}</p>
                            </div>
                        </div>
                    </a>
                </div>
            `;
        };

        // implementing card to #main-content for example
        const mainContent = document.querySelector("#main-content");

        $.ajax({
            url: "/get-book",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                for(i=0; i<data.data.length; i++){
                    book.push(data.data[i]);
                }

                for (let i = 0; i < book.length; i++) {
                    mainContent.innerHTML += createListCard(book, i);
                }
                // console.log(data.data[0].kode_buku);
            }
        });

        // Switch Status
        const switchStatus = document.querySelector(".switch-status");

        const selectListMode = () => {
            switchStatus.classList.remove("grid");
            mainContent.innerHTML = "";

            for (let i = 0; i < book.length; i++) {
            mainContent.innerHTML += createListCard(book, i);
            }
        };

        const selectGridMode = () => {
            switchStatus.classList.add("grid");
            mainContent.innerHTML = "";

            for (let i = 0; i < book.length; i++) {
            mainContent.innerHTML += createGridCard(book, i);
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

        const bookDetailAside = (book, i) => {

            asideEl.querySelector(".aside-content").innerHTML = `

                <div class="book-detail text-center px-4">
                    <div class="aside-header">
                        <span
                            class="d-inline-block bg-secondary badge py-2 px-4 rounded text-light mb-2"
                            >Kategori</span
                        >
                        <img
                            src="{{ asset('cover_images/${book[i].cover}') }}"
                            class="d-block mx-auto img-fluid mb-2"
                            alt="book-cover"
                            width="150"
                        />

                        <div
                            class="d-flex justify-content-center align-items-center gap-2"
                        >
                            <a
                                href="#"
                                onclick="#"
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
                        <a href="{{ url('book/${book[i].book_code}') }}">
                            <h4 class="book-title">${book[i].title}</h4>
                            
                            </a>

                        <p class="book-year">${book[i].publication_year}</p>
                        <h5 class="book-author">${book[i].author}</h5>
                        <p class="book-publisher fw-bold">${book[i].publisher}</p>
                        <p class="book-status">
                            <span>Status</span>
                            <span class="badge bg-secondary">${book[i].book_status}</span>
                        </p>
                    </div>
                </div>
            `;

            asideEl.classList.add("show");
            return 1;
        };
    </script>
@endsection
