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
                                        type="text"
                                        class="form-control custom-form-control mb-2"
                                        id="nim_peminjam"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step text-center">
                        <p class="fw-bold fs-1">Scan barcode buku!</p>
                        <i
                            class="bx bx-barcode"
                            style="font-size: 1000%; margin-top: -30px"
                        ></i>
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
                            >
                                ID Peminjaman: 0284993480
                            </p>

                            <table class="table table-borderless">
                                <div class="mb-3">
                                    <tr>
                                        <th>Peminjam</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class="">NIM/NIP</td>
                                        <td>2010031</td>
                                    </tr>

                                    <tr>
                                        <td class="">Nama Lengkap</td>
                                        <td>Fajar Sidik Setiawan</td>
                                    </tr>
                                </div>
                                <div class="mb-3">
                                    <tr>
                                        <th>Buku</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Kode</td>
                                        <td>FEWIFHEWIU23</td>
                                    </tr>

                                    <tr>
                                        <td>Judul</td>
                                        <td>
                                            Negeri Para Bedebah -
                                            Tereliye
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
                                        <td>Kamis, 8 Juni 2023</td>
                                    </tr>

                                    <tr>
                                        <td>Tanggal Kembali</td>
                                        <td>Kamis, 15 Juni 2023</td>
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
                                        id="id_buku"
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