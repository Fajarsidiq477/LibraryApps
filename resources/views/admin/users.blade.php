<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sijambu | Books</title>
        <script defer src="{{ asset('js/vendor.js') }}"></script>
        <script defer src="{{ asset('js/main.js') }}"></script>
        <link href="{{ asset('css/bundle.f17d4bb1aecc90e8c307.css') }}" rel="stylesheet"></head>
    <body>
        <div class="navbar navbar-upper bg-primary py-2">
            <div class="container">
                <a class="navbar-brand text-light" href="#">SIJAMBU IPAI</a>

                <div class="col-md-6 d-none d-md-flex">
                    <div class="input-group p-2">
                        <button
                            class="btn dropdown-toggle bg-secondary text-light"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Kategori
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#"
                                    >Action before</a
                                >
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    >Another action before</a
                                >
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    >Something else here</a
                                >
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    >Separated link</a
                                >
                            </li>
                        </ul>
                        <input
                            type="text"
                            class="form-control"
                            aria-label="Text input with 2 dropdown buttons"
                            placeholder="Pencarian ...."
                        />
                        <button
                            class="btn bg-secondary text-light"
                            type="button"
                        >
                            <i data-feather="search"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex dropdown px-2" role="search">
                    <a
                        class="nav-link d-flex justify-content-between align-items-center"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
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
                    <div
                        class="d-flex justify-content-between align-items-center"
                        style="width: 100%"
                    >
                        <ul class="navbar-nav flex-row">
                            <li class="nav-item">
                                <a
                                    class="nav-link px-md-4"
                                    aria-current="page"
                                    href="#"
                                >
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link px-md-4"
                                    href="/admin/books.html"
                                >
                                    <i data-feather="book"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link px-md-4 active"
                                    href="/admin/users.html"
                                >
                                    <i data-feather="user"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link px-md-4"
                                    href="/admin/lend-books.html"
                                >
                                    <i data-feather="clock"></i>
                                </a>
                            </li>
                        </ul>
                        <div>
                            <a
                                href="#"
                                class="badge bg-primary d-none d-md-flex align-items-center btn-add-account justify-content-center"
                                style="text-decoration: none"
                                data-bs-toggle="modal"
                                data-bs-target="#myModal"
                                data-bs-mode="add"
                            >
                                <span>Tambah Akun</span>
                                <i data-feather="plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile appearance -->
            <div class="container">
                <div class="searchbar-mobile d-md-none input-group py-2">
                    <button
                        class="btn dropdown-toggle bg-secondary text-light"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        Kategori
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="#">Action before</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                                >Another action before</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                                >Something else here</a
                            >
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </li>
                    </ul>
                    <input
                        type="text"
                        class="form-control"
                        aria-label="Text input with 2 dropdown buttons"
                        placeholder="Pencarian ...."
                    />
                    <button class="btn bg-secondary text-light" type="button">
                        <i data-feather="search"></i>
                    </button>
                </div>

                <div class="mt-2">
                    <a
                        href="#"
                        class="badge bg-primary d-flex align-items-center d-md-none py-2 justify-content-center"
                        style="text-decoration: none"
                        data-bs-toggle="modal"
                        data-bs-target="#myModal"
                        data-bs-mode="add"
                    >
                        <span>Tambah Akun</span>
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
                                <th class="py-4">NIM</th>
                                <th class="py-4">Nama Lengkap</th>
                                <th class="py-4">Role</th>
                                <th class="py-4">Nomor HP</th>
                                <th class="py-4">Denda</th>
                                <th class="py-4">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>
                                    <input type="checkbox" name="" id="" />
                                </td>
                                <td>1</td>
                                <td>2010031</td>
                                <td>Fajar Sidik Setiawan</td>
                                <td>Anggota</td>
                                <td>0819-1051-4970</td>
                                <td>0</td>
                                <td>
                                    <a
                                        href="#"
                                        class="badge text-dark"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        data-bs-mode="edit"
                                        data-bs-id="1"
                                    >
                                        <i data-feather="edit"></i>
                                    </a>

                                    <a
                                        href="#"
                                        class="badge text-dark"
                                        onclick="deleteData(1)"
                                    >
                                        <i data-feather="trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr class="align-middle">
                                <td>
                                    <input type="checkbox" name="" id="" />
                                </td>
                                <td>2</td>
                                <td>2010031</td>
                                <td>Fajar Sidik Setiawan</td>
                                <td>Anggota</td>
                                <td>0819-1051-4970</td>
                                <td>0</td>
                                <td>
                                    <a
                                        href="#"
                                        class="badge text-dark"
                                        data-bs-toggle="modal"
                                        data-bs-target="#myModal"
                                        data-bs-mode="edit"
                                        data-bs-id="2"
                                    >
                                        <i data-feather="edit"></i>
                                    </a>

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
        </main>

        <!-- Add / Edit Modal -->
        <div
            class="modal fade"
            id="myModal"
            tabindex="-1"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
                <div
                    class="modal-content"
                    style="border: 3px solid red; min-height: 100vh"
                >
                    <div class="modal-header bg-secondary">
                        <button
                            type="button"
                            class="btn-admin-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                            <i data-feather="chevron-left"></i>
                        </button>
                        <h1
                            class="modal-title fs-5 text-light"
                            id="myModalLabel"
                        ></h1>
                    </div>
                    <div class="modal-body py-4 px-2 px-sm-3 px-md-5">
                        <form action="#" id="form-modal">
                            <input type="text" id="form-mode" hidden />
                            <input type="text" id="id" hidden />
                            <div class="row">
                                <div class="col-12 col-md-6 text-center">
                                    <div class="image-cover">
                                        <img
                                            src="http://placehold.co/160x225"
                                            alt="book cover"
                                            id="imageInputDisplay"
                                            class="img-fluid"
                                        />
                                        <input
                                            type="file"
                                            name=""
                                            id="imageInput"
                                            accept="image/*"
                                            hidden
                                        />
                                        <label
                                            for="imageInput"
                                            class="btn btn-success rounded-circle image-cover-button"
                                        >
                                            <i data-feather="edit"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="nim" class="mb-2"
                                            >NIM/NIP</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control is-invalid"
                                            id="nim"
                                        />
                                        <div class="invalid-feedback">
                                            NIM tidak boleh lebih dari 16
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="namaLengkap" class="mb-2"
                                            >Nama Lengkap</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="namaLengkap"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="mb-2"
                                            >E-Mail</label
                                        >
                                        <input
                                            type="email"
                                            class="form-control custom-form-control"
                                            id="email"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="handphone" class="mb-2"
                                            >Nomor Handphone</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control custom-form-control"
                                            id="handphone"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="role" class="mb-2"
                                            >Role</label
                                        >
                                        <select
                                            name="role"
                                            id="role"
                                            class="form-select custom-form-control"
                                        >
                                            <option value="">Anggota</option>
                                            <option value="">Admin</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 text-end">
                                        <button
                                            type="submit"
                                            class="btn btn-dark"
                                        >
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

            const getFormData = () => {
                const formModal = modalEl.querySelector("#form-modal");

                const mode = formModal.querySelector("#form-mode").value;
                const id = formModal.querySelector("#id").value || null;

                const nim = formModal.querySelector("#nim").value;
                const namaLengkap =
                    formModal.querySelector("#namaLengkap").value;
                const email = formModal.querySelector("#email").value;
                const handphone = formModal.querySelector("#handphone").value;
                const role = formModal.querySelector("#role").value;

                return (data = {
                    mode,
                    id,
                    nim,
                    namaLengkap,
                    email,
                    handphone,
                    role,
                });
            };

            const onFormSubmit = (e, modalEl) => {
                e.preventDefault();

                // Get value from input
                const data = getFormData(modalEl);
                let swalOption;

                // kirim data di bawah
                if (data.mode === "add") {
                    swalOption = {
                        title: "Pengguna berhasil dibuat!",
                        icon: "success",
                        button: "Oke!",
                    };
                }

                if (data.mode === "edit") {
                    swalOption = {
                        title: "Pengguna berhasil diedit!",
                        icon: "success",
                        button: "Oke!",
                    };
                }
                swal(swalOption);

                // tutup modal ketika kode add / edit berhasil dieksekusi
                document.querySelector(".btn-admin-close").click();
            };

            // Event when modal opened
            modalEl.addEventListener("show.bs.modal", (event) => {
                window.Jar.whenModalShow(modalEl, "users", event);

                // Ketika input file image menerima uploadan
                const imageInput = document.querySelector("#imageInput");
                const imageInputDisplay =
                    document.querySelector("#imageInputDisplay");
                // Event when imageinput receive a change
                imageInput.addEventListener("change", function () {
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
