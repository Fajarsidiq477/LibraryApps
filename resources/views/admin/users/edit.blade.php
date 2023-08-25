@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')


    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Data Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User <i class="bi bi-pencil-fill"></i></li>
            </ol>
        </nav>
    </div>

@endsection

@section('main')
<div id="dataBody" data-source="adminAddBook"></div>

    <div class="container mt-3">
        <form action="{{ route('users.update', $user->id) }}" method="POST" id="form-modal">
            @method('PUT')
            {{ csrf_field() }}
            <input type="text" id="form-mode" hidden />
            <!-- <input type="text" id="id" hidden /> -->
            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <div class="image-cover">
                        <img
                            src="{{ asset('profile_pictures/' . $user->profile_picture) }}"
                            alt="book cover"
                            id="imageInputDisplay"
                            class="img-fluid"
                        />
                        <input
                            type="file"
                            name="picture1"
                            id="imageInput"
                            accept="image/*"
                            hidden
                        />
                        <label
                            for="imageInput"
                            class="btn btn-success rounded-circle image-cover-button"
                        >
                            <i class="bi bi-pencil-fill"></i>
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
                            class="form-control custom-form-control"
                            id="id"
                            name="id"
                            value="{{ $user->id }}"
                            required
                        />
                    </div>
                    <div class="form-group mb-3">
                        <label for="namaLengkap" class="mb-2"
                            >Nama Lengkap</label
                        >
                        <input
                            type="text"
                            class="form-control custom-form-control"
                            id="name"
                            name="name"
                            value="{{ $user->name }}"
                            required
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
                            name="email"
                            value="{{ $user->email }}"
                            required
                        />
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="mb-2"
                            >Password</label
                        >
                        <input
                            type="password"
                            class="form-control custom-form-control"
                            id="password"
                            name="password"
                        />
                    </div>
                    <div class="form-group mb-3">
                        <label for="handphone" class="mb-2"
                            >Nomor Handphone
                        </label>
                        <input
                            type="number"
                            class="form-control custom-form-control"
                            id="phone"
                            name="phone"
                            value="{{ $user->phone }}"
                            required
                        />
                    </div>
                    <div class="form-group mb-3">
                        <label for="role" class="mb-2">Role</label >
                        <select name="role" id="role" class="form-select custom-form-control" required>
                        <option value="" disabled>...</option>    
                        <option value="2" @if($user->role == 2) selected @endif >Member</option>
                            <option value="1" @if($user->role == 1) selected @endif>staff</option>
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
@endsection

@section('footer')
    <script>
        const imageInput = document.querySelector('#imageInput');
        
        imageInput.addEventListener('input', (e) => {
            e.preventDefault();
            const image = e.srcElement.files[0];
            const imageInputDisplay = e.srcElement.parentElement.querySelector('img');
            var reader = new FileReader();      

            imageInputDisplay.src = "{{ asset('images/spinner.gif') }}";

            

            if(image.size > 6000000) {
                alert('gambar tidak boleh lebih dari 6 mb');
                return false;
            }


            reader.addEventListener("load", () => {
                imageInputDisplay.src = reader.result;
            }, false, );

            if (image) {
                reader.readAsDataURL(image);
            }

        });
    </script>
@endsection