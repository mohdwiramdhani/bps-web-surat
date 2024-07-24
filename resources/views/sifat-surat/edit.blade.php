<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    @push('js')

    @endpush

    <x-navbars.sidebar activePage="sifat-surat"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbar titlePage="Sifat Surat"></x-navbar>
        <!-- End Navbar -->
        <div class="container-fluid py-4">

<!-- Create  -->
<div class=" fade" id="create" data-bs-backdrop="static" tabindex="-1">
    <div class="-dialog">
        <form class="-content" method="post" action="{{ route('sifat-surat.index') }}">
            @csrf
            <div class="-header">
                <h5 class="-title" id="createTitle">Tambah Baru</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss=""
                    aria-label="Close"
                ></button>
            </div>
            <div class="-body">
                <x-input-form name="sifat" label="Sifat Surat" />
                <x-input-form name="keterangan" label="Keterangan" />
            </div>
            <div class="-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="">
                    Batal
                </button>
                <button type="submit" class="btn btn-info">Simpan</button>
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
