<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sijambu | Books</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script defer src="{{ asset('js/vendor.js') }}"></script>
    <script defer src="{{ asset('js/main.js') }}"></script>
    <link href="{{ asset('css/bundle.f17d4bb1aecc90e8c307.css') }}" rel="stylesheet">
</head>
</head>

<body>
    <div class="navbar navbar-upper bg-primary py-2">
        <div class="container">
            <a class="navbar-brand text-light" href="#">SIJAMBU IPAI</a>

            <div class="col-md-6 d-none d-md-flex">
                <div class="input-group p-2">
                    <button class="btn dropdown-toggle bg-secondary text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Action before</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another action before</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </li>
                    </ul>
                    <input type="text" class="form-control" aria-label="Text input with 2 dropdown buttons" placeholder="Pencarian ...." />
                    <button class="btn bg-secondary text-light" type="button">
                        <i data-feather="search"></i>
                    </button>
                </div>
            </div>

            <div class="d-flex dropdown px-2">
                <a class="nav-link d-flex justify-content-between align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar">
                        <!-- <img
                                src="https://placehold.co/200"
                                alt="avatar"
                                class="img-fluid"
                            /> -->
                        <i data-feather="user"></i>
                    </div>

                    <div class="col text-center">
                        <i data-feather="menu"></i>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#">Akun</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <nav>
        <div class="navbar navbar-lower bg-secondary">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center" style="width: 100%">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item">
                            <a class="nav-link px-md-4" aria-current="page" href="#">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-md-4 active" href="/admin/books.html">
                                <i data-feather="book"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-md-4" href="/admin/users.html">
                                <i data-feather="user"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-md-4" href="/admin/lend-books.html">
                                <i data-feather="clock"></i>
                            </a>
                        </li>
                    </ul>
                    <div>
                        <a href="#" class="badge bg-primary d-none d-md-flex align-items-center justify-content-center" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-mode="add">
                            <span>Tambah Buku</span>
                            <i data-feather="plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile appearance -->
        <div class="container">
            <div class="searchbar-mobile d-md-none input-group py-2">
                <button class="btn dropdown-toggle bg-secondary text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="#">Action before</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another action before</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </li>
                </ul>
                <input type="text" class="form-control" aria-label="Text input with 2 dropdown buttons" placeholder="Pencarian ...." />
                <button class="btn bg-secondary text-light" type="button">
                    <i data-feather="search"></i>
                </button>
            </div>

            <div class="mt-2">
                <a href="#" class="badge bg-primary d-flex align-items-center d-md-none py-2 justify-content-center" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-mode="add">
                    <span>Tambah Buku</span>
                    <i data-feather="plus"></i>
                </a>
            </div>
        </div>
        <!-- End mobile appearance -->
    </nav>

    <main>
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
                        @foreach($buku as $item)
                        <tr class="align-middle">
                            <td>
                                <input type="checkbox" name="" id="" />
                            </td>
                            <td>
                                <img src="cover_images/{{ $item->cover_depan }}" alt="Book cover" width="100"/>
                            </td>
                            <td>{{ $item->kode_buku }}</td>
                            <td>{{ $item->judul_buku }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->status_buku }}</td>
                            <td>
                                <a href="#" class="badge text-dark" data-bs-toggle="modal" data-bs-target="#myModal" data-bs-mode="edit" data-bs-id="1" onclick="dataEdit(id = '{{ $item->kode_buku }}')">
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
    </main>

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
                                    <img src="http://placehold.co/160x225" alt="book cover" id="imageInputDisplay" class="img-fluid" width="165"/>
                                    <input type="file" name="" id="imageInput" accept="image/*" hidden oninput="imageStatus()"/>
                                    <label for="imageInput" class="btn btn-success rounded-circle image-cover-button">
                                        <i data-feather="edit"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label for="kode" class="mb-2">Kode Buku</label>
                                    <input type="text" class="form-control custom-form-control" id="kode" required />
                                    <!-- <div class="invalid-feedback">
                                        Kode buku harus lebih dari 100
                                    </div> -->
                                </div>
                                <div class="form-group mb-3">
                                    <label for="judul" class="mb-2">Judul Buku</label>
                                    <input type="text" class="form-control custom-form-control" id="judul" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="penulis" class="mb-2">Penulis</label>
                                    <input type="text" class="form-control custom-form-control" id="penulis" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="kategori" class="mb-2">Kategori</label>
                                    <input type="text" class="form-control custom-form-control" id="kategori" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="penerbit" class="mb-2">Penerbit</label>
                                    <input type="text" class="form-control custom-form-control" id="penerbit" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="editor" class="mb-2">Editor</label>
                                    <input type="text" class="form-control custom-form-control" id="editor" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="penerjemah" class="mb-2">Penerjemah</label>
                                    <input type="text" class="form-control custom-form-control" id="penerjemah" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="bahasa" class="mb-2">Bahasa</label>
                                    <input type="text" class="form-control custom-form-control" id="bahasa" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tahunTerbit" class="mb-2">Tahun Terbit</label>
                                    <input type="number" class="form-control custom-form-control" id="tahunTerbit" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jumlahHalaman" class="mb-2">Jumlah Halaman</label>
                                    <input type="text" class="form-control custom-form-control" id="jumlahHalaman" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="volume" class="mb-2">Volume</label>
                                    <input type="number" class="form-control custom-form-control" id="volume" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jenis" class="mb-2">Jenis</label>
                                    <input type="text" class="form-control custom-form-control" id="jenis" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="status" class="mb-2">Status Buku</label>
                                    <select name="status" id="status" class="form-select custom-form-control" required>
                                        <option selected disabled value = "">---</option>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Dipinjam">Dipinjam</option>
                                        <option value="Hilang">Hilang</option>
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

    <!-- Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- SweetAlert for deleteconfirmation -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        // icons
        feather.replace();

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
            url: "/get-buku",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                    for(i=0; i<data.data.length; i++){
                        if(id == data.data[i].kode_buku){
                            const formModal = modalEl.querySelector("#form-modal");
                            document.getElementById("imageInputDisplay").src =`cover_images/${data.data[i].cover_depan}`;
                            formModal.querySelector("#kode").value           = data.data[i].kode_buku;
                            formModal.querySelector("#judul").value          = data.data[i].judul_buku;
                            formModal.querySelector("#penulis").value        = data.data[i].penulis;
                            formModal.querySelector("#kategori").value       = data.data[i].kategori;
                            formModal.querySelector("#penerbit").value       = data.data[i].penerbit;
                            formModal.querySelector("#editor").value         = data.data[i].editor;
                            formModal.querySelector("#penerjemah").value     = data.data[i].penerjemah;
                            formModal.querySelector("#bahasa").value         = data.data[i].bahasa;
                            formModal.querySelector("#tahunTerbit").value    = data.data[i].thn_terbit;
                            formModal.querySelector("#jumlahHalaman").value  = data.data[i].jml_hlm;
                            formModal.querySelector("#volume").value         = data.data[i].volume;
                            formModal.querySelector("#jenis").value          = data.data[i].jenis;
                            formModal.querySelector("#status").value         = data.data[i].status_buku;
                        }
                    }
                }
            });
        }

        // bs.modal.show triggered
        const modalEl = document.querySelector("#myModal");

        const getFormData = () => {
            const formModal     = modalEl.querySelector("#form-modal");

            const mode          = formModal.querySelector("#form-mode").value;
            const id            = formModal.querySelector("#id").value || null;

            let image;

            if(inputImage == false){
                //mengambil nama file gambar yang belum diganti
                if(mode == "add"){
                    //return false jika gambar kosong di form add
                    alert("Gambar tidak boleh kosong!");
                    return;
                }else{
                    image       = document.getElementById("imageInputDisplay").src.split("/").pop();
                }

            }else{
                //mengambil nama file gambar jika sudah input gambar
                let input   = document.getElementById('imageInput');
                image       = input.files[0].name;
            }

            const kode          = formModal.querySelector("#kode").value;
            const judul         = formModal.querySelector("#judul").value;
            const penulis       = formModal.querySelector("#penulis").value;
            const kategori      = formModal.querySelector("#kategori").value;
            const penerbit      = formModal.querySelector("#penerbit").value;
            const editor        = formModal.querySelector("#editor").value;
            const penerjemah    = formModal.querySelector("#penerjemah").value;
            const bahasa        = formModal.querySelector("#bahasa").value;
            const tahunTerbit   = formModal.querySelector("#tahunTerbit").value;
            const jumlahHalaman = formModal.querySelector("#jumlahHalaman").value;
            const volume        = formModal.querySelector("#volume").value;
            const jenis         = formModal.querySelector("#jenis").value;
            const status        = formModal.querySelector("#status").value;

            return (data = {
                mode, id, kode, judul, penulis, kategori, penerbit, editor, penerjemah,
                bahasa, tahunTerbit, jumlahHalaman, volume, jenis, status, image
            });
        };

        const onFormSubmit = (e, modalEl) => {
            e.preventDefault();

            // Get value from input
            const data = getFormData(modalEl);

            if(data == undefined){
                return;
            } else{
                // kirim data di bawah
                console.log(data.mode,          data.kode,          data.judul,
                            data.penulis,       data.kategori,      data.penerbit,
                            data.editor,        data.penerjemah,    data.bahasa,
                            data.tahunTerbit,   data.jumlahHalaman, data.volume,
                            data.jenis,         data.status,        data.image);
                
                if (data.mode === "add") {
                    swalOption = {
                        title: "Buku berhasil dibuat!",
                        icon: "success",
                        button: "Oke!",
                    };
                }
    
                if (data.mode === "edit") {
                    swalOption = {
                        title: "Buku berhasil diedit!",
                        icon: "success",
                        button: "Oke!",
                    };
                }
                swal(swalOption);
            }


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
</body>

</html>