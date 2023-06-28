@extends('layouts.master')

@section('header')
    @include('partials.navbar')
@endsection

@section('main')
    <div class="container">
        <div class="row mt-5 pb-5 profile-row">
            <div class="col-12 col-md-6 left">
                <div class="card p-4 text-center">
                    <div class="profile-img">
                        <img
                            src="http://placehold.co/200x200"
                            alt="profile-img"
                        />
                        <button class="btn btn-secondary">
                            <i data-feather="edit"></i>
                        </button>
                    </div>
                    <h3 class="profile-name mt-3">
                        Fajar Sidik Setiawan
                    </h3>
                    <p class="profile-nim">2010031</p>
                </div>
                <div class="d-grid">
                    <button
                        class="btn btn-secondary active"
                        id="btn-profile"
                        onclick="ProfileTabChange('profile')"
                    >
                        Data Profil
                    </button>
                </div>
                <div class="d-grid">
                    <button
                        class="btn btn-secondary"
                        id="btn-password"
                        onclick="ProfileTabChange('password')"
                    >
                        Ganti Kata Sandi
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0 right">
                <div class="card p-4 justify-content-center">
                    <div id="tab-profile">
                        <form action="">
                            <div class="form-group mb-3">
                                <label for="fullName" class="mb-2"
                                    >NAMA LENGKAP</label
                                >
                                <input
                                    type="text"
                                    id="fullName"
                                    class="form-control"
                                    value="Fajar Sidik Setiawan"
                                    disabled
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label for="NIM" class="mb-2"
                                    >NIM</label
                                >
                                <input
                                    type="text"
                                    id="NIM"
                                    class="form-control"
                                    value="2010031"
                                    disabled
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="mb-2"
                                    >E-Mail</label
                                >
                                <input
                                    type="email"
                                    id="email"
                                    class="form-control"
                                    value="fajar@upi.edu"
                                    disabled
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone" class="mb-2"
                                    >No. Handphone</label
                                >
                                <input
                                    type="number"
                                    id="phone"
                                    class="form-control"
                                    value="081910514970"
                                    disabled
                                />
                            </div>
                        </form>
                    </div>

                    <div class="d-none" id="tab-change-password">
                        <form action="">
                            <div class="form-group mb-3">
                                <label for="oldPassword" class="mb-2"
                                    >Kata Sandi Lama</label
                                >
                                <input
                                    type="text"
                                    id="oldPassword"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label for="newPassword" class="mb-2"
                                    >Kata Sandi Baru</label
                                >
                                <input
                                    type="text"
                                    id="newPassword"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label
                                    for="confirmNewPassword"
                                    class="mb-2"
                                    >Konfirmasi Kata Sandi Baru</label
                                >
                                <input
                                    type="confirmNewPassword"
                                    id="confirmNewPassword"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div
                                class="form-group d-flex justify-content-end"
                            >
                                <button
                                    type="submit"
                                    class="btn btn-secondary"
                                >
                                    Ganti
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
   <script>
        const ProfileTabChange = (mode) => {
            const btnProfile = document.getElementById("btn-profile");
            const btnPassword = document.getElementById("btn-password");

            const tabProfile = document.getElementById("tab-profile");
            const tabChangePassword = document.getElementById(
                "tab-change-password"
            );

            if (mode === "profile") {
                btnProfile.classList.add("active");
                btnPassword.classList.remove("active");

                tabProfile.classList.remove("d-none");
                tabChangePassword.classList.add("d-none");
            } else {
                btnProfile.classList.remove("active");
                btnPassword.classList.add("active");

                tabProfile.classList.add("d-none");
                tabChangePassword.classList.remove("d-none");
            }
        };
    </script>
@endsection