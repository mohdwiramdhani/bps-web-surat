<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @push('js')

@endpush

    <x-navbars.sidebar activePage="agenda-keluar"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbar titlePage="Agenda Keluar"></x-navbar>
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
                                    <h6 class="mb-0">Agenda keluar</h6>
                                </div>
                                <div class="col-6 text-end">
                                        <a href="{{ route('surat.keluar.create') }}" class="btn bg-gradient-dark mb-0">
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
                                                Nomor Agenda</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Nomor Surat</th>
                                            <th
                                                class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                Tujuan</th>
                                                <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Isi Ringkasan</th>
                                                <th
                                                class="text-center text-uppercase text-white font-weight-bolder opacity-9">
                                                Keterangan</th>
                                                <th
                                                    class="text-uppercase text-center text-white font-weight-bolder opacity-9">
                                                    Tanggal Surat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $keluar)
                                        <tr >
                                            <td class="align-middle text-center text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $keluar->nomor_agenda }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $keluar->nomor_surat }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $keluar->tujuan }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $keluar->isi_ringkasan }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $keluar->keterangan }}
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {{ $keluar->formatted_tanggal_surat }}
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
