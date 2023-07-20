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
        <script>
            let headers = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        </script>
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
                            @foreach($user as $item)
                                <tr class="align-middle">
                                    <td>
                                        <input type="checkbox" name="" id="" />
                                    </td>
                                    <td>1</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>0</td>
                                    <td>
                                        <a
                                            href="#"
                                            class="badge text-dark"
                                            data-bs-toggle="modal"
                                            data-bs-target="#myModal"
                                            data-bs-mode="edit"
                                            data-bs-id="{{ $item->nim }}"
                                            onclick="putEditData(id='{{$item->nim}}')"
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
                                            name="picture1"
                                            id="imageInput"
                                            accept="image/*"
                                            hidden
                                            oninput="imageStatus()"
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
                                    
                                    <input type="hidden" class="form-control custom-form-control" name="picture2" id="picture2" />
                                    <input type="hidden" class="form-control custom-form-control" name="mode" id="mode" />
                                    
                                    <div class="form-group mb-3">
                                        <label for="nim" class="mb-2"
                                            >NIM/NIP</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="nim"
                                            name="nim"
                                            required
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="namaLengkap" class="mb-2"
                                            >Nama Lengkap</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="namaLengkap"
                                            name="username"
                                            required
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
                                            name="email"
                                            required
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="mb-2"
                                            >Password</label
                                        >
                                        <input
                                            type="password"
                                            class="form-control custom-form-control"
                                            id="password"
                                            name="password"
                                            required
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
                                            name="number"
                                            required
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="role" class="mb-2">Role</label >
                                        <select name="role" id="role" class="form-select custom-form-control" required>
                                        <option value="" selected disabled>...</option>    
                                        <option value="Member">Member</option>
                                            <option value="Admin">Admin</option>
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

            let inputImage = false;

            //cek apakah gambar sudah diinput (jika di form edit untuk cek apakah gambar diganti)
            function imageStatus(){
                inputImage = true;
            }

            //Data User
            const user = [];

            $.ajax({
                url: "/get-user",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    for(i=0; i<data.data.length; i++){
                        user.push(data.data[i]);
                    }
                    console.log(user);
                }
            });

            const putEditData = (id) => {
                
                const formModal = modalEl.querySelector("#form-modal");
                document.getElementById("imageInputDisplay").src =`profile_pictures/${user.find(x => x.nim == id).profile_picture}`;

                formModal.querySelector("#nim").value           = id;
                formModal.querySelector("#picture2").value      = user.find(x => x.nim == id).profile_picture;
                formModal.querySelector("#namaLengkap").value   = user.find(x => x.nim == id).username;
                formModal.querySelector("#email").value         = user.find(x => x.nim == id).email;
                formModal.querySelector("#password").value      = user.find(x => x.nim == id).password;
                formModal.querySelector("#handphone").value     = user.find(x => x.nim == id).number;
                formModal.querySelector("#role").value          = user.find(x => x.nim == id).role;
                
                // let nama_user = user.find(x => x.nim == id).nama_user;
                // console.log(nama_user);
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

            // const getFormData = () => {
            //     const formModal = modalEl.querySelector("#form-modal");

            //     const mode = formModal.querySelector("#form-mode").value;
            //     const id = formModal.querySelector("#id").value || null;

            //     const nim = formModal.querySelector("#nim").value;
            //     const username = formModal.querySelector("#namaLengkap").value;
            //     const email = formModal.querySelector("#email").value;
            //     const password = formModal.querySelector("#password").value;
            //     const number = formModal.querySelector("#handphone").value;
            //     const role = formModal.querySelector("#role").value;

            //     return (data_form = {
            //         mode,
            //         id,
            //         nim,
            //         username,
            //         email,
            //         password,
            //         number,
            //         role,
            //     });
            // };

            const onFormSubmit = (e, modalEl) => {
                e.preventDefault();

                const formModal                         = modalEl.querySelector("#form-modal");
                const mode                              = formModal.querySelector("#form-mode").value;
                formModal.querySelector("#mode").value  = mode;

                // console.log(formModal.querySelector("#form-mode").value);
                
                if(inputImage == false){
                    //return false jika gambar kosong di form add
                    if(mode == "add"){
                        alert("Gambar tidak boleh kosong!");
                        return;
                    }
                }
                
                // Get value from input
                // const data_form = getFormData(modalEl);
                let swalOption;

                // kirim data di bawah
                $.ajax({
                    url: '/update-create-user',
                    type: "POST",
                    headers: headers,
                    data: new FormData(document.getElementById("form-modal")),
                    dataType:'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        data = JSON.parse(JSON.stringify(data));
                        if(data.error == false){
                            // alert((data.message));
                            if (mode === "add") {
                                swalOption = {
                                    title: "Pengguna berhasil dibuat!",
                                    icon: "success",
                                    button: "Oke!",
                                };
                            }
    
                            if (mode === "edit") {
                                swalOption = {
                                    title: "Pengguna berhasil diedit!",
                                    icon: "success",
                                    button: "Oke!",
                                };
                            }
    
                            swal(swalOption);

                            $('.swal-button').click(function() {
                                location.reload();
                            });
                        } else{
                            alert(data.message);   
                            console.log(data.err_message); 
                        }
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
