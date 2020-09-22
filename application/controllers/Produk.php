<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
		$this->load->model('M_Produk');
		if(!$this->session->userdata('id'))
		{
			redirect('Login');
		}
		
	}

	public function index()
	{
		$data['getData'] = $this->M_Produk->getProduk();
		$this->load->view('Admin/Produk',$data);
	}


	public function TambahProduk()
	{
		$this->load->view('Admin/Produk/TambahProduk');	
	}

	public function AksiTambahProduk()
	{

		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$ket = $this->input->post('ket');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama' , 'Nama Produk' , 'required|trim|is_unique[produk.nama]',[
			'is_unique' => '<p style=color:red;>nama produk ini sudah ada !</p>']); 
		if($this->form_validation->run() == false){
            //kalau gagal bakalan ngeload ulang form tambah
			$this->load->view('Admin/Produk/TambahProduk');
		}
		else{
			$upload = $this->M_Produk->uploadGambar();
		if($upload['result'] == "success"){ // Jika proses upload sukses

			$data = array(
				'nama' => $nama,
				'harga' => $harga,
				'ket' => $ket,
				'img' => $upload['file']['file_name']
			);
			$this->M_Produk->inputData($data,'produk');
			$this->session->set_flashdata('success','Tambah Produk berhasil');
			redirect('Produk');
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error'];
				$this->session->set_flashdata('error',$data['message']);
				redirect('Produk');
			}
		}
	}



	public function editProduk($id)
	{
		$data['Produk'] = $this->M_Produk->getProdukId($id);
		$this->load->view('Admin/Produk/EditProduk',$data);
	}

	public function Prosesedit($id)
	{
		$Gambar = $_FILES['img']['name'];      
			if ($Gambar != null) {
				$uploadphoto = $this->M_Produk->uploadGambar();
				if($uploadphoto['result'] == 'success'){ 
				// Jika proses uploadphoto sukses
					$this->M_Produk->updateProduk($id,$uploadphoto['file']['file_name']);
					$this->session->set_flashdata('success','Ubah data berhasil');
					redirect('Produk','refresh');
				}else{ // Jika proses uploadphoto gagal
					$data['message'] = $uploadphoto['error'];
					$this->session->set_flashdata('error',$data['message']);
					redirect('Produk','refresh');
				}
			}
			else{
				$this->M_Produk->updateProduk($id);
				$this->session->set_flashdata('success','Ubah data berhasil');
				redirect('Produk');
			}
	}

	public function deleteProduk($id)
	{
		$where = array(
			'id' => $id
		);
		$this->M_Produk->delete($where,'Produk'); 

		$this->session->set_flashdata('hapus','Data Successfully Removed');
		redirect('Produk');
	}
}

