@extends('layouts.master')

@section('header')
    @include('partials.navbar-admin')
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
@endsection

@section('footer')
    @include('partials.modal-admin-user')
@endsection

@section('script')
    <script>
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
@endsection