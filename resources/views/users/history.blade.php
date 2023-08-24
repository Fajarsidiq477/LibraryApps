@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection

@section('main')
    <div class="container main-with-left-bar">
        <h3 class="text-center my-3">Riwayat Peminjaman Buku</h3>

        <p class="fw-bold">Jumlah buku: {{ $lend_data->count() }}</p>

        @foreach($lend_data as $item)
        <div class="row mt-3">
            <div class="col-12 col-md-3 d-flex justify-content-center">
                <img
                    src="{{ asset('cover_images/' . $item->cover) }}"
                    alt="book cover"
                    class=""
                    style="width:120px;"
                />
            </div>
            <div class="col-12 col-sm-6 col-md-4 pl-4 d-flex mt-3">
                <div>
                    <h4 class="mb-2">{{ $item->title }}</h4>
                    <p class="fw-bold mb-1">{{ $item->author }}</p>
                    <p>{{ $item->publication_year }}</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5 d-flex mt-3">
                <div>
                    <p>
                        <span class="fw-bold">Tanggal Pinjam:</span>
                        <span>{{ $item->lend_date }}</span>
                    </p>
                    <p>
                        <span class="fw-bold">Tanggal Kembali:</span>
                        <span>{{ $item->return_date }}</span>
                    </p>
                    <p>
                        <span class="fw-bold">Status:</span>
                        @switch($item->lend_status)
                            @case(1)
                                <span class="badge bg-secondary">Selesai</span>
                                @break
                            @case(2)
                                <span class="badge bg-dark">Hilang</span>
                                @break
                        @endswitch
                    </p>
                </div>
            </div>
            <hr class="mt-3" />
        </div>
        @endforeach
    </div>
@endsection

@section('footer')
    @include('partials.left-bar')
@endsection
