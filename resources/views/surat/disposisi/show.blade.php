<x-layout bodyClass="g-sidenav-show  bg-gray-200">

  @push('js')

  @endpush

    <x-navbars.sidebar activePage="Disposisi"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbar titlePage="Surat Disposisi"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <div class="card h-100 mb-5">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Detail Surat disposisi</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn bg-gradient-info btn-sm mb-0" onclick="printDiv('print-area')">Cetak</button>
                                </div>
                            </div>
                        </div>

                        <hr style="border-top: 3px solid rgb(199, 196, 196);">

                        <div id="print-area" class="card-body p-3 pb-0">

                          <div
                          class="card card-body border border-radius-lg">

                          <div class="row">
                            <h4>Lembar Disposisi</h4>
                          </div>

                          <hr style="border-top: 3px solid rgb(199, 196, 196);">

                          <div class="row">
                              <div class="col-6 align-items-center">

                            @php
                            $disposisi->notifikasiDisposisi()->update(['is_read' => 1]);
                            @endphp        

                                <div class="mb-4">
                                  <dt>Penerima</dt>
                                  <dd>{{ $disposisi->penerima }}</dd>
                                </div>

                                <div class="mb-4">
                                  <dt>Isi Disposisi</dt>
                                  <dd>{{ $disposisi->isi_disposisi }}</dd>
                                </div>

                                <div>
                                  <dt>Catatan</dt>
                                  <dd>{{ $disposisi->catatan }}</dd>
                                </div>

                              </div>

                              <div class="col-6 text-start">

                                <div class="mb-4">                                
                                <dt>Tenggat Waktu</dt>
                                <dd>{{ $disposisi->formatted_tenggat_waktu }}</dd>
                                </div>

                                <div class="mb-4" id="table-row-{{ $disposisi->token }}">
                                <dt>Status</dt>
                                <dd class="status">
                                  @if ($disposisi->status == 'Sudah Dibaca')
                                  <span class="badge text-bg-success">{{ $disposisi->status }}</span>
                                  @else
                                      <span class="badge text-bg-warning">{{ $disposisi->status }}</span>
                                  @endif
                                </dd>
                                </div>

                                <div>
                                <dt>Balasan</dt>
                                <dd class="balasan">{{ $disposisi->balasan }}</dd>
                                </div>

                              </div>
                          
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
