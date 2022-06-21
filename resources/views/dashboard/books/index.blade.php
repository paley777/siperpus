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
            <div class=" card-header">Data Buku</div>
            <div class="card-body">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col">
                            <div>
                                <p>Cari berdasarkan Judul Buku</p>
                            </div>
                        </div>
                    </div>
                    <form action="/dashboard/books">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari..." name="search"
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                    <form method="post" action="/dashboard/books/import" enctype="multipart/form-data">
                        <div>
                            <p>Input Data Buku dari file spreadsheet (.xlsx, .xls, .csv)</p>
                        </div>
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="file" required>
                            <button type="submit " class="btn btn-primary">Import</button>
                        </div>

                    </form>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Lihat Contoh Format Excel
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header text-black">
                                    <h5 class="modal-title" id="staticBackdropLabel">Format Excel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('storage/images/import.png') }}"
                                     style="width: 1080px;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/dashboard/books/create" class="btn btn-lg btn-primary">Tambah Buku</a>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori Rak</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Barcode</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Eksemplar</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($books as $key => $book)
                                <td>{{ $books->firstItem() + $key }}</td>
                                <td>{{ $book->rak->kategori ?? 'None' }}</td>
                                <td>{{ $book->judul }}</td>
                                <td> {!! DNS1D::getBarcodeSVG($book->no_barcode, 'EAN13', 3, 70) !!}</td>
                                <td>{{ $book->pengarang }}</td>
                                <td>{{ $book->penerbit }}</td>
                                <td>{{ $book->thn_terbit }}</td>
                                <td>{{ $book->eksemplar }}</td>
                                <td>
                                    <a href="/dashboard/books/{{ $book->id }}/edit"
                                        class="badge bg-warning border-0">Edit</a>

                                    <form action="/dashboard/books/print" method="post" class="d-inline" target="_blank">
                                        @csrf
                                        <input type='hidden' name='id' value='{{ $book->id }}'>
                                        <button class="badge bg-primary border-0"
                                            onclick="return confirm('Cetak Kartu?')">Cetak
                                            Barcode</button>
                                    </form>

                                    <form action="/dashboard/books/{{ $book->id }}" method="post" class="d-inline">
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
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
