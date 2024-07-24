<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="billing"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">

                        <h3 class="title-5 m-b-35">data table</h3>
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <a href="" class="btn btn-secondary">Cek Surat</a>
                            </div>
                            <div class="table-data__tool-right">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="property">
                                        <option selected="selected">All Properties</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm">
                                    <select class="js-select2" name="time">
                                        <option selected="selected">Today</option>
                                        <option value="">3 Days</option>
                                        <option value="">1 Week</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                            </div>
                        </div>
                    
                        <div class="table-responsive table-responsive-data2 text-center">
                            <table class="table table-data2 table-borderless">
                                <thead class="table-dark rounded">
                                    <tr>
                                        <th>No</th>
                                        <th>Sifat Surat</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <tr class="spacer"></tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $sifat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sifat->sifat }}</td>
                                        <td >{{ $sifat->keterangan }}</td>
                                       <td>
                                            <div class="table-data-feature">
                    
                                                <a href="/sifat-surat/{{ $sifat->id }}/" class="item px-3" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                                
                                                <a href="/sifat-surat/{{ $sifat->id }}/edit" class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                    

                                                <form action="/sifat-surat/{{ $sifat->id }}" class="d-inline" method="post">
                                                @csrf
                                                    @method('DELETE')
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                @endforeach
                                </tbody>
                            </table>
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
