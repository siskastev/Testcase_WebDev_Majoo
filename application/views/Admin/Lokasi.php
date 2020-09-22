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
						<h1 class="h3 mb-0 text-gray-800">Lokasi</h1>
					</div>

					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Data Lokasi</h6>
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
													<h4 class="modal-title">Tambah Location</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>

												<!-- Modal body -->
												<div class="modal-body">
													<?php echo form_open_multipart('Lokasi/Tambah'); ?>
													<label class="form-label mt-2">Nama Lokasi</label>
													<input type="text" name="lokasi" class="form-control" required="">
													<label class="form-label">Latitude</label>
													<input type="text" name="latitude" class="form-control" required="">
													<label class="form-label mt-2">Longitude</label>
													<input type="text" name="longitude" class="form-control" required="">
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
									<div class="table-responsive" id="latih_data">
										<table class="table table-bordered" id="example" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>No.</th>
													<th>Lokasi</th>
													<th>LatLongitude</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no=1; ?>
												<?php foreach ($getData as $key) { ?>
													<tr>
														<td><?php echo $no; ?></td>
														<td><?php echo $key['lokasi']; ?></td>
														<td><?php echo $key['latitude'].' ; '.$key['longitude']; ?></td>
														<td><a href="<?php echo base_url('Lokasi/edit/'.$key['id']); ?>"  title="Edit" class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-edit"></i></span> <span class="text">Edit</a> &nbsp &nbsp
															<a href="<?php echo base_url('Lokasi/delete/'.$key['id']) ?>"  title="Delete" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-trash"></i></span> <span class="text"> Delete</span></a>
														</td>
														<?php $no++ ?>
													<?php } ?>
												</tr>
											</tbody>
										</table>
									</div>
									<br>
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