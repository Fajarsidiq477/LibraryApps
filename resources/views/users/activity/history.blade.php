@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection

@section('main')
    <div class="container main-with-left-bar">
        <h3 class="text-center my-3">Riwayat Peminjaman Buku</h3>

        <p class="fw-bold">Jumlah buku: {{ count($lends) }}</p>

        @foreach($lends as $lend)
        <div class="row mt-3">
            <div class="col-12 col-md-3 d-flex justify-content-center">
                <img
                    src="{{ asset('storage/book_covers/' . $lend->book->cover) }}"
                    alt="book cover"
                    class=""
                    style="width:120px;"
                />
            </div>
            <div class="col-12 col-sm-6 col-md-4 pl-4 d-flex mt-3">
                <div>
                    <h4 class="mb-2">{{ $lend->title }}</h4>
                    <p class="fw-bold mb-1">{{ $lend->author }}</p>
                    <p>{{ $lend->publication_year }}</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5 d-flex mt-3">
                <div>
                    <p>
                        <span class="fw-bold">Tanggal Pinjam:</span>
                        <span>{{ $lend->lend_date }}</span>
                    </p>
                    <p>
                        <span class="fw-bold">Tanggal Kembali:</span>
                        <span>{{ $lend->return_date }}</span>
                    </p>
                    <p>
                        <span class="fw-bold">Status:</span>
                        
                        @switch( $lend->lend_status )
                            @case('0')
                                <span class="badge bg-success py-1 px-2 rounded ">Dipinjam</span>
                                @break
                            @case('1')
                                <span class="badge bg-warning py-1 px-2 rounded ">Dikembalikan</span>
                                @break
                            @case('2')
                                <span class="badge bg-warning py-1 px-2 rounded ">Hilang</span>
                            @break
                        @endswitch
                    </p>
                </div>
            </div>
            <hr class="mt-3" />
        </div>
        @endforeach

        {{ $lends->links() }}
    </div>
@endsection

@section('footer')
    @include('partials.left-bar')
    <script>
        $('.page-link')[0].innerHTML = "<";
        $('.page-link')[1].innerHTML = ">";
    </script>
@endsection
