@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
    <div class="container mt-3">
    <div class="d-flex justify-content-between align-items-start my-2">
            <div class="col-7">
                <a href="{{ route('books.create') }}" class="btn btn-primary text-white">
                    <span>Tambah Buku</span>
                    <i class="bi bi-plus-square"></i>
                </a>
            </div>
            <div class="col">
                <form action="/darurat-search">
                    <div class="input-group mb-3">
                        @if ($searchfilter == 'true')
                            <input type="text" class="form-control" autofocus name="search">
                        @else
                            <input type="text" class="form-control" autofocus placeholder="Search..." name="search">
                        @endif
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        
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
                        <!-- <th class="py-4">No</th> -->
                        <th class="py-4">Gambar</th>
                        <th class="py-4">Kode Buku</th>
                        <th class="py-4">Judul Buku</th>
                        <th class="py-4">Penulis</th>
                        <th class="py-4">Penerbit</th>
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
                        <td>{{ $book->publisher }}</td>
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

            @if ($searchfilter == 'true')
                {{$books->appends(['search' => $search, 'available' => $available, 'category' => $category])->links()}}
            @else
                {{ $books->links() }}
            @endif
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