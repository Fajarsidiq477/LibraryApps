@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')


    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('lend-books.index') }}">Data Pinjam Buku</a></li>
                <li class="breadcrumb-item">Tambah Pinjam Buku</li>
            </ol>
        </nav>
    </div>

@endsection

@section('main')
    <div class="container mt-3">

        <div class="row">
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
            <div class="col-md-8 mx-auto">
                <form action="{{ route('lend-books.create.1') }}" method="POST" id="form-modal">
        
                    
                    {{ csrf_field() }}
                    <div class="row">
                       <div
                            class="form-group mb-3 text-center"
                        >
                            <label
                                for="kode"
                                class="mb-2 fw-bold"
                                >Masukan NIM Peminjam</label
                            >
                            <input
                                type="number"
                                class="form-control custom-form-control mb-2"
                                name="id"
                                required
                            />
                        </div>
        
                        <button type="submit" class="btn btn-primary">Selanjutnya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    
@endsection