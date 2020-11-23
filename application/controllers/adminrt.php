<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminrt extends CI_Controller {

    public function index() {
    	$cek = $this->session->userdata('stts');
    	if($cek == 3)
        header('location:'.base_url().'proses_data/dashboardRT');
        //$this->load->view('adminrt/p_permintaanatk');
    else
    	header("location:".base_url());
    }

}