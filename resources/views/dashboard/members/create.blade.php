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
                        <form method="post" action="/dashboard/members" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" required autofocus
                                        placeholder="Masukkan Nama...">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">NISN</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nisn" required
                                        placeholder="Masukkan NISN...">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tempat Lahir</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tmpt_lahir" required
                                        placeholder="Masukkan Tempat Kelahiran...">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tanggal Lahir</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jenis Kelamin</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-check-input" type="radio" name="jns_kelamin" value="Laki-Laki"
                                        checked>
                                    <label class="form-check-label">
                                        Laki-Laki
                                    </label>
                                    <input class="form-check-input" type="radio" value="Perempuan" name="jns_kelamin">
                                    <label class="form-check-label">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Alamat</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat" required
                                        placeholder="Masukkan Alamat...">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nomor Telepon</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_hp" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jenis Keanggotaan</p>
                                </div>
                                <div class="col-sm-9">
                                    <input class="form-check-input" type="radio" name="jns_anggota" value="Guru"
                                        checked>
                                    <label class="form-check-label">
                                        Guru
                                    </label>
                                    <input class="form-check-input" type="radio" value="Siswa" name="jns_anggota">
                                    <label class="form-check-label">
                                        Siswa
                                    </label>
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
                            <button class="btn btn-primary" type="submit">Tambahkan Anggota</button>
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
