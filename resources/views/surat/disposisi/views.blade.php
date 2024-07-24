<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @push('js')

    

@endpush

    <x-navbars.sidebar activePage="Disposisi"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        {{-- <x-navbars.navs.auth titlePage="Disposisi" :notifikasi="$notifikasi"></x-navbars.navs.auth> --}}
        <x-navbar titlePage="Surat Disposisi"></x-navbar>
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
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-8 d-flex align-items-center">
                                    <h6 class="mb-0">Surat Disposisi

                                        </h6>
                                </div>
                                <div class="col-4 text-end">
                                    <a href="{{ route('surat.masuk.index') }}" class="btn bg-gradient-dark mb-0">
                                    Cek Surat <i class="fa-regular fa-lg fa-envelope ms-2"></i>
                                </a>
                            </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mt-3 mb-0">
                                    <thead class="bg-gradient-dark">
                                        <tr class="shadow-none border-none">
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                No</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Penerima</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Isi Disposisi</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Tenggat Waktu</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Balasan</th>
                                            <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $disposisi)
                                        <tr id="table-row-{{ $disposisi->token }}">
                                            <td class="align-middle text-center text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center text-sm">

                                                <span class="block-email">{{ $disposisi->penerima }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $disposisi->isi_disposisi }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $disposisi->tenggat_waktu }}
                                            </td>
                                            <td class="status align-middle text-center text-sm">
                                                @if ($disposisi->status == 'Sudah Dibaca')
                                                <span class="badge text-bg-success">{{ $disposisi->status }}</span>
                                            @else
                                                <span class="badge text-bg-warning">{{ $disposisi->status }}</span>
                                            @endif

                                            </td>
                                            <td class="balasan align-middle text-center text-sm">
                                                {{ $disposisi->balasan }}
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                        
                                                    
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
