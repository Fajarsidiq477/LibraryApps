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
                        <th class="py-4">Penulis Buku</th>
                        <th class="py-4">Status Buku</th>
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book as $item)
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" name="" id="" />
                        </td>
                        <td>
                            <img src="{{ asset('cover_images/' . $item->cover) }}" alt="Book cover" width="100"/>
                        </td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->author }}</td>
                        <td>{{ $item->book_status }}</td>
                        <td>
                            <a href="#" class="badge text-dark" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-mode="edit" data-bs-id="1" onclick="dataEdit(id = '{{ $item->book_code }}')">
                                <i data-feather="edit"></i>
                            </a>

                            <a href="#" class="badge text-dark" onclick="deleteData(1)">
                                <i data-feather="trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
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
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
                <div class="modal-content" style="min-height: 100vh">
                    <div class="modal-header bg-secondary">
                        <button type="button" class="btn-admin-close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="chevron-left"></i>
                        </button>
                        <h1 class="modal-title fs-5 text-light"></h1>
                    </div>
                    <div class="modal-body py-4 px-2 px-sm-3 px-md-5">
                        <form action="#" id="form-modal">
                            <input type="text" id="form-mode" hidden />
                            <input type="text" id="id" hidden />

                            <div class="row">
                                <div class="col-12 col-md-6 text-center">
                                    <div class="image-cover">
                                        <img src="http://placehold.co/160x225" alt="book cover" name="imageInputDisplay" id="imageInputDisplay" class="img-fluid" width="165"/>
                                        <input type="file" name="cover1" id="imageInput" accept="image/*" hidden oninput="imageStatus()"/>
                                        <label for="imageInput" class="btn btn-success rounded-circle image-cover-button">
                                            <i data-feather="edit"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <!-- <div class="form-group mb-3"> -->
                                        <input type="hidden" class="form-control custom-form-control" name="cover2" id="cover2" />
                                        <input type="hidden" class="form-control custom-form-control" name="mode" id="mode" />
                                    <!-- </div> -->
                                    <div class="form-group mb-3">
                                        <label for="kode" class="mb-2">Kode Buku</label>
                                        <input type="text" class="form-control custom-form-control" name="book_code" id="book_code" required />
                                        <!-- <div class="invalid-feedback">
                                            Kode buku harus lebih dari 100
                                        </div> -->
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="judul" class="mb-2">Judul Buku</label>
                                        <input type="text" class="form-control custom-form-control" name="title" id="title" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="penulis" class="mb-2">Penulis</label>
                                        <input type="text" class="form-control custom-form-control" name="author" id="author" required />
                                    </div>
                                    <!-- <div class="form-group mb-3">
                                        <label for="kategori" class="mb-2">Kategori</label>
                                        <input type="text" class="form-control custom-form-control" name="kategori" id="kategori" required />
                                    </div> -->
                                    <div class="form-group mb-3">
                                        <label for="penerbit" class="mb-2">Penerbit</label>
                                        <input type="text" class="form-control custom-form-control" name="publisher" id="publisher" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="editor" class="mb-2">Editor</label>
                                        <input type="text" class="form-control custom-form-control" name="editor" id="editor" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="penerjemah" class="mb-2">Penerjemah</label>
                                        <input type="text" class="form-control custom-form-control" name="translator" id="translator" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="bahasa" class="mb-2">Bahasa</label>
                                        <input type="text" class="form-control custom-form-control" name="language" id="language" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tahunTerbit" class="mb-2">Tahun Terbit</label>
                                        <input type="number" class="form-control custom-form-control" name="publication_year" id="publication_year" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jumlahHalaman" class="mb-2">Jumlah Halaman</label>
                                        <input type="number" class="form-control custom-form-control" name="page" id="page" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="volume" class="mb-2">Volume</label>
                                        <input type="number" class="form-control custom-form-control" name="volume" id="volume" />
                                    </div>
                                    <!-- <div class="form-group mb-3">
                                        <label for="jenis" class="mb-2">Jenis</label>
                                        <input type="text" class="form-control custom-form-control" name="jenis" id="jenis" />
                                    </div> -->
                                    <div class="form-group mb-3">
                                        <label for="status" class="mb-2">Jenis Buku</label>
                                        <select name="type" id="type" class="form-select custom-form-control" required>
                                            <option selected disabled value = "">---</option>
                                            <option value="0">R</option>
                                            <option value="1">Non R</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="status" class="mb-2">Status Buku</label>
                                        <select name="book_status" id="book_status" class="form-select custom-form-control" required>
                                            <option selected disabled value = "">---</option>
                                            <option value="0">Tersedia</option>
                                            <option value="1">Dipinjam</option>
                                            <option value="2">Hilang</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 text-end">
                                        <button type="submit" class="btn btn-dark">
                                            Selesai
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Add / Edit Modal -->
@endsection

