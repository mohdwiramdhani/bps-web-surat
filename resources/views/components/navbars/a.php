@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-2 font-weight-bold lead text-white">BPS Surat</span>
        </a>
        
    </div>

    <hr class="horizontal light mt-0 mb-2">

        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'Dashboard' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center mb-2 me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-house ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Menu Surat</h6>
            </li>

            <li class="nav-item">
            <a class="nav-link text-white {{ $activePage == 'Masuk' || $activePage == 'Keluar' ? 'active bg-gradient-primary' : '' }} " data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1.2rem;" class="fas fa-envelope ps-2 pe-2 text-center"></i>
                </div>
                <span class="nav-link-text ms-1">Surat</span>
            </a>
                <ul class="collapse ul-sub my-3" id="collapseExample">

                    <li class="nav-item list-sub">
                        <a class="d-flex link-sub text-white" href="{{ route('surat.masuk.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i style="font-size: 1rem;" class="fas fa-download text-center"></i>
                        </div>
                        <span class="nav-link-text ms-1">Surat Masuk</span>
                        </a>
                    </li>
                    <li class="nav-item list-sub">
                        <a class="nav-link text-white {{ $activePage == 'Masuk' ? 'active' : '' }} " href="{{ route('surat.masuk.index') }}" >
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-download text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Masuk</span>
                        </a>
                    </li>

                    <li class="nav-item list-sub">
                        <a class="nav-link text-white {{ $activePage == 'Keluar' ? 'active' : '' }} "
                            href="{{ route('surat.keluar.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i style="font-size: 1rem;" class="fas fa-upload text-center"></i>
                            </div>
                            <span class="nav-link-text ms-1">Surat Keluar</span>
                        </a>
                    </li>

                </ul>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'Disposisi' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('surat.disposisi.views') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-envelopes-bulk ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Surat Disposisi</span>
                </a>
            </li>

            <hr class="mx-3" style="border-top: 3px solid rgb(199, 196, 196);">

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Menu Agenda</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'agenda-masuk' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('agenda.masuk') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-envelope ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Agenda Masuk</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'agenda-keluar' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('agenda.keluar') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-envelope-open ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Agenda Keluar</span>
                </a>
            </li>

            <hr class="mx-3" style="border-top: 3px solid rgb(199, 196, 196);">

            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Menu Lainnya</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'klasifikasi-surat' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('klasifikasi-surat.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-rectangle-list ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Klasifikasi Surat</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'sifat-surat' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('sifat-surat.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-envelope-open-text ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sifat Surat</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'sifat-surat' ? 'active bg-gradient-primary' : '' }} "
                    href="{{ route('sifat-surat.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-envelope-open-text ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Galeri Surat</span>
                </a>
            </li>

        </ul>

</aside>
