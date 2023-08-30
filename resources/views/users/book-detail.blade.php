
@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection
        
@section('main')
<div class="container mt-4 py-4">
    <h3 class="text-center">Detail Buku</h3>

    {{-- <a href="{{ route('user.index') }}" class="fw-bold">&lt; Kembali</a> --}}
    
    <div class="mt-3 row justify-content-center align-items-center">
        @if ($book)
                {{-- {{dd($book)}} --}}
                    <div class="col-12 col-md-4 text-center">
                        <img
                            src="{{ asset('storage/book_covers/'. $book->cover) }}"
                            alt="Book Cover"
                            class="book-detail-cover"
                        />
                    </div>
                    <div class="col-12 col-md-6 mt-4 mt-md-0">
                        <h3>{{$book->title}}</h3>
                        <p class="book-author">{{$book->author}}</p>

                        <p>
                            {{$book->synopsis}}
                        </p>
                    </div>
                @else
                <h3>Data buku tidak ditemukan</h3>
                @endif
            </div>
        </div>
@endsection
