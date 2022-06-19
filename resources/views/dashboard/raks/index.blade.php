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
            <div class=" card-header">Data Kategori Rak</div>
            <div class="card-body">
            </div>
            <a href="/dashboard/raks/create" class="btn btn-lg btn-primary">Tambah Kategori Rak</a>
        </div>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($raks as $key => $rak)
                        <td>{{ $raks->firstItem() + $key }}</td>
                        <td>{{ $rak->kategori }}</td>
                        <td>
                            <a href="/dashboard/raks/{{ $rak->id }}/edit" class="badge bg-warning border-0">Edit</a>

                            <form action="/dashboard/raks/{{ $rak->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Data buku dengan kategori yang sama akan terhapus, Anda yakin menghapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $raks->links() }} </div>
    </div>
@endsection
