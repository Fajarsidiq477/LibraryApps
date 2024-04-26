@extends('layouts.master2')

@section('header')
@include('partials.test.navbar')
@include('partials.test.navbar-admin')
@endsection

@section('main')


<div class="container">
    <form style="margin: 5%;">
        <div class="row">
            <div class="col">
                <label>Judul di Sistem</label>
                <input type="text" readonly class="form-control" value="{{$title}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>Kategori Awal</label>
                <input type="text" readonly class="form-control" value="{{$lastCategory}}">
            </div>
            <div class="col">
                <label>Kategori Baru</label>
                <input type="text" readonly class="form-control" value="{{$newCategory}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label>ID Awal</label>
                <input type="text" readonly class="form-control" value="{{$firstId}}">
            </div>
            <div class="col">
                <label>Ganti ID Menjadi:</label>
                <input type="text" readonly class="form-control" value="{{$newId}}">
            </div>
        </div>
    </form>
</div>

{{$book_code. $title. $newId. $lastCategory. $newCategory}}

@endsection