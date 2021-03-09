<?php

if (!defined('BASEPATH')) exit('No direct script acces allowed');

/**
 * 
 */
class M_proses extends CI_Model
{

	protected $table_artikel = 'artikel';
	protected $table_foto = 'foto';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_admin($params)
	{
		$nip = rand(500, 1000000000000);

		$fields = array(
			'nip'       => $nip,
			'username'  => $params['user'],
			'password'  => $params['pwd'],
			'nama_lkp'  => "",
			'id_status' => $params['status'],
			'id_bidang' => 6
		);
		$this->db->insert('user', $fields);
	}

	public function insert_user($params)
	{

		$fields = array(
			'nip'       => $params['nip'],
			'username'  => $params['user'],
			'password'  => $params['pwd'],
			'nama_lkp'  => $params['nama'],
			'id_status' => $params['status'],
			'id_bidang' => $params['bagian'],
			'tgl_lhr'   => $params['tgl'],
			'alamat'    => $params['alamat'],
			'jabatan'   => $params['jabatan'],
			'golongan'  => $params['gol']
		);
		$this->db->insert('user', $fields);
	}

	public function insert_artikel($params)
	{
		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];

		//mengambil data id_foto
		$hasil = mysql_query('SELECT id_foto FROM foto ORDER BY id_foto DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_foto sekaligus inisialisasi
		if ($cek['id_foto'] == NULL) {
			$id_foto = 1;
		} else {
			$id_foto = $cek['id_foto'] + 1;
		}

		//memasukan data ke tabel foto
		$fields_foto = array(
			'id_foto'        => $id_foto,
			'file_name'      => $params['filename'],
			'path_foto'      => $params['path_foto'],
			'tanggal_upload' => date('Y-m-d'),
			'nip'            => $nip,
			'read_status'    => "true"
		);

		//insert ke tabel foto
		$this->db->insert($this->table_foto, $fields_foto);

		//mengambil data id_artikel
		$hasil = mysql_query('SELECT id_artikel FROM artikel ORDER BY id_artikel DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_artikel sekaligus inisialisasi
		if ($cek['id_artikel'] == NULL) {
			$id_artikel = 1;
		} else {
			$id_artikel = $cek['id_artikel'] + 1;
		}

		//memasukan data ke tabel artikel
		$fields_artikel = array(
			'id_artikel' => $id_artikel,
			'penulis' => $params['penulis'],
			'judul' => $params['judul'],
			'file_artikel' => $params['artikel'],
			'nip' => $nip,
			'id_foto' => $id_foto,
			'tanggal_upload' => date('Y-m-d')
		);

		//insert ke tabel artikel
		$this->db->insert($this->table_artikel, $fields_artikel);
	}

	public function insert_foto($params)
	{
		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];

		$fields = array(
			'file_name'      => $params['fileName'],
			'path_foto'      => $params['targetPath'],
			'tanggal_upload' => date('Y-m-d'),
			'nip'            => $nip
		);
	}

	public function insert_video($params)
	{
		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];

		//mengambil data id_video
		$hasil = mysql_query('SELECT id_video FROM video ORDER BY id_video DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_foto sekaligus inisialisasi
		if ($cek['id_video'] == NULL) {
			$id_video = 1;
		} else {
			$id_video = $cek['id_video'] + 1;
		}

		//memasukan data ke tabel foto
		$fields = array(
			'id_video' => $id_video,
			'file_name' => $params['filename'],
			'path_video' => $params['path_video'],
			'tanggal_upload' => date('Y-m-d H:i:s'),
			'nip' => $nip,
			'deskripsi' => $params['deskripsi']
		);

		//insert ke tabel foto
		$this->db->insert('video', $fields);
	}

	//rumah tangga
	public function insert_permohonan_hunian($params)
	{
		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];

		//mengambil data id_permohonan_rumah
		$hasil = mysql_query('SELECT id_permohonan FROM permohonan_rumah ORDER BY id_permohonan DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_permohonan sekaligus inisialisasi
		if ($cek['id_permohonan'] == NULL) {
			$id = 1;
		} else {
			$id = $cek['id_permohonan'] + 1;
		}

		//memasukan data ke tabel permohonan_rumah
		$fields = array(
			'id_permohonan' => $id,
			'id_jenis_permohonan' => 1,
			'no_surat' => $params['nosrt'],
			'nip' => $nip,
			'tgl_mohon' => $params['tglmohon'],
			'tgl_upload' => date('Y-m-d H:i:s')
		);

		//insert ke tabel permohonan_rumah
		$this->db->insert('permohonan_rumah', $fields);
	}

	public function insert_permohonan_cabut_hunian($params)
	{
		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];

		//mengambil data id_permohonan_rumah
		$hasil = mysql_query('SELECT id_permohonan FROM permohonan_rumah ORDER BY id_permohonan DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_permohonan sekaligus inisialisasi
		if ($cek['id_permohonan'] == NULL) {
			$id = 1;
		} else {
			$id = $cek['id_permohonan'] + 1;
		}

		//memasukan data ke tabel permohonan_rumah
		$fields = array(
			'id_permohonan' => $id,
			'id_jenis_permohonan' => 2,
			'no_surat' => $params['nosrt'],
			'nip' => $nip,
			'tgl_mohon' => $params['tglmohon'],
			'tgl_upload' => date('Y-m-d H:i:s')
		);

		//insert ke tabel permohonan_rumah
		$this->db->insert('permohonan_rumah', $fields);
	}

	public function insert_permohonan_service_kbd2($params)
	{
		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];

		//mengambil data id_permohonan
		$hasil = mysql_query('SELECT id_permohonan FROM permohonan_service ORDER BY id_permohonan DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_permohonan sekaligus inisialisasi
		if ($cek['id_permohonan'] == NULL) {
			$id = 1;
		} else {
			$id = $cek['id_permohonan'] + 1;
		}

		//memasukan data ke tabel permohonan_rumah
		$fields = array(
			'id_permohonan' => $id,
			'id_jenis_kbd' => 1,
			'no_surat' => $params['nosrt'],
			'nip' => $nip,
			'tgl_mohon' => $params['tglmohon'],
			'plat_nomor' => $params['platno'],
			'tgl_upload' => date('Y-m-d H:i:s')
		);

		//insert ke tabel permohonan_rumah
		$this->db->insert('permohonan_service', $fields);
	}

