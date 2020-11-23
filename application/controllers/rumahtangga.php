<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Rumahtangga extends CI_Controller {

	public function permintaanatk() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_permintaanatk');
		else
			header("location:".base_url());
	}

	public function permohonanrumahdinas() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_permohonanrumahdinas');
		else
			header("location:".base_url());
	}

	public function permohonancabutrumahdinas() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_permohonancabutrumahdinas');
		else
			header("location:".base_url());
	}

	public function permohonanservisroda2() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_permohonanservisroda2');
		else
			header("location:".base_url());
	}

	public function permohonanservisroda4() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_permohonanservisroda4');
		else
			header("location:".base_url());
	}

	public function riwayatserviceroda2() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_riwayatserviceroda2');
		else
			header("location:".base_url());
	}

	public function riwayatserviceroda4() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_riwayatserviceroda4');
		else
			header("location:".base_url());
	}

	public function infokbdroda2() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_infokbdroda2');
		else
			header("location:".base_url());
	}

	public function infokbdroda4() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_infokbdroda4');
		else
			header("location:".base_url());
	}

	public function permohonaninventaris() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_permohonaninventaris');
		else
			header("location:".base_url());
	}

	public function kritiksaran() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/p_kritiksaran');
		else
			header("location:".base_url());
	}

	public function read_mail() {
		$cek = $this->session->userdata('username');
		if($cek == 3)
			$this->load->view('adminrt/read-mail.html');
		else
			header("location:".base_url());
	}

}