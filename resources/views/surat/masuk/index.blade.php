<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @push('js')

@endpush

    <x-navbars.sidebar activePage="Masuk"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbar titlePage="Surat Masuk"></x-navbar>
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
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Surat Masuk</h6>
                                </div>
                                <div class="col-6 text-end">
                                        <a href="{{ route('surat.masuk.create') }}" class="btn bg-gradient-dark mb-0">
                                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah Baru
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
                                                Nomor Surat</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Tanggal Surat</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Isi Ringkasan</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Nomor Agenda</th>
                                            <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Pengirim</th>
                                            <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Kode Klasifikasi</th>
                                            <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $masuk)
                                        <tr >
                                            <td class="align-middle text-center text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $masuk->nomor_surat }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $masuk->tanggal_surat }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $masuk->isi_ringkasan }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $masuk->nomor_agenda }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $masuk->pengirim }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $masuk->kode_klasifikasi }}
                                            </td>
                                            <td>

                                                <div class="table-data-feature mb-3">

                                                <a href="{{ route('surat.disposisi.index', $masuk) }}" class="badge bg-gradient-success text-xs p-2">
                                                    Disposisi
                                                    <span class="border border-3 box-shadow badge rounded-pill bg-success">{{ $masuk->jumlahDisposisi() }}</span>
                                                </a>

                                            </div>

                                                <div class="table-data-feature">
                        
                                                    
                                                    <a href="/surat/masuk/{{ $masuk->id }}/" class="item bg-info" data-toggle="tooltip" data-placement="top" title="Lihat">
                                                        <i class="fa-solid fa-eye fa-sm"></i>
                                                    </a>

                                                    <a href="/surat/masuk/{{ $masuk->id }}/edit" class="item bg-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa-solid fa-pencil fa-sm"></i>
                                                    </a>
    
                                                    <form action="/surat/masuk/{{ $masuk->id }}" class="d-inline" method="post">
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

        </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>