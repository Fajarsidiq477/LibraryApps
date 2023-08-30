@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')


    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lend-books.index') }}">Data Pinjam Buku</a></li>
                <li class="breadcrumb-item">Tambah Pinjam Buku</i></li>
            </ol>
        </nav>
    </div>

@endsection

@section('main')
    <div id="dataBody" data-source="LendBooksCreate1"></div>

    <div class="container my-3">
        <form action="{{ route('lend-books.store') }}" method="POST">

            <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
            <input type="hidden" name="total" id="total" value="{{ $books->count() }}">

            {{ csrf_field() }}
            <div class="row justify-content-center" id="form-content"> 
                <p class="fw-bold text-center">Detail Peminjaman Buku</p>    
               
                <div class="col-md-6" id="bookCodesField">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-bold mb-1">Peminjam</p>
                            <p>{{ $user->name }}</p>

                        </div>

                        <div class="text-end">
                            <p class="fw-bold mb-1">Tanggal Pinjam</p>
                            <p>{{ $carbon::now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                            <input type="hidden" name="lend_date" value="{{ $carbon::now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('Y-MM-DD') }}">
                        </div>
                    </div>

                    <div>
                        <table class="table">
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    Buku yang dipinjam
                                </th>
                            </tr>
                            @foreach ($books as $i => $book)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $book->book_code . ' - ' . $book->title}}</td>
                                    <input type="hidden" name="bookid{{$i}}" value="{{ $book->id }}">
                                </tr>
                            @endforeach
                            <tr>
                                <th>Jumlah Buku:</th>
                                <td>{{ $books->count() }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-bold mb-1">Operator</p>
                            <p>{{ Auth::user()->name }}</p>

                        </div>

                        <div class="text-end">
                            <p class="fw-bold mb-1">Tenggat Kembali</p>
                            <p>{{ $carbon::now()->addWeeks(1)->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM Y') }}</p>
                            <input type="hidden" name="return_date" value="{{ $carbon::now()->addWeeks(1)->timezone('Asia/Jakarta')->locale('id')->isoFormat('Y-MM-DD') }}">
                        </div>
                    </div>
                    
                </div>

                <div class="d-flex justify-content-center">
                   <a href="{{ route('lend-books.index') }}" class="btn btn-danger">
                        <span>Batal</span>
                        <i class="bi bi-left"></i>
                    </a>
                    <button type="submit" class="ms-2 btn btn-success">
                        <span>
                            Konfirmasi
                        </span>
                        <i class="bi bi-check-square-fill"></i>
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