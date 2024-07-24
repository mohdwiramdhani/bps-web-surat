<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @push('js')

@endpush

    <x-navbars.sidebar activePage="surat-masuk"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbar titlePage="Masuk"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    @if(Session::has('success'))
                    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                        <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                            <div class="d-flex">
                                <div class="toast-body">
                                    {{ Session::get('success') }}
                                </div>
                                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif
                

                    <div class="card my-4">
                        <div class="card-header mb-3 pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Notifikasi Disposisi</h6>
                                </div>
                            </div>
                        </div>

                        <hr style="border-top: 3px solid rgb(199, 196, 196);">

                        <div id="print-area" class="card-body p-3 pb-0">

                            @foreach ($data as $notifikasi)
                                
                            <div class="card card-body mb-4 border border-radius-lg">
                                <div class="row">
                                    <div class="col-10 align-items-center">
                                        <h6 class="mb-0">{{ $notifikasi->pesan }}</h6>
                                    </div>
                                    
                                    <div class="col-2 text-end">
                                        <form action="/notifikasi/{{ $notifikasi->id }}" class="d-inline" method="post">
                                            @csrf
                                                @method('DELETE')
                                            <button class="item bg-white border-0" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fa-regular fa-xl fa-trash-can"></i>
                                            </button>
                                            </form>
                                    </a>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        @endforeach
                        
                        </div>

                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                {{ $data->links('pagination::bootstrap-5') }}
              </div>

        </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
