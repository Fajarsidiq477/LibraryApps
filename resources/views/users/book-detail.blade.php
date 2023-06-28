@extends('layouts.master')

@section('header')
    @include('partials.navbar')
@endsection

@section('main')
    <div class="container mt-4 py-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-4 text-center">
                <img
                    src="http://placehold.co/160x225"
                    alt="Book Cover"
                    class="book-detail-cover"
                />
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <h3>Islam yang Disalahpahami</h3>
                <p class="book-author">M.Quraish Shihab</p>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing
                    elit. Facilis voluptatum pariatur repellendus
                    aperiam ipsa illo beatae ratione earum? Dolorum
                    exercitationem temporibus, nisi rerum necessitatibus
                    explicabo quasi eveniet, quisquam animi molestias
                    consectetur totam tenetur? Aut odit aliquam culpa?
                    Voluptatum aut in quasi itaque maiores hic
                    consequuntur illum. Culpa ipsa praesentium
                    distinctio dignissimos maiores unde iure animi
                    similique consequatur. Molestiae hic omnis nihil,
                    animi quod soluta asperiores ex necessitatibus
                    fugiat explicabo sed nobis consectetur, debitis
                    sequi similique quae accusamus non minus odit. Sit
                    fuga animi mollitia quasi repudiandae! Minima cum
                    quisquam beatae omnis deserunt neque illum
                    laudantium impedit, asperiores velit veniam nulla!
                </p>

                <div>
                    <a href="#" class="badge bg-secondary">Simpan</a>
                    <a href="#" class="badge bg-secondary">Sitasi</a>
                </div>
            </div>
        </div>
    </div>
@endsection