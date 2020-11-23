<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class C_user extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('m_proses'));
		$this->load->helper(array('form', 'url', 'file'));
	}
	
	public function home() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/home');
		else
			header("location:".base_url());
	}

	public function humas() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_humas');
		else
			header("location:".base_url());
	}

	public function rumahtangga() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_rumahtangga');
		else
			header("location:".base_url());
	}

	public function uploadartikel() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_uploadartikel', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function uploadfoto() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_uploadfoto', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function uploadvideo() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_uploadvideo', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function permintaanatk() {
		$data = array(
    		'data' => $this->m_proses->select_daftarATK()
    		);

		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_permintaanatk', $data);
		else
			header("location:".base_url());
	}
	public function permohonanrumahdinas() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_permohonanrumahdinas', array('error' => ' ' ));
		else
			header("location:".base_url());
	}
	public function permohonancabutrumahdinas() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_permohonancabutrumahdinas', array('error' => ' ' ));
		else
			header("location:".base_url());
	}
	public function viewrumaharaya() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_viewrumaharaya', array('error' => ' ' ));
		else
			header("location:".base_url());
	}
	public function viewrumahpakisjajar() {
	$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_viewrumahpakisjajar', array('error' => ' ' ));
		else
			header("location:".base_url());
	}
	public function permohonanservisroda2() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_permohonanservisroda2', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function permohonanservisroda4() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_permohonanservisroda4', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function riwayatserviceroda2() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_riwayatserviceroda2', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function riwayatserviceroda4() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_riwayatserviceroda4', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function viewmotor() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_viewmotor', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function viewmobil() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_viewmobil', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function permohonaninventaris() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_permohonaninventaris', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function kritiksaran() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/p_kritiksaran', array('error' => ' ' ));
		else
			header("location:".base_url());
	}

	public function read_mail() {
		$cek = $this->session->userdata('stts');
		if($cek == 4)
			$this->load->view('user/read-mail.html');
		else
			header("location:".base_url());
	}

}