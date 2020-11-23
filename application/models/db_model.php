<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Db_model extends CI_Model {
	public function getLoginData($usr, $pwd){
		$u = mysql_real_escape_string($usr);
		$p = mysql_real_escape_string($pwd);
		//$p = md5(mysql_real_escape_string($pwd));
		$cek_login = $this->db->get_where('user', array('username' => $u, 'password' => $p ));
		if ($cek_login->num_rows() > 0) {
			$qad = $cek_login->row();
			if ($u == $qad->username && $p == $qad->password) {
				$sess = array(
					'username'	=> $qad->username,
					'stts' 		=> $qad->id_status,
				);

				$this->session->set_userdata($sess);
				
				if($qad->id_status == 1)
					header('location:'.base_url().'admin');
				else if ($qad->id_status == 2)
					header('location:'.base_url().'adminhumas');
				else if($qad->status == 3)
					header('location:'.base_url().'adminrt');
				else
					header('location:'.base_url().'user');
			}
		} else {
			echo "<script>alert('username/Password salah, silahkan coba lagi');";
			echo "windows.location.href = '" .base_url()."';";
			echo "</script>";
		}

	}

}