<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Login');
		$this->load->library(array('form_validation','session'));

	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function LoginUsers()
	{
		$this->load->view('LoginUsers');
	}

	public function Daftar()
	{
		$this->load->view('DaftarUsers');
	}

	public function prosesLogin()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('pass');
		$cek=$this->M_Login->cek_login($username,$password);
		$cekuser=$this->M_Login->cek_users($username,$password);
		if (isset($cek)== true) 
		{

			$id=$cek->id;
			$username=$cek->username;
			$data=array('id' => $id,
				'username' => $username);
			$this->session->set_userdata($data);
			redirect('AdminDashboard');

		}
		if (isset($cekuser)== true) 
		{

			$nama=$cekuser->nama;
			$alamat=$cekuser->alamat;
			$foto=$cekuser->foto;
			$id=$cekuser->id;
			$hp=$cekuser->hp;
			$username=$cekuser->username;
			$data=array(
				'nama' => $nama,
				'alamat' => $alamat,
				'username' => $username,
				'id' => $id,
				'hp' => $hp,
				'username' => $username);
			$this->session->set_userdata($data);
			redirect('UserDashboard');

		}
		else
		{
			echo "<script>alert('Username atau Password yang Anda Masukan Salah !!!');history.go(-1);</script>";
		}
	}

	public function prosesDaftar()
	{
		
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$username = $this->input->post('username');
		$hp = $this->input->post('hp');
		$pass = md5($this->input->post('pass'));

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'username' => $username,
			'hp' => $hp,
			'pass' => $pass,
		);
		$this->M_Login->input_biodata($data,'users');
		redirect('Login');
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		redirect('Login');
	}

	function logoutuser()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		redirect('Login/LoginUsers');
	}
}
