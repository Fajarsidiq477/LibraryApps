@extends('layouts.master2')

@section('header')
@include('partials.test.navbar')
@include('partials.test.navbar-admin')
@endsection

@section('main')


<div class="container">
    <form action="/changeid" style="margin: 5%;">
        <div class="row" style="margin: 2%;">
            <div class="col">
                <label>Judul di Sistem</label>
                <input type="text" readonly class="form-control" value="{{$title}}">
            </div>
        </div>
        <div class="row" style="margin: 2%;">
            <div class="col">
                <label>Kategori Awal</label>
                <input type="text" readonly class="form-control" value="{{$lastCategory}}">
            </div>
            <div class="col">
                <label>Kategori Baru</label>
                <input type="text" name="category" readonly class="form-control" value="{{$newCategory}}">
            </div>
        </div>
        <div class="row" style="margin: 2%;">
            <div class="col">
                <label>ID Awal</label>
                <input type="text" name="first_id" readonly class="form-control" value="{{$firstId}}">
            </div>
            <div class="col">
                <label>Ganti ID Menjadi:</label>
                <input type="text" name="new_id" readonly class="form-control" value="{{$newId}}">
            </div>
        </div>
        <div class="row" style="margin: 2%;">
            <div class="col" style="display: flex; justify-content: center;">
                <button class="btn btn-secondary" type="submit">Gas!</button>
            </div>
        </div>
    </form>
</div>

{{$book_code. $title. $newId. $lastCategory. $newCategory}}

@endsection