	public function insert_permohonan_service_kbd4($params)
	{
		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];

		//mengambil data id_permohonan
		$hasil = mysql_query('SELECT id_permohonan FROM permohonan_service ORDER BY id_permohonan DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_permohonan sekaligus inisialisasi
		if ($cek['id_permohonan'] == NULL) {
			$id = 1;
		} else {
			$id = $cek['id_permohonan'] + 1;
		}

		//memasukan data ke tabel permohonan_rumah
		$fields = array(
			'id_permohonan' => $id,
			'id_jenis_kbd' => 2,
			'no_surat' => $params['nosrt'],
			'nip' => $nip,
			'tgl_mohon' => $params['tglmohon'],
			'plat_nomor' => $params['platno'],
			'tgl_upload' => date('Y-m-d H:i:s')
		);

		//insert ke tabel permohonan_rumah
		$this->db->insert('permohonan_service', $fields);
	}

	public function insert_kritiksaran($params)
	{
		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];

		//mengambil data id_permohonan
		$hasil = mysql_query('SELECT id FROM kritik_saran ORDER BY id DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_permohonan sekaligus inisialisasi
		if ($cek['id'] == NULL) {
			$id = 1;
		} else {
			$id = $cek['id'] + 1;
		}

		//memasukan data ke tabel permohonan_rumah
		$fields = array(
			'id'           => $id,
			'kritik_saran' => $params['kritiksaran'],
			'perihal'      => $params['perihal'],
			'nip'          => $nip
			//'tanggal'      => date('Y-m-d h:i:sa')
		);

		//insert ke tabel permohonan_rumah
		$this->db->insert('kritik_saran', $fields);
	}

	public function insert_riwayatServiceKBD2($params)
	{
		$fields = array(
			'nopol'        => $params['nopol'],
			'tanggal'      => $params['tgl'],
			'keterangan'   => $params['ket'],
			'id_jenis_kbd' => 1
		);

		$this->db->insert('riwayat_service', $fields);
	}

	public function insert_riwayatServiceKBD4($params)
	{
		$fields = array(
			'nopol'        => $params['nopol'],
			'tanggal'      => $params['tgl'],
			'keterangan'   => $params['ket'],
			'id_jenis_kbd' => 2
		);

		$this->db->insert('riwayat_service', $fields);
	}

