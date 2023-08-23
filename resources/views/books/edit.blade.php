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
        <form action="{{ route('books.update', $book->id) }}" method="POST" id="form-book-edit">

            @csrf
            <!-- {{ csrf_field() }} -->
            @method('PUT')
            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <div class="image-cover">
                        <img src="{{ asset('cover_images/'. $book->cover) }}" alt="book cover" name="imageInputDisplay" id="imageInputDisplay" class="img-fluid" width="165"/>
                        <input type="file" name="cover1" id="imageInput" accept="image/*" hidden oninput="imageStatus()"/>
                        <label for="imageInput" class="btn btn-success rounded-circle image-cover-button">
                            <i class="bi bi-pencil"></i>
                        </label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group mb-3">
                        <input type="hidden" class="form-control custom-form-control" name="id" id="id" value="{{ $book->id }}"/>
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" class="form-control custom-form-control" name="cover2" id="cover2" value="{{ $book->cover }}"/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="kode" class="mb-2">Kode Buku</label>
                        <input type="text" class="form-control custom-form-control" name="book_code" id="book_code" value="{{ $book->book_code }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="judul" class="mb-2">Judul Buku</label>
                        <input type="text" class="form-control custom-form-control" name="title" id="title" value="{{ $book->title }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="penulis" class="mb-2">Penulis</label>
                        <input type="text" class="form-control custom-form-control" name="author" id="author" value="{{ $book->author }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="penerbit" class="mb-2">Penerbit</label>
                        <input type="text" class="form-control custom-form-control" name="publisher" id="publisher" value="{{ $book->publisher }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="editor" class="mb-2">Editor</label>
                        <input type="text" class="form-control custom-form-control" name="editor" id="editor" value="{{ $book->editor }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="penerjemah" class="mb-2">Penerjemah</label>
                        <input type="text" class="form-control custom-form-control" name="translator" id="translator" value="{{ $book->translator }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="bahasa" class="mb-2">Bahasa</label>
                        <input type="text" class="form-control custom-form-control" name="language" id="language" value="{{ $book->language }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="tahunTerbit" class="mb-2">Tahun Terbit</label>
                        <input type="number" class="form-control custom-form-control" name="publication_year" id="publication_year" value="{{ $book->publication_year }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="jumlahHalaman" class="mb-2">Jumlah Halaman</label>
                        <input type="number" class="form-control custom-form-control" name="page" id="page" value="{{ $book->page }}" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="volume" class="mb-2">Volume</label>
                        <input type="number" class="form-control custom-form-control" name="volume" id="volume" value="{{ $book->volume }}"/>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="mb-2">Jenis Buku</label>
                        <select name="type" id="type" class="form-select custom-form-control" required>
                            <option selected disabled value = "">---</option>
                            <option value="0" @if( $book->type == 0 ) selected @endif >R</option>
                            <option value="1" @if( $book->type == 1 ) selected @endif>Non R</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="status" class="mb-2">Status Buku</label>
                        <select name="book_status" id="book_status" class="form-select custom-form-control" required>
                            <option selected disabled value = "">---</option>
                            <option value="0" @if( $book->book_status == 0 ) selected @endif>Tersedia</option>
                            <option value="1" @if( $book->book_status == 1 ) selected @endif>Dipinjam</option>
                            <option value="2" @if( $book->book_status == 2 ) selected @endif>Hilang</option>
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
    
@endsection