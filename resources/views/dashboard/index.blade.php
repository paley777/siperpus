@extends('dashboard.layouts.main')

@section('container')
    <section>
        <div class="container">
            <div class="row mt-5 py-3">
                <div class="col">
                    @if (session()->has('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card mb-4">
                        @foreach ($users as $user)
                            <div class="card-body text-center">
                                @if ($user->nama_gambar)
                                    <img src="{{ asset('storage/' . $user->nama_gambar) }}"
                                        class="img-preview rounded-circle img-fluid" style="width: 150px;">
                                @else
                                    <img class="img-preview rounded-circle img-fluid" style="width: 150px;">
                                @endif
                                <h5 class="my-1">Hai, {{ $user->nama }}</h5>
                                <p class="text-muted mb-1">{{ $user->jabatan }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <form class="d-flex" action="/logout" method="post">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Keluar</button>
                                    </form>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <div class="card mb-4 mb-md-0 text-center" style="align-items: center;">
                                <div class="card-body">
                                    <p class="mb-4 "><span class="text-primary font-italic me-1">Data</span>
                                        Buku
                                    </p>
                                    <h2 class="text-right"><i class="bi bi-book"></i>
                                        <span class="count1" data-from="0" data-to="{{ $countbook }}"
                                            data-time="2000">0</span>
                                    </h2>
                                    <p class="m-b-0">Jumlah Buku Terdata</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body p-0">
                            <div class="card mb-4 mb-md-0 text-center" style="align-items: center;">
                                <div class="card-body">
                                    <p class="mb-4 "><span class="text-primary font-italic me-1">Data</span>
                                        Petugas
                                    </p>
                                    <h2 class="text-right"><i class="bi bi-book"></i>
                                        <span class="count2" data-from="0" data-to="{{ $countuser }}"
                                            data-time="2000">0</span>
                                    </h2>
                                    <p class="m-b-0">Jumlah Petugas Terdata</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body p-0">
                            <div class="card mb-4 mb-md-0 text-center" style="align-items: center;">
                                <div class="card-body">
                                    <p class="mb-4 "><span class="text-primary font-italic me-1">Data</span>
                                        Anggota
                                    </p>
                                    <h2 class="text-right"><i class="bi bi-book"></i>
                                        <span class="count3" data-from="0" data-to="{{ $countmember }}"
                                            data-time="2000">0</span>
                                    </h2>
                                    <p class="m-b-0">Jumlah Anggota Terdata</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 mb-md-0">
                        <div class="card-body p-0">
                            <div class="card mb-4 mb-md-0 text-center" style="align-items: center;">
                                <div class="card-body">
                                    <p class="mb-4 "><span class="text-primary font-italic me-1">Data</span>
                                        Transaksi
                                    </p>
                                    <h2 class="text-right"><i class="bi bi-book"></i>
                                        <span class="count4" data-from="0" data-to="{{ $counttransaction }}"
                                            data-time="2000">0</span>
                                    </h2>
                                    <p class="m-b-0">Jumlah Transaksi Terdata</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Lengkap</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->nama }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nomor Telepon</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->no_tlp }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->alamat }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Jabatan</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}
            @endforeach
        </div>
    </section>
    <script>
        (function($) {
            $.fn.counter = function() {
                const $this = $(this),
                    numberFrom = parseInt($this.attr('data-from')),
                    numberTo = parseInt($this.attr('data-to')),
                    delta = numberTo - numberFrom,
                    deltaPositive = delta > 0 ? 1 : 0,
                    time = parseInt($this.attr('data-time')),
                    changeTime = 10;

                let currentNumber = numberFrom,
                    value = delta * changeTime / time;
                var interval1;
                const changeNumber = () => {
                    currentNumber += value;
                    //checks if currentNumber reached numberTo
                    (deltaPositive && currentNumber >= numberTo) || (!deltaPositive && currentNumber <=
                        numberTo) ? currentNumber = numberTo: currentNumber;
                    this.text(parseInt(currentNumber));
                    currentNumber == numberTo ? clearInterval(interval1) : currentNumber;
                }

                interval1 = setInterval(changeNumber, changeTime);
            }
        }(jQuery));

        $(document).ready(function() {

            $('.count-up').counter();
            $('.count1').counter();
            $('.count2').counter();
            $('.count3').counter();
            $('.count4').counter();

            new WOW().init();

            setTimeout(function() {
                $('.count5').counter();
            }, 3000);
        });
    </script>
@endsection
