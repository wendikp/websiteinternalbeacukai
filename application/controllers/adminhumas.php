<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Adminhumas extends CI_Controller {

	public function index() {
		$cek = $this->session->userdata('stts');
		if($cek == 2)
			header('location:'.base_url().'proses_data/dashboardHumas');
			//$this->load->view('adminhumas/p_listartikel');
		else
			header("location:".base_url());
	}

}