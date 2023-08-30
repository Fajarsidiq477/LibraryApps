@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection

@section('main')
    <div class="container my-4 main-with-left-bar">
        <div class="row mb-3">
            <div class="col-md-4 mb-2">
                <div class="card p-2 d-flex justify-content-center align-items-center fw-medium">
                    <p class="card-header">Total buku yang dipinjam</p>
                    <div class="card-body">
                        <div class="d-flex justify-content-center fs-4 gap-3">
                            <i class="bi bi-book"></i>
                            <span>{{count($lends)}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card p-2 d-flex justify-content-center align-items-center fw-medium">
                    <p class="card-header">Buku yang sedang dipinjam</p>
                    <div class="card-body">
                        <div class="d-flex justify-content-center fs-4 gap-3">
                            <i class="bi bi-book"></i>
                            <span>{{count($borrow)}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card p-2 d-flex justify-content-center align-items-center fw-medium">
                    <p class="card-header">Jumlah buku favorit</p>
                    <div class="card-body">
                        <div class="d-flex justify-content-center fs-4 gap-3">
                            <i class="bi bi-book"></i>
                            <span>0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.left-bar')
@endsection
