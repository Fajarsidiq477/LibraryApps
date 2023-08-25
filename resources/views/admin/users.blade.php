@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
    <div class="container my-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <span>Tambah User</span>
            <i class="bi bi-plus-square-fill"></i>
        </a>
        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success.message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-2">
                {{ session('error.message') }}
            </div>
        @endif
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
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $i => $user)
                        <tr class="align-middle">
                            <td>
                                <input type="checkbox" name="" id="" />
                            </td>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            @if($user->role == '0')
                                <td>Super Admin</td>
                            @elseif($user->role == '1')
                                <td>Admin</td>
                            @elseif($user->role == '2')
                                <td>Member</td>
                            @endif
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a
                                    href="{{ route('users.edit', $user->id) }}"
                                    class="badge text-dark btn btn-warning text-white"                                  
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <a
                                    href="#"
                                    class="badge text-dark btn btn-danger text-white"
                                    onclick="deleteData('{{ $user->id }}')"
                                >
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        //delete confirmation
            const deleteData = (id) => {
                const confirm = window.confirm('Apakah yakin ingin menghapus data?')

                if(confirm) {
                    return alert('data dihapus');
                }

                return alert('batal menghapus');
            };
    </script>




    {{-- <!-- Add / Edit Modal -->
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
                            <!-- <input type="text" id="id" hidden /> -->
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
                                            id="id"
                                            name="id"
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
                                            id="name"
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
                                            id="phone"
                                            name="phone"
                                            required
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="role" class="mb-2">Role</label >
                                        <select name="role" id="role" class="form-select custom-form-control" required>
                                        <option value="" selected disabled>...</option>    
                                        <option value="2">Member</option>
                                            <option value="1">Admin</option>
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
    <!-- End Add / Edit Modal --> --}}
@endsection
{{-- 
@section('script')
    <script>

    

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
                // console.log(user);
            }
        });

        const putEditData = (id) => {
            
            const formModal = modalEl.querySelector("#form-modal");
            document.getElementById("imageInputDisplay").src =`http://localhost:8000/profile_pictures/${user.find(x => x.id == id).profile_picture}`;

            formModal.querySelector("#id").value            = id;
            formModal.querySelector("#picture2").value      = user.find(x => x.id == id).profile_picture;
            formModal.querySelector("#name").value          = user.find(x => x.id == id).name;
            formModal.querySelector("#email").value         = user.find(x => x.id == id).email;
            formModal.querySelector("#password").value      = "Rahasia";
            formModal.querySelector("#password").disabled   = true;
            formModal.querySelector("#phone").value         = user.find(x => x.id == id).phone;
            
            if(user.find(x => x.id == id).role == 1){
                formModal.querySelector("#role").value       = "1";
            }
            else if(user.find(x => x.id == id).role == 2){
                formModal.querySelector("#role").value       = "2";
            }
            
            
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

    </script>
@endsection  --}}