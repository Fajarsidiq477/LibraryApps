@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
    <div class="container mt-3">
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <span>Tambah Buku</span>
            <i class="bi bi-plus-square-fill"></i>
        </a>
        <div class="row table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="py-4">
                            <input type="checkbox" name="" id="" />
                        </th>
                        <th class="py-4">#</th>
                        <th class="py-4">Kode Buku</th>
                        <th class="py-4">Judul Buku</th>
                        <th class="py-4">Penulis Buku</th>
                        <th class="py-4">Status Buku</th>
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($book as $item)
                    <tr class="align-middle">
                        <td>
                            <input type="checkbox" name="" id="" />
                        </td>
                        <td>
                            <img src="{{ asset('cover_images/' . $item->cover) }}" alt="Book cover" width="100"/>
                        </td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->author }}</td>
                        <td>{{ $item->book_status }}</td>
                        <td>
                            <a href="{{ route('books.edit', $item->id) }}" class="btn btn-success">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <a href="#" class="btn btn-danger" onclick="deleteData('{{ $item->id }}')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        //delete confirmation
        const deleteData = (id) => {
            const confirm = window.confirm('Apakah yakin ingin menghapus data?')

            if(confirm) {
                return alert('data dihapus');
            }
        };
    </script>
@endsection