<?php 
if(isset($_SESSION['id_produk'])){
    $id_produk = $_SESSION['id_produk'];
    $id_kategori_produk = $_POST['kategori_produk'];
    $nama = $_POST['nama'];
    $deskripsi = addslashes($_POST['deskripsi']);
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/'.$nama_file;
 
    //get cover 
    $sql_f = "SELECT `foto` FROM `produk` WHERE `id_produk`='$id_produk'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }
   
     if(empty($id_kategori_produk)){
	    header("Location:index.php?include=edit-produk&data=$id_produk&notif=editkosong&jenis=kategoriproduk");
	}else if(empty($nama)){
	    header("Location:index.php?include=edit-produk&data=$id_produk&notif =editkosong&jenis=nama");
         }else if(empty($deskripsi)){
	    header("Location:index.php?include=edit-produk&data=$id_produk&notif =editkosong&jenis=deskripsi");
	}else{
         $lokasi_file = $_FILES['foto']['tmp_name'];
	   $nama_file = $_FILES['foto']['name'];
	   $direktori = 'foto/'.$nama_file;
	   if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($foto)){
                unlink("foto/$foto");
            }
	$sql = "UPDATE `produk` set 
     `id_kategori_produk`='$id_kategori_produk',`nama`='$nama',
	`deskripsi`='$deskripsi',`foto`='$nama_file'
	WHERE `id_produk`='$id_produk'";
	mysqli_query($koneksi,$sql);
}else{
	$sql = "UPDATE `produk` set 
     `id_kategori_produk`='$id_kategori_produk',`nama`='$nama',`deskripsi`='$deskripsi'
	WHERE `id_produk`='$id_produk'";
	mysqli_query($koneksi,$sql);
}
header("Location:produk_notif=editberhasil");
}
}
 
?>
