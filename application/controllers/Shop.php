<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_cart');

    $this->load->library('cart'); //deklarasi mengaktifkan library pagination
    //$this->load->library('pdf');
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
    redirect('Home');
  }

  public function keranjang_belanja(){
    $data['cart'] = $this->cart->contents();
    $this->load->view('keranjang_belanja',$data);
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
    redirect('Shop/keranjang_belanja');
  }

  public function hapus($rowid){
    if ($rowid =="semua"){
      $this->cart->destroy();
    }else{
      $data = array('rowid' => $rowid,
        'qty' =>0);
      $this->cart->update($data);
    }
    redirect('Shop/keranjang_belanja');
  }

  public function bayar(){

    $cart = $this->cart->contents();
    $this->M_cart->checkout($cart);
    redirect('Shop/HasilAkhir');
    $this->cart->destroy();
  }

  public function HasilAkhir()
  {
    $data['cart'] = $this->cart->contents();
    $this->load->view('LoginUsers',$data);
    $this->cart->destroy();
  }
}
