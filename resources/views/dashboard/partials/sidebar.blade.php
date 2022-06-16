<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
</style>
<style>
    /*
   * Sidebar
   */

    .sidebar {
        position: fixed;
        top: 1em;
        /* rtl:raw:
    right: 0;
    */
        bottom: 0;
        /* rtl:remove */
        left: 0;
        z-index: 100;
        /* Behind the navbar */
        padding: 48px 0 0;
        /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
        }
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;

    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;

    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-4 col-lg-2 d-md-block bg-light sidebar collapse">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ $active === 'index' ? 'active' : '' }}"
                        aria-current="page"><i class="bi bi-house-door"></i>
                        Beranda
                    </a>
                </li>
                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted text-uppercase">
                    <span>manajemen</span>
                </h6>
                <li>
                    <a href="/dashboard/books" class="nav-link {{ $active === 'books' ? 'active' : '' }} link-dark"><i
                            class="bi bi-journal-text"></i>
                        Data Buku
                    </a>
                </li>
                <li>
                    <a href="/dashboard/raks" class="nav-link {{ $active === 'raks' ? 'active' : '' }} link-dark"><i
                            class="bi bi-journal-text"></i>
                        Data Kategori Rak Buku
                    </a>
                </li>
                <li>
                    <a href="/dashboard/members"
                        class="nav-link {{ $active === 'members' ? 'active' : '' }} link-dark"><i
                            class="bi bi-journal-text"></i>
                        Data Anggota
                    </a>
                </li>
                <li>
                    <a href="/dashboard/users" class="nav-link {{ $active === 'users' ? 'active' : '' }} link-dark"><i
                            class="bi bi-journal-text"></i>
                        Data Petugas
                    </a>
                </li>
                <li>
                    <a href="/dashboard/transactions"
                        class="nav-link {{ $active === 'transactions' ? 'active' : '' }} link-dark"><i
                            class="bi bi-journal-text"></i>
                        Data Transaksi
                    </a>
                </li>
                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted text-uppercase">
                    <span>laporan</span>
                </h6>
                <li>
                    <a href="/dashboard/reports"
                        class="nav-link {{ $active === 'reports' ? 'active' : '' }} link-dark"><i
                            class="bi bi-box-seam"></i>
                        Unduh Laporan
                    </a>
                </li>
                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted text-uppercase">
                    <span>PROFIL</span>
                </h6>
                <li>
                    <a href="/dashboard/profiles/{{ Auth::id() }}"
                        class="nav-link {{ $active === 'profiles' ? 'active' : '' }} link-dark"><i
                            class="bi bi-person-circle"></i>
                        Profilku
                    </a>
                </li>
            </ul>
        </nav>


    </div>
</div>
