@props(['titlePage'])

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mt-3 shadow-none border-radius-xl blur shadow-blur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">

        <div class="col-sm-12 col-12 col-md-3 col-lg-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('dashboard') }}">Bps Surat</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $titlePage }}</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">{{ $titlePage }}</h6>
        </nav>
        </div>

        <div class="col-sm-12 col-12 col-md-6 col-lg-6">
        <nav>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <label class="form-label">Telusuri...</label>
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}">
                    {{-- <button class="btn btn-dark" type="submit">Search</button> --}}
                </div>
            </div>
        </nav>
        </div>

        <div class="col-sm-12 col-12 col-md-3 col-lg-3" id="navbar">

            <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                @csrf
            </form>
            

            <ul class="navbar-nav justify-content-end">

                <li class="nav-item d-xl-none ps-3 me-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>

                <li class="nav-item dropdown me-3 pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bell fa-2x cursor-pointer"></i>

                    </a>
                    <ul id="notifikasi-list" class="dropdown-menu border-radius-md notifikasi-scroll dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        {{-- <button class="item border-0" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="fa-solid fa-trash fa-sm"></i>
                        </button> --}}
                        {{-- @php
                        $notifikasi->update(['is_read' => 1]);
                        @endphp --}}
                        <div class="d-flex flex-column text-end justify-content-center mb-3">
                        <button class="item border-0" onclick="return ">
                        <h5 class="text-sm font-weight-normal mb-0">
                            <span class="font-weight-bold">Tandai semua sudah dilihat</span>
                            <i class="fa-solid fa-eye"></i>
                        </h5>
                        </button>
                        </div>
                        
                        @foreach ($notifikasi->take(5) as $notif)
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href={{ $notif->link }}>
                                <div class="d-flex py-1">
                                    <div class="my-auto me-3">
                                        <i class="fa-solid fa-2x fa-envelope-open-text"></i>
                                    </div>
  
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="text-sm font-weight-normal mb-0">
                                            <span class="font-weight-bold">{{ $notif->disposisi->penerima }}</span>
                                        </h5>
                                        <h5 class="text-xs font-weight-normal mb-1">
                                            <span class="font-weight-bold">{{ $notif->masuk->nomor_surat }}</span>
                                        </h5>
                                        <h6 class="text-xs font-weight-normal mb-1">
                                            <span>{{ $notif->disposisi->status }}</span>
                                        </h6>

                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            {{ $notif->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        @endforeach

                        <div class="d-flex flex-column text-end justify-content-center">
                            <a href="{{ route('notifikasi.index') }}">
                            <button class="item p-1 border-0">
                            <h5 class="text-sm font-weight-normal mb-0">
                                <span class="font-weight-bold">Lihat lebih banyak</span>
                                <i class="fa-solid fa-angles-right"></i>
                            </h5>
                            </a>
                            </button>
                            </div>

                    </ul>
                </li>


                <li class="nav-item dropdown me-3 pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ auth()->user()->profile_picture }}" alt
                             class="w-px-40 h-auto rounded-circle"/>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">

                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ route('profile.edit') }}"><i class="fa-solid fa-user me-2"></i> Profil</a>
                        </li>

                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="{{ route('profile.settings') }}"><i class="fa-solid fa-gear me-2"></i> Pengaturan</a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li class="">
                            <a class="dropdown-item border-radius-md" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Keluar</a>
                        </li>


                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
