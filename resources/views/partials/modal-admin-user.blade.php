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
