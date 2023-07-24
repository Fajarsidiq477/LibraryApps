@extends('layouts.master')

@section('main')
    <div class="container-fluid">
        <div class="row" style="min-height: 100vh">
            <div class="col d-flex align-items-center">
                <div class="container col-md-10 col-lg-6">
                    <div class="d-block d-sm-none text-center col">
                        <div
                            class="row justify-content-center align-items-center"
                        >
                            <img
                                src="../../images/logo UPI.png"
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
                    <form action="{{ route('auth') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label"
                                >Email address</label
                            >
                            <!-- Hilangkan class is-invalid untuk menghilangkan merah dan message -->
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                autofocus
                                required
                                
                            />

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            @error('passwordChanged')
                                <div class="fw-bold">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"
                                >Password</label
                            >
                            <input
                                type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                required
                            />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
@endsection

@section('footer')
    <!-- Forget Password Modal -->
        <div
            class="modal fade"
            id="forgetPassModal"
            tabindex="-1"
            aria-labelledby="forgetPassModalLabel"
            aria-hidden="true">
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
@endsection