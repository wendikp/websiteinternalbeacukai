<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {
	public function _construct(){
		session_start();
	}

    public function index() {
    	$cek = $this->session->userdata('username');
    	if(empty($cek)){
    		$this->load->view('p_login');
    	} else {
    		$st = $this->session->userdata('stts');
    		if ($st == 1)
                header('location:'.base_url().'admin');
            else if ($st == 2)
				header('location:'.base_url().'adminhumas');
            else if($st == 3)
				header('location:'.base_url().'adminrt');    	
            else
                header('location:'.base_url().'user');
        }

    }

}