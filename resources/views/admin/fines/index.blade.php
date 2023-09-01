@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
    <div class="container my-3">

    <!-- <h2 style="text-align: center; padding: 3%; font-weight: bold;">Denda</h2> -->
        <a href="{{ route('fines.create') }}" class="btn btn-primary text-white">
            <span>Hitung Denda</span>
            <i class="bi bi-currency-dollar"></i>
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
                        <th class="py-4">Cover</th>
                        <th class="py-4">Kode Buku</th>
                        <th class="py-4">Judul</th>
                        <th class="py-4">Peminjam</th>
                        <th class="py-4">Denda</th>
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fines as $fine)
                        @if($fine->fine_status == '0')
                        <tr class="align-middle">
                            <td>
                                <input type="checkbox" name="" id="" />
                            </td>
                            <td>
                                <img
                                src="{{ asset('storage/book_covers/' . $fine->book->cover) }}"
                                alt="Book cover"
                                style="width: 100px;"
                                />
                            </td>
                            <td>{{ $fine->book->book_code }}</td>
                            <td>{{ $fine->book->title }}</td>
                            <td>{{ $fine->user->name }}</td>
                            <td>Rp. {{ $fine->fine_amount }}</td>
                            <td>
                                <a
                                    href="#"
                                    class="badge text-dark btn btn-success text-white"
                                    onclick="deleteData('{{ $fine->id }}')"
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
@endsection

@section('footer')
    <script>
        //delete confirmation
            const deleteData = (id) => {
                const confirm = window.confirm('Apakah benar orangnya sudah bayar?')
                const formDelete = document.querySelector('#form-delete');

                if(confirm) {
                    formDelete.setAttribute('action', `/admin/fines/` + id);
                    formDelete.submit();
                    return;
                }
            };
    </script>
@endsection