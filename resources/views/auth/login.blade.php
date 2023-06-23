<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sijambu | Login</title>
        <script defer src="{{ asset('js/vendor.js') }}"></script>
        <script defer src="{{ asset('js/main.js') }}"></script>
        <link href="{{ asset('css/bundle.f17d4bb1aecc90e8c307.css') }}" rel="stylesheet"></head>
    <body>
        <main>
            <div class="container-fluid">
                <div class="row" style="min-height: 100vh">
                    <div class="col d-flex align-items-center">
                        <div class="container col-md-10 col-lg-6">
                            <div class="d-block d-sm-none text-center col">
                                <div
                                    class="row justify-content-center align-items-center"
                                >
                                    <img
                                        src="{{ asset('images/logo UPI.png') }}"
                                        alt="logo Sijambu"
                                        class="mb-4"
                                        style="width: 125px"
                                    />
                                    <div class="col-4 text-start fs-2 fw-bold">
                                        Sijambu IPAI
                                    </div>
                                </div>
                            </div>
                            <h2 class="mb-4 text-center text-md-start">
                                Masuk
                            </h2>
                            <form>
                                <div class="mb-3">
                                    <label for="email" class="form-label"
                                        >Email address</label
                                    >
                                    <!-- Hilangkan class is-invalid untuk menghilangkan merah dan message -->
                                    <input
                                        type="email"
                                        class="form-control is-invalid"
                                        id="email"
                                        aria-describedby="emailHelp"
                                    />
                                    <div class="invalid-feedback">
                                        E-Mail atau Password tidak sesuai
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label"
                                        >Password</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                    />
                                    <div
                                        id="passwordHelp"
                                        class="form-text text-end"
                                    >
                                        <a
                                            href="#"
                                            class="link-secondary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#forgetPassModal"
                                            >Lupa Password</a
                                        >
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button
                                        type="submit"
                                        class="btn btn-secondary px-5"
                                    >
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div
                        class="d-none d-sm-flex flex-column align-items-center justify-content-center col bg-primary"
                    >
                        <img
                            src="../../images/logo UPI.png"
                            alt="logo Sijambu"
                            class="col-4 col-lg-3 mb-4"
                        />
                        <h2 class="text-light">SIJAMBU IPAI</h2>
                    </div>
                </div>
            </div>
        </main>

        <!-- Forget Password Modal -->
        <div
            class="modal fade"
            id="forgetPassModal"
            tabindex="-1"
            aria-labelledby="forgetPassModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                        <h1 class="modal-title fs-5" id="forgetPassModalLabel">
                            Modal title
                        </h1>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="px-0 px-md-4">
                                <p>Input your E-Mail!</p>
                                <input
                                    type="text"
                                    class="form-control is-invalid"
                                />
                                <div class="invalid-feedback">
                                    E-Mail tidak terdaftar!
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <button
                                        type="submit"
                                        class="btn btn-secondary"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Script setelah button lupa password dipencet -->
                        <!-- <div>
                            <div class="alert alert-dark" role="alert">
                                <p>
                                    Recovery password link has been sent to
                                    [E-Mail]. Please check it out!
                                </p>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button
                                    type="button"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                    class="btn btn-secondary"
                                >
                                    Close
                                </button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Forget Password Modal -->
    </body>
</html>
