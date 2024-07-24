<x-layout bodyClass="g-sidenav-show bg-gray-200">

    @push('js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            form.addEventListener('submit', function() {
                // Matikan tombol submit setelah diklik
                form.querySelector('button[type="submit"]').disabled = true;
            });
        });
    </script>

    @endpush

    <x-navbars.sidebar activePage="Disposisi"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbar titlePage="Surat Disposisi"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            
            <div class="card card-body mx-3 mx-md-4 mt-4">

                <div
                class="card card-body border border-radius-lg">
                <div class="row">
                    <div class="col-12 align-items-center">
                        <h6 class="mb-0">Surat Disposisi dengan nomor surat
                            <a class="text-info" href="/surat/masuk/{{ $masuk->id }}/">
                                {{ $masuk->nomor_surat }}
                            </a>
                            </h6>
                    </div>

                </div>

                </div>

                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Tambah Baru</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        
                        <form action="{{ route('surat.disposisi.store', $masuk) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                                    <x-input-form name="penerima" label="Penerima"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                                <x-input-form name="tenggat_waktu" label="Tenggat Waktu" type="date"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-8 col-lg-8">
                                    <x-input-textarea-form name="isi_disposisi" label="Isi Disposisi"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-4 col-lg-4">
                                    <x-input-textarea-form name="catatan" label="Catatan"/>
                                </div>

                            </div>
                            <button type="submit" class="btn bg-gradient-dark" onclick="this.disabled=true;this.form.submit();">Tambahkan</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
