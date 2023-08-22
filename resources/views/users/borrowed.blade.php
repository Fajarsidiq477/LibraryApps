@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection

@section('main')
    
    <div class="container main-with-left-bar">
        <h3 class="text-center my-3">Buku yang Sedang Dipinjam</h3>

        {{-- <p class="fw-bold">Jumlah buku: {{ $lend_data->count() }}</p> --}}

        {{-- @foreach($data_pinjam as $item)
            <div class="row mt-3">
                <div class="col-12 col-md-3 d-flex justify-content-center">
                    <img
                        src="{{ asset('cover_images/' . $item->cover_depan) }}"
                        alt="book cover"
                        class=""
                        style="width:120px;"
                    />
                </div>
                <div class="col-12 col-sm-6 col-md-4 pl-4 d-flex mt-3">
                    <div>
                        <h4 class="mb-2">{{ $item->judul_buku }}</h4>
                        <p class="fw-bold mb-1">{{ $item->penulis }}</p>
                        <p>{{ $item->thn_terbit }}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-5 d-flex mt-3">
                    <div>
                        <p>
                            <span class="fw-bold">Tanggal Pinjam:</span>
                            <span>{{ $item->tgl_pinjam }}</span>
                        </p>
                        <p>
                            <span class="fw-bold">Tanggal Kembali:</span>
                            <span>{{ $item->tgl_kembali }}</span>
                        </p>
                        <p>
                            <span class="fw-bold">Status:</span>
                            @switch( $item->status_pinjam )
                                @case(0)
                                    <span class="badge bg-success">Dipinjam</span>
                                    @break
                                @case(3)
                                    <span class="badge bg-warning">Telat</span>
                                    @break
                            @endswitch
                        </p>
                    </div>
                </div>
                <hr class="mt-3" />
            </div>
        @endforeach --}}
    </div>
@endsection

@section('footer')
    @include('partials.left-bar')
@endsection
