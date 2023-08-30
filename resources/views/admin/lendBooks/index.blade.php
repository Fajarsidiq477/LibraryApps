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
                    @if($lend->lend_status == '0' || $lend->lend_status == '3')
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
                            <form action="{{ route('lend-books.destroy', $lend->id)}}" method="POST">
                                <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}

                                <button type="submit" class="btn btn-success" id="{{$lend->id}}" >
                                    <i class="bi bi-check-square-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
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
