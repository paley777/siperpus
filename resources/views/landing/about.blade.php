@extends('landing.layouts.main')

@section('container')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <div class="container py-5 mt-4">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 col-md-6 order-2 order-md-1 mt-4 pt-2 mt-sm-0 opt-sm-0">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                    <img src="{{ asset('storage/images/1.jpg') }}" class="img-fluid" alt="Image"
                                        style="width: 100%; height:362px; object-fit: cover;" />
                                    <div class="img-overlay bg-dark"></div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end col-->

                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                    <img src="{{ asset('storage/images/2.jpg') }}" class="img-fluid" alt="Image"
                                        style="width: 100%; height:350px; object-fit: cover;" />
                                    <div class="img-overlay bg-dark"></div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                    <img src="{{ asset('storage/images/3.jpg') }}" class="img-fluid" alt="Image"
                                        style="width: 350px; height:300px; object-fit: cover;" />
                                    <div class="img-overlay bg-dark"></div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end col-->

            <div class="col-lg-6 col-md-6 col-12 order-1 order-md-2">
                <div class="section-title ml-lg-5">
                    <h5 class="text-custom font-weight-normal mb-3">Tentang Kami</h5>
                    <h4 class="title mb-4">
                        SIPerpus <br />
                        Sistem Informasi Perpustakaan SMP Negeri 1 Kota Bengkulu
                    </h4>
                    <p class="text-muted mb-3">SIPerpus adalah situs perpustakaan SMP Negeri 1 Kota Bengkulu. SIPerpus
                        memiliki fitur OPAC (Open Public Access Catalog), Helper (Bantuan), fitur pinjam-kembali buku yang
                        sangat memudahkan siswa dalam mengakses perpustakaan.</p>

                    <a href="#visimisi" class="btn  btn-outline-primary btn-lg mx-1">Visi dan Misi</a>
                    <a href="#struktur" class="btn  btn-outline-primary btn-lg mx-1">Struktur Organisasi</a>
                    <a href="#kontak" class="btn  btn-outline-primary btn-lg mx-1">Kontak dan Lokasi</a>
                </div>
            </div>
        </div>
        <div class="row pb-0 align-items-center rounded-3 border shadow-lg mb-5" id="visimisi">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h4 class="title">Visi dan Misi</h4>
                    </div>
                </div>
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h4 class="title">Visi</h4>
                        <p>Unggul dalam prestasi berdasarkan imtaq, berkarakter, cerdas, tanggap, cakap, berbudaya
                            lingkungan,
                            dan terampil mengimplementasikan diri pada era globalisasi
                        </p>
                        <h4 class="title">Misi</h4>
                        <p>1. Menerapkan manajemen bertaraf internasional yang unggul.</p>
                        <p>2. Meningkatkan standar ketuntasan belajar, prestasi belajar, dan internasional.</p>
                        <p>3. Menerapkan pembelajaran yang aktif, efektif, dan menyenangkan dengan pendekatan Saintifik
                            untuk melaksanakan Kurikulum 2013.</p>
                        <p>4. Mengembangkan inovasi pendidikan.</p>
                        <p>5. Mewujudkan pendidikan yang bermutu, efisien, dan relevan serta berdaya saing tinggi baik di
                            tingkat nasional maupun internasional.</p>
                        <p>6. Mewujudkan pendidikan dengan kelulusan yang cerdas, terampil, beriman, bertaqwa serta memiliki
                            keunggulan kompetitif di era globalisasi.</p>
                        <p>7. Mewujudkan sistem pendidikan yang transparan, akuntabel, artisipatif, dan efektif.</p>
                        <p>8. Mewujudkan pencapaian kompetensi siswa yang mampu bersaing dalam era globalisasi.</p>
                        <p>9. Mengembangkan sikap taat, disiplin, tertib, tangguh, terampil dan cakap.</p>
                        <p>10.Mengembangan persepsi apresiasi dan kreasi seni serta keolahragaan.</p>
                        <p>11.Mengoptimalkan kegiatan ektrakurikuler di bidang keagamaan.</p>
                        <p>12.Meningkatkan budaya gemar menulis, membacca, dan mengadakan penelitian yang berskala
                            internasional.</p>
                        <p>13.Menata lingkungan dan ruang belajar.</p>
                        <p>14.Melaksanakan kurikulum muatan lokal yang berwawasan global.</p>
                        <p>15.Melaksanakan dan mengembangan inovasi pembelajaran.</p>
                        <p>16.Melaksanakan dan mengembangkan berdasarkan BSNP.</p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <div class="lc-block"><img class="rounded-start" src="{{ asset('storage/images/2.jpg') }}"
                        style="width: 100%; height:500px; object-fit: cover;"></div>
            </div>
        </div>
        <div class="row pb-0  align-items-center rounded-3 border shadow-lg mb-5" id="struktur">
            <div class="col-lg-4  p-0 overflow-hidden shadow-lg">
                <div class="lc-block"><img class="rounded-start" src="{{ asset('storage/images/1.jpg') }}"
                        style="width: 100%; height:500px; object-fit: cover;"></div>
            </div>
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h4 class="title">Struktur Organisasi</h4>

                    </div>
                </div>
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h4 class="title">Kepala Sekolah</h4>
                        <p class="lead">Idiarman, M.Pd</p>
                        <h4 class="title">Waka Kesiswaan</h4>
                        <p class="lead">Juhariah, S.Pd</p>
                        <h4 class="title">Waka Bid. Kurikulum</h4>
                        <p class="lead">Asrul Usadi, S.Pd</p>
                        <h4 class="title">Waka ORTALA</h4>
                        <p class="lead">Dulhanan, S.Pd</p>
                        <h4 class="title">Waka BID. SAPRASHUMAS</h4>
                        <p class="lead">Drs. Suherman</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row pb-0  align-items-center rounded-3 border shadow-lg mb-5" id="kontak">
            <div class="col">
                <div class="p-3">

                    <h4 class="title">Lokasi</h4>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.082809753215!2d102.25917141467555!3d-3.7921410972412835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36b0240eef160b%3A0x6281df2149bd7ac0!2sSMP%20Negeri%201%20Kota%20Bengkulu!5e0!3m2!1sid!2sid!4v1653157648108!5m2!1sid!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                    <h4 class="title">Kontak Kami</h4>
                    <p><i class="bi bi-telephone"></i> 0896-3204-6116</p>
                    <p><i class="bi bi-envelope"></i> valleryan1212@gmail.com</p>
                </div>
            </div>
        </div>
    @endsection
