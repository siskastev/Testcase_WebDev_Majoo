<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

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

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('M_cart');
		if(!$this->session->userdata('id'))
		{
			redirect('Login');
		}
		
	}

	public function index()
	{
		$data['order'] = $this->M_cart->getDataPenjualan();
		$this->load->view('Admin/Pemesanan/historypemesanan',$data);
	}

	public function dikirim($id)
	{
		$data = array(
			'id_order' => $id,
			'status' => 2,
			'konfirmasi' =>1,
		);

		$where = array(
			'id_order' => $id
		);

		$this->M_cart->update_data($where,$data,'penjualan');
		redirect('AdminDashboard');
	}

	public function detilTrans($id)
	{
		$data['order'] = $this->M_cart->getDataPenjualanId($id);
		$this->load->view('Admin/Pemesanan/historyDetailpemesanan',$data);
	}

}

