<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @push('js')

    @endpush

    <x-navbars.sidebar activePage="Dashboard"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbar titlePage="Dashboard"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid py-4">

        <div class="row">

            <div class="col-lg-8 mb-4 order-0">
                <div class="card mb-4">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h4 class="card-title text-primary">{{ $greeting }} {{ auth()->user()->name }}</h4>
                                <p class="mb-4">
                                    Hari Jumat
                                </p>
                                <p style="font-size: smaller" class="text-gray">*) Hari ini</p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{asset('sneat/img/man-with-laptop-light.png')}}" height="140"
                                     alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                     data-app-light-img="illustrations/man-with-laptop-light.png">
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3"
                                 style="position: relative;">
                                <div class="">
                                    <div class="card-title">
                                        <h5 class="text-nowrap mb-2">{{ __('dashboard.today_graphic') }}</h5>
                                        <span class="badge bg-label-warning rounded-pill">{{ __('dashboard.today') }}</span>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <small class="text-success text-nowrap fw-semibold">
                                            <i class="bx bx-chevron-up"></i> %
                                        </small>
                                        <h3 class="mb-0 display-4"></h3>
                                    </div>
                                </div>
                                <div id="profileReportChart" style="min-height: 80px; width: 80%">
                                    <div id="today-graphic"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="material-icons opacity-10">account_balance</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Surat Masuk</h6>
                                <span class="text-xs">Belong Interactive</span>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">+$2000</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="material-icons opacity-10">account_balance</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Salary</h6>
                                <span class="text-xs">Belong Interactive</span>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">+$2000</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="material-icons opacity-10">account_balance</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Salary</h6>
                                <span class="text-xs">Belong Interactive</span>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">+$2000</h5>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-header mx-4 p-3 text-center">
                                <div
                                    class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                    <i class="material-icons opacity-10">account_balance</i>
                                </div>
                            </div>
                            <div class="card-body pt-0 p-3 text-center">
                                <h6 class="text-center mb-0">Salary</h6>
                                <span class="text-xs">Belong Interactive</span>
                                <hr class="horizontal dark my-3">
                                <h5 class="mb-0">+$2000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
