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
                @if(empty($category))
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
                @else
                <select class="form-select" aria-label="Default select example" name="category" required>
                    <option disabled value="">Kategori</option>
                    <option value="Al-Qur'an" @if(old('category', $category)=="Al-Qur'an" ) selected @endif>Al-Qur'an</option>
                    <option value="Tafsir" @if(old('category', $category)=="Tafsir" ) selected @endif>Tafsir</option>
                    <option value="Hadis" @if(old('category', $category)=="Hadis" ) selected @endif>Hadis</option>
                    <option value="Akidah" @if(old('category', $category)=="Akidah" ) selected @endif>Akidah</option>
                    <option value="Fikih" @if(old('category', $category)=="Fikih" ) selected @endif>Fikih</option>
                    <option value="Sejarah" @if(old('category', $category)=="Sejarah" ) selected @endif>Sejarah</option>
                    <option value="Pemikiran" @if(old('category', $category)=="Pemikiran" ) selected @endif>Pemikiran</option>
                    <option value="Tasawuf" @if(old('category', $category)=="Tasawuf" ) selected @endif>Tasawuf</option>
                    <option value="Pendidikan" @if(old('category', $category)=="Pendidikan" ) selected @endif>Pendidikan</option>
                    <option value="Penelitian" @if(old('category', $category)=="Penelitian" ) selected @endif>Penelitian</option>
                    <option value="Sains" @if(old('category', $category)=="Sains" ) selected @endif>Sains</option>
                    <option value="Ensiklopedia" @if(old('category', $category)=="Ensiklopedia" ) selected @endif>Ensiklopedia</option>
                    <option value="Motivasi" @if(old('category', $category)=="Motivasi" ) selected @endif>Motivasi</option>
                    <option value="Umum" @if(old('category', $category)=="Umum" ) selected @endif>Umum</option>
                    <option value="Ekonomi" @if(old('category', $category)=="Ekonomi" ) selected @endif>Ekonomi</option>
                    <option value="Kamus" @if(old('category', $category)=="Kamus" ) selected @endif>Kamus</option>
                    <option value="Novel" @if(old('category', $category)=="Novel" ) selected @endif>Novel</option>
                    <option value="Sosial" @if(old('category', $category)=="Sosial" ) selected @endif>Sosial</option>
                </select>
                <!-- <input type="text" class="form-control" autofocus required value="{{$category}}" name="category"> -->
                @endif

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