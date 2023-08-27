@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection
    
@section('main')

    <div id="dataBody" data-source=""></div>

    <div class="container">
                <div class="row mt-5 pb-5 profile-row">
                    <div class="col-12 col-md-6 left">
                        <profile-card profilePictureWithUrl="{{ asset('storage/avatars/'. Auth::user()->profile_picture) }}"></profile-card>
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
                                            value="{{ Auth::user()->name }}"
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
                                            value="{{ Auth::user()->id }}"
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
                                            value="{{ Auth::user()->email }}"
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
                                            value="{{ Auth::user()->phone }}"
                                            disabled
                                        />
                                    </div>
                                </form>
                            </div>

                            <div class="d-none" id="tab-change-password">
                                <form action="" id="form-change-password">
                                    <div id="message"></div>

                                    <div class="form-group mb-3">
                                        <label for="oldPassword" class="mb-2"
                                            >Kata Sandi Lama</label
                                        >
                                        <input
                                            type="password"
                                            id="oldPassword"
                                            name="oldPassword"
                                            class="form-control"
                                            required
                                        />
                                        
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="newPassword" class="mb-2"
                                            >Kata Sandi Baru</label
                                        >
                                        <input
                                            type="password"
                                            id="newPassword"
                                            name="newPassword"
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
                                            type="password"
                                            id="confirmNewPassword"
                                            name="confirmNewPassword"
                                            class="form-control"
                                            required
                                        />
                                    </div>
                                    <div
                                        class="form-group d-flex justify-content-end"
                                    >
                                        <button
                                            type="submit"
                                            class="btn bg-secondary text-white"
                                        >
                                            Simpan
                                        </button>

                                        
                                    </div>
                                </form>
                                <form action="{{ route('logout') }}" method="post" id="changePasswordLogout" class="d-none">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('footer')
    <script>

        const formChangePassword = document.querySelector("#form-change-password");


            formChangePassword.addEventListener("submit", (e) => {
                e.preventDefault();

                $.ajax({
                    url: '{{ route("user.change.password") }}',
                    type: "POST",
                    data: new FormData(formChangePassword),
                    dataType:'JSON',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (data) => {
                        const display = formChangePassword.querySelector('#message');

                        if(data.error == 'true') {
                            display.innerHTML = `
                                <div class="alert alert-danger" role="alert">
                                    ${data.message}    
                                </div>
                            `;
                        } else {
                            display.innerHTML = `
                                <div class="alert alert-success" role="alert">
                                    ${data.message}
                                    <p>Anda akan logout sebentar lagi!</p>
                                </div>
                            `;

                            setTimeout(() => {
                                const formLogout = document.querySelector('#changePasswordLogout');
                                formLogout.submit();
                            }, 3000);
                            
                        }
                    }
                });

          

                
            });
    </script>
@endsection
 