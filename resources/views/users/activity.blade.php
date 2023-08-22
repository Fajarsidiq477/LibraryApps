@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
@endsection

@section('main')
    <div class="container main-with-left-bar">
        <h3 class="text-center my-3">Beranda</h3>

        <p class="fw-bold">Assalamu'alaikum {{ Auth::user()->name }}, sudah membaca hari ini?</p>
    </div>
@endsection

@section('footer')
    @include('partials.left-bar')
@endsection
