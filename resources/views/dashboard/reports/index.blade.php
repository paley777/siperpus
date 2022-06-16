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
            <div class=" card-header">Laporan</div>
            <div class="card-body">
            </div>
            <div class="row">
                <div class="col">
                    <a href="/dashboard/reports/books" class="btn btn-sm btn-primary">Cetak Laporan Buku</a>
                    <a href="/dashboard/reports/users" class="btn btn-sm btn-primary">Cetak Laporan Petugas</a>
                    <a href="/dashboard/reports/members" class="btn btn-sm btn-primary">Cetak Laporan Anggota</a>
                    <a href="/dashboard/reports/confirm/transactions" class="btn btn-sm btn-primary">Cetak Laporan Transaksi</a>
                </div>
            </div>

        </div>
    </div>
@endsection
