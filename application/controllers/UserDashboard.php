<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserDashboard extends CI_Controller {

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
		$this->load->library(array('session','cart'));
		$this->load->model('M_Produk');
		$this->load->model('M_cart');
		if(!$this->session->userdata('id'))
		{
			redirect('Login');
		}
		
	}

	public function index()
	{
		$data['cart'] = $this->cart->contents();
		$data['produk'] = $this->M_Produk->getProduk();
		$this->load->view('User/Home',$data);
	}

	public function History()
	{
		$data['cart'] = $this->cart->contents();
		$data['order'] = $this->M_cart->getOrder();
		$this->load->view('User/history',$data);
	}

	public function konfirmasi($id)
	{
		$data = array(
			'id_order' => $id,
			'status' => 3,
			'konfirmasi' =>2,
		);

		$where = array(
			'id_order' => $id
		);

		$this->M_cart->update_data($where,$data,'penjualan');
		redirect('UserDashboard/History');
	}

	public function detilTrans($id)
	{
		$data['cart'] = $this->cart->contents();
		$data['order'] = $this->M_cart->getDataOrderId($id);
		$this->load->view('user/HistoryDetil',$data);
	}	

	public function beli(){
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'harga' => $this->input->post('harga'),
			'gambar' => $this->input->post('gambar'),
			'qty' =>$this->input->post('qty')
		);
		$this->cart->insert($data);
		redirect('UserDashboard');
	}

	public function keranjang_belanja(){
		$data['cart'] = $this->cart->contents();
		$this->load->view('User/keranjang_belanja',$data);
	}

	public function ubah(){
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$harga = $cart['harga'];
			$gambar = $cart['gambar'];
			$amount = $harga * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
				'harga' => $harga,
				'gambar' => $gambar,
				'amount' => $amount,
				'qty' => $qty);
			$this->cart->update($data);
		}
		redirect('UserDashboard/keranjang_belanja');
	}

	public function hapus($rowid){
		if ($rowid =="semua"){
			$this->cart->destroy();
		}else{
			$data = array('rowid' => $rowid,
				'qty' =>0);
			$this->cart->update($data);
		}
		redirect('UserDashboard/keranjang_belanja');
	}

	public function bayar(){

		$cart = $this->cart->contents();
		$this->M_cart->checkoutuser($cart);
		redirect('UserDashboard/HasilAkhir');
		$this->cart->destroy();
	}

	public function HasilAkhir()
	{
		$data['cart'] = $this->cart->contents();
		redirect('UserDashboard/History');

	}



}

