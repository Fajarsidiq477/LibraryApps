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
                                            name="name"
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
                                            name="phone"
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
@endsection

@section('script')
    <script>

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
@endsection 