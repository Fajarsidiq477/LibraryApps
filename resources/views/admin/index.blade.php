@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
    <div class="container my-4">
        <p class="fw-bold">Data hari ini</p>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card p-3 d-flex justify-content-center align-items-center">
                    <div class="card-body fs-1">
                        <h4>Transaksi Hari Ini</h4>
                        <div class="d-flex justify-content-evenly">
                            <i class="bi bi-book"></i>
                            <p> {{ $transactions::whereDate('created_at', $carbon::now())->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="fw-bold">Data Keseluruhan</p>
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card p-3 d-flex justify-content-center align-items-center">
                    <div class="card-body fs-1">
                        <h4>Jumlah buku terdata</h4>
                        <div class="d-flex justify-content-evenly">
                            <i class="bi bi-book"></i>
                            <p> {{ $books->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card p-3 d-flex justify-content-center align-items-center">
                    <div class="card-body fs-1">
                        <h4>Jumlah transaksi</h4>
                        <div class="d-flex justify-content-evenly">
                            <i class="bi bi-wallet2"></i>
                            <p> {{ $transactions::all()->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card p-3 d-flex justify-content-center align-items-center">
                    <div class="card-body fs-1">
                        <h4>Jumlah Member Terdaftar</h4>
                        <div class="d-flex justify-content-evenly">
                            <i class="bi bi-person"></i>
                            <p> {{ $members->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection