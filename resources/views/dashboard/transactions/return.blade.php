@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="row py-5">
            <div class="col-lg-10">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="/dashboard/transactions/prosespengembalian">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Buku yang Dipinjam</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="book" required
                                        value="{{ $transaction->book->judul }}" readonly>
                                </div>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="id" required
                                        value="{{ $transaction->id }}" readonly>
                                </div>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="book_id" required
                                        value="{{ $transaction->book_id }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="user_id" required
                                        value="{{ $transaction->user_id }}" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Peminjam</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="user_id" required
                                        value="{{ $transaction->member->nama }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tanggal Peminjaman</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="date" id="pinjam" class="form-control" name="tgl_pinjam"
                                        value="{{ $transaction->tgl_pinjam }}" readonly>
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
                                        echo date('Y-m-d', strtotime($transaction->tgl_pinjam . ' + 7 day')); ?>" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jumlah Eksemplar yang Dipinjam (Jangan melebihi eksemplar
                                        tersedia)</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jml_pinjam" required id="eksemplarubah"
                                        value="{{ $transaction->jml_pinjam }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jenis Transaksi</p>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-select" name="status">
                                        <option value="PENGEMBALIAN" selected>PENGEMBALIAN
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Tanggal Pengembalian</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="kembali" name="tgl_pengembalian"
                                            value="<?php echo date('Y-m-d'); ?>" min="<?php
                                            echo date('Y-m-d', strtotime($transaction->tgl_pinjam . ' + 7 day')); ?>"
                                            onchange="PinjamFunction()">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Total Hari Peminjaman</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="hasil" name="jml_hari" required
                                            readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Denda Rp.2000/Hari(Maksimal 7 Hari Peminjaman) </p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="denda" name="denda" required
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" type="submit">Selesaikan Transaksi</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </section>
    <script>
        function PinjamFunction() {
            var datepinjam = new Date($('#pinjam').val());
            var datekembali = new Date($('#kembali').val());

            var difference = datekembali.getTime() - datepinjam.getTime();
            var Difference_In_Days = difference / (1000 * 3600 * 24);
            document.getElementById("hasil").value = Difference_In_Days;

            if (Difference_In_Days > 7) {
                var haridenda = Difference_In_Days - 7;
                var denda = 2000 * haridenda;
                document.getElementById("denda").value = denda;
            } else {
                document.getElementById("denda").value = 0;
            }
        }

        function EksemplarFunction() {
            var eksemplarawal = document.getElementById("eksemplarawal").value;
            var eksemplarubah = document.getElementById("eksemplarubah").value;
        }
    </script>
@endsection
