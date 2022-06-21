@extends('dashboard.layouts.main')

@section('container')
    <style>
        .option {
            height: 50px;
            overflow: auto;
        }
    </style>

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
                                                <option class="option" value="{{ $rak->id }}" selected>{{ $rak->kategori }}
                                                </option>
                                            @else
                                                <option class="option" value="{{ $rak->id }}">{{ $rak->kategori }}</option>
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
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" required placeholder="Masukkan Judul Buku...">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nomor Barcode</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('no_barcode') is-invalid @enderror"
                                        name="no_barcode" required placeholder="Masukkan Kode Barcode..." value=""
                                        id="intTextBox1" maxlength="13">
                                    @error('no_barcode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
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
                                        name="thn_terbit" required id="intTextBox3">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Eksemplar</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="eksemplar"
                                        placeholder="Masukkan Eksemplar..." required id="intTextBox2">
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
        setInputFilter(document.getElementById("intTextBox2"), function(value) {
            return /^-?\d*$/.test(value);
        }, "Input Harus Angka!");
        setInputFilter(document.getElementById("intTextBox3"), function(value) {
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
