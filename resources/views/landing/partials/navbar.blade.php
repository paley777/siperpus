<style>
    .navbar {
        background-image: linear-gradient(to right, rgba(255, 0, 0, 0), rgb(76, 121, 255));

    }

</style>

<nav class="navbar fixed-top navbar-dark navbar-expand-lg" style="background-color: #210b81;">
    <div class="container-fluid px-4">
        <a class="navbar-brand mb-0 h1" href="/">SIPerpus</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'index' ? 'active' : '' }}" aria-current="page"
                        href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'opac' ? 'active' : '' }}" href="/opac">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'about' ? 'active' : '' }}" href="/about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'helper' ? 'active' : '' }}" href="/helper">Bantuan</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a class="btn btn-outline-light" href="/login">Masuk</a>
            </form>
        </div>
    </div>
</nav>
