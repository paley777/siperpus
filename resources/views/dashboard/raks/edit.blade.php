@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="row py-5">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="/dashboard/raks/{{ $rak->id }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ID.</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id"
                                        value="{{ old('id', $rak->id) }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Kategori</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                        name="kategori" required value="{{ old('kategori', $rak->kategori) }}">
                                    @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" type="submit">Ubah Kategori</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
    </section>
@endsection
