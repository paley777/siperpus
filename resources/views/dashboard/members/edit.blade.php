@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="row py-5">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-body">
                        @if ($member->nama_gambar)
                            <img src="{{ asset('storage/' . $member->nama_gambar) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <p class="text-muted mb-1">Preview Profile</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="/dashboard/members/{{ $member->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ID.</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id" required autofocus
                                        value="{{ old('id', $member->id) }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" required autofocus
                                        value="{{ old('nama', $member->nama) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">NISN</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nisn') is-invalid @enderror"
                                        name="nisn" required autofocus value="{{ old('nisn', $member->nisn) }}"
                                        maxlength="10" id="intTextBox2">
                                    @error('nisn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tempat Lahir</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tmpt_lahir" required
                                        value="{{ old('tmpt_lahir', $member->tmpt_lahir) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tanggal Lahir</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tgl_lahir"
                                        value="{{ $member->tgl_lahir }}">
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
                                        value="{{ old('alamat', $member->alamat) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nomor Telepon</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                        id="intTextBox" name="no_hp" value="{{ old('no_hp', $member->no_hp) }}"
                                        maxlength="15" required>
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                    <input class="form-control" accept=".jpg,.gif,.png" type="file" id="image"
                                        name="nama_gambar" onchange="previewImage()">
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
    <script>
        // Restricts input for the given textbox to the given inputFilter.
        function setInputFilter(textbox, inputFilter, errMsg) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(
                function(event) {
                    textbox.addEventListener(event, function(e) {
                        if (inputFilter(this.value)) {
                            // Accepted value
                            if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                                this.classList.remove("input-error");
                                this.setCustomValidity("");
                            }
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            // Rejected value - restore the previous one
                            this.classList.add("input-error");
                            this.setCustomValidity(errMsg);
                            this.reportValidity();
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            // Rejected value - nothing to restore
                            this.value = "";
                        }
                    });
                });
        }

        // Install input filters.
        setInputFilter(document.getElementById("intTextBox"), function(value) {
            return /^-?\d*$/.test(value);
        }, "Input Harus Angka!");
        setInputFilter(document.getElementById("intTextBox2"), function(value) {
            return /^-?\d*$/.test(value);
        }, "Input Harus Angka!");

        $('#intTextBox2').maxlength({
            alwaysShow: true,
            threshold: 10,
            warningClass: "label label-warning label-rounded label-inline",
            limitReachedClass: "label label-success label-rounded label-inline",
            separator: ' angka dari ',
            preText: 'Kamu mengetik ',
            postText: ' angka tersedia.',
            validate: true
        });
        $('#intTextBox').maxlength({
            alwaysShow: true,
            threshold: 10,
            warningClass: "label label-warning label-rounded label-inline",
            limitReachedClass: "label label-success label-rounded label-inline",
            separator: ' angka dari ',
            preText: 'Kamu mengetik ',
            postText: ' angka tersedia.',
            validate: true
        });
    </script>
@endsection
