<?php 
session_start();
include('../koneksi/koneksi.php');
if(isset($_GET["include"])){
  $include = $_GET["include"];
  if($include=="konfirmasi-login"){
    include("include/konfirmasilogin.php");
  }else if($include=="konfirmasi-edit-profil"){
    include("include/konfirmasieditprofil.php");
  }
  else if($include=="signout"){
    include("include/signout.php");
  }else if($include=="konfirmasi-tambah-kategori-produk"){
    include("include/konfirmasitambahkategoriproduk.php");
  }else if($include=="konfirmasi-edit-kategori-produk"){
    include("include/konfirmasieditkategoriproduk.php");
  }
  else if($include=="konfirmasi-tambah-tag"){
    include("include/konfirmasitambahtag.php");
  }else if($include=="konfirmasi-edit-tag"){
    include("include/konfirmasiedittag.php");
  }
  else if($include=="konfirmasi-tambah-penerbit"){
    include("include/konfirmasitambahpenerbit.php");
  }else if($include=="konfirmasi-edit-penerbit"){
    include("include/konfirmasieditpenerbit.php");
  }
  else if($include=="konfirmasi-tambah-kategori-artikel"){
    include("include/konfirmasitambahkategoriartikel.php");
  }else if($include=="konfirmasi-edit-kategori-artikel"){
    include("include/konfirmasieditkategoriartikel.php");
  }
  else if($include=="konfirmasi-tambah-konten"){
    include("include/konfirmasitambahkonten.php");
  }else if($include=="konfirmasi-edit-konten"){
    include("include/konfirmasieditkonten.php");
  }
  else if($include=="konfirmasi-tambah-client"){
    include("include/konfirmasitambahclient.php");
  }else if($include=="konfirmasi-edit-client"){
    include("include/konfirmasieditclient.php");
  }
  else if($include=="konfirmasi-tambah-user"){
    include("include/konfirmasitambahuser.php");
  }else if($include=="konfirmasi-edit-user"){
    include("include/konfirmasiedituser.php");
  }
  else if($include=="konfirmasi-tambah-artikel"){
    include("include/konfirmasitambahartikel.php");
  }else if($include=="konfirmasi-edit-artikel"){
    include("include/konfirmasieditartikel.php");
  }
  else if($include=="konfirmasi-tambah-produk"){
    include("include/konfirmasitambahproduk.php");
  }else if($include=="konfirmasi-edit-produk"){
    include("include/konfirmasieditproduk.php");
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ?>
</head>
<?php
//cek ada get include
if(isset($_GET["include"])){
  	$include = $_GET["include"];
  	//cek apakah ada session id admin
  	if(isset($_SESSION['id_user'])){
      //pemanggilan file yg perlu login
      ?>
      <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php 
          if($include=="edit-profil"){
            include("include/editprofil.php");
          }
          else if($include=="kategori-produk"){
            include("include/kategoriproduk.php");
          }else if($include=="tambah-kategori-produk"){
            include("include/tambahkategoriproduk.php");
          }else if($include=="edit-kategori-produk"){
            include("include/editkategoriproduk.php");
          }
          else if($include=="tag"){
            include("include/tag.php");
          }else if($include=="tambah-tag"){
            include("include/tambahtag.php");
          }else if($include=="edit-tag"){
            include("include/edittag.php");
          }
          else if($include=="penerbit"){
            include("include/penerbit.php");
          }else if($include=="tambah-penerbit"){
            include("include/tambahpenerbit.php");
          }else if($include=="edit-penerbit"){
            include("include/editpenerbit.php");
          }
          else if($include=="kategori-artikel"){
            include("include/kategoriartikel.php");
          }else if($include=="tambah-kategori-artikel"){
            include("include/tambahkategoriartikel.php");
          }else if($include=="edit-kategori-artikel"){
            include("include/editkategoriartikel.php");
          }
          else if($include=="konten"){
            include("include/konten.php");
          }else if($include=="tambah-konten"){
            include("include/tambahkonten.php");
          }else if($include=="edit-konten"){
            include("include/editkonten.php");
          }else if($include=="detail-konten"){
            include("include/detailkonten.php");
          }
          else if($include=="client"){
            include("include/client.php");
          }else if($include=="tambah-client"){
            include("include/tambahclient.php");
          }else if($include=="edit-client"){
            include("include/editclient.php");
          }else if($include=="detail-client"){
            include("include/detailclient.php");
          }
          else if($include=="artikel"){
            include("include/artikel.php");
          }else if($include=="tambah-artikel"){
            include("include/tambahartikel.php");
          }else if($include=="edit-artikel"){
            include("include/editartikel.php");
          }else if($include=="detail-artikel"){
            include("include/detailartikel.php");
          }
          else if($include=="produk"){
            include("include/produk.php");
          }else if($include=="tambah-produk"){
            include("include/tambahproduk.php");
          }else if($include=="edit-produk"){
            include("include/editproduk.php");
          }else if($include=="detail-produk"){
            include("include/detailproduk.php");
          }
          else if($include=="user"){
            include("include/user.php");
          }else if($include=="tambah-user"){
            include("include/tambahuser.php");
          }else if($include=="edit-user"){
            include("include/edituser.php");
          }else if($include=="detail-user"){
            include("include/detailuser.php");
          }
          else{
            include("include/profil.php");
          }  
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>

    <?php
  	}else{
    //pemanggilan halaman form login
    include("include/login1.php");
  	}  
}else{
  if(isset($_SESSION['id_user'])){
  //pemanggilan ke halaman-halaman profil jika ada session
  ?>
  <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
        <?php
          //pemanggilan profil
          include("include/profil.php");
          
        ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
    <?php
  }else{
  //pemanggilan halaman form login
    include("include/login1.php");
  } 
}
?>

</html>
