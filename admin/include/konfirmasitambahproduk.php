<?php 
    include('../koneksi/koneksi.php');
    $id_kategori_produk = $_POST['kategori_produk'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/'.$nama_file;
        
    if(empty($id_kategori_produk)){
	    header("Location:index.php?include=tambah-produk&notif=tambahkosong&jenis=kategoriproduk");
	}else if(empty($nama)){
	    header("Location:index.php?include=tambah-produk&notif=tambahkosong&jenis=nama");
	}else if(empty($deskripsi)){
	    header("Location:index.php?include=tambah-produk&notif=tambahkosong&jenis=deskripsi");
	}
    else if(!move_uploaded_file($lokasi_file,$direktori)){
      header("Location:index.php?include=tambah-produk&notif=tambahkosong&jenis=foto");
    }else{   
	$sql = "INSERT INTO `produk` 
      (`id_kategori_produk`,`nama`,`deskripsi`,`foto`) 
      VALUES ('$id_kategori_produk','$nama','$deskripsi','$nama_file')";
      //echo $sql;
	mysqli_query($koneksi,$sql);
	$id_produk = mysqli_insert_id($koneksi);
      header("Location:index.php?include=produk&notif=tambahberhasil");
    }