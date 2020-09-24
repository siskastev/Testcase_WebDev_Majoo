<!DOCTYPE html>
<html lang="en">

<?php  $this->load->view('Admin/Head'); ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php $this->load->view('Admin/navbar'); ?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view('Admin/Top'); ?>   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Produk</h1>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Majoo</h6>
            </div>

            <div class="card-body">
              <?php foreach($Produk as $key) {?>
              <?=form_open_multipart('Produk/Prosesedit/'.$key['id'])?>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label"> Nama Produk </label>
                <div class="col-sm-8">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Produk"  value="<?php echo $key['nama'] ?>" >
                  <?php echo  form_error('nama') ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="harga" class="col-sm-3 col-form-label"> Harga </label>
                <div class="col-sm-8">
                  <input type="number" name="harga" class="form-control" placeholder="Harga"  value="<?php echo $key['harga'] ?>" required="">
                </div>
              </div>

              <div class="form-group row">
                <label for="ket" class="col-sm-3 col-form-label"> Keterangan </label>
                <div class="col-sm-8">
                  <textarea name="ket" class="form-control" style="height: 150px"><?php echo $key['ket'] ?></textarea>
                </div>
              </div>

                <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label"> Gambar </label>
                <div class="col-sm-8">
                  <img src="<?php echo base_url("Upload/".$key['img']);?>" width="150" height="150px"  id="image-preview">
                  <input type="file" name="img" class="form-control" placeholder="Gambar" onchange="previewImage(event)">
                </div>
              </div>

              <div class="page-header">
                <input type="submit"  class="btn btn-success" value="EDIT">&nbsp;&nbsp;

                <a href="<?php echo base_url()?>Produk"><button type="button" class="btn btn-danger">KEMBALI</button></a>
              </div>

              <?php } ?>
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
