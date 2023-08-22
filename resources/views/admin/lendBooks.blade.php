@extends('layouts.master')

@section('header')
    @include('partials.navbar-upper')

    <nav>
        @include('partials.navbar-admin-lower')
        @include('partials.navbar-upper-mobile')
    </nav>
@endsection

        
@section('main')
    <div class="container">
        <div class="row table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="py-4">
                            <input type="checkbox" name="" id="" />
                        </th>
                        <th class="py-4">#</th>
                        <th class="py-4">Kode Buku</th>
                        <th class="py-4">Judul Buku</th>
                        <th class="py-4">Peminjam</th>
                        <th class="py-4">Tanggal dipinjam</th>
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($lend as $item)
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" name="" id="" />
                        </td>
                        <td>
                            <img
                                src="{{ asset('cover_images/' . $item->cover) }}"
                                alt="Book cover"
                                style="width: 100px;"
                            />
                        </td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->lend_date }}</td>
                        <td>
                            <a
                                href="#"
                                class="badge text-dark"
                                onclick="deleteData(1)"
                            >
                                <i data-feather="trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('footer')
<!-- Add / Edit Modal -->
    <div
        class="modal fade"
        id="myModal"
        tabindex="-1"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <button
                        type="button"
                        class="btn-admin-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                        <i data-feather="chevron-left"></i>
                    </button>
                    <h1 class="modal-title fs-5 text-light"></h1>
                </div>
                <div class="modal-body py-4 px-2 px-sm-3 px-md-5">
                    <div class="steps">
                        <div class="step">
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <div
                                        class="form-group mb-3 text-center"
                                    >
                                        <label
                                            for="kode"
                                            class="mb-2 fw-bold"
                                            >Masukan NIM Peminjam</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control custom-form-control mb-2"
                                            id="user_id"
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step text-center">
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <div
                                        class="form-group mb-3 text-center"
                                    >
                                        <label
                                            for="kode"
                                            class="mb-2 fw-bold"
                                            >Masukan Kode Buku</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control mb-2"
                                            id="book_code"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step">
                            <div class="row">
                                <div class="col-12 col-md-6 text-center">
                                    <p class="fw-bold">Data Buku</p>
                                    <div class="image-cover">
                                        <img
                                            src="http://placehold.co/160x225"
                                            alt="book cover"
                                            id="imageInputDisplay"
                                            class="img-fluid"
                                        />
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="kode" class="mb-2"
                                            >Kode Buku</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control is-invalid"
                                            id="book_code_detail"
                                            disabled
                                        />
                                        <!-- <div class="invalid-feedback">
                                            Kode buku harus lebih dari 100
                                        </div> -->
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="judul" class="mb-2"
                                            >Judul Buku</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="title_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="penulis" class="mb-2"
                                            >Penulis</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="author_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="penerbit" class="mb-2"
                                            >Penerbit</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="publisher_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="editor" class="mb-2"
                                            >Editor</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="editor_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="penerjemah" class="mb-2"
                                            >Penerjemah</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="translator_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bahasa" class="mb-2"
                                            >Bahasa</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="language_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="tahunTerbit"
                                            class="mb-2"
                                            >Tahun Terbit</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control custom-form-control"
                                            id="publication_year_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="jumlahHalaman"
                                            class="mb-2"
                                            >Jumlah Halaman</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="page_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="volume" class="mb-2"
                                            >Volume</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control custom-form-control"
                                            id="volume_detail"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jenis" class="mb-2"
                                            >Jenis</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="type_detail"
                                            disabled
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step">
                            <div class="container" style="max-width: 500px">
                                <p class="fw-bold text-center mb-0 fs-4">
                                    Preview Pinjam Buku
                                </p>
                                <p class="sub-text text-center">
                                    Baitul Hikmah Library
                                </p>

                                <p
                                    class="text-center text-sm-end fst-italic"
                                    id="id_preview">
                                    -
                                </p>

                                <table class="table table-borderless">
                                    <div class="mb-3">
                                        <tr>
                                            <th>Peminjam</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td class="">NIM/NIP</td>
                                            <td id="user_id_preview">-</td>
                                        </tr>

                                        <tr>
                                            <td class="">Nama Lengkap</td>
                                            <td id="name_preview">-</td>
                                        </tr>
                                    </div>
                                    <div class="mb-3">
                                        <tr>
                                            <th>Buku</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>Kode</td>
                                            <td id="book_code_preview">-</td>
                                        </tr>

                                        <tr>
                                            <td>Judul</td>
                                            <td id="title_preview">
                                                -
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="mb-3">
                                        <tr>
                                            <th>Tanggal Peminjaman</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pinjam</td>
                                            <td id="lend_date_preview">-</td>
                                        </tr>

                                        <tr>
                                            <td>Tanggal Kembali</td>
                                            <td id="return_date_preview">-</td>
                                        </tr>
                                    </div>
                                </table>
                                <p class="text-center text-sm-end">
                                    Tatang Sutarma
                                </p>
                                <p
                                    class="text-center text-sm-end fst-italic"
                                >
                                    Staff Perpustakaan
                                </p>

                                <div class="form">
                                    <form action="#" id="form-modal">
                                        <input
                                            type="text"
                                            id="form-mode"
                                            hidden
                                        />

                                        <input
                                            type="text"
                                            id="id_hidden"
                                            hidden
                                        />
                                        <input
                                            type="text"
                                            id="user_id_hidden"
                                            hidden
                                        />
                                        <input
                                            type="text"
                                            id="book_code_hidden"
                                            hidden
                                        />
                                        <input
                                            type="text"
                                            id="lend_date_hidden"
                                            hidden
                                        />
                                        <input
                                            type="text"
                                            id="return_date_hidden"
                                            hidden
                                        />

                                        <button
                                            type="submit"
                                            class="btn btn-dark"
                                        >
                                            Selesai
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="modal-footer text-center justify-content-center"
                >
                    <button class="btn btn-success btn-step-next">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
