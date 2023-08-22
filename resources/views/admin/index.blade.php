@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
    <div class="container">
        <h2>Selamat datang, {{ Auth::user()->name }}!</h2>    
    </div>
@endsection