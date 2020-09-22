<!DOCTYPE html>
<html lang="en">

<?php  $this->load->view('Admin/Head'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php $this->load->view('Admin/Navbar'); ?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view('Admin/Top'); ?>   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Produk Majoo</h1>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data CProduk</h6>
            </div>

            <div class="card-body">

              <?php echo form_open_multipart('Produk/AksiTambahProduk'); ?>
              <label class="form-label mt-2">Nama Produk</label>
              <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>" required="">
              <?php echo  form_error('nama') ?>
              <label class="form-label mt-2">harga</label>
              <input type="number" name="harga" class="form-control" value="<?php echo set_value('harga'); ?>" required="">
              <label class="form-label mt-2">Keterangan</label>
              <textarea name="ket" class="form-control" required=""  style="height: 150px"><?php echo set_value('ket'); ?></textarea><br>
              <label class="form-label mt-2">Upload</label>
              <img src="<?php echo base_url("Gambar/_add_image-.png");?>" id="image-preview" width="150" height="150"><br>
              <input type="file" name="img"  class="form-control"  onchange="previewImage(event)" required=""><br>
              <div class="page-header">
                <input type="submit" name="edit" class="btn btn-success" value="Tambah">&nbsp;&nbsp;
                <a href="<?php echo base_url()?>Produk"><button type="button" class="btn btn-danger">KEMBALI</button></a>
              </div>

              <?php echo form_close(); ?>


            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php  $this->load->view('Admin/Script'); ?>

</body>
</html>
