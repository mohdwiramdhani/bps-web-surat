<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @push('js')

    @endpush

    <x-navbars.sidebar activePage="klasifikasi-surat"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbar titlePage="Klasifikasi Surat"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Klasifikasi Surat</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#createModal">
                                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah Baru
                                    </button>
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
                                                Kode</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Klasifikasi</th>
                                            <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Keterangan</th>
                                            <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $klasifikasi)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $klasifikasi->kode }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $klasifikasi->klasifikasi }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $klasifikasi->keterangan }}
                                            </td>
                                            <td class="text-center">
                                                <div class="table-data-feature">
                        

                                                    <a href="/klasifikasi-surat/{{ $klasifikasi->id }}/" class="item bg-info" data-toggle="tooltip" data-placement="top" title="Lihat">
                                                        <i class="fa-solid fa-eye fa-sm"></i>
                                                    </a>

                                                    <a href="/klasifikasi-surat/{{ $klasifikasi->id }}/edit" class="item bg-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa-solid fa-pencil fa-sm"></i>
                                                    </a>
                        
    
                                                    <form action="/klasifikasi-surat/{{ $klasifikasi->id }}" class="d-inline" method="post">
                                                    @csrf
                                                        @method('DELETE')
                                                    <button class="item bg-danger border-0" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa-solid fa-trash fa-sm"></i>
                                                    </button>
                                                    </form>
    
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

<!-- Create Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="post" action="{{ route('klasifikasi-surat.index') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createModalTitle">Tambah Baru</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <x-input-form name="kode" label="Kode Klasifikasi" />
                <x-input-form name="klasifikasi" label="Klasifikasi Surat" />
                <x-input-form name="keterangan" label="Keterangan" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn bg-gradient-dark">Tambahkan</button>
            </div>
        </form>
    </div>
</div>

        </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
