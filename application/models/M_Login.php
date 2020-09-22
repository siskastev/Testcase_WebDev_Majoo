<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

	function cek_login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username',$username);
		$this->db->where('pass',md5($password));
		return $this->db->get()->row();
	}

	function cek_users($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username',$username);
		$this->db->where('pass',md5($password));
		return $this->db->get()->row();
	}

	//untuk tambah data diri user
	function input_biodata($data,$table){
		$this->db->insert($table,$data);
	}
	
}