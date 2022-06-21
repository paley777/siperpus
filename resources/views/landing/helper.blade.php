@extends('landing.layouts.main')

@section('container')
    <section class="mt-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 mt-5 col-md-8 mx-auto">
                <h1 class="font-weight-normal">FAQ</h1>
                <p class=" text-muted">Frequently Asked Questions</p>
            </div>
        </div>
        <div class="accordion mb-5" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseOne">
                        Bagaimana cara meminjam buku di perpustakaan?
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body text-start">
                        <p> 1. Pastikan Anda telah terdaftar sebagai anggota perpustakaan. </p>
                        <p> 2. Anda bisa melihat ketersediaan buku yang akan dipinjam, pada halaman katalog buku. </p>
                        <p> 3. Silahkan mengambil buku yang akan dipinjam pada rak yang tertera pada informasi buku. </p>
                        <p> 4. Silahkan menghadap petugas perpustakaan, dan lakukan transaksi peminjaman. </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Bagaimana cara mengembalikan buku yang telah dipinjam?
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body text-start">
                        <p> 1. Bawa kartu anggota perpustakaan. </p>
                        <p> 2. Silahkan menghadap petugas perpustakaan untuk menyelesaikan transaksi peminjaman. </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Apa yang dimaksud dengan denda?
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body text-start">
                        <p> Denda merupakan kebijakan perpustakaan yang diberikan kepada peminjam yang melakukan transaksi
                            peminjaman
                            melebihi batas waktu yang ditentukan, yaitu 7 hari.
                            Denda akan dikenakan Rp.2000/hari keterlambatan. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
