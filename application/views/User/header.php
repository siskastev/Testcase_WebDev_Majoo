<!DOCTYPE html>
<html>
<head>
  <title>MAJOO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  body, html {
    height: 100%;
    font-family: "Inconsolata", sans-serif;
  }

  .bgimg {
    background-position: center;
    background-size: cover;
    background-image: url(<?php echo base_url('Gambar/paket-lifestyle.png') ?>);
    min-height: 75%;
  }


  .jumbotron{
    background-image:linear-gradient(#ADA996,#F2F2F2,#DBDBDB,#EAEAEA);

  }

  .bg-color{
    /*transition: 400ms ease;*/
    background: #2B2C27;
    border-bottom: 4px solid #A6661A;
  }
  .card
  {
    transition: 400ms;
  }
  .card:hover 
  {
    box-shadow: 0 8px 20px 0 black;
  }

  .nav-item{
    position: relative;
    transition: 0.25s;
  }
  .nav-item:hover{
    background-color: #B47C14;
  }
  .nav-item:hover .submenu a{
    display: block;
  }
  .nav-item:hover .submenu::before{
    display: block;
  }

  ::-webkit-scrollbar{
    background: #ddd;
    width: 14px;
  }
  ::-webkit-scrollbar-track{
    box-shadow: inset 0 0 10px #00000070;
    border-radius: 10px;
  }
  ::-webkit-scrollbar-thumb{
    background: linear-gradient(125deg,black, #696969);
    border-radius: 10px
  }
  .navbar-light
  {
    font-style: bold;
  }
  .hovericon a
  {
    font-size: 24px;
    color: #E8ECED;
    transition: 0.05:;
  }
  .hovericon a:hover
  {
    color: #B47C14;
  }

  .hovermore1{
    color: black;
    transition: 0.25s;
  }
  .hovermore1:hover{
    color: #B47C14;
  }




</style>
</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-color fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MAJOO TEKNOLOGI INDONESIA</a>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="active nav-link" href="<?php echo base_url('UserDashboard') ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Produk">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>UserDashboard/History">History</a>
          </li>
          <li>
            <a  class="nav-link" href="<?php echo base_url()?>UserDashboard/keranjang_belanja">Keranjang<i class="fa fa-cart-plus"></i> <?php echo count($cart); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Login/logoutuser') ?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>