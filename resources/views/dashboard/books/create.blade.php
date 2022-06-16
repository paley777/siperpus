@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="row py-5">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="/dashboard/books">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Kategori</p>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-select" name="rak_id">
                                        @foreach ($raks as $rak)
                                            @if (old('rak_id') == $rak->id)
                                                <option value="{{ $rak->id }}" selected>{{ $rak->kategori }}
                                                </option>
                                            @else
                                                <option value="{{ $rak->id }}">{{ $rak->kategori }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Judul Buku</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="judul" required
                                        placeholder="Masukkan Judul Buku...">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nomor Barcode</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_barcode" required
                                        placeholder="Masukkan Kode Barcode..." value="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Pengarang</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pengarang"
                                        placeholder="Masukkan Pengarang..." required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Penerbit</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="penerbit"
                                        placeholder="Masukkan Penerbit..." required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tahun Terbit</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Masukkan Tahun Terbit..."
                                        name="thn_terbit" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Eksemplar</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="eksemplar"
                                        placeholder="Masukkan Eksemplar..." required>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" type="submit">Tambahkan Buku</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </section>
@endsection
