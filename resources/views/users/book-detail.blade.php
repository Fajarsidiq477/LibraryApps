
@extends('layouts.master')

@section('header')
    @include('partials.navbar')
@endsection
        
@section('main')
<div class="container mt-4 py-4">

    <!-- <a href="{{ route('userIndex') }}" class="fw-bold">&lt; Kembali</a> -->
    
    <div class="mt-3 row justify-content-center align-items-center">
        @if ($book)
                {{-- {{dd($book)}} --}}
                    <div class="col-12 col-md-4 text-center">
                        <img
                            src="{{ asset('cover_images/'. $book->cover_depan) }}"
                            alt="Book Cover"
                            class="book-detail-cover"
                        />
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <h3>{{$book->judul_buku}}</h3>
                        <p class="book-author">{{$book->penulis}}</p>

                        <p>
                            {{$book->sinopsis}}
                        </p>

                        <div>
                            <a href="#" class="badge bg-secondary">Simpan</a>
                            <a href="#" class="badge bg-secondary">Sitasi</a>
                        </div>
                    </div>
                @else
                <h3>Data buku tidak ditemukan</h3>
                @endif
            </div>
        </div>
@endsection
