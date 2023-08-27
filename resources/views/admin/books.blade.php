@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
<div id="dataBody" data-source="adminBook"></div>
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
                        @switch($item->book_status)
                            @case(0)
                                <td>Tersedia</td>
                                @break
                            @case(1)
                                <td>Dipinjam</td>
                                @break
                            @case(2)
                                <td>Hilang</td>
                                @break
                            @default
                                <span>Something went wrong, please try again</span>
                        @endswitch
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
</div>
@endsection

@section('footer')
    <script>
        //delete confirmation
        const deleteData = (id) => {
            const confirm = window.confirm('Apakah yakin ingin menghapus data?')
            if(confirm) {

                $.ajax({
                    url: "/admin/books"+ '/' + id,
                    type: "DELETE",
                    headers: headers,
                    data: {
                        id : id,
                    },
                    success: function (data) {
                        data = JSON.parse(JSON.stringify(data));
                        return alert('data dihapus');
                        location.reload();
                    },
                    error: function (data, textStatus, errorThrown) {
                        data = JSON.parse(JSON.stringify(data));
                        return alert('gagal');
                        // console.log(data.err_message);
                    },
                });
            }
        };
    </script>
@endsection