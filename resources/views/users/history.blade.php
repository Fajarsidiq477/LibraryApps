@extends('layouts.master')

@section('header')
    @include('partials.navbar-upper')
@endsection

@section('main')
    <div class="container main-with-left-bar">
        <h3 class="text-center my-3">Riwayat Peminjaman Buku</h3>

        <p class="fw-bold">Jumlah buku: 3</p>

        <div class="row mt-3">
            <div class="col-12 col-md-3 d-flex justify-content-center">
                <img
                    src="http://placeholder.co/120x150"
                    alt="book cover"
                    class=""
                />
            </div>
            <div class="col-12 col-sm-6 col-md-4 pl-4 d-flex mt-3">
                <div>
                    <h4 class="mb-2">Negeri Para Bedebah</h4>
                    <p class="fw-bold mb-1">Tere Liye</p>
                    <p>2012</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5 d-flex mt-3">
                <div>
                    <p>
                        <span class="fw-bold">Tanggal Pinjam:</span>
                        <span>4 November, 2023</span>
                    </p>
                    <p>
                        <span class="fw-bold">Tanggal Kembali:</span>
                        <span>11 November, 2023</span>
                    </p>
                    <p>
                        <span class="fw-bold">Status:</span>
                        <span class="badge bg-danger">Telat</span>
                    </p>
                </div>
            </div>
            <hr class="mt-3" />
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-3 d-flex justify-content-center">
                <img
                    src="http://placeholder.co/120x150"
                    alt="book cover"
                    class=""
                />
            </div>
            <div class="col-12 col-sm-6 col-md-4 pl-4 d-flex mt-3">
                <div>
                    <h4 class="mb-2">Negeri Para Bedebah</h4>
                    <p class="fw-bold mb-1">Tere Liye</p>
                    <p>2012</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5 d-flex mt-3">
                <div>
                    <p>
                        <span class="fw-bold">Tanggal Pinjam:</span>
                        <span>4 November, 2023</span>
                    </p>
                    <p>
                        <span class="fw-bold">Tanggal Kembali:</span>
                        <span>11 November, 2023</span>
                    </p>
                    <p>
                        <span class="fw-bold">Status:</span>
                        <span class="badge bg-danger">Telat</span>
                    </p>
                </div>
            </div>
            <hr class="mt-3" />
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-3 d-flex justify-content-center">
                <img
                    src="http://placeholder.co/120x150"
                    alt="book cover"
                    class=""
                />
            </div>
            <div class="col-12 col-sm-6 col-md-4 pl-4 d-flex mt-3">
                <div>
                    <h4 class="mb-2">Negeri Para Bedebah</h4>
                    <p class="fw-bold mb-1">Tere Liye</p>
                    <p>2012</p>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5 d-flex mt-3">
                <div>
                    <p>
                        <span class="fw-bold">Tanggal Pinjam:</span>
                        <span>4 November, 2023</span>
                    </p>
                    <p>
                        <span class="fw-bold">Tanggal Kembali:</span>
                        <span>11 November, 2023</span>
                    </p>
                    <p>
                        <span class="fw-bold">Status:</span>
                        <span class="badge bg-danger">Telat</span>
                    </p>
                </div>
            </div>
            <hr class="mt-3" />
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.left-bar')
@endsection
