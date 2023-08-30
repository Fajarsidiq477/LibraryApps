@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection

@section('main')
    <div class="container main-with-left-bar">
        <h3 class="text-center my-3">Buku Favorit</h3>
        <p style="text-align: center;">Fitur Masih Dalam Pengembangan</p>
        <p style="text-align: center;"> Tolong semangati para developer :) </p>

        {{-- <p class="fw-bold">Jumlah buku: {{ $data_simpan->count() }}</p>

        @foreach($data_simpan as $item)
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
                        <h4 class="mb-2">{{$item->judul_buku}}</h4>
                        <p class="fw-bold mb-1">{{$item->penulis}}</p>
                        <p>{{$item->thn_terbit}}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-5 d-flex mt-3">
                    <div>
                        <a
                            href="book/{{$item->kode_buku}}"
                            class="btn btn-success"
                            >Lihat Detail</a
                        >
                        <a href="#" class="btn btn-danger">Hapus</a>
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
