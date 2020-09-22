<?php 
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('User/header.php')
?>

<div class="container">
 <h2 align="center">KERANJANG BELANJA</h2><br><br>
 <form action="<?php echo site_url('UserDashboard/ubah'); ?>" method="post" enctype="multipart/form-data">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Gambar</th>
        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th width="150">QTY</th>
        <th>Subtotal</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $total = 0;
      if(count($cart) > 0){
        foreach($cart as $item){
          $total += $item['subtotal'];
          ?>
          <tr>
            <td><img src="<?php echo base_url('Upload/'.$item['gambar']) ?>" width="200"></td>
            <td><?php echo $item['nama']; ?></td>
            <td>Rp. <?php echo number_format($item['harga'],0,',','.'); ?></td>
            <td>
              <input type="hidden" name="cart[<?php echo $item['id'];?>][id]" value="<?php echo $item['id'];?>" />
              <input type="hidden" name="cart[<?php echo $item['id'];?>][rowid]" value="<?php echo $item['rowid'];?>" />
              <input type="hidden" name="cart[<?php echo $item['id'];?>][nama]" value="<?php echo $item['nama'];?>" />
              <input type="hidden" name="cart[<?php echo $item['id'];?>][harga]" value="<?php echo $item['harga'];?>" />
              <input type="hidden" name="cart[<?php echo $item['id'];?>][gambar]" value="<?php echo $item['gambar'];?>" />

              <input type="number" min="1" name="cart[<?php echo $item['id'];?>][qty]" class="form-control" value="<?php echo $item['qty']; ?>">

            </td>
            <td>Rp <?php echo number_format($item['subtotal'],0,',','.'); ?></td>
            <td><a href="<?php echo site_url('UserDashboard/hapus/'.$item['rowid']); ?>" class="btn btn-danger">Hapus</a></td>
          </tr>
        <?php }
      }
      else{echo'<tr><td colspan="6" align="center"><h3>Keranjang Pesanan Kosong</h3></td></tr>'; } ?>
    </tbody>
  </table><hr>
</form>
<br>



<div class="form-group">
  <label for="total"><span class="glyphicon glyphicon-shopping-cart"></span> Total </label>
  <input type="text" class="form-control" id="total" name="total" value="<?php echo number_format($total,0,',','.'); ?>" readonly>
</div>

<?php echo form_open("UserDashboard/bayar"); ?>
<!--  </div> -->
<h4><?php echo $this->session->flashdata('harga'); ?></h4>
<button type="submit" class="btn btn-default">Refresh</button> &nbsp
<a href="<?php echo site_url('UserDashboard/hapus/semua'); ?>" class="btn btn-danger">Kosongkan</a> || 


<input type="hidden" name="total" value="<?php echo $total ?>">
<input type="hidden" name="id_users" value="<?php echo $this->session->userdata('id') ?>">
<input type="hidden" name="tgl" value="<?php echo date('Y-m-d'); ?>">
<input type="submit" value="Bayar" class="btn btn-primary">
<?php echo form_close(); ?>

</div> <!-- /container -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>
</body>
</html>
