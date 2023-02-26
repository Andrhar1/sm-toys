<?php include ('koneksi/koneksi.php');?>
<!doctype html>
<html class="scroll-smooth" lang="en">
  <head>
    <?php include('includes/head.php'); ?>
  </head>
  <body>
    <?php include('includes/navigasi.php');?>
    
      <?php 
    //pemanggilan konten halaman index
    if(isset($_GET["include"])){
      $include = $_GET["include"];
      if($include=="detail-artikel"){
        include("include/detailartikel.php");
      } else if($include=="detail-produk"){
        include("include/detailproduk.php");
      }else{    
        include("include/index.php");
      }
    }else{
      include("include/index.php");
    }
    ?>

    <?php include('includes/footer.php');?>
    <?php include('includes/script.php');?>


  </body>
</html>
<body>
    