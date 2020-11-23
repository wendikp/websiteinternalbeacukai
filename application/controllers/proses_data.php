<?php
defined('BASEPATH') OR exit('No direct script acces allowed');

/**
* 
*/
class Proses_data extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('m_proses'));
		$this->load->helper(array('form', 'url', 'file'));
	}

	//====================================================================
	//                              INSERT
	//====================================================================

	//--------->USER

	public function insert_admin(){
		$user   = NULL;
		$pwd    = NULL;
		$status = NULL;

		extract($_POST);

		$params['user'] = $user;
		$params['pwd']  = $pwd;

		if ($status == 1) {
			$params['status'] = 1;
		} elseif ($status == 2) {
			$params['status'] = 2; 
		} else {
			$params['status'] = 3;
		}

		if (isset($submit)) {
			$this->m_proses->insert_admin($params);
		}
		redirect(base_url().'proses_data/get_daftarAdmin');
	}

	public function insert_user(){
		$user   = NULL;
		$pwd    = NULL;
		$nip    = NULL;
		$nama   = NULL;
		$tgl    = NULL;
		$alamat = NULL;
		$bagian = NULL;
		$jabatan= NULL;
		$gol    = NULL;

		extract($_POST);

		$params['user']   = $user;
		$params['pwd']    = $pwd;
		$params['nip']    = $nip;
		$params['nama']   = $nama;
		$params['tgl']    = $tgl;
		$params['alamat'] = $alamat;
		$params['bagian'] = $bagian;
		$params['status'] = 4;
		$params['jabatan']= $jabatan;
		$params['gol']    = $gol;

		// Cek username di database
		$cek_username=mysql_num_rows(mysql_query
			("SELECT username FROM user
				WHERE username='$user'")
			);

        // Kalau username sudah ada yang pakai
		if ($cek_username > 0){
			redirect(base_url().'proses_data/tambahUser');
		}

        // Kalau username valid, inputkan data ke tabel users
		else{
			if (isset($submit)) {
				$this->m_proses->insert_user($params);
			}
			redirect(base_url().'proses_data/get_daftarUser');
		}

	}

	public function input_artikel() {
		
		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '0';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('user/p_uploadartikel', $error);
		}else{
			$data = array(
				'upload_data' => $this->upload->data()
				);
		}

		//=======================

		$gbr = $this->upload->data();
		$params = array(
			'filename' =>$gbr['file_name']  
			);


		$penulis = NULL; //utk artikel
		$judul = NULL; //utk artikel
		$bidang = NULL; //utk artikel
		$foto = NULL; //utk artikel
		$status = "Not Approved"; //utk artikel
		$artikel = NULL; //utk artikel
		$submit = NULL; //utk artikel
		//$filename = $this->input->post('foto');
		$file_path = "photo/".$params['filename'];
		
		extract($_POST);
		
		$params['path_foto'] = $file_path;
		//$params['filename']  = $filename;
		$params['penulis']   = $penulis;
		$params['judul']     = $judul;
		$params['bidang']    = $bidang;
		$params['foto']      = $foto;
		$params['artikel']   = $artikel;
		$params['status']    = $status;

		if (isset($submit)) {
			$this->m_proses->insert_artikel($params);
		}

		redirect(base_url()."proses_data/p_humas");
	}

	public function input_foto(){
		$this->load->library(array(
			'Custom_upload',
			'form_validation'
			));

		$file = $this->custom_upload->multiple_upload('file', array(
			'upload_path' => 'photo/',
			'allowed_types' => 'jpg|jpeg|png|gif'
			));

		//mengambil nip user yg login
		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT nip FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$nip = $user['nip'];
		
		$image = array();

		extract($_POST);
		
		foreach ($file as $f) {
			array_push($image, array(
				'file_name' => $f,
				'deskripsi' => $deskripsi,
				'path_foto' => "photo/".$f,
				'nip'       => $nip
				));
		}
		
		$this->db->insert_batch('foto', $image);

		redirect(base_url()."proses_data/p_humas");
	}

	public function input_video() {

		$user = $this->session->userdata('username');
		$query = mysql_query("SELECT id_bidang FROM user WHERE username = '$user'");
		$user = mysql_fetch_array($query);
		$id_bidang = $user['id_bidang'];

		//=============================================
		$nmfile = "video_".time(); 
		$path_video = "video/";
		
		$config['upload_path'] = './video/';
		$config['allowed_types'] = 'mp4|3gp|flv';
		$config['max_size']      = '1000000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);
		//===============================================

		if ( ! $this->upload->do_upload('video')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('user/p_uploadvideo', $error);
		}else{
			$data = array(
				'upload_data' => $this->upload->data()
				);
			
			$video = $this->upload->data();
			$params = array(
				'filename' =>$video['file_name']  
				);

			$deskripsi = NULL;
			$file_path = $path_video.$params['filename'];

			extract($_POST);

			$params['deskripsi'] = $deskripsi;
			$params['path_video'] = $file_path;

			if (isset($submit)) {
				$this->m_proses->insert_video($params);
			}

			redirect(base_url()."proses_data/p_humas");
		}

	}

	public function input_permohonan_hunian() {
		if (isset($_POST["submit"])) {
			$nosrt = NULL;
			$tglmohon = NULL;

			extract($_POST);

			$params['nosrt'] = $nosrt;
			$params['tglmohon'] = $tglmohon;

			if (isset($submit)) {
				$this->m_proses->insert_permohonan_hunian($params);
			}
			redirect(base_url()."proses_data/p_rumahtangga");
		} else {
			require_once(APPPATH.'controllers/surat_permohonan.php');
			$function = new Surat_permohonan();

			$nosrt    = NULL;
			$tglmohon = NULL;

			extract($_POST);

			$params['nosrt']    = $nosrt;
			$params['tglmohon'] = $tglmohon;

			$function->permohonanHunian($params);
			
		}		
	}

	public function input_permohonan_cabut_hunian() {
		if (isset($_POST["submit"])) {
			$nosrt = NULL;
			$tglmohon = NULL;

			extract($_POST);

			$params['nosrt'] = $nosrt;
			$params['tglmohon'] = $tglmohon;

			if (isset($submit)) {
				$this->m_proses->insert_permohonan_cabut_hunian($params);
			}

			redirect(base_url()."proses_data/p_rumahtangga");
		} else {
			require_once(APPPATH.'controllers/surat_permohonan.php');
			$function = new Surat_permohonan();
			
			$nosrt    = NULL;
			$tglmohon = NULL;
			
			extract($_POST);

			$params['nosrt']    = $nosrt;
			$params['tglmohon'] = $tglmohon;

			$function->permohonanCabutHunian($params);
		}
	}

	public function input_kritiksaran() {
		$kritiksaran = NULL;
		$perihal = NULL;

		extract($_POST);

		$params['kritiksaran'] = $kritiksaran;
		$params['perihal']     = $perihal;

		if (isset($submit)) {
			$this->m_proses->insert_kritiksaran($params);
		}

		redirect(base_url()."proses_data/p_rumahtangga");
	}

	public function input_permohonan_service_kbd2() {
		if (isset($_POST["submit"])) {
			$nosrt = NULL;
			$tglmohon = NULL;
			$platno = NULL;

			extract($_POST);

			$params['nosrt'] = $nosrt;
			$params['tglmohon'] = $tglmohon;
			$params['platno'] = $platno;

			if (isset($submit)) {
				$this->m_proses->insert_permohonan_service_kbd2($params);	
			}

			redirect(base_url()."proses_data/p_rumahtangga");

		} else {
			require_once(APPPATH.'controllers/surat_permohonan.php');
			$function = new Surat_permohonan();
			
			$nosrt    = NULL;
			$tglmohon = NULL;
			
			extract($_POST);

			$params['nosrt']    = $nosrt;
			$params['tglmohon'] = $tglmohon;

			$function->permohonanServisKBD2($params);
		}

	}

	public function input_permohonan_service_kbd4() {
		if (isset($_POST["submit"])) {
			$nosrt = NULL;
			$tglmohon = NULL;
			$platno = NULL;

			extract($_POST);

			$params['nosrt'] = $nosrt;
			$params['tglmohon'] = $tglmohon;
			$params['platno'] = $platno;

			if (isset($submit)) {
				$this->m_proses->insert_permohonan_service_kbd4($params);	
			}

			redirect(base_url()."proses_data/p_rumahtangga");
		} else {
			require_once(APPPATH.'controllers/surat_permohonan.php');
			$function = new Surat_permohonan();
			
			$nosrt    = NULL;
			$tglmohon = NULL;
			
			extract($_POST);

			$params['nosrt']    = $nosrt;
			$params['tglmohon'] = $tglmohon;

			$function->permohonanServisKBD4($params);
		}
	}

	//--------->ADMIN RT

	public function tambahRiwayatKBD2($nopol){
		$nopolis = str_replace('%20', ' ', $nopol);

		$tgl = NULL;
		$ket = NULL;

		extract($_POST);

		$params['tgl'] = $tgl;
		$params['ket'] = $ket;
		$params['nopol'] = $nopolis;
		
		if (isset($submit)) {
			$this->m_proses->insert_riwayatServiceKBD2($params);
		}

		$data = array(
			'data' => $this->m_proses->detailRiwayatServiceKBD2($nopolis)
			);
		
		redirect(base_url().'proses_data/detailRiwayatServiceKBD2/'.$nopolis, $data);
	}	

	public function tambahRiwayatKBD4($nopol){
		$nopolis = str_replace('%20', ' ', $nopol);

		$tgl = NULL;
		$ket = NULL;

		extract($_POST);

		$params['tgl'] = $tgl;
		$params['ket'] = $ket;
		$params['nopol'] = $nopolis;
		
		if (isset($submit)) {
			$this->m_proses->insert_riwayatServiceKBD4($params);
		}

		$data = array(
			'data' => $this->m_proses->detailRiwayatServiceKBD4($nopolis)
			);
		
		redirect(base_url().'proses_data/detailRiwayatServiceKBD4/'.$nopolis, $data);
	}	

	public function insert_tambahBaruRiwayatKBD2(){
		$nopol = NULL;
		$tgl   = NULL;
		$ket   = NULL;

		extract($_POST);

		$params['tgl']   = $tgl;
		$params['ket']   = $ket;
		$params['nopol'] = $nopol;
		
		if (isset($submit)) {
			$this->m_proses->insert_riwayatServiceKBD2($params);
		}
		redirect(base_url().'proses_data/riwayatServiceRoda2');
	}

	public function insert_tambahBaruRiwayatKBD4(){
		$nopol = NULL;
		$tgl   = NULL;
		$ket   = NULL;

		extract($_POST);

		$params['tgl']   = $tgl;
		$params['ket']   = $ket;
		$params['nopol'] = $nopol;
		
		if (isset($submit)) {
			$this->m_proses->insert_riwayatServiceKBD4($params);
		}
		redirect(base_url().'proses_data/riwayatServiceRoda4');
	}

	public function insert_KBD2(){
		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '3072';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('user/p_uploadartikel', $error);
		}else{
			$data = array(
				'upload_data' => $this->upload->data()
				);
		}

		//=======================

		$gbr = $this->upload->data();
		$params = array(
			'filename' =>$gbr['file_name']  
			);
		
		$nopol     = NULL;
		$merek     = NULL;
		$pic       = NULL;
		$nomorkep  = NULL;
		$file_path = "photo/".$params['filename'];

		extract($_POST);

		$params['nopol']     = $nopol;
		$params['merek']     = $merek;
		$params['pic']       = $pic;
		$params['nomorkep']  = $nomorkep;
		$params['path_foto'] = $file_path;

		if (isset($submit)) {
			$this->m_proses->insert_KBD2($params);	
		}

		redirect(base_url()."proses_data/get_daftarMotor");

	}

	public function insert_KBD4(){
		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '3072';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('user/p_uploadartikel', $error);
		}else{
			$data = array(
				'upload_data' => $this->upload->data()
				);
		}

		//=======================

		$gbr = $this->upload->data();
		$params = array(
			'filename' =>$gbr['file_name']  
			);
		
		$nopol     = NULL;
		$merek     = NULL;
		$pic       = NULL;
		$nomorkep  = NULL;
		$file_path = "photo/".$params['filename'];

		extract($_POST);

		$params['nopol']     = $nopol;
		$params['merek']     = $merek;
		$params['pic']       = $pic;
		$params['nomorkep']  = $nomorkep;
		$params['path_foto'] = $file_path;

		if (isset($submit)) {
			$this->m_proses->insert_KBD4($params);	
		}

		redirect(base_url()."proses_data/get_daftarMobil");

	}

	public function insertATK(){
		$atk          = NULL;
		$ketersediaan = NULL;
		$satuan       = NULL;

		extract($_POST);

		$params['atk']          = $atk;
		$params['ketersediaan'] = $ketersediaan;
		$params['satuan']       = $satuan;
		
		if (isset($submit)) {
			$this->m_proses->insert_ATK($params);
		}

		redirect(base_url().'proses_data/get_daftarATK');
	}	

	public function insert_rumahAraya(){
		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '3072';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('user/p_uploadartikel', $error);
		}else{
			$data = array(
				'upload_data' => $this->upload->data()
				);
		}

		//=======================

		$gbr = $this->upload->data();
		$params = array(
			'filename' =>$gbr['file_name']  
			);
		
		$id_listrik = NULL;
		$id_pdam    = NULL;
		$lokasi     = "araya";
		$alamat     = NULL;
		$penghuni   = NULL;
		$ket        = NULL;
		$file_path  = "photo/".$params['filename'];

		extract($_POST);

		$params['id_listrik'] = $id_listrik;
		$params['id_pdam']    = $id_pdam;
		$params['lokasi']     = $lokasi;
		$params['alamat']     = $alamat;
		$params['penghuni']   = $penghuni;
		$params['ket']        = $ket;
		$params['path_foto']  = $file_path;

		if (isset($submit)) {
			$this->m_proses->insert_rumah($params);	
		}

		redirect(base_url()."proses_data/get_daftarRumahAraya");

	}

	public function insert_rumahPakisjajar(){
		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '3072';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('user/p_uploadartikel', $error);
		}else{
			$data = array(
				'upload_data' => $this->upload->data()
				);
		}

		//=======================

		$gbr = $this->upload->data();
		$params = array(
			'filename' =>$gbr['file_name']  
			);
		
		$id_listrik = NULL;
		$id_pdam    = NULL;
		$lokasi     = "pakisjajar";
		$alamat     = NULL;
		$penghuni   = NULL;
		$ket        = NULL;
		$file_path  = "photo/".$params['filename'];

		extract($_POST);

		$params['id_listrik'] = $id_listrik;
		$params['id_pdam']    = $id_pdam;
		$params['lokasi']     = $lokasi;
		$params['alamat']     = $alamat;
		$params['penghuni']   = $penghuni;
		$params['ket']        = $ket;
		$params['path_foto']  = $file_path;

		if (isset($submit)) {
			$this->m_proses->insert_rumah($params);	
		}

		redirect(base_url()."proses_data/get_daftarRumahPakisjajar");

	}

	

	//====================================================================
	//                              UPDATE
	//====================================================================

	public function undoApprovalArtikel($id){
		$this->m_proses->undoApprovalArtikel($id);
		redirect(base_url()."proses_data/get_daftarArtikel");
	}

	public function approveArtikel($id){
		$this->m_proses->approveArtikel($id);
		redirect(base_url()."proses_data/get_daftarArtikel");
	}

	public function undoApprovalIzinHunian($id){
		$this->m_proses->undoApprovalIzinHunian($id);
		redirect(base_url()."proses_data/daftarPermohonanRumahDinas");
	}

	public function approveIzinHunian($id){
		$this->m_proses->approveIzinHunian($id);
		redirect(base_url()."proses_data/daftarPermohonanRumahDinas");
	}

	public function undoApprovalCabutIzinHunian($id){
		$this->m_proses->undoApprovalCabutIzinHunian($id);
		redirect(base_url()."proses_data/daftarPermohonanCabutIzinHunian");
	}
	
	public function approveCabutIzinHunian($id){
		$this->m_proses->approveCabutIzinHunian($id);
		redirect(base_url()."proses_data/daftarPermohonanCabutIzinHunian");
	}

	public function undoApprovalPermohonanServiceKBD2($id){
		$this->m_proses->undoApprovalPermohonanServiceKBD2($id);
		redirect(base_url()."proses_data/daftarPermohonanServisRoda2");
	}
	
	public function approvePermohonanServiceKBD2($id){
		$this->m_proses->approvePermohonanServiceKBD2($id);
		redirect(base_url()."proses_data/daftarPermohonanServisRoda2");
	}

	public function undoApprovalPermohonanServiceKBD4($id){
		$this->m_proses->undoApprovalPermohonanServiceKBD4($id);
		redirect(base_url()."proses_data/daftarPermohonanServisRoda4");
	}
	
	public function approvePermohonanServiceKBD4($id){
		$this->m_proses->approvePermohonanServiceKBD4($id);
		redirect(base_url()."proses_data/daftarPermohonanServisRoda4");
	}

	public function undoApprovalPermintaanATK($nosurat){
		$nosrt = str_replace('%20', ' ', $nosurat);
		$this->m_proses->undoApprovalPermintaanATK($nosrt);
		redirect(base_url()."proses_data/get_daftarPermintaanATK");
	}

	public function approvePermintaanATK($nosurat){
		$nosrt = str_replace('%20', ' ', $nosurat);
		$this->m_proses->approvePermintaanATK($nosrt);
		redirect(base_url()."proses_data/get_daftarPermintaanATK");
	}

	// public function updateRiwayatKBD2($id){
	// 	$tgl = NULL;
	// 	$ket = NULL;

	// 	extract($_POST);

	// 	$params['tgl'] = $tgl;
	// 	$params['ket'] = $ket;
	// 	$params['id']  = $id;

	// 	$this->m_proses->updateRiwayatKBD2($params);

	// 	redirect(base_url()."proses_data/detailRiwayatServiceKBD2afterUpdate/".$id);

	// }

	public function updateRiwayatKBD2($id){
		$tgl = NULL;
		$ket = NULL;

		extract($_POST);

		$params['tgl'] = $tgl;
		$params['ket'] = $ket;
		$params['id']  = $id;

		$this->m_proses->updateRiwayatKBD2($params);
		$data = $this->m_proses->selectNopol($id);
		
		foreach ($data as $row) {
			$nopol = $row->nopol;
			break;
		}

		redirect(base_url()."proses_data/detailRiwayatServiceKBD2/".$nopol);

	}

	public function updateRiwayatKBD4($id){
		$tgl = NULL;
		$ket = NULL;

		extract($_POST);

		$params['tgl'] = $tgl;
		$params['ket'] = $ket;
		$params['id']  = $id;

		$this->m_proses->updateRiwayatKBD4($params);
		$data = $this->m_proses->selectNopol($id);
		
		foreach ($data as $row) {
			$nopol = $row->nopol;
			break;
		}

		redirect(base_url()."proses_data/detailRiwayatServiceKBD4/".$nopol);

	}

	public function updateInfoMotor($nopol){
		$nopolis   = str_replace('%20', ' ', $nopol);
		$cek       = NULL;
		$merek     = NULL;
		$pic       = NULL;
		$nomorkep  = NULL;
		$file_path = NULL;

		extract($_POST);

		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '3072';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')){
			$data = array(
				'upload_data' => $this->upload->data()
				);
			//=============================================
			$gbr = $this->upload->data();
			$params = array(
				'filename' =>$gbr['file_name']  
				);
			$file_path = "photo/".$params['filename'];
		}

		$params['merek']    = $merek;
		$params['pic']      = $pic;
		$params['nomorkep'] = $nomorkep;
		$params['nopol']    = $nopolis;
		$params['path_foto'] = $file_path;

		$this->m_proses->updateInfoMotor($params);

		redirect(base_url()."proses_data/get_daftarMotor");
	}

	public function updateInfoMobil($nopol){
		$nopolis   = str_replace('%20', ' ', $nopol);
		$cek       = NULL;
		$merek     = NULL;
		$pic       = NULL;
		$nomorkep  = NULL;
		$file_path = NULL;

		extract($_POST);

		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '3072';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')){
			$data = array(
				'upload_data' => $this->upload->data()
				);
			//=============================================
			$gbr = $this->upload->data();
			$params = array(
				'filename' =>$gbr['file_name']  
				);
			$file_path = "photo/".$params['filename'];
		}

		$params['merek']     = $merek;
		$params['pic']       = $pic;
		$params['nomorkep']  = $nomorkep;
		$params['nopol']     = $nopolis;
		$params['path_foto'] = $file_path;

		$this->m_proses->updateInfoMobil($params);

		redirect(base_url()."proses_data/get_daftarMobil");
	}

	public function updateDataAdmin($nip){
		$user   = NULL;
		$pwd    = NULL;
		$status = NULL;

		extract($_POST);

		$params['user'] = $user;
		$params['pwd']  = $pwd;
		$params['nip']  = $nip;

		if ($status == 1) {
			$params['status'] = 1;
		} elseif ($status == 2) {
			$params['status'] = 2; 
		} else {
			$params['status'] = 3;
		}

		$this->m_proses->updateDataAdmin($params);

		redirect(base_url()."proses_data/get_daftarAdmin");

	}

	public function updateDataUser(){
		$user   = NULL;
		$pwd    = NULL;
		$nip    = NULL;
		$nama   = NULL;
		$tgl    = NULL;
		$alamat = NULL;
		$bagian = NULL;
		$jabatan= NULL;
		$gol    = NULL;

		extract($_POST);

		$params['user']   = $user;
		$params['pwd']    = $pwd;
		$params['nip']    = $nip;
		$params['nama']   = $nama;
		$params['tgl']    = $tgl;
		$params['alamat'] = $alamat;
		$params['bagian'] = $bagian;
		$params['status'] = 4;
		$params['jabatan'] = $jabatan;
		$params['gol']     = $gol;

		$this->m_proses->updateDataUser($params);

		redirect(base_url()."proses_data/get_daftarUser");

	}

	public function updatePermintaanATK(){
		$id       = $_POST['id'];
		$atk      = $_POST['barang'];
		$volume   = $_POST['volume'];
		$satuan   = $_POST['satuan'];

		$i=0;
		while ($i < (count($volume))) {
			$field = array(
				'barang'             => $atk[$i],
				'volume'             => $volume[$i],
				'satuan'             => $satuan[$i]
				);
			$this->db->where('id_permintaan', $id[$i]);
			$this->db->update('permintaan_atk', $field);
			$i++;
		}

		redirect(base_url()."proses_data/get_daftarPermintaanATK");

	}

	public function updateDaftarATK($id){
		$atk = NULL;
		$stok = NULL;

		extract($_POST);

		$params['atk']  = $atk;
		$params['stok'] = $stok;
		$params['id']   = $id;

		$this->m_proses->updateDaftarATK($params);
		
		redirect(base_url()."proses_data/get_daftarATK");

	}

	public function updateInfoRumahAraya($id){
		$id_listrik = NULL;
		$id_pdam    = NULL;
		$lokasi     = NULL;
		$alamat     = NULL;
		$penghuni   = NULL;
		$ket        = NULL;
		$file_path  = NULL;

		extract($_POST);

		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '3072';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')){
			$data = array(
				'upload_data' => $this->upload->data()
				);
			//=============================================
			$gbr = $this->upload->data();
			$params = array(
				'filename' =>$gbr['file_name']  
				);
			$file_path = "photo/".$params['filename'];
		}

		$params['id']         = $id;
		$params['id_listrik'] = $id_listrik;
		$params['id_pdam']    = $id_pdam;
		$params['lokasi']     = $lokasi;
		$params['alamat']     = $alamat;
		$params['penghuni']   = $penghuni;
		$params['ket']        = $ket;
		$params['path_foto']  = $file_path;

		$this->m_proses->updateInfoRumahDinas($params);

		redirect(base_url()."proses_data/get_daftarRumahAraya");
	}

	public function updateInfoRumahPakisjajar($id){
		$id_listrik = NULL;
		$id_pdam    = NULL;
		$lokasi     = NULL;
		$alamat     = NULL;
		$penghuni   = NULL;
		$ket        = NULL;
		$file_path  = NULL;

		extract($_POST);

		//=============================================
		$nmfile = "foto_".time(); 
		$config['upload_path']   = './photo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']      = '3072';
		$config['max_width']     = '5000';
		$config['max_height']    = '5000';
		$config['file_name']     = $nmfile;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')){
			$data = array(
				'upload_data' => $this->upload->data()
				);
			//=============================================
			$gbr = $this->upload->data();
			$params = array(
				'filename' =>$gbr['file_name']  
				);
			$file_path = "photo/".$params['filename'];
		}

		$params['id']         = $id;
		$params['id_listrik'] = $id_listrik;
		$params['id_pdam']    = $id_pdam;
		$params['lokasi']     = $lokasi;
		$params['alamat']     = $alamat;
		$params['penghuni']   = $penghuni;
		$params['ket']        = $ket;
		$params['path_foto']  = $file_path;

		$this->m_proses->updateInfoRumahDinas($params);

		redirect(base_url()."proses_data/get_daftarRumahPakisjajar");
	}

	//====================================================================
	//                              DELETE
	//====================================================================

	public function deleteKritikSaran($id){
		$this->m_proses->delete_kritikSaran($id);
		redirect(base_url()."proses_data/daftarKritikSaran");
	}

	public function deleteIzinHunian($id){
		$this->m_proses->delete_izinHunian($id);
		redirect(base_url()."proses_data/daftarPermohonanRumahDinas");
	}

	public function deleteCabutIzinHunian($id){
		$this->m_proses->delete_izinHunian($id);
		redirect(base_url()."proses_data/daftarPermohonanCabutIzinHunian");
	}

	public function deleteArtikel($id){
		$this->m_proses->delete_artikel($id);
		redirect(base_url()."proses_data/get_daftarArtikel");
	}

	public function deletePhoto($id){
		$this->m_proses->deletePhoto($id);
		redirect(base_url()."proses_data/get_daftarFoto");
	}

	public function deleteVideo($id){
		$this->m_proses->deleteVideo($id);
		redirect(base_url()."proses_data/get_daftarVideo");
	}

	public function deletePermohonanServiceKBD2($id){
		$this->m_proses->deletePermohonanServiceKBD2($id);
		redirect(base_url()."proses_data/daftarPermohonanServisRoda2");
	}

	public function deletePermohonanServiceKBD4($id){
		$this->m_proses->deletePermohonanServiceKBD4($id);
		redirect(base_url()."proses_data/daftarPermohonanServisRoda4");
	}

	public function deleteInfoMotor($nopol){
		$nopolis = str_replace('%20', ' ', $nopol);
		$this->m_proses->deleteInfoMotor($nopolis);
		redirect(base_url()."proses_data/get_daftarMotor");
	}

	public function deleteInfoMobil($nopol){
		$nopolis = str_replace('%20', ' ', $nopol);
		$this->m_proses->deleteInfoMobil($nopolis);
		redirect(base_url()."proses_data/get_daftarMobil");
	}

	//menghapus permintaan atk secara keseluruhan
	public function deletePermintaanATK($nosurat){
		$nosrt = str_replace('%20', ' ', $nosurat);
		$this->m_proses->delete_permintaanATK($nosrt);
		redirect(base_url()."proses_data/get_daftarPermintaanATK");
	}

	//menghapus salah satu barang di permintaan atk
	public function deleteATK($id){
		$query = mysql_query("SELECT kode FROM permintaan_atk WHERE id_permintaan = $id");
		$hasil = mysql_fetch_array($query);
		$nosurat = $hasil['kode'];
		
		$this->m_proses->delete_ATK($id);

		redirect(base_url()."proses_data/editPermintaanATK/".$kode);
	}

    public function deleteDetailServiceKBD2($id){
    	$data = $this->m_proses->selectNopol($id);

    	foreach ($data as $row) {
    		$nopol = $row->nopol;
    		break;
    	}

    	$this->m_proses->deleteDetailServiceKBD2($id);

    	redirect(base_url()."proses_data/detailRiwayatServiceKBD2/".$nopol);
    }

    public function deleteDetailServiceKBD4($id){
    	$data = $this->m_proses->selectNopol($id);

    	foreach ($data as $row) {
    		$nopol = $row->nopol;
    		break;
    	}

    	$this->m_proses->deleteDetailServiceKBD4($id);

    	redirect(base_url()."proses_data/detailRiwayatServiceKBD2/".$nopol);
    }

    public function deleteAdmin($nip){
    	$this->m_proses->deleteAdmin($nip);
    	redirect(base_url()."proses_data/get_daftarAdmin");
    }

    public function deleteUser($nip){
    	$this->m_proses->deleteAdmin($nip);
    	redirect(base_url()."proses_data/get_daftarUser");
    }

    public function deleteATKdiDaftar($id){
		$this->m_proses->delete_ATKdiDaftar($id);
		redirect(base_url()."proses_data/get_daftarATK");
	}

	public function deleteInfoRumahAraya($id){
		$this->m_proses->deleteInfoRumahDinas($id);
		redirect(base_url()."proses_data/get_daftarRumahAraya");
	}

	public function deleteInfoRumahPakisjajar($id){
		$this->m_proses->deleteInfoRumahDinas($id);
		redirect(base_url()."proses_data/get_daftarRumahPakisjajar");
	}



	//====================================================================
	//                              SELECT
	//====================================================================

	//====================================================================
	//                              LOAD PAGE
	//====================================================================


    //ADMIN ROOT=======================================================================================================================

    public function dashboard(){
    	$cek = $this->session->userdata('stts');
    	if ($cek == 1) {
    		$this->load->view('admin/dashboard');
    	} else {
    		header("location:".base_url());
    	}
    }

    public function get_daftarAdmin(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarAdmin()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 1) {
    		$this->load->view('admin/p_listAdmin', $data);
    	} else {
    		header("location:".base_url());
    	}
    }

    public function get_daftarUser(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarUser()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 1) {
    		$this->load->view('admin/p_listUser', $data);
    	} else {
    		header("location:".base_url());
    	}
    }

    public function editAdmin($nip){
    	$data = array (
    		'data' => $this->m_proses->selectDataAdmin($nip)
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 1) {
    		$this->load->view('admin/p_editAdmin', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editUser($nip){
    	$data = array (
    		'data' => $this->m_proses->selectDataUser($nip)
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 1) {
    		$this->load->view('admin/p_editUser', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahAdmin(){
    	$cek = $this->session->userdata('stts');
    	if ($cek == 1) {
    		$this->load->view("admin/p_tambahAdmin");
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahUser(){
    	$cek = $this->session->userdata('stts');
    	if ($cek == 1) {
    		$this->load->view("admin/p_tambahUser");
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    //ADMIN HUMAS=======================================================================================================================
    public function dashboardHumas(){
    	$data = array(
    		'notif' => $this->m_proses->selectDashboardHumas()
    		);
    	
    	$cek = $this->session->userdata('stts');
    	if ($cek == 2) {
    		$this->load->view('adminhumas/dashboard', $data);
    	} else {
    		header("location:".base_url());
    	}
    }

    public function get_daftarArtikel(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarArtikel(),
    		'notif' => $this->m_proses->selectDashboardHumas()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 2) {
    		$this->load->view('adminhumas/p_listartikel', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function viewArtikel($id){
    	$data = array(
    		'data' => $this->m_proses->viewArtikel($id),
    		'notif' => $this->m_proses->selectDashboardHumas()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 2) {
    		$this->load->view('adminhumas/p_artikel', $data);
    	} else {
    		header("location:".base_url());
    	}


    }

    public function get_daftarFoto(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarFoto(),
    		'notif' => $this->m_proses->selectDashboardHumas()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 2) {
    		$this->load->view('adminhumas/p_listphoto', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function viewPhoto($id){
    	$data = array(
    		'data' => $this->m_proses->viewPhoto($id),
    		'notif' => $this->m_proses->selectDashboardHumas()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 2) {
    		$this->load->view('adminhumas/p_viewPhoto', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function get_daftarVideo(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarVideo(),
    		'notif' => $this->m_proses->selectDashboardHumas()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 2) {
    		$this->load->view('adminhumas/p_listvideo', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function viewVideo($id){
    	$data = array(
    		'data' => $this->m_proses->viewVideo($id),
    		'notif' => $this->m_proses->selectDashboardHumas()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 2) {
    		$this->load->view('adminhumas/p_viewVideo', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function get_viewFoto(){
    	$data = array(
    		'data' => $this->m_proses->select_viewFoto(),
    		'notif' => $this->m_proses->selectDashboardHumas()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 2) {
    		$this->load->view('adminhumas/p_viewPhoto', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    //ADMIN RT=======================================================================================================================

    public function dashboardRT(){
    	$data = array(
    		'data' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/dashboard', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function get_daftarPermintaanATK(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarPermintaanATK(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_permintaanatk', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editPermintaanATK($kode){
    	$data = array(
    		'data' => $this->m_proses->editPermintaanATK($kode),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_editPermintaanATK', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editATK($id){
    	$data = array(
    		'data' => $this->m_proses->select_ATK($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_editATK', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function daftarPermohonanRumahDinas(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarPermohonanRumahDinas(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_permohonanrumahdinas', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function daftarPermohonanCabutIzinHunian(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarPermohonanCabutIzinHunian(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_permohonancabutrumahdinas', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function daftarPermohonanServisRoda4(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarPermohonanServisRoda4(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_permohonanservisroda4', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function daftarPermohonanInventaris(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarPermohonanInventaris(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_permohonaninventaris', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function riwayatServiceRoda4(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarServiceRoda4(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_riwayatserviceroda4', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    // public function read_mail(){
    // 	$id = NULL;

    // 	extract($POST);

    // 	$params['id'] = $id;

    // 	if (isset($submit)) {
    // 		$this->m_proses->read_mail($params);
    // 	}

    // 	$cek = $this->session->userdata('stts');
    // 	if ($cek == 3) {
    // 		$this->load->view('adminrt/read-mail', $data);
    // 	} else {
    // 		header("location:".base_url());
    // 	}



    // }

    public function detailRiwayatServiceKBD2($nopol){
    	$nopolis = str_replace('%20', ' ', $nopol);
    	$data = array(
    		'data' => $this->m_proses->detailRiwayatServiceKBD2($nopolis),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_detailRiwayatServiceKBD2', $data);	
    	} else {
    		header("location:".base_url());
    	}

    	
    }

    public function detailRiwayatServiceKBD4($nopol){
    	$nopolis = str_replace('%20', ' ', $nopol);
    	$data = array(
    		'data' => $this->m_proses->detailRiwayatServiceKBD4($nopolis),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_detailRiwayatServiceKBD4', $data);	
    	} else {
    		header("location:".base_url());
    	}

    	
    }

    // public function detailRiwayatServiceKBD2afterUpdate($id){
    // 	$data = array(
    // 		'data' => $this->m_proses->detailRiwayatServiceKBD2afterUpdate($id),
    // 		'notif' => $this->m_proses->selectDashboardRT()
    // 		);

    // 	$cek = $this->session->userdata('stts');
    // 	if ($cek == 3) {
    // 		$this->load->view('adminrt/p_detailRiwayatServiceKBD2', $data);	
    // 	} else {
    // 		header("location:".base_url());
    // 	}

    // }

    // public function detailRiwayatServiceKBD2afterDelete(){
    // 	$cek = $this->session->userdata('stts');
    // 	if ($cek == 3) {
    // 		$this->load->view('adminrt/p_detailRiwayatServiceKBD2', $data);	
    // 	} else {
    // 		header("location:".base_url());
    // 	}

    // }

    public function daftarKritikSaran(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarKritikSaran(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_kritiksaran', $data);	
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function daftarPermohonanServisRoda2(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarPermohonanServisRoda2(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_permohonanservisroda2', $data);
    	} else {
    		header("location:".base_url());
    	}

    }

    public function riwayatServiceRoda2(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarServiceRoda2(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_riwayatserviceroda2', $data);
    	} else {
    		header("location:".base_url());
    	}

    }

    public function tambahRiwayatServiceKBD2($nopol){
    	$platno = str_replace('%20', ' ', $nopol);
    	$data = array (
    		'data' => $this->m_proses->select_nopol($platno),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_tambahRiwayatServiceKBD2', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahRiwayatServiceKBD4($nopol){
    	$platno = str_replace('%20', ' ', $nopol);
    	$data = array (
    		'data' => $this->m_proses->select_nopol($platno),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_tambahRiwayatServiceKBD4', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahBaruRiwayatServiceKBD2(){
    	$data = array (
    		'data' => $this->m_proses->select_nopolKBD2(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view("adminrt/p_tambahBaruRiwayatServiceKBD2", $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahBaruRiwayatServiceKBD4(){
    	$data = array (
    		'data' => $this->m_proses->select_nopolKBD4(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view("adminrt/p_tambahBaruRiwayatServiceKBD4", $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editDetailServiceKBD2($id){
    	$data = array (
    		'data' => $this->m_proses->selectDataService($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_editDetailServiceKBD2', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editDetailServiceKBD4($id){
    	$data = array (
    		'data' => $this->m_proses->selectDataService($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_editDetailServiceKBD4', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editInfoMotor($nopol){
    	$data['nopol'] = str_replace('%20', ' ', $nopol);
    	$nopol = $data['nopol'];
    	$data = array (
    		'data' => $this->m_proses->select_KBD($nopol),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_editInfoMotor', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editInfoMobil($nopol){
    	$data['nopol'] = str_replace('%20', ' ', $nopol);
    	$nopol = $data['nopol'];
    	$data = array (
    		'data' => $this->m_proses->select_KBD($nopol),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_editInfoMobil', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editInfoRumahAraya($id){
    	$data = array (
    		'data' => $this->m_proses->select_rumahDinas($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_editInfoRumahAraya', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function editInfoRumahPakisjajar($id){
    	$data = array (
    		'data' => $this->m_proses->select_rumahDinas($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_editInfoRumahPakisjajar', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahKBD2(){
    	$data = array (
    		'data' => $this->m_proses->select_nopolKBD2(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_tambahKBD2', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahATK(){
    	$data = array (
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view("adminrt/p_tambahATK", $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahKBD4(){
    	$data = array (
    		'data' => $this->m_proses->select_nopolKBD4(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_tambahKBD4', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function readMail($id){
    	$data = array (
    		'data' => $this->m_proses->select_kritiksaran($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/read-mail', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function viewIzinHunian($id){
    	$data = array(
    		'data' => $this->m_proses->viewIzinHunian($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_viewPermohonanHunian', $data);
    	} else {
    		header("location:".base_url());
    	}


    }

    public function viewCabutIzinHunian($id){
    	$data = array(
    		'data' => $this->m_proses->viewIzinHunian($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_viewPermohonanCabutIzinHunian', $data);
    	} else {
    		header("location:".base_url());
    	}

    }

    public function viewPermohonanServiceKBD2($id){
    	$data = array(
    		'data' => $this->m_proses->viewPermohonanService($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_viewPermohonanServisRoda2', $data);
    	} else {
    		header("location:".base_url());
    	}

    }

    public function viewPermohonanServiceKBD4($id){
    	$data = array(
    		'data' => $this->m_proses->viewPermohonanService($id),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_viewPermohonanServisRoda4', $data);
    	} else {
    		header("location:".base_url());
    	}

    }

    public function get_daftarATK(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarATK(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_daftarATK', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function get_daftarRumahAraya(){
    	$data = array(
    		'data' => $this->m_proses->select_perumahan_araya(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_viewPerumahanAraya', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function get_daftarRumahPakisjajar(){
    	$data = array(
    		'data' => $this->m_proses->select_perumahan_pakisjajar(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_viewPerumahanPakisjajar', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahRumahAraya(){
    	$data = array (
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_tambahRumahAraya', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function tambahRumahPakisjajar(){
    	$data = array (
    		'notif' => $this->m_proses->selectDashboardRT()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 3) {
    		$this->load->view('adminrt/p_tambahRumahPakisjajar', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    //USER=======================================================================================================================

    public function get_rumahAraya(){
    	$data = array(
    		'data' => $this->m_proses->select_perumahan_araya()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 4) {
    		$this->load->view('user/p_viewrumaharaya', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function get_rumahPakisjajar(){
    	$data = array(
    		'data' => $this->m_proses->select_perumahan_pakisjajar()
    		);

    	$cek = $this->session->userdata('stts');
    	if ($cek == 4) {
    		$this->load->view('user/p_viewrumahpakisjajar', $data);
    	} else {
    		header("location:".base_url());
    	}
    	
    }

    public function get_daftarMotor(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarMotor(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 4) {
    		$this->load->view('user/p_viewmotor', $data);
    	} else if ($cek == 3) {
    		$this->load->view('adminrt/p_viewMotor', $data);
    	} else {
    		header("location:".base_url());
    	}

    }

    public function get_daftarMobil(){
    	$data = array(
    		'data' => $this->m_proses->select_daftarMobil(),
    		'notif' => $this->m_proses->selectDashboardRT()
    		);
    	$cek = $this->session->userdata('stts');
    	if ($cek == 4) {
    		$this->load->view('user/p_viewmobil', $data);
    	} else if ($cek == 3) {
    		$this->load->view('adminrt/p_viewMobil', $data);
    	} else {
    		header("location:".base_url());
    	}
    }

    public function p_humas(){
    	$cek = $this->session->userdata('stts');
    	if ($cek == 4) {
    		$this->load->view('user/p_humas');
    	} else {
    		header("location:".base_url());
    	}
    	

    }

    public function p_rumahtangga(){
    	$cek = $this->session->userdata('stts');
    	if ($cek == 4) {
    		$this->load->view('user/p_rumahtangga');
    	} else {
    		header("location:".base_url());
    	}
    	
    }

}