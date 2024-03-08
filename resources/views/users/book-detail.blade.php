
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
                        <table class="table table-animation">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" colspan="2"><h3>{{$book->title}}</h3></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kode Buku</td>
                                    <td>: {{$book->book_code}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 35%;">Penulis</td>
                                    <td>: {{$book->author}}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>: {{$book->category}}</td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td>: {{$book->editor}}</td>
                                </tr>
                                <tr>
                                    <td>Penerbit</td>
                                    <td>: {{$book->publisher}}</td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>: {{$book->publication_year}}</td>
                                </tr>
                                <tr>
                                    <td>Halaman</td>
                                    <td>: {{$book->page}}</td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td>: {{$book->volume}}</td>
                                </tr>
                                <tr>
                                    <td>Bahasa</td>
                                    <td>: {{$book->language}}</td>
                                </tr>
                                <tr>
                                    <td>Penerjemah</td>
                                    <td>: {{$book->translator}}</td>
                                </tr>
                                <tr>
                                    <td>Tipe Buku</td>
                                    <td>: {{ ($book->type  == '0') ? 'R' : 'Non R' }}</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle;">Status</td>
                                    @switch($book->book_status)
                                        @case(0)
                                            <td>: <button class="btn btn-success" style="border-radius: 0;">Tersedia</button></td>
                                            @break
                                        @case(1)
                                            <td>: <button class="btn btn-danger" style="border-radius: 0;">Dipinjam</button></td>
                                            @break
                                        @default
                                            <td>: <button class="btn btn-dark" style="border-radius: 0;">Something went wrong, please try again</button></td>
                                    @endswitch
                                </tr>
                            </tbody>
                        </table>

                        <!-- <h3>{{$book->title}}</h3>
                        <p class="book-author">{{$book->author}}</p>

                        <p>
                            <b>Tahun Terbit</b>: {{$book->publication_year}}
                        </p> -->
                    </div>
                @else
                <h3>Data buku tidak ditemukan</h3>
                @endif
            </div>
        </div>
@endsection
