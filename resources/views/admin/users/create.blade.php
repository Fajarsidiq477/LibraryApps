@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')


    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah User <i class="bi bi-plus-square"></i></li>
            </ol>
        </nav>
    </div>

@endsection

@section('main')
<div id="dataBody" data-source=""></div>


    <div class="container mt-3">
        <form action="{{ route('users.store') }}" method="POST" id="form-modal" enctype="multipart/form-data">

            {{ csrf_field() }}
            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <div class="image-cover">
                        <img
                            src=""
                            alt="book cover"
                            id="photoInputDisplay"
                            class="img-fluid invisible"
                        />
                        <input
                            type="file"
                            name="photo"
                            id="photoInput"
                            accept="image/*"
                            value="{{ old('photo') }}"
                            hidden
                        />
                        <label
                            for="photoInput"
                            class="btn btn-success rounded-circle image-cover-button"
                        >
                            <i class="bi bi-pencil-fill"></i>
                        </label>
                    </div>
                    @error('photo')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    
                    <div class="form-group mb-3">
                        <label for="nim" class="mb-2"
                            >NIM/NIP</label
                        >
                        <input
                            type="text"
                            class="form-control custom-form-control @error('id') is-invalid @enderror"
                            id="id"
                            name="id"
                            value="{{ old('id') }}"
                            maxlength="15"
                            required
                        />
                        @error('id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="namaLengkap" class="mb-2"
                            >Nama Lengkap</label
                        >
                        <input
                            type="text"
                            class="form-control custom-form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            maxlength="35"
                            required
                        />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="mb-2"
                            >E-Mail</label
                        >
                        <input
                            type="email"
                            class="form-control custom-form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            maxlength="30"
                            required
                        />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="mb-2"
                            >Password</label
                        >
                        <input
                            type="password"
                            class="form-control custom-form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            minlength="8"
                            maxlength="20"
                        />
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="mb-2"
                            >Konfirmasi Password</label
                        >
                        <input
                            type="password"
                            class="form-control custom-form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation"
                            name="password_confirmation"
                            minlength="8"
                            maxlength="20"
                        />
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="handphone" class="mb-2"
                            >Nomor Handphone
                        </label>
                        <input
                            type="number"
                            class="form-control custom-form-control @error('phone') is-invalid @enderror"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            maxlength="20"
                            required
                        />
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="role" class="mb-2">Role</label >
                        <select name="role" id="role" class="form-select custom-form-control @error('role') is-invalid @enderror" required>
                            <option value="">...</option>    
                            <option value="2" @if(old('role') == 2) selected @endif>Member</option>
                            <option value="1" @if(old('role') == 1) selected @endif>Staff</option>
                        </select>
                        @error('role')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
@endsection

@section('footer')
    <script>
        const photoInput = document.querySelector('#photoInput');
        
        photoInput.addEventListener('input', (e) => {
            e.preventDefault();
            const image = e.srcElement.files[0];
            const photoInputDisplay = e.srcElement.parentElement.querySelector('img');
            var reader = new FileReader();      

            photoInputDisplay.classList.remove('invisible');
            photoInputDisplay.src = "{{ asset('images/spinner.gif') }}";

            

            if(image.size > 6000000) {
                alert('gambar tidak boleh lebih dari 6 mb');
                return false;
            }


            reader.addEventListener("load", () => {
                photoInputDisplay.src = reader.result;
            }, false, );

            if (image) {
                reader.readAsDataURL(image);
            }

        });
    </script>
@endsection