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
    @include('partials/modal-admin-lend-book')
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
            const id_peminjaman =
                formModal.querySelector("#id_peminjaman").value || null;

            const nim = formModal.querySelector("#nim").value;
            const id_buku = formModal.querySelector("#id_buku").value;
            const tanggal_pinjam =
                formModal.querySelector("#tanggal_pinjam").value;
            const tanggal_kembali =
                formModal.querySelector("#tanggal_kembali").value;

            return (data = {
                mode,
                id_peminjaman,
                nim,
                id_buku,
                tanggal_pinjam,
                tanggal_kembali,
            });
        };

        const onFormSubmit = (e, modalEl) => {
            e.preventDefault();

            // Get value from input
            const data = getFormData(modalEl);

            // kirim data di bawah
            // kirim data di bawah
            if (data.mode === "add") {
                swalOption = {
                    title: "Buku berhasil Dipinjam!",
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
                const nim_peminjam =
                    document.querySelector("#nim_peminjam").value;

                alert("kamu di halaman barcode, nim mu " + nim_peminjam);
            }
            if (window.Jar.stepIndex + 1 === 2) {
                alert("kamu di halaman detail buku");
            }
            if (window.Jar.stepIndex + 1 === 3) {
                alert("kamu di halaman preview");
            }
        });
    </script>
@endsection