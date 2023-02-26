<?php 
$kategori_artikel = $_POST['kategori_artikel'];
if(empty($kategori_artikel)){
	header("Location:index.php?include=tambah-kategori-artikel&notif=tambahkosong");
}else{
	$sql = "insert into `kategori_artikel` (`kategori_artikel`) 
	values ('$kategori_artikel')";
	mysqli_query($koneksi,$sql);
header("Location:index.php?include=kategori-artikel&notif=tambahberhasil");	
}
?>
