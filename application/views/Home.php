<?php 
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('header.php')
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


  <div class="container" id="Produk" style="padding-top: 50px">
    <h2 class="mt-3">Produk Majoo</h2>
  <div class="card-deck">
    <?php foreach($produk as $p){ ?>
      <div class="card" style="width:300px">
        <img class="img-thumbnail" src="<?php echo base_url() . 'Upload/'.$p['img'] ?>" style="width: 250px; height: 200px;"/>
        <div class="card-body">
          <center>
            <h3 class="card-title">
              <?php echo $p['nama']; ?>
            </h3>
            <h4>Rp. <?php echo number_format($p['harga'],0,',','.')?></h4>
            <p><?php echo $p['ket']?></p>
            
            <?php echo form_open("Shop/Beli"); ?>
            <input type="hidden" name="id" value="<?php echo $p['id']; ?>" />
            <input type="hidden" name="nama" value="<?php echo $p['nama']; ?>" />
            <input type="hidden" name="harga" value="<?php echo $p['harga']; ?>" />
            <input type="hidden" name="gambar" value="<?php echo $p['img']; ?>" />
            <input type="hidden" name="qty" value="1" />
            <button type="submit" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i> Beli </button>
          </center>
        </div>
        <?php echo form_close(); ?>
      </div>
    <?php } ?>
  </div>
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