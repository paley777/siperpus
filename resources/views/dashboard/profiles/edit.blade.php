@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="row py-5">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-body">
                        @if ($user->nama_gambar)
                            <img src="{{ asset('storage/' . $user->nama_gambar) }}"
                                class="img-preview rounded-circle img-fluid" style="width: 150px;">
                        @else
                            <img class="img-preview rounded-circle img-fluid" style="width: 150px;">
                        @endif
                        <p class="text-muted mb-1">Preview Profile</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="/dashboard/profiles/{{ $user->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ID.</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id" required autofocus
                                        value="{{ $user->id }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nama Lengkap</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" required autofocus
                                        value="{{ old('nama', $user->nama) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">E-mail</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" required autofocus
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nomor Telepon</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_tlp" required autofocus
                                        value="{{ $user->no_tlp }}" id="intTextBox1" maxlength="15">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Alamat</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="alamat" required autofocus
                                        value="{{ $user->alamat }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jabatan</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jabatan" required autofocus
                                        value="{{ $user->jabatan }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Password yang Baru</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="password" required autofocus>
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
                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
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
        setInputFilter(document.getElementById("intTextBox1"), function(value) {
            return /^-?\d*$/.test(value);
        }, "Input Harus Angka!");
      

        $('#intTextBox1').maxlength({
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
