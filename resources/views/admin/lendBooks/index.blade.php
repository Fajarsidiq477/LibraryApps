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
                <span>Pinjam Buku</span>
                <i class="bi bi-plus-square"></i>
            </a>

            {{-- form delete hidden --}}
            <form action="" method="POST" id="form-delete">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

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
                            <a
                                href="#"
                                class="badge text-dark btn btn-success text-white"
                                onclick="deleteData('{{ $lend->id }}')">
                                <i class="bi bi-check-square-fill"></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $lends->links() }}
    </div>
</div>
@endsection

@section('footer')
    <script>

        //delete confirmation
        const deleteData = (id) => {
            const confirm = window.confirm('Apakah benar bukunya udah dibalikin?')
            const formDelete = document.querySelector('#form-delete');

            if(confirm) {
                formDelete.setAttribute('action', `/admin/lend-books/` + id);
                formDelete.submit();
                return;
            }
        };

        $('.page-link')[0].innerHTML = "<";
        $('.page-link')[1].innerHTML = ">";
    </script>
@endsection
