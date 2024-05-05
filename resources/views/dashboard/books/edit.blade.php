@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="row py-5">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="/dashboard/books/{{ $book->id }}">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ID.</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="id"
                                        value="{{ old('id', $book->id) }}" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Kategori</p>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-select" id="kategori" name="rak_id">
                                        @foreach ($raks as $rak)
                                            @if (old('rak_id', $book->rak_id) == $rak->id)
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
                                        value="{{ old('judul', $book->judul) }}" autofocus>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                {{-- <div class="col-sm-3">
                                    <p class="mb-0">Nomor Barcode</p>
                                </div> --}}
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_barcode" required
                                        value="{{ old('no_barcode', $book->no_barcode) }}" id="intTextBox1" maxlength="13"
                                        hidden>
                                </div>
                            </div>
                            {{-- <hr> --}}
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Pengarang</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="pengarang"
                                        value="{{ old('pengarang', $book->pengarang) }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Jilid</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="jilid"
                                        placeholder="Masukkan Jilid..." value="{{ old('jilid', $book->jilid) }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Penerbit</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="penerbit"
                                        value="{{ old('penerbit', $book->penerbit) }}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Tahun Terbit</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        value="{{ old('thn_terbit', $book->thn_terbit) }}" name="thn_terbit" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Kota Terbit</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        value="{{ old('kota_terbit', $book->kota_terbit) }}"
                                        placeholder="Masukkan Kota Terbit..." name="kota_terbit" required id="intTextBox3">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Sumber Asal</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                        value="{{ old('sumber_asal', $book->sumber_asal) }}"
                                        placeholder="Masukkan Sumber Asal..." name="sumber_asal" required id="intTextBox3">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Klasifikasi</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Masukkan Klasifikasi..."
                                        value="{{ old('klasifikasi', $book->klasifikasi) }}" name="klasifikasi" required
                                        id="intTextBox3">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Eksemplar</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="eksemplar"
                                        value="{{ old('eksemplar', $book->eksemplar) }}" required id="intTextBox2">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Keterangan</p>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="keterangan"
                                        placeholder="Masukkan Keterangan..." required
                                        value="{{ old('keterangan', $book->keterangan) }}" id="intTextBox2">
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" type="submit">Ubah Buku</button>
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
    <script>
        $(document).ready(function() {
            $('#kategori').selectize({
                sortField: 'text'
            });
        });
    </script>
@endsection
