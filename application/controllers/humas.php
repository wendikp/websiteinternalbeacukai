<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Humas extends CI_Controller {

	public function artikel() {
		$cek = $this->session->userdata('username');
		if($cek == 2)
			$this->load->view('adminhumas/p_artikel');
		else
			header("location:".base_url());
	}

	public function listartikel() {
		$cek = $this->session->userdata('username');
		if($cek == 2)
			$this->load->view('adminhumas/p_listartikel');
		else
			header("location:".base_url());
	}

	public function photo() {
		$cek = $this->session->userdata('username');
		if($cek == 2)
			$this->load->view('adminhumas/p_photo');
		else
			header("location:".base_url());
	}

	public function listphoto() {
		$cek = $this->session->userdata('username');
		if($cek == 2)
			$this->load->view('adminhumas/p_listphoto');
		else
			header("location:".base_url());
	}

	public function video() {
		$cek = $this->session->userdata('username');
		if($cek == 2)
			$this->load->view('adminhumas/p_video');
		else
			header("location:".base_url());
	}

	public function listvideo() {
		$cek = $this->session->userdata('username');
		if($cek == 2)
			$this->load->view('adminhumas/p_listvideo');
		else
			header("location:".base_url());
	}



}