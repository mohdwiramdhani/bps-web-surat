<x-layout bodyClass="g-sidenav-show  bg-gray-200">

<style>
    table {
  margin: 0 auto;
  -webkit-box-shadow: 0px 0px 0px 0px #000000;
   -moz-box-shadow: 0px 0px 0px 0px #000000;
		box-shadow: 0px 0px 0px 0px #000000;

        border: 2px solid #000000;  
}

.table-info {
  
          border: 2px solid #ffffff;  
}

tbody {
  text-align: center;

}

</style>


    <x-navbars.sidebar activePage="billing"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
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
                            <table class="body" cellpadding="0" cellspacing="0" class="text-center">

                                <tr>
                                    <td colspan="2"><h3 class="text-center">LEMBAR DISPOSISI</h3></td>
                                </tr>

                                <tr>
                                    <td class="p-3">
                      
                                      <table>
                                        <tr>
                                          <td>Surat Dari</td>
                                          <td>:</td>
                                          <td>{{ $disposisi->masuk->pengirim }}</td>
                                        </tr>
                                        <tr>
                                          <td>Nomor Surat</td>
                                          <td>:</td>
                                          <td>{{ $disposisi->masuk->nomor_surat }}</td>
                                        </tr>
                                        <tr>
                                          <td>Tanggal Surat</td>
                                          <td>:</td>
                                          <td>{{ $disposisi->masuk->tanggal_surat }}</td>
                                        </tr>
                                      </table>
                                    </td>
                      
                                    <td style="width: 50%; padding-left: 15px; padding-right: 15px;">
                      
                                      <table class="table-info">
                                        <tr>
                                          <td>Diterima Tanggal</td>
                                          <td>:</td>
                                          <td>{{ $disposisi->masuk->tanggal_terima }}</td>
                                        </tr>
                                        <tr>
                                          <td>Nomor Agenda</td>
                                          <td>:</td>
                                          <td>{{ $disposisi->masuk->nomor_agenda }}</td>
                                        </tr>
                                        <tr>
                                          <td>Sifat Surat</td>
                                          <td>:</td>
                                          <td>{{ $disposisi->masuk->sifat_surat }}</td>
                                        </tr>
                                      </table>
                                    </td>
                      
                                  </tr>

                                  <tr>
                                    <td colspan="2" style="padding-left: 15px; padding-right: 15px;">
                                        <h4>Isi Ringkasan</h4>
                                        <p>{{ $disposisi->masuk->isi_ringkasan }}</p>
                                      </td>
                                </tr>
                                
                                <tr>
                                  <td style="padding-left: 15px; padding-right: 15px;">
                                    <h4>Diteruskan Kepada</h4>
                                    <p>{{ $disposisi->penerima }}</p>
                                  </td>
                                  <td style="padding-left: 15px; padding-right: 15px;">
                                    <h4>Dengan hormat harap</h4>
                                    <p>{{ $disposisi->isi_disposisi }}</p>
                                  </td>
                                </tr>
                    
                                <tr>
                                    <td colspan="2" style="padding-left: 15px; padding-right: 15px;">
                                        <h4>Catatan</h4>
                                        <p>{{ $disposisi->catatan }}</p>
                                      </td>
                                </tr>
                                
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
