@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')


    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lend-books.index') }}">Data Pinjam Buku</a></li>
                <li class="breadcrumb-item active">Tambah Pinjam Buku</i></li>
            </ol>
        </nav>
    </div>

@endsection

@section('main')
    <div id="dataBody" data-source="LendBooksCreate1"></div>

    <div class="container my-3">
        <form action="{{ route('lend-books.create.2') }}" method="POST" id="bookFormCode">

            <input type="hidden" name="id" id="id" value="{{ $id }}">
            {{ csrf_field() }}
            <div class="row justify-content-center" id="form-content"> 
                <p class="fw-bold text-center">Masukan Kode Buku</p>    
               
                <div class="col-md-8" id="bookCodesField">
                    <div class="bookCode1">
                        <div class="row g-3 align-items-center mb-2 ">
                                <label for="bookCodeInput1" class="fw-bold">Buku 1</label>
                                <input
                                    type="text"
                                    class="form-control mb-2 input-book bookCodeInputs"
                                    name="bookCodeInput1"
                                    id="bookCodeInput1"
                                    value="FKWI123"
                                    required
                                />
                        </div>
                    </div>

                    
                </div>

                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-success" id="addBookButton">
                        <span>
                            Tambah buku
                        </span>
                        <i class="bi bi-plus-square-fill"></i>
                    </a>
                    <button type="submit" class="ms-2 btn btn-primary">
                        <span>
                            Simpan
                        </span>
                        <i class="bi bi-save-fill"></i>
                    </button>
                </div>
                    

            </div>
        </form>
    </div>
@endsection

@section('footer')
    <script>
        const addBookButton = document.querySelector('#addBookButton');
        addBookButton.addEventListener('click', (e) => {
            e.preventDefault();
                const bookCodesField = document.querySelector('#bookCodesField');
            const i = bookCodesField.children.length + 1;

            
            if (i > 5) {
                return alert('tidak bisa meminjam buku lebih dari 5');
            }

            bookCodesField.innerHTML += `
                <div class="bookCode${i}">
                    <div class="row g-3 align-items-center mb-2 ">
                            <label for="bookCodeInput${i}" class="fw-bold">Buku ${i}</label>
                            <input
                                type="text"
                                class="form-control mb-2 input-book"
                                name="bookCodeInput${i}"
                                id="bookCodeInput${i}"
                                required
                            />
                    </div>
                </div>
            `;
        });

    </script>
@endsection