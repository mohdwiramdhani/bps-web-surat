<x-layout bodyClass="g-sidenav-show bg-gray-200">

    @push('js')

    @endpush

    <x-navbars.sidebar activePage="Masuk"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbar titlePage="Surat Masuk"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">

            <div class="card card-body mx-3 mx-md-4 mt-4">

                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Edit Surat Masuk</h6>
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
                        <form action="/surat/masuk/{{ $masuk->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">

                                <input type="hidden" name="id" value="{{ $masuk->id }}">
                                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                                    <x-input-form :value="$masuk->nomor_surat" name="nomor_surat"
                                        label="Nomor Surat"/>
                                </div>
                                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                                    <x-input-form :value="$masuk->pengirim" name="pengirim" label="Pengirim"/>
                                </div>
                                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                                    <x-input-form :value="$masuk->nomor_agenda" name="nomor_agenda"
                                        label="Nomor Agenda"/>
                                </div>
                                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                                    <x-input-form :value="date('Y-m-d', strtotime($masuk->tanggal_surat))" name="tanggal_surat"
                                        label="Tanggal Surat"
                                                  type="date"/>
                                </div>
                                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                                    <x-input-form :value="date('Y-m-d', strtotime($masuk->tanggal_terima))" name="tanggal_terima"
                                        label="Tanggal Terima" type="date"/>
                                </div>
                                <div class="col-sm-12 col-12 col-md-8 col-lg-8">
                                    <x-input-textarea-form :value="$masuk->isi_ringkasan" name="isi_ringkasan"
                                        label="Isi Ringkasan"/>
                                </div>
                                <div class="col-sm-12 col-12 col-md-4 col-lg-4">
                                    <x-input-textarea-form :value="$masuk->keterangan" name="keterangan"
                                        label="Keterangan"/>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                                    <div class="mb-3">
                                        <label for="kode_klasifikasi"
                                               class="form-label">Kode Klasifikasi</label>
                                        <select class="form-select border border-2 p-2 " id="kode_klasifikasi" name="kode_klasifikasi">
                                            @foreach($klasifikasis as $klasifikasi)
                                            <option
                                            @selected(old('kode_klasifikasi', $klasifikasi->kode_klasifikasi) == $klasifikasi->kode)
                                            value="{{ $klasifikasi->kode }}">
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
                                            @selected(old('sifat_surat', $sifat->sifat_surat) == $sifat->sifat)
                                            value="{{ $sifat->sifat }}">
                                            {{ $sifat->sifat }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                                    <input type="hidden" name="oldLampiran" value="{{ $masuk->lampiran }}">
                                    <x-input-form name="lampiran" label="Lampiran File" type="file" id="lampiran"/>
                                </div>


                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Simpan</button>

                        </form>
                        

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
