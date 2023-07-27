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
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" name="" id="" />
                        </td>
                        <td>
                            <img
                                src="https://placehold.co/100x150"
                                alt="Book cover"
                            />
                        </td>
                        <td>JDK837JDK837</td>
                        <td>Negeri Para Bedebah</td>
                        <td>Fajar Sidik Setiawan</td>
                        <td>4, Januari 2022</td>
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
                </tbody>

                <!-- Alert query pencarian tidak ada -->
                <!-- <tbody>
                    <tr>
                        <td colspan="7" class="py-5 text-danger">
                            <h4>
                                Buku dengan kata kunci "[query]" tidak
                                ditemukan!
                            </h4>
                        </td>
                    </tr>
                </tbody> -->
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
                                            id="nim_peminjam"
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
                                            id="kode_buku"
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
                                            id="kode"
                                            disabled
                                        />
                                        <div class="invalid-feedback">
                                            Kode buku harus lebih dari 100
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="judul" class="mb-2"
                                            >Judul Buku</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="judul"
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
                                            id="penulis"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="kategori" class="mb-2"
                                            >Kategori</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="kategori"
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
                                            id="penerbit"
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
                                            id="editor"
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
                                            id="penerjemah"
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
                                            id="bahasa"
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
                                            id="tahunTerbit"
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
                                            id="jumlahHalaman"
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
                                            id="volume"
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
                                            id="jenis"
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
                                    id="form_id_peminjaman">
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
                                            <td id="form_nim">-</td>
                                        </tr>

                                        <tr>
                                            <td class="">Nama Lengkap</td>
                                            <td id="form_nama_peminjam">-</td>
                                        </tr>
                                    </div>
                                    <div class="mb-3">
                                        <tr>
                                            <th>Buku</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>Kode</td>
                                            <td id="form_kode_buku">-</td>
                                        </tr>

                                        <tr>
                                            <td>Judul</td>
                                            <td id="form_judul_buku">
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
                                            <td id="form_tgl_pinjam">-</td>
                                        </tr>

                                        <tr>
                                            <td>Tanggal Kembali</td>
                                            <td id="form_tgl_kembali">-</td>
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
                                            id="id_peminjaman"
                                            hidden
                                        />
                                        <input
                                            type="text"
                                            id="nim"
                                            hidden
                                        />
                                        <input
                                            type="text"
                                            id="kode_buku"
                                            hidden
                                        />
                                        <input
                                            type="text"
                                            id="tanggal_pinjam"
                                            hidden
                                        />
                                        <input
                                            type="text"
                                            id="tanggal_kembali"
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
        let buku = [];

        //Data User
        let user = [];

        //Data Peminjaman
        let pinjam = [];

        $.ajax({
            url: "/get-buku",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                buku = data.data;
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
            url: "/get-pinjam",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                pinjam = data.data;
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
            let tgl_pinjam  = day + ", " + date + " " + month + " " + year;
            let tgl_kembali = day1 + ", " + date1 + " " + month1 + " " + year1;

            return (data = {
                tgl_pinjam,
                tgl_kembali,
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

            const mode = formModal.querySelector("#form-mode").value;
            const id_peminjaman =
                formModal.querySelector("#id_peminjaman").value;
            
            const nim = formModal.querySelector("#nim").value;
            const kode_buku = formModal.querySelector("#kode_buku").value;
            const tanggal_pinjam =
                formModal.querySelector("#tanggal_pinjam").value;
            const tanggal_kembali =
                formModal.querySelector("#tanggal_kembali").value;

            return (data = {
                mode,
                id_peminjaman,
                nim,
                kode_buku,
                tanggal_pinjam,
                tanggal_kembali,
            });
        };

        const onFormSubmit = (e, modalEl) => {
            e.preventDefault();

            // Get value from input
            const data = getFormData(modalEl);

            // kirim data di bawah
            $.ajax({
                    url: '/input-data-pinjam',
                    type: "POST",
                    headers: headers,
                    data: {
                        id_pinjam   : data.id_peminjaman,
                        nim         : data.nim,
                        kode_buku   : data.kode_buku,
                        tgl_pinjam  : data.tanggal_pinjam,
                        tgl_kembali : data.tanggal_kembali,
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
                    // ,
                    // error: function (data, textStatus, errorThrown) {
                    //     data = JSON.parse(JSON.stringify(data));
                    //     alert(data.message);
                    //     console.log(data.err_message);
                    // },
                });


            // if (data.mode === "add") {
            //     swalOption = {
            //         title: "Buku berhasil Dipinjam!",
            //         icon: "success",
            //         button: "Oke!",
            //     };
            // }

            // if (data.mode === "edit") {
            //     swalOption = {
            //         title: "Buku berhasil diedit!",
            //         icon: "success",
            //         button: "Oke!",
            //     };
            // }

            // swal(swalOption);

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
                    const nim_peminjam = document.querySelector("#nim_peminjam").value;

                    if(user.some(user => user.nim == nim_peminjam) == false){
                        
                        alert("Tidak ada member dengan NIM " + nim_peminjam);
                        
                        location.reload();
                    
                    }else{

                        formModal.querySelector("#nim").value = nim_peminjam;
                        document.getElementById("form_nim").innerHTML = nim_peminjam;
                        document.getElementById("form_nama_peminjam").innerHTML = user.find(x => x.nim == parseInt(nim_peminjam)).username;
                        
                        let total_pinjam = 1;
                
                        if(pinjam.some(pinjam => pinjam.nim == nim_peminjam) == true){
                            for(i=0; i<pinjam.length; i++){
                                if(pinjam[i].nim == nim_peminjam){
                                    total_pinjam++;
                                }        
                            }
                        }

                        formModal.querySelector("#id_peminjaman").value = `${nim_peminjam}${total_pinjam}`;
                        document.getElementById("form_id_peminjaman").innerHTML = `ID peminjaman: ${nim_peminjam}${total_pinjam}`;
                        
                        formModal.querySelector("#tanggal_pinjam").value = getDate().formattedDate;
                        document.getElementById("form_tgl_pinjam").innerHTML = getDate().tgl_pinjam;
                        
                        formModal.querySelector("#tanggal_kembali").value = getDate().formattedDate1;
                        document.getElementById("form_tgl_kembali").innerHTML = getDate().tgl_kembali;

                        alert("kamu di halaman kode buku, NIM anda " + nim_peminjam);
                    
                    }
                }
                if (window.Jar.stepIndex + 1 === 2) {
                    const kode_buku = document.querySelector("#kode_buku").value;
                    if(buku.some(buku => buku.kode_buku == kode_buku) == false){

                        alert("Tidak ada buku dengan kode " + kode_buku);
                        location.reload();
                    
                    }else{
                        formModal.querySelector("#kode_buku").value = kode_buku;    
                        document.getElementById("form_kode_buku").innerHTML = kode_buku;
                        document.getElementById("form_judul_buku").innerHTML = buku.find(x => x.kode_buku == kode_buku).judul_buku;

                        alert("kamu di halaman detail buku");
                    }
                }
                if(window.Jar.stepIndex + 1 === 3) {
                    alert("kamu di halaman preview");
                }
            })
    </script>
@endsection