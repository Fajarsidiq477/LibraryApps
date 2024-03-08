@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')


    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Data Buku</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Buku <i class="bi bi-pencil"></i></li>
            </ol>
        </nav>
    </div>

@endsection

@section('main')
    <div id="dataBody" data-source="adminEditBook"></div>

    <div class="container mt-3">
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            
            <input type="hidden" name="url_page" id="url_page" value="{{ $url_page }}">
            <input type="hidden" name="first_id" id="first_id" value="{{ old('book_id', $book->id) }}" />
            
            {{ csrf_field() }}
            @method('PUT')

            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <div class="image-cover">
                        <img src="{{ asset('storage/book_covers/'. $book->cover) }}" alt="book cover" name="imageInputDisplay" id="imageInputDisplay" class="img-fluid" width="165"/>
                        <input type="file" name="cover" id="imageInput" accept="image/*" hidden/>
                        <label for="imageInput" class="btn btn-success rounded-circle image-cover-button">
                            <i class="bi bi-pencil"></i>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group mb-3">
                        <label for="id" class="mb-2">ID Buku</label>
                        <input type="text" class="form-control custom-form-control @error('book_id') is-invalid @enderror" name="book_id" id="book_id" required value="{{ old('book_id', $book->id) }}" />
                        @error('book_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="kode" class="mb-2">Kode Buku</label>
                        <input type="text" class="form-control custom-form-control @error('book_code') is-invalid @enderror" name="book_code" id="book_code" required value="{{ old('book_code', $book->book_code) }}" maxlength="10" />
                        @error('book_code')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul" class="mb-2">Judul Buku</label>
                        <input type="text" class="form-control custom-form-control @error('title') is-invalid @enderror" name="title" id="title" required value="{{ old('title', $book->title) }}"/>
                        @error('title')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul" class="mb-2">Kategori</label>
                        <input type="text" class="form-control custom-form-control @error('title') is-invalid @enderror" name="category" id="category" required value="{{ old('category', $book->category) }}" maxlength="50"/>
                        @error('title')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="penulis" class="mb-2">Penulis</label>
                        <input type="text" class="form-control custom-form-control @error('author') is-invalid @enderror" name="author" id="author" required value="{{ old('author', $book->author) }}"/>
                        @error('author')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="tahunTerbit" class="mb-2">Tahun Terbit</label>
                        <input type="number" class="form-control custom-form-control @error('publication_year') is-invalid @enderror" name="publication_year" id="publication_year" required  value="{{ old('publication_year', $book->publication_year) }}" max="{{ date('Y') }} />
                        @error('publication_year')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="mb-2">Jenis Buku</label>
                        <select name="type" id="type" class="form-select custom-form-control @error('type') is-invalid @enderror" required>
                            <option disabled value="">---</option>
                            <option value="0" @if(old('type', $book->type) == '0') selected @endif>R</option>
                            <option value="1" @if(old('type', $book->type) == '1') selected @endif>Non R</option>
                        </select>
                        @error('type')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="mb-2">Status Buku</label>
                        <select name="book_status" id="book_status" class="form-select custom-form-control @error('book_status') is-invalid @enderror" required>
                            <option  disabled value = "">---</option>
                            <option value="0" @if(old('book_status') == '0') selected @endif>Tersedia</option>
                            <option value="1" @if(old('book_status', $book->book_status) == '1') selected @endif>Dipinjam</option>
                            <option value="2" @if(old('book_status', $book->book_status) == '2') selected @endif>Hilang</option>
                        </select>
                        @error('book_status')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="penerbit" class="mb-2">Penerbit</label>
                        <input type="text" class="form-control custom-form-control" name="publisher" id="publisher" value="{{ old('publisher', $book->publisher) }}" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="editor" class="mb-2">Editor</label>
                        <input type="text" class="form-control custom-form-control" name="editor" id="editor" value="{{ old('editor', $book->editor) }}" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="penerjemah" class="mb-2">Penerjemah</label>
                        <input type="text" class="form-control custom-form-control" name="translator" id="translator" value="{{ old('translator', $book->translator) }}" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="language" class="mb-2">Bahasa</label>
                        <input type="text" class="form-control custom-form-control" name="language" id="language"  value="{{ old('language', $book->language) }}"/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="synopsis" class="mb-2">Sinopsis</label>
                        <textarea name="synopsis" id="synopsis" class="form-control custom-form-control">{{ old('language', $book->synopsis) }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="jumlahHalaman" class="mb-2">Jumlah Halaman</label>
                        <input type="number" class="form-control custom-form-control" name="page" id="page" value="{{ old('page', $book->page) }}"/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="volume" class="mb-2">Volume</label>
                        <input type="number" class="form-control custom-form-control" name="volume" id="volume"  value="{{ old('volume', $book->volume) }}"/>
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