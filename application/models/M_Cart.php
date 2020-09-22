<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model{

	public function getOrder()
	{
		$id_users = $this->session->userdata['id'];
		$query = $this->db->query("Select penjualan.*, users.id from penjualan join users on users.id = penjualan.id_users where penjualan.id_users='$id_users' order by penjualan.id_order DESC");
		return $query->result();
	}

	function getDataOrderId($id)
	{
		$query = $this->db->query("Select penjualan.id_order, detil_penjualan.*, produk.id,produk.nama from detil_penjualan join penjualan on detil_penjualan.fa_order = penjualan.id_order join produk on produk.id=detil_penjualan.id_produk where detil_penjualan.fa_order='$id'");
		return $query->result();

	}


	function getDataPenjualan()
	{
		$query = $this->db->query("Select penjualan.*, users.id, users.nama from penjualan join users on users.id = penjualan.id_users order by penjualan.id_order DESC");
		return $query->result();

	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function getDataPenjualanId($id)
	{
		$query = $this->db->query("Select penjualan.id_order, detil_penjualan.*, produk.id,produk.nama from detil_penjualan join penjualan on detil_penjualan.fa_order = penjualan.id_order join produk on produk.id =detil_penjualan.id_produk where detil_penjualan.fa_order='$id'");
		return $query->result();

	}


	public function checkoutuser($cart)
	{
		
		$data = array(
			'id_users' => $this->input->post('id_users'),
			'tgl' => $this->input->post('tgl'),
			'total' => $this->input->post('total'),
			'status' => '1',
			'konfirmasi' => '0',
		);
		$this->db->insert('penjualan',$data);

		$id_order = $this->db->insert_id();

		foreach($cart as $va){
			$totaldetil=$va['harga']*$va['qty'];
			$set = array(
				'fa_order' => $id_order,
				'id_produk' =>$va['id'],
				'qty' => $va['qty'],
				'total' => $totaldetil,
			);
			$this->db->insert('detil_penjualan',$set);
		}

	}

	
	public function checkout($cart)
	{
		
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'hp' => $this->input->post('hp'),
			'username' => $this->input->post('username'),
			'pass' => md5($this->input->post('pass')),
		);

		$this->db->insert('users',$data);

		$id_users = $this->db->insert_id();

		$penjualan = array(
			'id_users' => $id_users,
			'tgl' => $this->input->post('tgl'),
			'total' => $this->input->post('total'),
			'status' => '1',
			'konfirmasi' => '0'
		);
		$this->db->insert('penjualan',$penjualan);

		$id_order = $this->db->insert_id();

		foreach($cart as $va){
			$totaldetil=$va['harga']*$va['qty'];
			$set = array(
				'fa_order' => $id_order,
				'id_produk' =>$va['id'],
				'qty' => $va['qty'],
				'total' => $totaldetil,
			);
			$this->db->insert('detil_penjualan',$set);
		}

	}

	public function order(){
		return $this->db->get('penjualan');
	}


	public function dapatIdTrans()
	{
		$this->db->select('*');
		$this->db->from("id_order");
		$this->db->order_by('id_order','desc');
		return $this->db->get()->result_array();
	}

}
