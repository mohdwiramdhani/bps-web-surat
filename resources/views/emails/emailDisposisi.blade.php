<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Disposisi Surat</title>

    <style>

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

    </style>
    
  </head>
  <body>
    <!-- Tabel Disposisi -->
    <table class="header" role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
              <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Logo-stmik-bina-mulia-palu.png" alt="Logo Perusahaan" width="100">
            </td>
            <td style="text-align: center;">
              <h1>KOP SURAT</h1>
              <p>Alamat AAA, Kota, Provinsi</p>
            </td>
        </tr>
      </table>
          
          <!-- Body -->
          <table class="body" border="1" cellpadding="0" cellspacing="0" style="margin: auto;">
            <tr style="text-align: center;">
              <td colspan="2"><h3 style="font-size: 20px;">LEMBAR DISPOSISI</h3></td>
            </tr>
            <tr>
              <td style="width: 50%; padding: 15px;">

                <table>
                  <tr>
                    <td>Surat Dari</td>
                    <td>:</td>
                    <td>{{ $mailData['pengirim'] }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Surat</td>
                    <td>:</td>
                    <td>{{ $mailData['nomor_surat'] }}</td>
                  </tr>
                  <tr>
                    <td>Tanggal Surat</td>
                    <td>:</td>
                    <td>{{ $mailData['tanggal_surat'] }}</td>
                  </tr>
                </table>
              </td>

              <td style="width: 50%; padding-left: 15px; padding-right: 15px;">

                <table>
                  <tr>
                    <td>Diterima Tanggal</td>
                    <td>:</td>
                    <td>{{ $mailData['tanggal_terima'] }}</td>
                  </tr>
                  <tr>
                    <td>Nomor Agenda</td>
                    <td>:</td>
                    <td>{{ $mailData['nomor_agenda'] }}</td>
                  </tr>
                  <tr>
                    <td>Sifat Surat</td>
                    <td>:</td>
                    <td>Rahasia</td>
                  </tr>
                </table>
              </td>

            </tr>

            <tr>
                <td colspan="2" style="padding-left: 15px; padding-right: 15px;">
                    <h4>Isi Ringkasan</h4>
                    <p>{{ $mailData['isi_ringkasan'] }}</p>
                  </td>
            </tr>
            
            <tr>
              <td style="padding-left: 15px; padding-right: 15px;">
                <h4>Diteruskan Kepada</h4>
                <p>{{ $mailData['penerima'] }}</p>
              </td>
              <td style="padding-left: 15px; padding-right: 15px;">
                <h4>Dengan hormat harap</h4>
                <p>{{ $mailData['isi_disposisi'] }}</p>
              </td>
            </tr>

            <tr>
                <td colspan="2" style="padding-left: 15px; padding-right: 15px;">
                    <h4>Catatan</h4>
                    <p>{{ $mailData['catatan'] }}</p>
                  </td>
            </tr>

            <tr>
                <td colspan="2" style="padding-left: 15px; padding-right: 15px;">
                    <h4>Lampiran File Surat</h4>
                    <p>{{ $mailData['lampiran_file'] }}</p>
                    {{-- <a href=""></a> --}}
                  </td>
            </tr>

            <tr>
              <td colspan="2" style="padding-left: 15px; padding-right: 15px;">
                  <h4>Balasan (optional)</h4>
                  <input type="text" name="keterangan" id="keterangan" class="form-control" required>
                  {{-- <a href=""></a> --}}
                </td>
          </tr>

            <tr>
              <td colspan="2" style="padding-left: 15px; padding-right: 15px;">

                  <div style="text-align: center;" class="div">
                  <a class="button" href="{{ $mailData['content'] }}" >Konfirmasi</a>
                  <a class="button" href="{{ $mailData['content'] }}" onclick="this.disabled=true; this.innerHTML='Sudah Konfirmasi';">Konfirmasi</a>

                  
                </div>
                  <br>
                </td>
          </tr>

            <tr>
              <td colspan="2" style="padding-left: 15px; padding-right: 15px;">
                <h1>{{ $mailData['token'] }}</h1>
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Logo-stmik-bina-mulia-palu.png" alt="Logo Perusahaan" width="100">
                </td>
          </tr>

          </table>
          
          {{-- <!-- Footer -->
          <table>
            <tr>
              <td>
                <p>Asal Dulu</p>
              </td>
            </tr>

          </table> --}}

  </body>
</html>
