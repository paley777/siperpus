@extends('dashboard.layouts.main')

@section('container')
    <style>
        .card {
            background-image: linear-gradient(to right, rgba(255, 0, 0, 0), rgb(76, 121, 255));
        }
    </style>
    <div class="container py-5">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card text-white mb-3" style="background-color: #210b81;">
            <div class=" card-header">Data Petugas</div>
            <div class="card-body">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col">
                            <div>
                                <p>Cari berdasarkan Nama</p>
                            </div>
                        </div>
                    </div>
                    <form action="/dashboard/users">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari..." name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>

                    </form>
                </div>
            </div>
            <a href="/dashboard/users/create" class="btn btn-lg btn-primary">Tambah Petugas</a>
        </div>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Foto Profil</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($users as $key => $user)
                        <td>{{ $users->firstItem() + $key }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->nip }}</td>
                        <td>{{ $user->jabatan }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->no_tlp }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img class="rounded-circle" width="100px" src="{{ asset('storage/' . $user->nama_gambar) }}">
                        </td>
                        <td>
                            <a href="/dashboard/users/{{ $user->id }}/edit" class="badge bg-warning border-0">Edit</a>

                            <form action="/dashboard/users/print" method="post" class="d-inline" target="_blank">
                                @csrf
                                <input type='hidden' name='id' value='{{ $user->id }}'>
                                <button class="badge bg-primary border-0" onclick="return confirm('Cetak Kartu?')">Cetak
                                    Kartu</button>
                            </form>

                            <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Anda Yakin?')">Hapus</button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $users->links() }} </div>
    </div>
@endsection
