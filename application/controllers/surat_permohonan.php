<?php
defined('BASEPATH') OR exit('No direct script acces allowed');

/**
* 
*/
class Surat_permohonan extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('m_proses'));
		$this->load->helper(array('form', 'url', 'file'));
	}

	public function konversiTanggal($tanggal){
		$pecahan = explode("-", $tanggal);
		$tahun   = $pecahan[0];
    $bulan   = $pecahan[1];
		$hari    = $pecahan[2];

		switch ($bulan) {
			case '01':
      $bulan = "Januari";
      break;
      case '02':
      $bulan = "Februari";
      break;
      case '03':
      $bulan = "Maret";
      break;
      case '04':
      $bulan = "April";
      break;
      case '05':
      $bulan = "Mei";
      break;
      case '06':
      $bulan = "Juni";
      break;
      case '07':
      $bulan = "Juli";
      break;
      case '08':
      $bulan = "Agustus";
      break;
      case '09':
      $bulan = "September";
      break;
      case '10':
      $bulan = "Oktober";
      break;
      case '11':
      $bulan = "November";
      break;
      case '12':
      $bulan = "Desember";
      break;
    }

    $tanggal = $hari." ".$bulan." ".$tahun;

    return $tanggal;
  }

  public function permohonanHunian($params){
		//configurasi
    header("Content-Type: application/vnd.msword");
    header("Content-Disposition: attachment; Filename=izin_Hunian.doc");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expire: 0");

		//mengambil nilai
    $user = $this->session->userdata('username');
    $query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
    $user = mysql_fetch_array($query);
    $nip = $user['nip'];

    $data = $this->m_proses->selectData($nip);

    foreach ($data as $row) {
     $nama     = ucwords(strtolower($row->nama_lkp));
     $nip      = $row->nip;
     $bidang   = $row->bagian;
     $jabatan  = $row->jabatan;
     $golongan = $row->golongan;
     break;
   }

   $nomorSurat = $params['nosrt'];
   $tanggalan    = $params['tglmohon'];

   $tanggal    = $this->konversiTanggal($tanggalan);

   echo '
   <html>
   <body>
    <table>
      <tr>
        <td width="5%">
          <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
        </td>
        <td align="center">
          <p style="font-family: arial; font-size: 12pt;">
            <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
              DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
              KANTOR WILAYAH DJBC JAWA TIMUR II</b>
            </p>
            <p style="font-family: arial; font-size: 8pt;">
              JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
              Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      </table>
      <p style="font-family: arial; font-size: 11pt; text-align: center;">
        <b>JUDUL SURAT<br/>
         BAGIAN / BIDANG '.$bidang; echo '</b>
       </p>
       <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nomor</td>
            <td width="23">:</td>
            <td>'.$nomorSurat; echo '</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:  </td>
            <td>'.$tanggal; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nama</td>
            <td width="23">:</td>
            <td width="220">'.$nama; echo '</td>
            <td width="98">Pangkat / Gol</td>
            <td width="23">:</td>
            <td>'.$golongan; echo '</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>'.$jabatan; echo '</td>
            <td>NIP</td>
            <td>: </td>
            <td>'.$nip; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      Isi Surat <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="420">Menyetujui,</td>
            <td></td>
          </tr>
          <tr>
            <td>Kuasa Pengguna Barang</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
            <td></td>
          </tr>
          <tr>
            <td>Kepala Bagian Umum,</td>
            <td>Yang Mengajukan,</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sugeng Harianto</td>
            <td>'.$nama; echo '</td>
          </tr>
          <tr>
            <td>NIP 19630305 198601 1 001</td>
            <td>NIP '.$nip; echo '</td>
          </tr>
        </p>
      </table>
    </body>
    </html>
    '
    ;
  }

  public function printIzinHunian($id){
    //configurasi
    header("Content-Type: application/vnd.msword");
    header("Content-Disposition: attachment; Filename=izin_Hunian.doc");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expire: 0");

    //mengambil nilai
    $data = $this->m_proses->selectPermohonanHunian($id);

    foreach ($data as $row) {
     $nama       = ucwords(strtolower($row->nama_lkp));
     $nip        = $row->nip;
     $bidang     = $row->bagian;
     $jabatan    = $row->jabatan;
     $golongan   = $row->golongan;
     $nomorSurat = $row->no_surat;
     $tgl        = $row->tgl_mohon;
     break;
   }

   $tanggal = $this->konversiTanggal($tgl);

   echo '
   <html>
   <body>
    <table>
      <tr>
        <td width="5%">
          <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
        </td>
        <td align="center">
          <p style="font-family: arial; font-size: 12pt;">
            <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
              DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
              KANTOR WILAYAH DJBC JAWA TIMUR II</b>
            </p>
            <p style="font-family: arial; font-size: 8pt;">
              JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
              Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      </table>
      <p style="font-family: arial; font-size: 11pt; text-align: center;">
        <b>JUDUL SURAT<br/>
         BAGIAN / BIDANG '.$bidang; echo '</b>
       </p>
       <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nomor</td>
            <td width="23">:</td>
            <td>'.$nomorSurat; echo '</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:  </td>
            <td>'.$tanggal; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nama</td>
            <td width="23">:</td>
            <td width="220">'.$nama; echo '</td>
            <td width="98">Pangkat / Gol</td>
            <td width="23">:</td>
            <td>'.$golongan; echo '</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>'.$jabatan; echo '</td>
            <td>NIP</td>
            <td>: </td>
            <td>'.$nip; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      Isi Surat Permohonan Hunian<br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="420">Menyetujui,</td>
            <td></td>
          </tr>
          <tr>
            <td>Kuasa Pengguna Barang</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
            <td></td>
          </tr>
          <tr>
            <td>Kepala Bagian Umum,</td>
            <td>Yang Mengajukan,</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sugeng Harianto</td>
            <td>'.$nama; echo '</td>
          </tr>
          <tr>
            <td>NIP 19630305 198601 1 001</td>
            <td>NIP '.$nip; echo '</td>
          </tr>
        </p>
      </table>
    </body>
    </html>
    '
    ;
  }

  public function printPermohonanServisKBD($id){
    //configurasi
    header("Content-Type: application/vnd.msword");
    header("Content-Disposition: attachment; Filename=izin_Hunian.doc");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expire: 0");

    //mengambil nilai
    $data = $this->m_proses->viewPermohonanService($id);

    foreach ($data as $row) {
     $nama       = ucwords(strtolower($row->nama_lkp));
     $nip        = $row->nip;
     $bidang     = $row->bagian;
     $jabatan    = $row->jabatan;
     $golongan   = $row->golongan;
     $nomorSurat = $row->no_surat;
     $tgl        = $row->tgl_mohon;
     break;
   }

   $tanggal = $this->konversiTanggal($tgl);

   echo '
   <html>
   <body>
    <table>
      <tr>
        <td width="5%">
          <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
        </td>
        <td align="center">
          <p style="font-family: arial; font-size: 12pt;">
            <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
              DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
              KANTOR WILAYAH DJBC JAWA TIMUR II</b>
            </p>
            <p style="font-family: arial; font-size: 8pt;">
              JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
              Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      </table>
      <p style="font-family: arial; font-size: 11pt; text-align: center;">
        <b>JUDUL SURAT<br/>
         BAGIAN / BIDANG '.$bidang; echo '</b>
       </p>
       <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nomor</td>
            <td width="23">:</td>
            <td>'.$nomorSurat; echo '</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:  </td>
            <td>'.$tanggal; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nama</td>
            <td width="23">:</td>
            <td width="220">'.$nama; echo '</td>
            <td width="98">Pangkat / Gol</td>
            <td width="23">:</td>
            <td>'.$golongan; echo '</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>'.$jabatan; echo '</td>
            <td>NIP</td>
            <td>: </td>
            <td>'.$nip; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      Isi Surat Permohonan Hunian<br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="420">Menyetujui,</td>
            <td></td>
          </tr>
          <tr>
            <td>Kuasa Pengguna Barang</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
            <td></td>
          </tr>
          <tr>
            <td>Kepala Bagian Umum,</td>
            <td>Yang Mengajukan,</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sugeng Harianto</td>
            <td>'.$nama; echo '</td>
          </tr>
          <tr>
            <td>NIP 19630305 198601 1 001</td>
            <td>NIP '.$nip; echo '</td>
          </tr>
        </p>
      </table>
    </body>
    </html>
    '
    ;
  }

  public function permohonanCabutHunian($params){
		//configurasi
    header("Content-Type: application/vnd.msword");
    header("Content-Disposition: attachment; Filename=izin_Cabut_Hunian.doc");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expire: 0");

		//mengambil nilai
    $user = $this->session->userdata('username');
    $query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
    $user = mysql_fetch_array($query);
    $nip = $user['nip'];

    $data = $this->m_proses->selectData($nip);

    foreach ($data as $row) {
     $nama   = ucwords(strtolower($row->nama_lkp));
     $nip    = $row->nip;
     $bidang = $row->bagian;
     $jabatan  = $row->jabatan;
     $golongan = $row->golongan;
     break;
   }

   $nomorSurat = $params['nosrt'];
   $tanggalan    = $params['tglmohon'];

   $tanggal    = $this->konversiTanggal($tanggalan);

   echo '
   <html>
   <body>
    <table>
      <tr>
        <td width="5%">
          <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
        </td>
        <td align="center">
          <p style="font-family: arial; font-size: 12pt;">
            <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
              DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
              KANTOR WILAYAH DJBC JAWA TIMUR II</b>
            </p>
            <p style="font-family: arial; font-size: 8pt;">
              JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
              Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      </table>
      <p style="font-family: arial; font-size: 11pt; text-align: center;">
        <b>JUDUL SURAT<br/>
         BAGIAN / BIDANG '.$bidang; echo '</b>
       </p>
       <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nomor</td>
            <td width="23">:</td>
            <td>'.$nomorSurat; echo '</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:  </td>
            <td>'.$tanggal; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nama</td>
            <td width="23">:</td>
            <td width="220">'.$nama; echo '</td>
            <td width="98">Pangkat / Gol</td>
            <td width="23">:</td>
            <td>'.$golongan; echo '</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>'.$jabatan; echo '</td>
            <td>NIP</td>
            <td>: </td>
            <td>'.$nip; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      Isi Surat <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="420">Menyetujui,</td>
            <td></td>
          </tr>
          <tr>
            <td>Kuasa Pengguna Barang</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
            <td></td>
          </tr>
          <tr>
            <td>Kepala Bagian Umum,</td>
            <td>Yang Mengajukan,</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sugeng Harianto</td>
            <td>'.$nama; echo '</td>
          </tr>
          <tr>
            <td>NIP 19630305 198601 1 001</td>
            <td>NIP '.$nip; echo '</td>
          </tr>
        </p>
      </table>
    </body>
    </html>
    '
    ;
  }

  public function printCabutIzinHunian($id){
    //configurasi
    header("Content-Type: application/vnd.msword");
    header("Content-Disposition: attachment; Filename=izin_Hunian.doc");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expire: 0");

    //mengambil nilai
    $data = $this->m_proses->selectPermohonanHunian($id);

    foreach ($data as $row) {
     $nama       = ucwords(strtolower($row->nama_lkp));
     $nip        = $row->nip;
     $bidang     = $row->bagian;
     $jabatan    = $row->jabatan;
     $golongan   = $row->golongan;
     $nomorSurat = $row->no_surat;
     $tgl        = $row->tgl_mohon;
     break;
   }

   $tanggal = $this->konversiTanggal($tgl);

   echo '
   <html>
   <body>
    <table>
      <tr>
        <td width="5%">
          <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
        </td>
        <td align="center">
          <p style="font-family: arial; font-size: 12pt;">
            <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
              DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
              KANTOR WILAYAH DJBC JAWA TIMUR II</b>
            </p>
            <p style="font-family: arial; font-size: 8pt;">
              JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
              Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      </table>
      <p style="font-family: arial; font-size: 11pt; text-align: center;">
        <b>JUDUL SURAT<br/>
         BAGIAN / BIDANG '.$bidang; echo '</b>
       </p>
       <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nomor</td>
            <td width="23">:</td>
            <td>'.$nomorSurat; echo '</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:  </td>
            <td>'.$tanggal; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nama</td>
            <td width="23">:</td>
            <td width="220">'.$nama; echo '</td>
            <td width="98">Pangkat / Gol</td>
            <td width="23">:</td>
            <td>'.$golongan; echo '</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>'.$jabatan; echo '</td>
            <td>NIP</td>
            <td>: </td>
            <td>'.$nip; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      Isi Surat Permohonan Cabut Izin Hunian<br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="420">Menyetujui,</td>
            <td></td>
          </tr>
          <tr>
            <td>Kuasa Pengguna Barang</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
            <td></td>
          </tr>
          <tr>
            <td>Kepala Bagian Umum,</td>
            <td>Yang Mengajukan,</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sugeng Harianto</td>
            <td>'.$nama; echo '</td>
          </tr>
          <tr>
            <td>NIP 19630305 198601 1 001</td>
            <td>NIP '.$nip; echo '</td>
          </tr>
        </p>
      </table>
    </body>
    </html>
    '
    ;
  }

  public function permohonanServisKBD2($params){
		//configurasi
    header("Content-Type: application/vnd.msword");
    header("Content-Disposition: attachment; Filename=Permohonan_Servis_KBD_Roda_Dua.doc");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expire: 0");

		//mengambil nilai
    $user = $this->session->userdata('username');
    $query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
    $user = mysql_fetch_array($query);
    $nip = $user['nip'];

    $data = $this->m_proses->selectData($nip);

    foreach ($data as $row) {
     $nama   = ucwords(strtolower($row->nama_lkp));
     $nip    = $row->nip;
     $bidang = $row->bagian;
     $jabatan  = $row->jabatan;
     $golongan = $row->golongan;
     break;
   }

   $nomorSurat = $params['nosrt'];
   $tanggalan    = $params['tglmohon'];

   $tanggal    = $this->konversiTanggal($tanggalan);

   echo '
   <html>
   <body>
    <table>
      <tr>
        <td width="5%">
          <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
        </td>
        <td align="center">
          <p style="font-family: arial; font-size: 12pt;">
            <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
              DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
              KANTOR WILAYAH DJBC JAWA TIMUR II</b>
            </p>
            <p style="font-family: arial; font-size: 8pt;">
              JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
              Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      </table>
      <p style="font-family: arial; font-size: 11pt; text-align: center;">
        <b>JUDUL SURAT<br/>
         BAGIAN / BIDANG '.$bidang; echo '</b>
       </p>
       <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nomor</td>
            <td width="23">:</td>
            <td>'.$nomorSurat; echo '</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:  </td>
            <td>'.$tanggal; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nama</td>
            <td width="23">:</td>
            <td width="220">'.$nama; echo '</td>
            <td width="98">Pangkat / Gol</td>
            <td width="23">:</td>
            <td>'.$golongan; echo '</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>'.$jabatan; echo '</td>
            <td>NIP</td>
            <td>: </td>
            <td>'.$nip; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      Isi Surat <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="420">Menyetujui,</td>
            <td></td>
          </tr>
          <tr>
            <td>Kuasa Pengguna Barang</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
            <td></td>
          </tr>
          <tr>
            <td>Kepala Bagian Umum,</td>
            <td>Yang Mengajukan,</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sugeng Harianto</td>
            <td>'.$nama; echo '</td>
          </tr>
          <tr>
            <td>NIP 19630305 198601 1 001</td>
            <td>NIP '.$nip; echo '</td>
          </tr>
        </p>
      </table>
    </body>
    </html>
    '
    ;
  }

  public function permohonanServisKBD4($params){
		//configurasi
    header("Content-Type: application/vnd.msword");
    header("Content-Disposition: attachment; Filename=Permohonan_Servis_KBD_Roda_Empat.doc");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expire: 0");

		//mengambil nilai
    $user = $this->session->userdata('username');
    $query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
    $user = mysql_fetch_array($query);
    $nip = $user['nip'];

    $data = $this->m_proses->selectData($nip);

    foreach ($data as $row) {
     $nama   = ucwords(strtolower($row->nama_lkp));
     $nip    = $row->nip;
     $bidang = $row->bagian;
     $jabatan  = $row->jabatan;
     $golongan = $row->golongan;
     break;
   }

   $nomorSurat = $params['nosrt'];
   $tanggalan    = $params['tglmohon'];

   $tanggal    = $this->konversiTanggal($tanggalan);

   echo '
   <html>
   <body>
    <table>
      <tr>
        <td width="5%">
          <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
        </td>
        <td align="center">
          <p style="font-family: arial; font-size: 12pt;">
            <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
              DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
              KANTOR WILAYAH DJBC JAWA TIMUR II</b>
            </p>
            <p style="font-family: arial; font-size: 8pt;">
              JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
              Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      </table>
      <p style="font-family: arial; font-size: 11pt; text-align: center;">
        <b>JUDUL SURAT<br/>
         BAGIAN / BIDANG '.$bidang; echo '</b>
       </p>
       <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nomor</td>
            <td width="23">:</td>
            <td>'.$nomorSurat; echo '</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:  </td>
            <td>'.$tanggal; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nama</td>
            <td width="23">:</td>
            <td width="220">'.$nama; echo '</td>
            <td width="98">Pangkat / Gol</td>
            <td width="23">:</td>
            <td>'.$golongan; echo '</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>'.$jabatan; echo '</td>
            <td>NIP</td>
            <td>: </td>
            <td>'.$nip; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      Isi Surat <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="420">Menyetujui,</td>
            <td></td>
          </tr>
          <tr>
            <td>Kuasa Pengguna Barang</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
            <td></td>
          </tr>
          <tr>
            <td>Kepala Bagian Umum,</td>
            <td>Yang Mengajukan,</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sugeng Harianto</td>
            <td>'.$nama; echo '</td>
          </tr>
          <tr>
            <td>NIP 19630305 198601 1 001</td>
            <td>NIP '.$nip; echo '</td>
          </tr>
        </p>
      </table>
    </body>
    </html>
    '
    ;
  }

  public function permohonanPerbaikanInventaris($params){
		//configurasi
    header("Content-Type: application/vnd.msword");
    header("Content-Disposition: attachment; Filename=Permohonan_Perbaikan_Inventaris.doc");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expire: 0");

		//mengambil nilai
    $user = $this->session->userdata('username');
    $query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
    $user = mysql_fetch_array($query);
    $nip = $user['nip'];

    $data = $this->m_proses->selectData($nip);

    foreach ($data as $row) {
     $nama   = ucwords(strtolower($row->nama_lkp));
     $nip    = $row->nip;
     $bidang = $row->bagian;
     $jabatan  = $row->jabatan;
     $golongan = $row->golongan;
     break;
   }

   $nomorSurat = $params['nosrt'];
   $tanggalan    = $params['tglmohon'];

   $tanggal    = $this->konversiTanggal($tanggalan);

   echo '
   <html>
   <body>
    <table>
      <tr>
        <td width="5%">
          <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
        </td>
        <td align="center">
          <p style="font-family: arial; font-size: 12pt;">
            <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
              DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
              KANTOR WILAYAH DJBC JAWA TIMUR II</b>
            </p>
            <p style="font-family: arial; font-size: 8pt;">
              JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
              Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
            </p>
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
      </table>
      <p style="font-family: arial; font-size: 11pt; text-align: center;">
        <b>JUDUL SURAT<br/>
         BAGIAN / BIDANG '.$bidang; echo '</b>
       </p>
       <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nomor</td>
            <td width="23">:</td>
            <td>'.$nomorSurat; echo '</td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:  </td>
            <td>'.$tanggal; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="95">Nama</td>
            <td width="23">:</td>
            <td width="220">'.$nama; echo '</td>
            <td width="98">Pangkat / Gol</td>
            <td width="23">:</td>
            <td>'.$golongan; echo '</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: </td>
            <td>'.$jabatan; echo '</td>
            <td>NIP</td>
            <td>: </td>
            <td>'.$nip; echo '</td>
          </tr>
        </p>
      </table>
      <br/>
      Isi Surat <br/>
      <table>
        <p style="font-family: arial; font-size: 11pt; text-align: left;">
          <tr>
            <td width="420">Menyetujui,</td>
            <td></td>
          </tr>
          <tr>
            <td>Kuasa Pengguna Barang</td>
            <td></td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
            <td></td>
          </tr>
          <tr>
            <td>Kepala Bagian Umum,</td>
            <td>Yang Mengajukan,</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Sugeng Harianto</td>
            <td>'.$nama; echo '</td>
          </tr>
          <tr>
            <td>NIP 19630305 198601 1 001</td>
            <td>NIP '.$nip; echo '</td>
          </tr>
        </p>
      </table>
    </body>
    </html>
    '
    ;
  }

  public function permintaanATK(){
    if (isset($_POST["submit"])) {
      $nosrt    = NULL;
      $tglmohon = NULL;

      extract($_POST);

      $atk      = $_POST['atk'];
      $volume   = $_POST['volume'];
      $satuan   = $_POST['satuan'];

        //mengambil nilai
      $user = $this->session->userdata('username');
      $query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
      $user = mysql_fetch_array($query);
      $nip = $user['nip'];

      $i=0;
      $query = mysql_query("SELECT MAX(kode) as max_kode FROM permintaan_atk");
      $permintaan_atk = mysql_fetch_array($query);
      $kode = $permintaan_atk['max_kode'];

      if ($kode == NULL) {
        $kode = 0;
      }

      while ($i < (count($volume))) {
        $field = array(
          'nip'                => $nip,
          'kode'               => ($kode+1),
          'nosurat'            => $nosrt,
          'barang'             => $atk[$i],
          'volume'             => $volume[$i],
          'satuan'             => $satuan[$i],
          'tanggal_permohonan' => $tglmohon
          );
        $this->db->insert('permintaan_atk', $field);
        $i++;
      }

      redirect(base_url()."proses_data/p_rumahtangga");

    } else {
      $nosrt    = NULL;
      $tglmohon = NULL;

      extract($_POST);

      $atk      = $_POST['atk'];
      $volume   = $_POST['volume'];
      $satuan   = $_POST['satuan'];

            //configurasi
      header("Content-Type: application/vnd.msword");
      header('Content-Disposition: attachment; Filename=Permintaan_ATK.doc');
      header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      header("Pragma: no-cache");
      header("Expire: 0");

        //mengambil nilai
      $user = $this->session->userdata('username');
      echo "$user";
      $query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
      $user = mysql_fetch_array($query);
      $nip = $user['nip'];

      $data = $this->m_proses->selectData($nip);

      foreach ($data as $row) {
        $nama     = ucwords(strtolower($row->nama_lkp));
        $nip      = $row->nip;
        $bidang   = $row->bagian;
        $jabatan  = $row->jabatan;
        $golongan = $row->golongan;
        break;
      }

      $nomorSurat = $nosrt;
      $tanggalan  = $tglmohon;
      $tanggal    = $this->konversiTanggal($tanggalan);

      echo '
      <html>
      <body>
        <table>
          <tr>
            <td width="5%">
              <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
            </td>
            <td align="center">
              <p style="font-family: arial; font-size: 12pt;">
                <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
                  DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
                  KANTOR WILAYAH DJBC JAWA TIMUR II</b>
                </p>
                <p style="font-family: arial; font-size: 8pt;">
                  JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
                  Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
                </p>
              </td>
            </tr>
            <tr>
              <td colspan="2"><hr></td>
            </tr>
          </table>
          <p style="font-family: arial; font-size: 11pt; text-align: center;">
            <b>SURAT PERMINTAAN BARANG BERUPA ALAT TULIS KANTOR (ATK)<br/>
              BAGIAN / BIDANG '.$bidang; echo '</b>
            </p>
            <table>
              <p style="font-family: arial; font-size: 11pt; text-align: left;">
                <tr>
                  <td width="95">Nomor</td>
                  <td width="23">:</td>
                  <td>'.$nomorSurat; echo '</td>
                </tr>
                <tr>
                  <td>Tanggal</td>
                  <td>:  </td>
                  <td>'.$tanggal; echo '</td>
                </tr>
              </p>
            </table>
            <br/>
            <br/>
            <table>
              <p style="font-family: arial; font-size: 11pt; text-align: left;">
                <tr>
                  <td width="95">Nama</td>
                  <td width="23">:</td>
                  <td width="220">'.$nama; echo '</td>
                  <td width="98">Pangkat / Gol</td>
                  <td width="23">:</td>
                  <td>'.$golongan; echo '</td>
                </tr>
                <tr>
                  <td>Jabatan</td>
                  <td>: </td>
                  <td>'.$jabatan; echo '</td>
                  <td>NIP</td>
                  <td>: </td>
                  <td>'.$nip; echo '</td>
                </tr>
              </p>
            </table>
            <br/>
            <table style="border-collapse: collapse;">
              <p style="font-family: arial; font-size: 11pt; text-align: left;">
                <tr>
                  <td style="border: 1px solid black" width="40"  align="center" rowspan="2">No.<br/>Urut</td>
                  <td style="border: 1px solid black" width="120" align="center" colspan="2">Jumlah</td>
                  <td style="border: 1px solid black" width="440" align="center" rowspan="2">Nama Sub-sub Kelompok Barang</td>
                </tr>
                <tr>
                  <td style="border: 1px solid black" align="center">Volume</td>
                  <td style="border: 1px solid black" align="center">Satuan</td>
                </tr>
                ';
                $i = 0;
                $j = 1;
                while ($i < (count($volume))) {
                  echo '
                  <tr>
                    <td style="border: 1px solid black" align="center">'; echo $j; echo '</td>
                    <td style="border: 1px solid black" align="center">'; if($volume[$i] != ""){echo $volume[$i];}else{echo '-';} echo '</td>
                    <td style="border: 1px solid black" align="center">'; if($satuan[$i] != ""){echo $satuan[$i];}else{echo '-';} echo '</td>
                    <td style="border: 1px solid black" >&nbsp;&nbsp;'; echo $atk[$i]; echo '</td>
                  </tr>
                  ';
                  $i++;
                  $j++;
                }
                echo '
              </p>
            </table>
            <br>
            <table>
              <p style="font-family: arial; font-size: 11pt; text-align: left;">
                <tr>
                  <td width="420">Menyetujui,</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Kuasa Pengguna Barang</td>
                  <td></td>
                </tr>
                <tr>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Kepala Bagian Umum,</td>
                  <td>Yang Mengajukan,</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>Sugeng Harianto</td>
                  <td>'.$nama; echo '</td>
                </tr>
                <tr>
                  <td>NIP 19630305 198601 1 001</td>
                  <td>NIP '.$nip; echo '</td>
                </tr>
              </p>
            </table>
          </body>
          </html>
          '
          ;

        }

      }

      public function printPermintaanATK($nosurat){

      //configurasi
        header("Content-Type: application/vnd.msword");
        header('Content-Disposition: attachment; Filename=Permintaan_ATK.doc');
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        header("Expire: 0");

        $nosrt = str_replace('%20', ' ', $nosurat);
        $data  = $this->m_proses->select_dataPermintaanATK($nosrt);

        foreach ($data as $row) {
          $nama       = ucwords(strtolower($row->nama_lkp));
          $nip        = $row->nip;
          $bidang     = $row->bagian;
          $jabatan    = $row->jabatan;
          $golongan   = $row->golongan;
          $nomorSurat = $row->nosurat;
          $tgl        = $row->tanggal_permohonan;
          break;
        }

        $tanggal = $this->konversiTanggal($tgl);

        echo '
        <html>
        <body>
          <table>
            <tr>
              <td width="5%">
                <img src="http://localhost:8080/websiteinternalbeacukai/assets/dist/img/logo_beacukai.png">
              </td>
              <td align="center">
                <p style="font-family: arial; font-size: 12pt;">
                  <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA<br/>
                    DIREKTORAT JENDERAL BEA DAN CUKAI<br/>
                    KANTOR WILAYAH DJBC JAWA TIMUR II</b>
                  </p>
                  <p style="font-family: arial; font-size: 8pt;">
                    JALAN RADEN INTAN NOMOR 3 MALANG 65126<br/>
                    Telepon  (0341) 402739; Faksimili  (0341) 402740; SITUS www.beacukai.go.id
                  </p>
                </td>
              </tr>
              <tr>
                <td colspan="2"><hr></td>
              </tr>
            </table>
            <p style="font-family: arial; font-size: 11pt; text-align: center;">
              <b>SURAT PERMINTAAN BARANG BERUPA ALAT TULIS KANTOR (ATK)<br/>
                BAGIAN / BIDANG '.$bidang; echo '</b>
              </p>
              <table>
                <p style="font-family: arial; font-size: 11pt; text-align: left;">
                  <tr>
                    <td width="95">Nomor</td>
                    <td width="23">:</td>
                    <td>'.$nomorSurat; echo '</td>
                  </tr>
                  <tr>
                    <td>Tanggal</td>
                    <td>:  </td>
                    <td>'.$tanggal; echo '</td>
                  </tr>
                </p>
              </table>
              <br/>
              <br/>
              <table>
                <p style="font-family: arial; font-size: 11pt; text-align: left;">
                  <tr>
                    <td width="95">Nama</td>
                    <td width="23">:</td>
                    <td width="220">'.$nama; echo '</td>
                    <td width="98">Pangkat / Gol</td>
                    <td width="23">:</td>
                    <td>'.$golongan; echo '</td>
                  </tr>
                  <tr>
                    <td>Jabatan</td>
                    <td>: </td>
                    <td>'.$jabatan; echo '</td>
                    <td>NIP</td>
                    <td>: </td>
                    <td>'.$nip; echo '</td>
                  </tr>
                </p>
              </table>
              <br/>
              <table style="border-collapse: collapse;">
                <p style="font-family: arial; font-size: 11pt; text-align: left;">
                  <tr>
                    <td style="border: 1px solid black" width="40"  align="center" rowspan="2">No.<br/>Urut</td>
                    <td style="border: 1px solid black" width="120" align="center" colspan="2">Jumlah</td>
                    <td style="border: 1px solid black" width="440" align="center" rowspan="2">Nama Sub-sub Kelompok Barang</td>
                  </tr>
                  <tr>
                    <td style="border: 1px solid black" align="center">Volume</td>
                    <td style="border: 1px solid black" align="center">Satuan</td>
                  </tr>
                  ';
                  $j = 1;
                  foreach ($data as $row) {
                    echo '
                    <tr>
                      <td style="border: 1px solid black" align="center">'; echo $j; echo '</td>
                      <td style="border: 1px solid black" align="center">'; if($row->volume != ""){echo $row->volume;}else{echo '-';} echo '</td>
                      <td style="border: 1px solid black" align="center">'; if($row->satuan != ""){echo $row->satuan;}else{echo '-';} echo '</td>
                      <td style="border: 1px solid black" >&nbsp;&nbsp;'; echo $row->barang; echo '</td>
                    </tr>
                    ';
                    $j++;
                  }
                  echo '
                </p>
              </table>
              <br>
              <table>
                <p style="font-family: arial; font-size: 11pt; text-align: left;">
                  <tr>
                    <td width="420">Menyetujui,</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Kuasa Pengguna Barang</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u.b.</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Kepala Bagian Umum,</td>
                    <td>Yang Mengajukan,</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Sugeng Harianto</td>
                    <td>'.$nama; echo '</td>
                  </tr>
                  <tr>
                    <td>NIP 19630305 198601 1 001</td>
                    <td>NIP '.$nip; echo '</td>
                  </tr>
                </p>
              </table>
            </body>
            </html>
            '
            ;



          }

        }
