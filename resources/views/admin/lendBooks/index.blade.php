@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

        
@section('main')
<div id="dataBody" data-source="lendBooks"></div>
    <div class="container mt-3">
        
        <div class="d-flex justify-content-between">

            <search-form
            searchFrom="{{ route('searchLendBookData') }}"
            displayTo="#main-table"
            displayMode="admin"
            token="{{ csrf_token() }}"
            ></search-form>
            
            
            <a href="{{ route('lend-books.create') }}" class="btn btn-primary text-white">
                <span>Tambah Pinjam Buku</span>
                <i class="bi bi-plus-square"></i>
            </a>
        </div>
        <div
            id="resultMessageField"
            class="ms-3 my-2 d-flex align-items-center"
        ></div>
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
                        <th class="py-4">Peminjam</th>
                        <th class="py-4">Tanggal dipinjam</th>
                        <th class="py-4">Status</th>
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody id="main-table">
                @foreach ($lends as $lend)
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" name="" id="" />
                        </td>
                        <td>
                            <img
                                src="{{ asset('storage/book_covers/' . $lend->book->cover) }}"
                                alt="Book cover"
                                style="width: 100px;"
                            />
                        </td>
                        <td>{{ $lend->book->book_code }}</td>
                        <td>{{ $lend->book->title }}</td>
                        <td>{{ $lend->user->name }}</td>
                        <td>{{ $lend->lend_date }}</td>
                        <td>{{ ($lend->lend_status  == '0') ? 'dipinjam' : 'dikembalikan' }}</td>
                        <td>
                            <a
                                href="#"
                                class="btn btn-success finish-lend"
                                id="{{$lend->id}}"
                            >
                                <i class="bi bi-check-square-fill"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
      
    </div>
</div>
@endsection

@section('footer')
    </script>
@endsection
