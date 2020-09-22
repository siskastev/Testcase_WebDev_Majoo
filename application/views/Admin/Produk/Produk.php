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
						<h1 class="h3 mb-0 text-gray-800">MAJOO</h1>
					</div>

					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Data Produk Majoo</h6>
						</div>

						<div class="card-body">
							<?php if ($this->session->flashdata('success')) {?>
								<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<?php echo $this->session->flashdata('success'); ?>
								</div>
							<?php  } elseif($this->session->flashdata('hapus')) {?>
								<!-- validation message to display after form is submitted -->
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<?php echo $this->session->flashdata('hapus'); ?> 
									</div>
								<?php } elseif($this->session->flashdata('error')) {?>
									<!-- validation message to display after form is submitted -->
									<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
											<?php echo $this->session->flashdata('error'); ?> 
										</div>
									<?php } ?>
									<a href=""  class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#myModal"><span class="icon text-white-50"><i class="fas fa-plus"></i></span> <span class="text">Tambah</span></a>


									<!-- The Modal -->
									<div class="modal" id="myModal">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">

												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title">Tambah Produk</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>

												<!-- Modal body -->
												<div class="modal-body">
													<?php echo form_open_multipart('Produk/TambahProduk'); ?>
													<label class="form-label mt-2">Nama Produk</label>
													<input type="text" name="nama" class="form-control" required="">
													<label class="form-label mt-2">harga</label>
													<input type="number" name="harga" class="form-control" required="">
													<label class="form-label mt-2">Keterangan</label>
													<textarea name="keterangan" class="form-control" required="" style="height: 150px"></textarea><br>
													<label class="form-label mt-2">Upload</label>
													<img src="<?php echo base_url("Gambar/_add_image-.png");?>" id="image-preview" width="150" height="150"><br>
													<input type="file" name="img"  class="form-control"  onchange="previewImage(event)" required="">

												</div>

												<!-- Modal footer -->
												<div class="modal-footer">
													<button type="submit" class="btn btn-info">Submit</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
												<?php echo form_close(); ?>

											</div>
										</div>
									</div>

									<br>
									<br>
									<div class="table-responsive">
										<table class="table table-bordered" id="example" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>Nama Produk</th>
													<th>Harga</th>
													<th>Keterangan</th>
													<th>Gambar</th>
													<th>Action</th>     
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												<?php foreach ($getData as $key => $value) { ?>
													<tr>
														<td><?php echo $no ?></td>
														<td><?php echo $value['nama'] ?></td>
														<td><?php echo number_format($value['harga'],0,",",".")?></td>
														<td><?php echo $value['ket'] ?></td>
														<td><img src="<?php echo base_url('Upload/'.$value['img']) ?>" alt="" width="300"></td>
														<td><a href="<?php echo base_url('Cevent/editEvent/'.$value['id']); ?>"  title="Edit" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-edit"></i></span> <span class="text">Edit</a><br><br>
															<a href="<?php echo base_url('Cevent/deleteEvent/'.$value['id']) ?>"  title="Delete" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-trash"></i></span> <span class="text"> Delete</span></a>
														</td>
													</tr>
													<?php $no++ ?>
												<?php } ?>
											</tbody>
										</table>
									</div>
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
