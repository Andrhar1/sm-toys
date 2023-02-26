<?php 
    include('../koneksi/koneksi.php');
    $id_kategori_artikel = $_POST['kategori_artikel'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/'.$nama_file;
        
    if(empty($id_kategori_artikel)){
	    header("Location:index.php?include=tambah-artikel&notif=tambahkosong&jenis=kategoriartikel");
	}else if(empty($judul)){
	    header("Location:index.php?include=tambah-artikel&notif=tambahkosong&jenis=judul");
	}else if(empty($isi)){
	    header("Location:index.php?include=tambah-artikel&notif=tambahkosong&jenis=isi");
	}
    else if(!move_uploaded_file($lokasi_file,$direktori)){
      header("Location:index.php?include=tambah-artikel&notif=tambahkosong&jenis=foto");
    }else{   
	$sql = "INSERT INTO `artikel` 
      (`id_kategori_artikel`,`judul`,`isi`,`foto`)
      VALUES ('$id_kategori_artikel','$judul','$isi','$nama_file')";
      //echo $sql;
	mysqli_query($koneksi,$sql);
	$id_artikel = mysqli_insert_id($koneksi);
      header("Location:index.php?include=artikel&notif=tambahberhasil");
    }