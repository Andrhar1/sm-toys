<?php 
session_start();
include('../koneksi/koneksi.php');
if(isset($_SESSION['id_kategori_artikel'])){
  $id_kategori_artikel = $_SESSION['id_kategori_artikel'];
  $kategori_artikel = $_POST['kategori_artikel'];
 
   if(empty($kategori_artikel)){
 	    header("Location:index.php?include=edit-kategori-artikel&data=".$id_kategori_artikel."&notif=editkosong");
  }else{
	$sql = "update `kategori_artikel` set `kategori_artikel`='$kategori_artikel' 
	where `id_kategori_artikel`='$id_kategori_artikel'";
	mysqli_query($koneksi,$sql);
	unset($_SESSION['id_kategori_artikel']);
	header("Location:index.php?include=kategori-artikel&notif=editberhasil");
  }
}
?>
