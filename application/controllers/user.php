<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

    public function index() {
    	$cek = $this->session->userdata('stts');
    	if($cek == 4)
        $this->load->view('user/home');
    else
    	header("location:".base_url());
    }

}