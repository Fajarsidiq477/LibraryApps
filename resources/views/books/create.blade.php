@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')


    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Data Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Buku <i class="bi bi-plus-square"></i></li>
            </ol>
        </nav>
    </div>

@endsection

@section('main')
<div id="dataBody" data-source="adminAddBook"></div>

    <div class="container mt-3">
        <form action="{{ route('books.store') }}" method="POST" id="form-modal">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <div class="image-cover">
                        <img src="http://placehold.co/160x225" alt="book cover" name="imageInputDisplay" id="imageInputDisplay" class="img-fluid" width="165"/>
                        <input type="file" name="cover1" id="imageInput" accept="image/*" hidden/>
                        <label for="imageInput" class="btn btn-success rounded-circle image-cover-button">
                            <i class="bi bi-pencil"></i>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- <div class="form-group mb-3">
                        <input type="hidden" class="form-control custom-form-control" name="cover2" id="cover2" />
                    </div> -->
                    <div class="form-group mb-3">
                        <label for="kode" class="mb-2">Kode Buku</label>
                        <input type="text" class="form-control custom-form-control" name="book_code" id="book_code" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul" class="mb-2">Judul Buku</label>
                        <input type="text" class="form-control custom-form-control" name="title" id="title" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="penulis" class="mb-2">Penulis</label>
                        <input type="text" class="form-control custom-form-control" name="author" id="author" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="penerbit" class="mb-2">Penerbit</label>
                        <input type="text" class="form-control custom-form-control" name="publisher" id="publisher" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="editor" class="mb-2">Editor</label>
                        <input type="text" class="form-control custom-form-control" name="editor" id="editor" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="penerjemah" class="mb-2">Penerjemah</label>
                        <input type="text" class="form-control custom-form-control" name="translator" id="translator" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="bahasa" class="mb-2">Bahasa</label>
                        <input type="text" class="form-control custom-form-control" name="language" id="language" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="tahunTerbit" class="mb-2">Tahun Terbit</label>
                        <input type="number" class="form-control custom-form-control" name="publication_year" id="publication_year" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="jumlahHalaman" class="mb-2">Jumlah Halaman</label>
                        <input type="number" class="form-control custom-form-control" name="page" id="page" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="volume" class="mb-2">Volume</label>
                        <input type="number" class="form-control custom-form-control" name="volume" id="volume" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="mb-2">Jenis Buku</label>
                        <select name="type" id="type" class="form-select custom-form-control" required>
                            <option selected disabled value = "">---</option>
                            <option value="0">R</option>
                            <option value="1">Non R</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="mb-2">Status Buku</label>
                        <select name="book_status" id="book_status" class="form-select custom-form-control" required>
                            <option selected disabled value = "">---</option>
                            <option value="0">Tersedia</option>
                            <option value="1">Dipinjam</option>
                            <option value="2">Hilang</option>
                        </select>
                    </div>

                    <div class="form-group mb-3 text-end">
                        <button type="submit" class="btn btn-dark">
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