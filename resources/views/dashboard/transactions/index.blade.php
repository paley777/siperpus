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
            <div class=" card-header">Data Transaksi</div>

            <a href="/dashboard/transactions/create" class="btn btn-lg btn-primary">Tambah Transaksi Peminjaman</a>
        </div>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Buku yang Dipinjam</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tenggat Waktu</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Status</th>
                    <th scope="col">Denda</th>
                    <th scope="col">Jumlah Pinjam</th>
                    <th scope="col">Jumlah Hari</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php $a = 1; ?>
                    @foreach ($transactions as $transaction)
                        <td>{{ $a++ }}</td>
                        <td>{{ $transaction->book->judul }}</td>
                        <td>{{ $transaction->user->nama }}</td>
                        <td>{{ $transaction->member->nama }}</td>
                        <td>{{ $transaction->tgl_pinjam }}</td>
                        <td>{{ $transaction->tgl_kembali }}</td>
                        <td>{{ $transaction->tgl_pengembalian }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->denda }}</td>
                        <td>{{ $transaction->jml_pinjam }}</td>
                        <td>{{ $transaction->jml_hari }}</td>
                        <td>
                            @if ($transaction->status == 'PEMINJAMAN')
                                <a href="/dashboard/transactions/{{ $transaction->id }}/edit"
                                    class="badge bg-warning border-0">Edit</a>
                                <form action="/dashboard/transactions/createpengembalian" method="post"
                                    class="d-inline">
                                    @csrf
                                    <input type="hidden" class="form-control" id="hasil" name="id" required readonly
                                        value="{{ $transaction->id }}">
                                    <button class="badge bg-danger border-0">Pengembalian</button>
                                </form>
                                <form action="/dashboard/transactions/{{ $transaction->id }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>
                            @else
                                <a href="/dashboard/transactions/{{ $transaction->id }}/edit"
                                    class="badge bg-warning border-0">Edit</a>

                                <form action="/dashboard/transactions/{{ $transaction->id }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>
                            @endif

                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
