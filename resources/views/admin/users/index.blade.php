@extends('layouts.master2')

@section('header')
    @include('partials.test.navbar')
    @include('partials.test.navbar-admin')
@endsection

@section('main')
    <div class="container my-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary text-white">
            <span>Tambah User</span>
            <i class="bi bi-plus-square"></i>
        </a>

        {{-- form delete hidden --}}
        <form action="" method="POST" id="form-delete">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        @if (session('success'))
            <div class="alert alert-success mt-2">
                {{ session('success.message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger mt-2">
                {{ session('error.message') }}
            </div>
        @endif
        <div class="row table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th class="py-4">
                            <input type="checkbox" name="" id="" />
                        </th>
                        <th class="py-4">#</th>
                        <th class="py-4">NIM</th>
                        <th class="py-4">Nama Lengkap</th>
                        <th class="py-4">Role</th>
                        <th class="py-4">Nomor HP</th>
                        <th class="py-4">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $i => $user)
                        <tr class="align-middle">
                            <td>
                                <input type="checkbox" name="" id="" />
                            </td>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            @if($user->role == '0')
                                <td>Super Admin</td>
                            @elseif($user->role == '1')
                                <td>Admin</td>
                            @elseif($user->role == '2')
                                <td>Member</td>
                            @endif
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a
                                    href="{{ route('users.edit', $user->id) }}"
                                    class="badge text-dark btn btn-warning text-white"                                  
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <a
                                    href="#"
                                    class="badge text-dark btn btn-danger text-white"
                                    onclick="deleteData('{{ $user->id }}')"
                                >
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection

@section('footer')
    <script>
        //delete confirmation
            const deleteData = (id) => {
                const confirm = window.confirm('Apakah yakin ingin menghapus data?')
                const formDelete = document.querySelector('#form-delete');

                if(confirm) {
                    formDelete.setAttribute('action', `/admin/users/` + id);
                    formDelete.submit();
                    return;
                }

                return alert('batal menghapus');
            };

        $('.page-link')[0].innerHTML = "<";
        $('.page-link')[1].innerHTML = ">";
    
    </script>
@endsection