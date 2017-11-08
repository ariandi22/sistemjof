<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_model {

	public function getlogin($u,$p){
		$pwd = md5($p);
		$this->db->where('username',$u);
		$this->db->where('password',$pwd);
		$query = $this->db->get('login');
		if ($query->num_rows()>0) {
			foreach ($query->result() as $row) {
				$sesi = array(
						'id_user' 	=> $row->id_user,
						'nama'		=> $row->nama,
						'username'	=> $row->username,
						'level'		=> $row->level,
				);
				$this->session->set_userdata($sesi);
				redirect('home');
				}
		}
		else
		{
			$this->session->set_flashdata('info','Maaf username atau password salah');
			redirect('login');
		}
	}
}
