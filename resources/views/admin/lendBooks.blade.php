@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

        
@section('main')
<div id="dataBody" data-source="lendBooks"></div>
    <div class="container mt-3">
        <a href="{{ route('lend-books.create') }}" class="btn btn-primary">
            <span>Tambah Pinjam Buku</span>
            <i class="bi bi-plus-square-fill"></i>
        </a>
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
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($lends as $lend)
                    @if($lend->lend_status == '0')
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