@section('script')
    <script>
        let inputImage = false;

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

                    location.reload();

                    // Script jika data dihapus di bawah sini
                } else {
                    swal("Data tidak dihapus!");
                }
            });
        };

        //cek apakah gambar sudah diinput (jika di form edit untuk cek apakah gambar diganti)
        function imageStatus(){
            inputImage = true;
        }

        //data edit
        function dataEdit(id){
            $.ajax({
            url: "/get-book",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                    for(i=0; i<data.data.length; i++){
                        if(id == data.data[i].book_code){
                            const formModal = modalEl.querySelector("#form-modal");
                            document.getElementById("imageInputDisplay").src    =`http://localhost:8000/cover_images/${data.data[i].cover}`;
                            formModal.querySelector("#cover2").value            = data.data[i].cover;
                            formModal.querySelector("#book_code").value         = data.data[i].book_code;
                            formModal.querySelector("#title").value             = data.data[i].title;
                            formModal.querySelector("#author").value            = data.data[i].author;
                            // formModal.querySelector("#kategori").value       = data.data[i].kategori;
                            formModal.querySelector("#publisher").value         = data.data[i].publisher;
                            formModal.querySelector("#editor").value            = data.data[i].editor;
                            formModal.querySelector("#translator").value        = data.data[i].translator;
                            formModal.querySelector("#language").value          = data.data[i].language;
                            formModal.querySelector("#publication_year").value  = data.data[i].publication_year;
                            formModal.querySelector("#page").value              = data.data[i].page;
                            formModal.querySelector("#volume").value            = data.data[i].volume;
                            formModal.querySelector("#type").value              = data.data[i].type;
                            formModal.querySelector("#book_status").value       = data.data[i].book_status;
                        }
                    }
                }
            });
        }

        // bs.modal.show triggered
        const modalEl = document.querySelector("#myModal");


        const onFormSubmit = (e, modalEl) => {
            e.preventDefault();

            const formModal                         = modalEl.querySelector("#form-modal");
            const mode                              = formModal.querySelector("#form-mode").value;
            formModal.querySelector("#mode").value  = formModal.querySelector("#form-mode").value;

            if(inputImage == false){
                //return false jika gambar kosong di form add
                if(mode == "add"){
                    alert("Gambar tidak boleh kosong!");
                    return;
                }
            }

                // kirim data di bawah
                $.ajax({
                    url: '/update-create-book',
                    type: "POST",
                    data: new FormData(document.getElementById("form-modal")),
                    dataType:'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        data = JSON.parse(JSON.stringify(data));
                        if(data.error == false){
                            // alert((data.message));
                            if (mode === "add") {
                                swalOption = {
                                    title: "Buku berhasil dibuat!",
                                    icon: "success",
                                    button: "Oke!",
                                };
                            }
    
                            if (mode === "edit") {
                                swalOption = {
                                    title: "Buku berhasil diedit!",
                                    icon: "success",
                                    button: "Oke!",
                                };
                            }
    
                            swal(swalOption).then(() => {
                                // me-reload halaman saat tombol "Oke" diklik
                                location.reload();
                            });
                        }
                        // else{
                        //     alert((data.message));    
                        // }
                    },
                    error: function (data, textStatus, errorThrown) {
                        data = JSON.parse(JSON.stringify(data));
                        alert(data.message);
                        console.log(data.err_message);
                    },
                });

            // tutup modal ketika kode add / edit berhasil dieksekusi
            document.querySelector(".btn-admin-close").click();
        };

        // Event when modal opened
        modalEl.addEventListener("show.bs.modal", (event) => {
            window.Jar.whenModalShow(modalEl, "books", event);

            // Ketika input file image menerima uploadan
            const imageInput = document.querySelector("#imageInput");
            const imageInputDisplay =
                document.querySelector("#imageInputDisplay");
            // Event when imageinput receive a change
            imageInput.addEventListener("change", function() {
                const image = this.files[0];

                window.Jar.displayImage(image, imageInputDisplay);
            });
        });

        // Event when form-modal on submit
        modalEl
            .querySelector("#form-modal")
            .addEventListener("submit", (e) => onFormSubmit(e, modalEl));
    </script>
@endsection