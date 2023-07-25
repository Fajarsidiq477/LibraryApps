@extends('layouts.master')

@section('header')
    @include('partials.navbar-upper')

    <nav>
        @include('partials.navbar-admin-lower')
        @include('partials.navbar-upper-mobile')
    </nav>
@endsection

@section('main')
    <div class="container">
        <h2>Selamat datang, {{ Auth::user()->name }}!</h2>    
    </div>
@endsection