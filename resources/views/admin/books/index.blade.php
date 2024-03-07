@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
    <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-start my-2">
            <div class="col-10 col-md-4">
                <form action="/search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </form>
                <!-- <search-form searchFrom="{{ route('searchBookData') }}" displayTo="#main-content" displayMode="user"
                    token="{{ csrf_token() }}">
                </search-form> -->
            </div>
            <div class="col-2 d-flex justify-content-end">
                <button class="btn bg-secondary text-white ms-auto" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" data-source="filter" aria-controls="offcanvasRight">
                    <i class="bi bi-filter"></i>
                    <span class="d-none d-sm-inline-block">Filter</span>
                </button>
            </div>
        </div>
        <a href="{{ route('books.create') }}" class="btn btn-primary text-white">
            <span>Tambah Buku</span>
            <i class="bi bi-plus-square"></i>
        </a>
        {{-- form delete hidden --}}
        <form action="" method="POST" id="form-delete">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success.message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-2">
                {{ session('error.message') }}
            </div>
        @endif
        <div class="row table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="py-4">
                            <input type="checkbox" name="" id="" />
                        </th>
                        <th class="py-4">#</th>
                        <th class="py-4">Kode Buku</th>
                        <th class="py-4">Judul Buku</th>
                        <th class="py-4">Penulis Buku</th>
                        <th class="py-4">Status Buku</th>
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" name="" id="" />
                        </td>
                        <td>
                            
                            <img src="{{ asset('storage/book_covers/' . $book->cover) }}" alt="Book cover" width="100"/>
                        </td>
                        <td>{{ $book->book_code }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        @switch($book->book_status)
                            @case(0)
                                <td>Tersedia</td>
                                @break
                            @case(1)
                                <td>Dipinjam</td>
                                @break
                            @case(2)
                                <td>Hilang</td>
                                @break
                            @default
                                <span>Something went wrong, please try again</span>
                        @endswitch
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <a href="#" class="btn btn-danger" onclick="deleteData('{{ $book->id }}')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </div>
@endsection

@section('footer')
    <script>
        //delete confirmation
        const deleteData = (id) => {
                const confirm = window.confirm('Apakah yakin ingin menghapus data?')
                const formDelete = document.querySelector('#form-delete');

                if(confirm) {
                    formDelete.setAttribute('action', `/admin/books/` + id);
                    formDelete.submit();
                    return;
                }

                return alert('batal menghapus');
            };

        $('.page-link')[0].innerHTML = "<";
        $('.page-link')[1].innerHTML = ">";
    
    </script>
@endsection