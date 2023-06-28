<!-- Add / Edit Modal -->
        <div
            class="modal fade"
            id="myModal"
            tabindex="-1"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
                <div class="modal-content" style="min-height: 100vh">
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
                                        <label for="kode" class="mb-2"
                                            >Kode Buku</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control is-invalid"
                                            id="kode"
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
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tahunTerbit" class="mb-2"
                                            >Tahun Terbit</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control custom-form-control"
                                            id="tahunTerbit"
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jumlahHalaman" class="mb-2"
                                            >Jumlah Halaman</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control custom-form-control"
                                            id="jumlahHalaman"
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
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="status" class="mb-2"
                                            >Status Buku</label
                                        >
                                        <select
                                            name="status"
                                            id="status"
                                            class="form-select custom-form-control"
                                        >
                                            <option value="">---</option>
                                            <option value="">Tersedia</option>
                                            <option value="">Dipinjam</option>
                                            <option value="">Hilang</option>
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