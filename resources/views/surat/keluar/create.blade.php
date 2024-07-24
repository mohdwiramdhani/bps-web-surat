<x-layout bodyClass="g-sidenav-show bg-gray-200">

    @push('js')

    @endpush

    <x-navbars.sidebar activePage="Keluar"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbar titlePage="Surat Keluar"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="card card-body mx-3 mx-md-4 mt-4">

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
                        <form action="{{ route('surat.keluar.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                                    <x-input-form name="nomor_surat" label="Nomor Surat"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                                    <x-input-form name="nomor_agenda" label="Nomor Agenda"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                                    <x-input-form name="tujuan" label="Tujuan"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                                    <x-input-form name="tanggal_surat" label="Tanggal Surat" type="date"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-8 col-lg-8">
                                    <x-input-textarea-form name="isi_ringkasan" label="Isi Ringkasan"/>
                                </div>
                                
                                <div class="col-sm-12 col-12 col-md-4 col-lg-4">
                                    <x-input-textarea-form name="keterangan" label="keterangan"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="kode_klasifikasi"
                                               class="form-label">Kode Klasifikasi</label>
                                        <select class="form-select border border-2 p-2 " id="kode_klasifikasi" name="kode_klasifikasi">
                                            @foreach($klasifikasis as $klasifikasi)
                                                <option
                                                    value="{{ $klasifikasi->kode }}"
                                                    @selected(old('kode_klasifikasi') == $klasifikasi->kode)>
                                                    {{ $klasifikasi->klasifikasi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="sifat_surat" class="form-label">Sifat Surat</label>
                                        <select class="form-select border border-2 p-2 " id="sifat_surat" name="sifat_surat">
                                            @foreach($sifats as $sifat)
                                                <option
                                                    value="{{ $sifat->sifat }}"
                                                    @selected(old('sifat_surat') == $sifat->sifat)>{{ $sifat->sifat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                                    <x-input-form name="lampiran" label="Lampiran File" type="file" id="lampiran"/>
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
