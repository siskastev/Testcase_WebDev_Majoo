<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Produk extends CI_Model {

	public function getProduk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getProdukId($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function inputData($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function uploadGambar(){
		$config['upload_path'] = './Upload/'; //definisi folder yg telah dibuat di root project
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '10240';
		$config['remove_space'] = TRUE;
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('img')){ // Lakukan upload dan Cek jika proses upload berhasil
		// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
		// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function updateProduk($id,$upload_name = null)
	{
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'harga'=>$this->input->post('harga'),
			'ket'=>$this->input->post('ket')
		);
		$data = $this->input->post();

		if($upload_name!=null)
			$data['img'] = $upload_name;
		$this->db->where('id',$id);
		if($this->db->update("produk",$data)){
			return "Berhasil";
		}
	}



	public function delete($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	
}