	public function insert_KBD2($params)
	{
		//mengambil data id_foto
		$hasil = mysql_query('SELECT id_foto FROM foto ORDER BY id_foto DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_foto sekaligus inisialisasi
		if ($cek['id_foto'] == NULL) {
			$id_foto = 1;
		} else {
			$id_foto = $cek['id_foto'] + 1;
		}

		//memasukan data ke tabel foto
		$fields_foto = array(
			'id_foto'        => $id_foto,
			'file_name'      => $params['filename'],
			'path_foto'      => $params['path_foto'],
			'tanggal_upload' => date('Y-m-d'),
			'nip'            => NULL
		);

		//insert ke tabel foto
		$this->db->insert('foto', $fields_foto);

		//memasukan data ke tabel artikel
		$fields_kbd = array(
			'nopol' => $params['nopol'],
			'merek' => $params['merek'],
			'pic_kbd' => $params['pic'],
			'nomor_kep' => $params['nomorkep'],
			'id_jenis_kbd' => 1,
			'id_foto' => $id_foto
		);

		//insert ke tabel artikel
		$this->db->insert('kbd', $fields_kbd);
	}

	public function insert_KBD4($params)
	{
		//mengambil data id_foto
		$hasil = mysql_query('SELECT id_foto FROM foto ORDER BY id_foto DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_foto sekaligus inisialisasi
		if ($cek['id_foto'] == NULL) {
			$id_foto = 1;
		} else {
			$id_foto = $cek['id_foto'] + 1;
		}

		//memasukan data ke tabel foto
		$fields_foto = array(
			'id_foto'        => $id_foto,
			'file_name'      => $params['filename'],
			'path_foto'      => $params['path_foto'],
			'tanggal_upload' => date('Y-m-d'),
			'nip'            => NULL
		);

		//insert ke tabel foto
		$this->db->insert('foto', $fields_foto);

		//memasukan data ke tabel artikel
		$fields_kbd = array(
			'nopol' => $params['nopol'],
			'merek' => $params['merek'],
			'pic_kbd' => $params['pic'],
			'nomor_kep' => $params['nomorkep'],
			'id_jenis_kbd' => 2,
			'id_foto' => $id_foto
		);

		//insert ke tabel artikel
		$this->db->insert('kbd', $fields_kbd);
	}

	public function insert_ATK($params)
	{
		$data = $this->db->query("SELECT id_atk FROM atk ORDER BY id_atk DESC LIMIT 1");

		$cek = $data->result()[0];

		if ($cek->id_atk == NULL) {
			$id_atk = 1;
		} else {
			$id_atk = $cek->id_atk + 1;
		}

		$fields = array(
			'id_atk'       => $id_atk,
			'atk'          => $params['atk'],
			'ketersediaan' => $params['ketersediaan'],
			'satuan'       => $params['satuan']
		);

		$this->db->insert('atk', $fields);
	}

	public function insert_rumah($params)
	{
		//mengambil data id_foto
		$hasil = mysql_query('SELECT id_foto FROM foto ORDER BY id_foto DESC LIMIT 1');
		$cek = mysql_fetch_array($hasil);

		//melakukan pengecekan untuk id_foto sekaligus inisialisasi
		if ($cek['id_foto'] == NULL) {
			$id_foto = 1;
		} else {
			$id_foto = $cek['id_foto'] + 1;
		}

		//memasukan data ke tabel foto
		$fields_foto = array(
			'id_foto'        => $id_foto,
			'file_name'      => $params['filename'],
			'path_foto'      => $params['path_foto'],
			'tanggal_upload' => date('Y-m-d'),
			'nip'            => NULL
		);

		//insert ke tabel foto
		$this->db->insert('foto', $fields_foto);

		//memasukan data ke tabel artikel
		$fields_rumah = array(
			'id_pdam'    => $params['id_pdam'],
			'id_listrik' => $params['id_listrik'],
			'lokasi'     => $params['lokasi'],
			'alamat'     => $params['alamat'],
			'penghuni'   => $params['penghuni'],
			'keterangan' => $params['ket'],
			'id_foto'    => $id_foto
		);

		//insert ke tabel artikel
		$this->db->insert('rumah_dinas', $fields_rumah);
	}

	//=========================================================================
	//===================| untuk menampilkan data |============================
	//=========================================================================



	public function select_daftarAdmin()
	{
		$data = $this->db->query("
			SELECT nip, username, password, status FROM user u, status s 
			WHERE u.id_status != 4 AND
			      u.id_status = s.id_status
			");

		return $data->result();
	}

	public function select_nip($user)
	{
		$data = $this->db->query("
			SELECT nip FROM user WHERE username = $user
			");
		return $data->result();
	}

	public function select_daftarUser()
	{
		$data = $this->db->query("
			SELECT nip, nama_lkp, bagian, tgl_lhr, alamat, username, password, u.jabatan, u.golongan FROM user u, bidang_bagian b 
			WHERE u.id_status = 4 && u.id_bidang = b.id_bidang
		");
		return $data->result();
	}

	public function select_perumahan_araya()
	{
		$data = $this->db->query("
			SELECT id_rumah, r.id_foto, path_foto, id_listrik, id_pdam, lokasi, alamat, penghuni, keterangan FROM foto f, rumah_dinas r
			WHERE f.id_foto = r.id_foto and lokasi = 'araya'");
		return $data->result();
	}

	public function select_perumahan_pakisjajar()
	{
		$data = $this->db->query("
			SELECT id_rumah, path_foto, id_listrik, id_pdam, lokasi, alamat, penghuni, keterangan FROM foto f, rumah_dinas r 
			WHERE f.id_foto = r.id_foto and lokasi = 'pakisjajar'");
		return $data->result();
	}

	public function select_rumahDinas($id)
	{
		$data = $this->db->query("
			SELECT * FROM rumah_dinas WHERE id_rumah = $id
			");
		return $data->result();
	}

	public function select_daftarMotor()
	{
		$data = $this->db->query("
			SELECT 
			    (SELECT COUNT(*) FROM permintaan_atk WHERE read_status = 'false') as read_stts_atk,
			    (SELECT COUNT(*) FROM permohonan_rumah WHERE id_jenis_permohonan = 1 && read_status = 'false') as read_stts_izin,
     			(SELECT COUNT(*) FROM permohonan_rumah WHERE id_jenis_permohonan = 2 && read_status = 'false') as read_stts_cabut,
     			(SELECT COUNT(*) FROM permohonan_service WHERE id_jenis_kbd = 1 && read_status = 'false') as read_stts_kbd2,
     			(SELECT COUNT(*) FROM permohonan_service WHERE id_jenis_kbd = 2 && read_status = 'false') as read_stts_kbd4,
     			(SELECT COUNT(*) FROM permohonan_inventaris WHERE read_status = 'false') as read_stts_inventaris,
     			(SELECT COUNT(*) FROM kritik_saran WHERE read_status = 'false') as read_stts_kritik,

			    nopol, path_foto, nopol, merek, pic_kbd, nomor_kep FROM foto f, kbd k
			WHERE f.id_foto = k.id_foto and id_jenis_kbd = 1
			");
		return $data->result();
	}

	public function select_KBD($nopol)
	{
		$data = $this->db->query("
			SELECT
			    nopol, merek, pic_kbd, nomor_kep, id_jenis_kbd, id_foto 
			    FROM kbd
			    WHERE nopol = '$nopol'
			");
		return $data->result();
	}

	public function select_nopolKBD2()
	{
		$data = $this->db->query("
			SELECT
			    nopol FROM kbd WHERE id_jenis_kbd = 1

			");
		return $data->result();
	}

	public function select_nopol($nopol)
	{
		$data = $this->db->query("
			SELECT
			    nopol FROM kbd WHERE nopol = '$nopol'

			");
		return $data->result();
	}

	public function select_nopolKBD4()
	{
		$data = $this->db->query("
			SELECT
			    nopol FROM kbd WHERE id_jenis_kbd = 2

			");
		return $data->result();
	}

	public function select_daftarMobil()
	{
		$data = $this->db->query("
			SELECT 
			    (SELECT COUNT(*) FROM permintaan_atk WHERE read_status = 'false') as read_stts_atk,
			    (SELECT COUNT(*) FROM permohonan_rumah WHERE id_jenis_permohonan = 1 && read_status = 'false') as read_stts_izin,
     			(SELECT COUNT(*) FROM permohonan_rumah WHERE id_jenis_permohonan = 2 && read_status = 'false') as read_stts_cabut,
     			(SELECT COUNT(*) FROM permohonan_service WHERE id_jenis_kbd = 1 && read_status = 'false') as read_stts_kbd2,
     			(SELECT COUNT(*) FROM permohonan_service WHERE id_jenis_kbd = 2 && read_status = 'false') as read_stts_kbd4,
     			(SELECT COUNT(*) FROM permohonan_inventaris WHERE read_status = 'false') as read_stts_inventaris,
     			(SELECT COUNT(*) FROM kritik_saran WHERE read_status = 'false') as read_stts_kritik,

			    nopol, path_foto, nopol, merek, pic_kbd, nomor_kep FROM foto f, kbd k
			WHERE f.id_foto = k.id_foto and id_jenis_kbd = 2
			");
		return $data->result();
	}

	public function selectDashboardHumas()
	{
		$data = $this->db->query("
			SELECT 
			    (SELECT COUNT(*) FROM artikel WHERE read_status = 'false') as read_stts_artikel,
			    (SELECT COUNT(*) FROM artikel) as jumlah_artikel,
			    (SELECT COUNT(*) FROM foto WHERE read_status = 'false') as read_stts_foto,
			    (SELECT COUNT(*) FROM foto f, user u WHERE f.nip = u.nip ) as jumlah_foto,
			    (SELECT COUNT(*) FROM video WHERE read_status = 'false') as read_stts_video,
			    (SELECT COUNT(*) FROM video) as jumlah_video
			");
		return $data->result();
	}

	public function selectDashboardRT()
	{
		$data = $this->db->query("
			SELECT 
			    (SELECT COUNT(*) FROM permintaan_atk WHERE read_status = 'false') as read_stts_atk,
			    (SELECT COUNT(*) FROM permohonan_rumah WHERE id_jenis_permohonan = 1 && read_status = 'false') as read_stts_izin,
     			(SELECT COUNT(*) FROM permohonan_rumah WHERE id_jenis_permohonan = 2 && read_status = 'false') as read_stts_cabut,
     			(SELECT COUNT(*) FROM permohonan_service WHERE id_jenis_kbd = 1 && read_status = 'false') as read_stts_kbd2,
     			(SELECT COUNT(*) FROM permohonan_service WHERE id_jenis_kbd = 2 && read_status = 'false') as read_stts_kbd4,
     			(SELECT COUNT(*) FROM permohonan_inventaris WHERE read_status = 'false') as read_stts_inventaris,
     			(SELECT COUNT(*) FROM kritik_saran WHERE read_status = 'false') as read_stts_kritik,

			    (SELECT COUNT(*) FROM permohonan_rumah WHERE id_jenis_permohonan = 1) as jumlah_izin,
			    (SELECT COUNT(*) FROM permohonan_rumah WHERE id_jenis_permohonan = 2) as jumlah_cabut,
			    (SELECT COUNT(*) FROM permohonan_service WHERE id_jenis_kbd = 1) as jumlah_kbd2,
			    (SELECT COUNT(*) FROM permohonan_service WHERE id_jenis_kbd = 2) as jumlah_kbd4,
			    (SELECT COUNT(*) FROM permohonan_inventaris) as jumlah_inventaris,
			    (SELECT COUNT(*) FROM kritik_saran) as jumlah_kritik
			");
		return $data->result();
	}

	public function select_daftarArtikel()
	{
		$data = $this->db->query("
			SELECT id_artikel, judul, penulis, bagian, concat(day(a.tanggal_upload),' ',monthname(a.tanggal_upload),' ',year(a.tanggal_upload)) as tanggal_up, path_foto, penulis, status, judul, a.read_status
			    FROM bidang_bagian b, artikel a, user u, foto f
			    WHERE u.nip = a.nip 
			        and u.id_bidang = b.id_bidang 
			        and f.id_foto = a.id_foto 
			        ORDER BY a.tanggal_upload DESC
			");
		return $data->result();
	}

	public function select_daftarPermintaanATK()
	{
		$data = $this->db->query("
			SELECT 
			    id_permintaan, kode, nosurat, pa.nip, nama_lkp, bagian, tanggal_permohonan, status, read_status 
			    FROM permintaan_atk pa, user u, bidang_bagian b 
			        WHERE u.nip = pa.nip AND u.id_bidang = b.id_bidang 
			    GROUP BY kode 
			    ORDER BY tanggal_permohonan DESC
			");
		return $data->result();
	}

	public function select_dataPermintaanATK($nosurat)
	{
		$data = $this->db->query("
			SELECT 
			    id_permintaan, nosurat, barang, satuan, volume, p.nip, tanggal_permohonan, status, nama_lkp, jabatan, golongan, UPPER(bagian) as bagian
			FROM permintaan_atk p, user u, bidang_bagian b
			WHERE nosurat = '$nosurat' AND p.nip = u.nip AND b.id_bidang = u.id_bidang
			");
		return $data->result();
	}

	public function select_daftarFoto()
	{
		$this->db->query("
			UPDATE foto SET read_status = 'true'
			");
		$data = $this->db->query("
			SELECT 
			    id_foto, path_foto, f.file_name, concat(day(f.tanggal_upload),' ',monthname(f.tanggal_upload),' ',year(f.tanggal_upload)) as tanggal_upload, u.nama_lkp, b.bagian, f.deskripsi
			FROM foto f, user u, bidang_bagian b 
			WHERE u.nip = f.nip && u.id_bidang = b.id_bidang
			ORDER BY f.tanggal_upload DESC
			");
		return $data->result();
	}

	public function select_viewFoto()
	{
		$data = $this->db->query("
			SELECT 
			    path_foto from foto
			");
		return $data->result();
	}

	public function select_daftarVideo()
	{
		$data = $this->db->query("
			SELECT 
			    id_video, path_video, file_name, concat(day(tanggal_upload),' ',monthname(tanggal_upload),' ',year(tanggal_upload)) as tanggal_upload, nama_lkp, bagian, deskripsi, read_status FROM video v, user u, bidang_bagian b WHERE u.nip = v.nip && u.id_bidang = b.id_bidang 
			    ORDER BY tanggal_upload DESC
			");
		return $data->result();
	}

	public function select_daftarPermohonanRumahDinas()
	{
		$data = $this->db->query("
			SELECT 
			    id_permohonan, no_surat, nama_lkp, p.nip, bagian, concat(day(tgl_mohon),' ',monthname(tgl_mohon),' ',year(tgl_mohon)) as tanggal, status, read_status
            FROM 
                permohonan_rumah p, user u, bidang_bagian b 
            WHERE 
                id_jenis_permohonan = 1 
                && p.nip = u.nip 
                && u.id_bidang = b.id_bidang
            ORDER BY read_status ASC
			");
		return $data->result();
	}

	public function select_daftarPermohonanCabutIzinHunian()
	{
		$data = $this->db->query("
			SELECT 
			    id_permohonan, no_surat, nama_lkp, p.nip, bagian, concat(day(tgl_mohon),' ',monthname(tgl_mohon),' ',year(tgl_mohon)) as tgl_mohon, concat(day(tgl_upload),' ',monthname(tgl_upload),' ',year(tgl_upload)) as tgl_upload, status, read_status FROM permohonan_rumah p, user u, bidang_bagian b 
     		WHERE 
     		    id_jenis_permohonan = 2 
     		    && p.nip = u.nip 
     		    && u.id_bidang = b.id_bidang
     		ORDER BY 
                tgl_mohon DESC
			");
		return $data->result();
	}

	public function select_daftarPermohonanServisRoda2()
	{
		$data = $this->db->query("
			SELECT
			    id_permohonan, status, no_surat, nama_lkp, p.nip, bagian, concat(day(tgl_mohon),' ',monthname(tgl_mohon),' ',year(tgl_mohon)) as tgl_mohon, concat(day(tgl_upload),' ',monthname(tgl_upload),' ',year(tgl_upload)) as tgl_upload, read_status
			FROM 
			    permohonan_service p, user u, bidang_bagian b 
			WHERE 
			    id_jenis_kbd = 1 
			    && p.nip = u.nip 
			    && u.id_bidang = b.id_bidang
			ORDER BY 
                tgl_mohon DESC
			");
		return $data->result();
	}

	public function select_daftarPermohonanServisRoda4()
	{
		$data = $this->db->query("
			SELECT 
			    id_permohonan, status, no_surat, nama_lkp, p.nip, bagian, concat(day(tgl_mohon),' ',monthname(tgl_mohon),' ',year(tgl_mohon)) as tgl_mohon, concat(day(tgl_upload),' ',monthname(tgl_upload),' ',year(tgl_upload)) as tgl_upload, read_status
			FROM 
			    permohonan_service p, user u, bidang_bagian b 
			WHERE 
			    id_jenis_kbd = 2 && p.nip = u.nip && u.id_bidang = b.id_bidang
			ORDER BY 
                tgl_mohon DESC
			");
		return $data->result();
	}

	public function select_daftarPermohonanInventaris()
	{
		$data = $this->db->query("
			SELECT
			    id_permohonan, status, no_surat, nama_lkp, p.nip, bagian, concat(day(tgl_mohon),' ',monthname(tgl_mohon),' ',year(tgl_mohon)) as tgl_mohon, concat(day(tgl_upload),' ',monthname(tgl_upload),' ',year(tgl_upload)) as tgl_upload 
			FROM 
			    permohonan_service p, user u, bidang_bagian b 
			WHERE 
			    id_jenis_kbd = 2 && p.nip = u.nip && u.id_bidang = b.id_bidang
			ORDER BY 
                tgl_mohon DESC
			");
		return $data->result();
	}

	public function select_daftarServiceRoda2()
	{
		$data = $this->db->query("
			SELECT 
			    id_service, a.nopol, concat(day(MAX(a.tanggal)),' ',monthname(MAX(a.tanggal)),' ',year(MAX(a.tanggal))) as tanggal, keterangan FROM (SELECT * FROM riwayat_service ORDER BY tanggal DESC) a WHERE id_jenis_kbd = 1 GROUP BY a.nopol
			");
		return $data->result();
	}

	public function select_daftarServiceRoda4()
	{
		$data = $this->db->query("
			SELECT 
			    id_service, a.nopol, concat(day(MAX(a.tanggal)),' ',monthname(MAX(a.tanggal)),' ',year(MAX(a.tanggal))) as tanggal, keterangan FROM (SELECT * FROM riwayat_service ORDER BY tanggal DESC) a WHERE id_jenis_kbd = 2 GROUP BY a.nopol
			");
		return $data->result();
	}

	public function select_daftarKritikSaran()
	{
		$data = $this->db->query("
			SELECT  
			    nama_lkp, perihal, concat(day(tanggal),' ',monthname(tanggal),' ',year(tanggal), ' | ', hour(tanggal),':',minute(tanggal),':',second(tanggal)) as tanggal, id, read_status FROM user u, kritik_saran k 
			    WHERE u.nip = k.nip 
			    ORDER BY tanggal DESC
			");
		return $data->result();
	}

	public function select_kritiksaran($idKritik)
	{
		$this->db->query("
			UPDATE kritik_saran SET read_status = 'true' WHERE id = '$idKritik'
			");
		$data = $this->db->query("
			SELECT  
			    nama_lkp, perihal, concat(day(tanggal),' ',monthname(tanggal),' ',year(tanggal), ' | ', hour(tanggal),':',minute(tanggal),':',second(tanggal)) as tanggal, kritik_saran, id FROM user u, kritik_saran k 
			    WHERE u.nip = k.nip && id = '$idKritik'
			");
		return $data->result();
	}

	// public function selectNopol($id){
	// 	$data = $this->db->query("
	// 		SELECT nopol FROM riwayat_service WHERE id_service = $id
	// 	");
	// 	return $data->result();
	// }

	public function selectNopol($id)
	{
		$data = $this->db->query("
			SELECT * FROM riwayat_service WHERE id_service = $id
			");
		return $data->result();
	}

	public function selectData($nip)
	{
		$data = $this->db->query("
			SELECT UPPER(bagian) as bagian, nama_lkp, nip, u.jabatan, u.golongan FROM bidang_bagian b, user u WHERE nip = $nip && u.id_bidang = b.id_bidang
			");
		return $data->result();
	}

	public function selectDataService($id)
	{
		$data = $this->db->query("
			SELECT
			    id_service, nopol, tanggal, keterangan, id_jenis_kbd FROM riwayat_service WHERE id_service = $id
			");
		return $data->result();
	}

	public function selectDataAdmin($nip)
	{
		$data = $this->db->query("
			SELECT nip, username, password, id_status, id_bidang FROM user WHERE nip = $nip
			");
		return $data->result();
	}

	public function selectDataUser($nip)
	{
		$data = $this->db->query("
			SELECT nip, username, password, nama_lkp, alamat, tgl_lhr, u.jabatan, u.golongan, bagian FROM user u, bidang_bagian b WHERE nip = $nip AND u.id_bidang = b.id_bidang
			");
		return $data->result();
	}

	public function selectPermohonanHunian($id)
	{
		$data = $this->db->query("
			SELECT 
			    id_permohonan, no_surat, p.nip, tgl_mohon, status, nama_lkp, jabatan, golongan, bagian 
			FROM permohonan_rumah p, user u, bidang_bagian b 
			WHERE id_permohonan = $id AND p.nip = u.nip AND u.id_bidang = b.id_bidang
			");
		return $data->result();
	}

	public function select_daftarATK()
	{
		$data = $this->db->query("
			SELECT * FROM atk
		");
		return $data->result();
	}

	public function select_ATK($id)
	{
		$data = $this->db->query("
			SELECT * FROM atk WHERE id_atk = '$id'
			");
		return $data->result();
	}

	//==========================================================
	//                          DELETE
	//==========================================================

	public function delete_kritikSaran($id)
	{
		$this->db->query("
			DELETE FROM kritik_saran WHERE id = $id
			");
	}

	public function delete_izinHunian($id)
	{
		$this->db->query("
			DELETE FROM permohonan_rumah WHERE id_permohonan = $id
			");
	}

	public function delete_artikel($id)
	{
		$this->db->query("
			DELETE FROM artikel WHERE id_artikel = $id
			");
	}

	public function deletePhoto($id)
	{
		$this->db->query("
			DELETE FROM foto WHERE id_foto = $id
			");
	}

	public function deleteVideo($id)
	{
		$this->db->query("
			DELETE FROM video WHERE id_video = $id
			");
	}

	public function deletePermohonanServiceKBD2($id)
	{
		$this->db->query("
			DELETE FROM permohonan_service WHERE id_permohonan = $id
			");
	}

	public function deletePermohonanServiceKBD4($id)
	{
		$this->db->query("
			DELETE FROM permohonan_service WHERE id_permohonan = $id
			");
	}

	public function deleteDetailServiceKBD2($id)
	{
		$this->db->query("
			DELETE FROM riwayat_service WHERE id_service = $id
			");
	}

	public function deleteDetailServiceKBD4($id)
	{
		$this->db->query("
			DELETE FROM riwayat_service WHERE id_service = $id
			");
	}

	public function deleteInfoMotor($nopol)
	{
		$this->db->query("
			DELETE FROM kbd WHERE nopol = '$nopol'
			");
	}

	public function deleteInfoMobil($nopol)
	{
		$this->db->query("
			DELETE FROM kbd WHERE nopol = '$nopol'
			");
	}

	public function deleteAdmin($nip)
	{
		$this->db->query("
			DELETE FROM user WHERE nip = '$nip'
			");
	}

	public function delete_permintaanATK($nosurat)
	{
		$this->db->query("
			DELETE FROM permintaan_atk WHERE nosurat = '$nosurat'
			");
	}

	public function delete_ATK($id)
	{
		$this->db->query("
			DELETE FROM permintaan_atk WHERE id_permintaan = $id
			");
	}

	public function delete_ATKdiDaftar($id)
	{
		$this->db->query("
			DELETE FROM atk WHERE id_atk = $id
			");
	}

	public function deleteInfoRumahDinas($id)
	{
		$this->db->query("
			DELETE FROM rumah_dinas WHERE id_rumah = '$id'
			");
	}

	//==========================================================
	//                          VIEW
	//==========================================================
	public function viewArtikel($id)
	{
		$this->db->query("
			UPDATE artikel SET read_status = 'true' WHERE id_artikel = $id;
			");
		$data = $this->db->query("
			SELECT * FROM artikel a, foto f
			    WHERE id_artikel = $id && a.id_foto = f.id_foto
			");
		return $data->result();
	}

	public function viewPhoto($id)
	{
		$data = $this->db->query("
			SELECT 
			    path_foto FROM foto 
			WHERE id_foto = $id
			");
		return $data->result();
	}

	public function viewVideo($id)
	{
		$this->db->query("
			UPDATE video SET read_status = 'true' WHERE id_video = $id
			");
		$data = $this->db->query("
			SELECT 
			    id_video, file_name, path_video, tanggal_upload,nip, deskripsi FROM video 
			WHERE id_video = $id
			");
		return $data->result();
	}

	public function viewIzinHunian($id)
	{
		$this->db->query("
			UPDATE permohonan_rumah SET read_status = 'true' WHERE id_permohonan = $id
			");
		$data = $this->db->query("
			SELECT 
			    id_permohonan, no_surat, p.nip, concat(day(tgl_mohon),' ',monthname(tgl_mohon),' ',year(tgl_mohon)) as tgl_mohon, status, nama_lkp, jabatan, golongan, bagian 
			FROM permohonan_rumah p, user u, bidang_bagian b 
			WHERE id_permohonan = $id AND p.nip = u.nip AND u.id_bidang = b.id_bidang
			");
		return $data->result();
	}

	public function viewPermohonanService($id)
	{
		$this->db->query("
			UPDATE permohonan_service SET read_status = 'true' WHERE id_permohonan = $id
			");
		$data = $this->db->query("
			SELECT 
			    id_permohonan, no_surat, plat_nomor, p.nip, concat(day(tgl_mohon),' ',monthname(tgl_mohon),' ',year(tgl_mohon)) as tgl_mohon, status, nama_lkp, jabatan, golongan, bagian 
			FROM permohonan_service p, user u, bidang_bagian b 
			WHERE id_permohonan = $id AND p.nip = u.nip AND u.id_bidang = b.id_bidang
			");
		return $data->result();
	}

	public function editPermintaanATK($kode)
	{
		$this->db->query("
			UPDATE permintaan_atk SET read_status = 'true' WHERE kode = '$kode'
			");
		$data = $this->db->query("
			SELECT 
			    id_permintaan, kode, nosurat, barang, satuan, volume, p.nip, tanggal_permohonan, status, nama_lkp, jabatan, golongan, bagian
			FROM permintaan_atk p, user u, bidang_bagian b
			WHERE kode = '$kode' AND p.nip = u.nip AND b.id_bidang = u.id_bidang
			");
		return $data->result();
	}

	public function detailRiwayatServiceKBD2($nopol)
	{
		$data = $this->db->query("
			SELECT
			    id_service, nopol, tanggal, keterangan, id_jenis_kbd FROM riwayat_service
			WHERE nopol = '$nopol'
			");
		return $data->result();
	}

	public function detailRiwayatServiceKBD4($nopol)
	{
		$data = $this->db->query("
			SELECT
			    id_service, nopol, tanggal, keterangan, id_jenis_kbd FROM riwayat_service
			WHERE nopol = '$nopol'
			");
		return $data->result();
	}

	public function detailRiwayatServiceKBD2afterUpdate($id)
	{
		$data = $this->db->query("
			SELECT * FROM riwayat_service
			WHERE nopol = (SELECT nopol FROM riwayat_service WHERE id_service = $id)
			");
		return $data->result();
	}

	//==========================================================
	//                          UPDATE
	//==========================================================

	public function undoApprovalArtikel($id)
	{
		$this->db->query("
			UPDATE artikel SET status='Not Approved'
			WHERE id_artikel = $id
			");
	}

	public function approveArtikel($id)
	{
		$this->db->query("
			UPDATE artikel SET status='Approved'
			WHERE id_artikel = $id
			");
	}

	public function undoApprovalIzinHunian($id)
	{
		$this->db->query("
			UPDATE permohonan_rumah SET status='Not Approved'
			WHERE id_permohonan = $id
			");
	}

	public function approveIzinHunian($id)
	{
		$this->db->query("
			UPDATE permohonan_rumah SET status='Approved'
			WHERE id_permohonan = $id
			");
	}

	public function undoApprovalCabutIzinHunian($id)
	{
		$this->db->query("
			UPDATE permohonan_rumah SET status='Not Approved'
			WHERE id_permohonan = $id
			");
	}

	public function approveCabutIzinHunian($id)
	{
		$this->db->query("
			UPDATE permohonan_rumah SET status='Approved'
			WHERE id_permohonan = $id
			");
	}

	public function undoApprovalPermohonanServiceKBD2($id)
	{
		$this->db->query("
			UPDATE permohonan_service SET status='Not Approved'
			WHERE id_permohonan = $id
			");
	}

	public function approvePermohonanServiceKBD2($id)
	{
		$this->db->query("
			UPDATE permohonan_service SET status='Approved'
			WHERE id_permohonan = $id
			");
	}

	public function undoApprovalPermohonanServiceKBD4($id)
	{
		$this->db->query("
			UPDATE permohonan_service SET status='Not Approved'
			WHERE id_permohonan = $id
			");
	}

	public function approvePermohonanServiceKBD4($id)
	{
		$this->db->query("
			UPDATE permohonan_service SET status='Approved'
			WHERE id_permohonan = $id
			");
	}

	public function undoApprovalPermintaanATK($nosurat)
	{
		$this->db->query("
			UPDATE permintaan_atk SET status='Not Approved'
			WHERE nosurat = '$nosurat'
			");
	}

	public function approvePermintaanATK($nosurat)
	{
		$this->db->query("
			UPDATE permintaan_atk SET status='Approved'
			WHERE nosurat = '$nosurat'
			");
	}

	public function updateRiwayatKBD2($params)
	{
		$tgl = $params['tgl'];
		$ket = $params['ket'];
		$id  = $params['id'];
		$this->db->query("
			UPDATE riwayat_service SET tanggal = '$tgl', keterangan = '$ket'
			WHERE id_service = $id
			");
	}

	public function updateRiwayatKBD4($params)
	{
		$tgl = $params['tgl'];
		$ket = $params['ket'];
		$id  = $params['id'];
		$this->db->query("
			UPDATE riwayat_service SET tanggal = '$tgl', keterangan = '$ket'
			WHERE id_service = $id
			");
	}

	public function updateInfoMotor($params)
	{
		//$foto      = $params['foto'];
		$merek     = $params['merek'];
		$pic       = $params['pic'];
		$nomorkep  = $params['nomorkep'];
		$nopol     = $params['nopol'];
		$path_foto = $params['path_foto'];


		if ($path_foto != NULL) {
			//mengambil data id_foto
			$hasil = mysql_query('SELECT id_foto FROM foto ORDER BY id_foto DESC LIMIT 1');
			$cek = mysql_fetch_array($hasil);

			//melakukan pengecekan untuk id_foto sekaligus inisialisasi
			if ($cek['id_foto'] == NULL) {
				$id_foto = 1;
			} else {
				$id_foto = $cek['id_foto'] + 1;
			}

			//memasukan data ke tabel foto
			$fields_foto = array(
				'id_foto'        => $id_foto,
				'file_name'      => $params['filename'],
				'path_foto'      => $path_foto,
				'tanggal_upload' => date('Y-m-d'),
				'nip'            => NULL,
				'read_status'    => "true"
			);

			//insert ke tabel foto
			$this->db->insert('foto', $fields_foto);


			$this->db->query("
				UPDATE kbd 
				    SET id_foto   = $id_foto,
				        merek     = '$merek', 
				        pic_kbd   = '$pic',
				        nomor_kep = '$nomorkep'
				            WHERE nopol = '$nopol'
				");
		} else {
			$query = mysql_query("SELECT id_foto FROM kbd WHERE nopol = '$nopol'");
			$kbd = mysql_fetch_array($query);
			$id = $kbd['id_foto'];
			$this->db->query("
				UPDATE kbd 
				    SET id_foto   = $id,
				        merek     = '$merek', 
				        pic_kbd   = '$pic',
				        nomor_kep = '$nomorkep'
				            WHERE nopol = '$nopol'
				");
		}
	}

	public function updateInfoMobil($params)
	{
		//$foto      = $params['foto'];
		$merek     = $params['merek'];
		$pic       = $params['pic'];
		$nomorkep  = $params['nomorkep'];
		$nopol     = $params['nopol'];
		$path_foto = $params['path_foto'];


		if ($path_foto != NULL) {
			//mengambil data id_foto
			$hasil = mysql_query('SELECT id_foto FROM foto ORDER BY id_foto DESC LIMIT 1');
			$cek = mysql_fetch_array($hasil);

			//melakukan pengecekan untuk id_foto sekaligus inisialisasi
			if ($cek['id_foto'] == NULL) {
				$id_foto = 1;
			} else {
				$id_foto = $cek['id_foto'] + 1;
			}

			//memasukan data ke tabel foto
			$fields_foto = array(
				'id_foto'        => $id_foto,
				'file_name'      => $params['filename'],
				'path_foto'      => $path_foto,
				'tanggal_upload' => date('Y-m-d'),
				'nip'            => NULL,
				'read_status'    => "true"
			);

			//insert ke tabel foto
			$this->db->insert('foto', $fields_foto);


			$this->db->query("
				UPDATE kbd 
				    SET id_foto   = $id_foto,
				        merek     = '$merek', 
				        pic_kbd   = '$pic',
				        nomor_kep = '$nomorkep'
				            WHERE nopol = '$nopol'
				");
		} else {
			$query = mysql_query("SELECT id_foto FROM kbd WHERE nopol = '$nopol'");
			$kbd = mysql_fetch_array($query);
			$id = $kbd['id_foto'];
			$this->db->query("
				UPDATE kbd 
				    SET id_foto   = $id,
				        merek     = '$merek', 
				        pic_kbd   = '$pic',
				        nomor_kep = '$nomorkep'
				            WHERE nopol = '$nopol'
				");
		}
	}

	public function updateDataAdmin($params)
	{
		$user   = $params['user'];
		$pwd    = $params['pwd'];
		$status = $params['status'];
		$nip    = $params['nip'];

		$this->db->query("
			UPDATE user SET username = '$user', password = '$pwd', id_status = '$status'
			WHERE nip = $nip
	    ");
	}

	public function updateDataUser($params)
	{

		$user      = $params['user'];
		$pwd       = $params['pwd'];
		$status    = $params['status'];
		$nip       = $params['nip'];
		$nama_lkp  = $params['nama'];
		// $bagian = $params['bagian'];
		$tgl_lhr   = $params['tgl'];
		$alamat    = $params['alamat'];
		$jabatan    = $params['jabatan'];
		$gol    = $params['gol'];

		$this->db->query("
			UPDATE user 
			    SET username  = '$user', 
			        password  = '$pwd', 
			        id_status = '$status',
			        nama_lkp  = '$nama_lkp',
			        tgl_lhr   = '$tgl_lhr',
			        alamat    = '$alamat',
			        jabatan   = '$jabatan',
			        golongan  = '$gol'
			WHERE nip = '$nip'
	    ");
	}

	public function updateDaftarATK($params)
	{
		$atk = $params['atk'];
		$stok = $params['stok'];
		$id  = $params['id'];
		$this->db->query("
			UPDATE atk SET atk = '$atk', stok = '$stok'
			WHERE id_atk = $id
			");
	}

	public function updateInfoRumahDinas($params)
	{
		$id_rumah   = $params['id'];
		$id_listrik = $params['id_listrik'];
		$id_pdam    = $params['id_pdam'];
		$lokasi     = $params['lokasi'];
		$alamat     = $params['alamat'];
		$penghuni   = $params['penghuni'];
		$keterangan = $params['ket'];
		$path_foto  = $params['path_foto'];


		if ($path_foto != NULL) {
			//mengambil data id_foto
			$hasil = mysql_query('SELECT id_foto FROM foto ORDER BY id_foto DESC LIMIT 1');
			$cek = mysql_fetch_array($hasil);

			//melakukan pengecekan untuk id_foto sekaligus inisialisasi
			if ($cek['id_foto'] == NULL) {
				$id_foto = 1;
			} else {
				$id_foto = $cek['id_foto'] + 1;
			}

			//memasukan data ke tabel foto
			$fields_foto = array(
				'id_foto'        => $id_foto,
				'file_name'      => $params['filename'],
				'path_foto'      => $path_foto,
				'tanggal_upload' => date('Y-m-d'),
				'nip'            => NULL,
				'read_status'    => "true"
			);

			//insert ke tabel foto
			$this->db->insert('foto', $fields_foto);


			$this->db->query("
				UPDATE rumah_dinas 
				    SET id_foto    = '$id_foto',
				        id_listrik = '$id_listrik',
				        id_pdam    = '$id_pdam', 
				        lokasi     = '$lokasi',
				        alamat     = '$alamat',
				        penghuni   = '$penghuni',
				        keterangan = '$keterangan'
				            WHERE id_rumah = '$id_rumah'
				");
		} else {
			$query = mysql_query("SELECT id_foto FROM rumah_dinas WHERE id_rumah = '$id_rumah'");
			$rumah_dinas = mysql_fetch_array($query);
			$id = $rumah_dinas['id_foto'];
			$this->db->query("
				UPDATE rumah_dinas 
				    SET id_foto    = '$id',
				        id_listrik = '$id_listrik',
				        id_pdam    = '$id_pdam', 
				        lokasi     = '$lokasi',
				        alamat     = '$alamat',
				        penghuni   = '$penghuni',
				        keterangan = '$keterangan'
				            WHERE id_rumah = '$id_rumah'
				");
		}
	}

	//=====================
	public function cekKodePermintaanATK()
	{
		$data = $this->db->query("
			SELECT MAX(kode) FROM permintaan_atk
			");
		return $data->result();
	}
}
