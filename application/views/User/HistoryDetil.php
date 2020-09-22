<?php 
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('User/header.php')
?>

<header id="home"  style="margin-top: 60px">
	<div class="jumbotron">
		<center>
			<h1 class="display-4">Hello, Majoo world!</h1>
			<p class="lead">This is a simple Product that you can buy</p>
			<hr class="my-4">
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</center>
	</div>
</header>


<div class="container"  style="padding-top: 50px">
	<h2 class="mt-3">Historyn Detail Produk Majoo</h2>
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



<footer class="py-5 mt-5" style="background-color:#2A2B2D">
	<div class="container">
		<div class="row">
			<div class="col-md-4" style="color: white">
				<p>2019 @ PT. Majoo Teknologi Indonesia</p>
			</div>
			<div class="col-md-6"></div>
			<div class="col-md-2 hovericon" style="color: white">
				<a href="#"><i class="fa fa-facebook-square"></i></a>&nbsp&nbsp<a href="#"><i class="fa fa-twitter-square"></i></a>&nbsp&nbsp<a href="#"><i class="fa fa-google-plus-square"></i></a>&nbsp&nbsp<a href="#"><i class="fa fa-instagram"></i></a>&nbsp&nbsp<a href="#"><i class="fa fa-youtube"></i></a>
			</div>
		</div>
	</div>
</footer>
<!-- <script>
  $(".nav-item").click(function(){
    $(".submenu").fadeToggle("fast");
  });
</script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<!-- <script>
  $(window).scroll(function(){
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 600);
  });
</script> -->


</body>
</html>