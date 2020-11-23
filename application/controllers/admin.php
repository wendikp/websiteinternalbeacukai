<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index() {
    	$cek = $this->session->userdata('stts');
    	if($cek == 1)
        header('location:'.base_url().'proses_data/dashboard');
        //$this->load->view('adminrt/p_permintaanatk');
    else
    	header("location:".base_url());
    }

}