@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="row py-5">
            <div class="col-lg-10">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="/dashboard/transactions">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Buku yang Dipinjam</p>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-select" id="buku" name="book_id">
                                        @foreach ($books as $book)
                                            <option value="{{ $book->id }}">{{ $book->judul }} | Eksemplar
                                                Tersedia : {{ $book->eksemplar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="user_id" required
                                        value="{{ Auth::id() }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Peminjam</p>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-select" id="peminjam" name="member_id">
                                        @foreach ($members as $member)
                                            @if (old('member_id') == $member->id)
                                                <option value="{{ $member->id }}" selected>{{ $member->nama }}
                                                </option>
                                            @else
                                                <option value="{{ $member->id }}">{{ $member->nama }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tanggal Peminjaman</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="date" id="pinjam" class="form-control" name="tgl_pinjam"
                                        value="<?php echo date('Y-m-d'); ?>" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tenggat Pengembalian</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_kembali"
                                        value="<?php
                                        $Date1 = date('Y-m-d');
                                        echo date('Y-m-d', strtotime($Date1 . ' + 7 day')); ?>" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jumlah Eksemplar yang Dipinjam (Jangan melebihi eksemplar
                                        tersedia)</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jml_pinjam" required
                                        id="eksemplarubah">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jenis Transaksi</p>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-select" name="status" onchange="yesnoCheck(this);">
                                        <option value="PEMINJAMAN">PEMINJAMAN
                                        </option>
                                        {{-- <option value="PENGEMBALIAN">PENGEMBALIAN
                                        </option> --}}
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" type="submit">Tambahkan Transaksi</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#buku').selectize({
                sortField: 'text'
            });
        });
        $(document).ready(function() {
            $('#peminjam').selectize({
                sortField: 'text'
            });
        });
    </script>
@endsection
