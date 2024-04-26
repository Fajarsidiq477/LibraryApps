@extends('layouts.master2')

@section('header')
@include('partials.test.navbar')
@include('partials.test.navbar-admin')
@endsection

@section('main')


<div class="container" style="height: 500px; display: flex; justify-content: center; align-items: center;">
    <form action="/idconfirm">
    {{ csrf_field() }}
        <div class="row" style="margin: 3%;">
            <div class="col-5">
                <select class="form-select" aria-label="Default select example" name="category" required>
                    <option disabled selected value="">Kategori</option>
                    <option value="Al-Qur'an">Al-Qur'an</option>
                    <option value="Tafsir">Tafsir</option>
                    <option value="Hadis">Hadis</option>
                    <option value="Akidah">Akidah</option>
                    <option value="Fikih">Fikih</option>
                    <option value="Sejarah">Sejarah</option>
                    <option value="Pemikiran">Pemikiran</option>
                    <option value="Tasawuf">Tasawuf</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Penelitian">Penelitian</option>
                    <option value="Sains">Sains</option>
                    <option value="Ensiklopedia">Ensiklopedia</option>
                    <option value="Motivasi">Motivasi</option>
                    <option value="Umum">Umum</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Kamus">Kamus</option>
                    <option value="Novel">Novel</option>
                    <option value="Sosial">Sosial</option>
                </select>
            </div>
            <div class="col-5">
                <input type="text" class="form-control" autofocus required placeholder="masukan kode buku..." name="code">
            </div>
            <div class="col-2">
                <button class="btn btn-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>
</div>











@endsection