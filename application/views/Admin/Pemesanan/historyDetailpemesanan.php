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
							<h6 class="m-0 font-weight-bold text-primary">Data History Pemesanan Produk Majoo</h6>
						</div>

						<div class="card-body">
							<?php if ($this->session->flashdata('success')) {?>
							<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<?php echo $this->session->flashdata('success'); ?>
							</div>
							<?php } ?>



							<br>
							<br>
							<div class="table-responsive">
								<table class="table table-striped table-bordered data">
									<thead>
										<tr class="bg-group">
											<th width="5px">NO</th>
											<th>Nama Produk</th>
											<th>Jumlah</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$no = 1;
										foreach ($order as $key) 
										{
											$total = number_format($key->total,0,',','.'); ?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $key->nama;?></td>
												<td><?php echo $key->qty;?></td>
												<td><?php echo $total;?></td>
											</tr>
											<?php
											$no++;
										}
										?>
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
