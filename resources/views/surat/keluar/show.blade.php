<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @push('js')

@endpush


    <x-navbars.sidebar activePage="Keluar"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbar titlePage="Surat Keluar"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Detail Surat Keluar</h6>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn bg-gradient-info btn-sm mb-0" onclick="printDiv('print-area')">Cetak</button>
                                </div>
                            </div>
                        </div>

                        <hr style="border-top: 3px solid rgb(199, 196, 196);">

                        <div id="print-area" class="card-body p-3 pb-0">

                            <div
                            class="card card-body border border-radius-lg">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h6 class="mb-0">{{ $keluar->isi_ringkasan }}</h6>
                                    <span class="text-xs mt-2">{{ $keluar->keterangan }}</span>
                                </div>


                            
                            </div>

                            </div>

                            <hr style="border-top: 3px solid rgb(199, 196, 196);">

                            <div class="col-12 text-end">

                            <div class="btn-group">
                                <button class="btn py-0 my-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-lg"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/surat/keluar/{{ $keluar->id }}/edit">Edit</a>
                                    <form action="/surat/keluar/{{ $keluar->id }}" class="d-inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>

                            </div>

                            <dl class="row mt-3">

                                <dt class="col-sm-3">Nomor Surat</dt>
                                <dd class="col-sm-9">{{ $keluar->nomor_surat }}</dd>

                                <dt class="col-sm-3">Nomor Agenda</dt>
                                <dd class="col-sm-9">{{ $keluar->nomor_agenda }}</dd>
                
                                <dt class="col-sm-3">Tanggal Surat</dt>
                                <dd class="col-sm-9">{{ $keluar->formatted_tanggal_surat }}</dd>
                                                
                                <dt class="col-sm-3">Tujuan</dt>
                                <dd class="col-sm-9">{{ $keluar->tujuan }}</dd>
                
                                {{-- <dt class="col-sm-3">Tujuan</dt>
                                <dd class="col-sm-9">{{ $keluar->tujuan }}</dd> --}}
                
                                <dt class="col-sm-3">Kode Klasifikasi</dt>
                                <dd class="col-sm-9">{{ $keluar->kode_klasifikasi }}</dd>

                                <dt class="col-sm-3">Sifat Surat</dt>
                                <dd class="col-sm-9">{{ $keluar->sifat_surat }}</dd>
                
                                <dt class="col-sm-3">Dibuat oleh</dt>
                                <dd class="col-sm-9">{{ $keluar->user->name }}</dd>
                
                                <dt class="col-sm-3">Dibuat pada</dt>
                                <dd class="col-sm-9">{{ $keluar->formatted_created_at }}</dd>

                                <dt class="col-sm-3">Diperbarui pada</dt>
                                <dd class="col-sm-9">{{ $keluar->formatted_updated_at }}</dd>
                                
                            </dl>

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
