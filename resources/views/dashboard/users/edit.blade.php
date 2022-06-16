@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="row py-5">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-body">
                        <img class="img-preview rounded-circle img-fluid" style="width: 150px;">
                        <p class="text-muted mb-1">Preview Profile</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="/dashboard/users/{{ $user->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ID.</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id" required autofocus
                                        value="{{ old('id', $user->id) }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" required autofocus
                                        placeholder="Masukkan Nama..." value="{{ old('nama', $user->nama) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">NIP</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nip" required autofocus
                                        placeholder="Masukkan NIP..." value="{{ old('nip', $user->nip) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">E-mail</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" required autofocus
                                        placeholder="Masukkan e-mail..." value="{{ old('email', $user->email) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nomor Telepon</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_tlp" required autofocus
                                        placeholder="Masukkan Nomor Telepon..."
                                        value="{{ old('no_tlp', $user->no_tlp) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Alamat</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat" required autofocus
                                        placeholder="Masukkan Alamat..." value="{{ old('alamat', $user->alamat) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jabatan</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jabatan" required autofocus
                                        placeholder="Masukkan Jabatan..." value="{{ old('jabatan', $user->jabatan) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Password yang Baru</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="password" required autofocus value="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Foto Profil</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="image" name="nama_gambar"
                                        onchange="previewImage()">
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" type="submit">Ubah Petugas</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