<!-- End Add / Edit Modal -->
@endsection

@section('script')
    <script>
        //Data Buku
        let book = [];

        //Data User
        let user = [];

        //Data Peminjaman
        let lend = [];

        $.ajax({
            url: "/get-book",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                book = data.data;
            }
        });
        
        $.ajax({
            url: "/get-user",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                user = data.data;
            }
        });

        $.ajax({
            url: "/get-lend",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                lend = data.data;
            }
        });
        
        // Get Date Function
        function getDate(){
            
            const d = new Date();
            const e = new Date(d.getTime() + 7 * 24 * 60 * 60 * 1000);

            // Get year, month, and day part from the date
            let tahun   = d.toLocaleString("default", { year    : "numeric" });
            let bulan   = d.toLocaleString("default", { month   : "2-digit" });
            let hari    = d.toLocaleString("default", { day     : "2-digit" });

            let tahun1  = e.toLocaleString("default", { year    : "numeric" });
            let bulan1  = e.toLocaleString("default", { month   : "2-digit" });
            let hari1   = e.toLocaleString("default", { day     : "2-digit" });

            // Generate yyyy-mm-dd date string
            let formattedDate   = tahun + "-" + bulan + "-" + hari;

            let formattedDate1  = tahun1 + "-" + bulan1 + "-" + hari1;
            
            
            let date   = d.getDate();
            let date1  = e.getDate();
            
            let day, day1;
            let month, month1;
            
            let year  = d.getFullYear();
            let year1 = e.getFullYear();

                switch (d.getDay()) {
                    case 0: day = "Ahad";   break;
                    case 1: day = "Senin";  break;
                    case 2: day = "Selasa"; break;
                    case 3: day = "Rabu";   break;
                    case 4: day = "Kamis";  break;
                    case 5: day = "Jum'at"; break;
                    case 6: day = "Sabtu";
                }

                switch (e.getDay()) {
                    case 0: day1 = "Ahad";   break;
                    case 1: day1 = "Senin";  break;
                    case 2: day1 = "Selasa"; break;
                    case 3: day1 = "Rabu";   break;
                    case 4: day1 = "Kamis";  break;
                    case 5: day1 = "Jum'at"; break;
                    case 6: day1 = "Sabtu";
                }

                switch (d.getMonth()) {
                    case 0:  month = "Januari"; break;
                    case 1:  month = "Februari"; break;
                    case 2:  month = "Maret"; break;
                    case 3:  month = "April"; break;
                    case 4:  month = "Mei"; break;
                    case 5:  month = "Juni"; break;
                    case 6:  month = "Juli"; break;
                    case 7:  month = "Agustus"; break;
                    case 8:  month = "September"; break;
                    case 9:  month = "Oktober"; break;
                    case 10: month = "November"; break;
                    case 11: month = "Desember";
                }

                switch (e.getMonth()) {
                    case 0:  month1 = "Januari"; break;
                    case 1:  month1 = "Februari"; break;
                    case 2:  month1 = "Maret"; break;
                    case 3:  month1 = "April"; break;
                    case 4:  month1 = "Mei"; break;
                    case 5:  month1 = "Juni"; break;
                    case 6:  month1 = "Juli"; break;
                    case 7:  month1 = "Agustus"; break;
                    case 8:  month1 = "September"; break;
                    case 9:  month1 = "Oktober"; break;
                    case 10: month1 = "November"; break;
                    case 11: month1 = "Desember";
                }

            // return day + ", " + date + " " + month + " " + year;
            let lend_date  = day + ", " + date + " " + month + " " + year;
            let return_date = day1 + ", " + date1 + " " + month1 + " " + year1;

            return (data = {
                lend_date,
                return_date,
                formattedDate,
                formattedDate1
            });
        }

        //delete confirmation
        const deleteData = (id) => {
            swal({
                text: "Setelah data dihapus, Anda tidak akan bisa melihatnya kembali. Apakah Anda yakin?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("Data berhasil dihapus!", {
                        icon: "success",
                    });

                    // Script jika data dihapus di bawah sini
                } else {
                    swal("Data tidak dihapus!");
                }
            });
        };

        // bs.modal.show triggered
        const modalEl = document.querySelector("#myModal");

        const formModal = modalEl.querySelector("#form-modal");

        const getFormData = () => {

            const mode          = formModal.querySelector("#form-mode").value;
            const id       = formModal.querySelector("#id_hidden").value;
            
            const user_id       = formModal.querySelector("#user_id_hidden").value;
            const book_code     = formModal.querySelector("#book_code_hidden").value;
            const lend_date     = formModal.querySelector("#lend_date_hidden").value;
            const return_date   = formModal.querySelector("#return_date_hidden").value;

            const book_id = book.find(x => x.book_code == book_code).id;

            return (data = {
                mode, id, user_id, book_code, book_id, lend_date, return_date,
            });
        };

        const onFormSubmit = (e, modalEl) => {
            e.preventDefault();

            // Get value from input
            const data = getFormData(modalEl);

            // kirim data di bawah
            $.ajax({
                    url: '/input-lend-data',
                    type: "POST",
                    headers: headers,
                    data: {
                        id   : data.id,
                        user_id         : data.user_id,
                        // kode_buku   : data.kode_buku,
                        book_id     : data.book_id,
                        lend_date  : data.lend_date,
                        return_date : data.return_date,
                    },
                    success: function (data) {
                        
                        data = JSON.parse(JSON.stringify(data));
                        if(data.error == false){
                            swalOption = {
                                title: "Buku berhasil Dipinjam!",
                                icon: "success",
                                button: "Oke!",
                            };

                            swal(swalOption);
                            $('.swal-button').click(function() {
                                location.reload();
                            });
                            
                        }else{
                            alert(data.message);
                            console.log(data.err_message);
                        }
                    }
                });


            // tutup modal ketika kode add / edit berhasil dieksekusi
            document.querySelector(".btn-admin-close").click();
        };

            // Event when modal opened
            modalEl.addEventListener("show.bs.modal", (event) => {
                window.Jar.whenModalShow(modalEl, "lends", event);
            });

            // Event when form-modal on submit
            modalEl
                .querySelector("#form-modal")
                .addEventListener("submit", (e) => onFormSubmit(e, modalEl));

            // Multisteps form
            const btnStepNext = modalEl.querySelector(".btn-step-next");

            btnStepNext.addEventListener("click", () => {
                if (window.Jar.stepIndex + 1 === 1) {
                    const user_id = document.querySelector("#user_id").value;

                    if(user.some(user => user.id == user_id) == false){
                        
                        alert("Tidak ada member dengan NIM " + user_id);
                        
                        location.reload();
                    
                    }else{

                        formModal.querySelector("#user_id_hidden").value = user_id;
                        document.getElementById("user_id_preview").innerHTML = user_id;

                        document.getElementById("name_preview").innerHTML = user.find(x => x.id == parseInt(user_id)).name;
                        
                        let total_lend = 1;
                
                        if(lend.some(lend => lend.user_id == user_id) == true){
                            for(i=0; i<lend.length; i++){
                                if(lend[i].user_id == user_id){
                                    total_lend++;
                                }        
                            }
                        }

                        formModal.querySelector("#id_hidden").value = `${user_id}${total_lend}`;
                        document.getElementById("id_preview").innerHTML = `ID peminjaman: ${user_id}${total_lend}`;
                        
                        formModal.querySelector("#lend_date_hidden").value = getDate().formattedDate;
                        document.getElementById("lend_date_preview").innerHTML = getDate().lend_date;
                        
                        formModal.querySelector("#return_date_hidden").value = getDate().formattedDate1;
                        document.getElementById("return_date_preview").innerHTML = getDate().return_date;

                        alert("kamu di halaman kode buku, NIM anda " + user_id);
                    
                    }
                }
                if (window.Jar.stepIndex + 1 === 2) {
                    const book_code = document.querySelector("#book_code").value;
                    if(book.some(book => book.book_code == book_code) == false){

                        alert("Tidak ada buku dengan kode " + book_code);
                        location.reload();
                    
                    }else{
                        formModal.querySelector("#book_code_hidden").value = book_code;    
                        document.getElementById("book_code_preview").innerHTML = book_code;
                        document.getElementById("title_preview").innerHTML = book.find(x => x.book_code == book_code).title;

                        alert("kamu di halaman detail buku");
                    }
                }
                if(window.Jar.stepIndex + 1 === 3) {
                    alert("kamu di halaman preview");
                }
            })
    </script>
@endsection