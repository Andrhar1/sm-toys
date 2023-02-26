<?php 
if(isset($_SESSION['id_artikel'])){
    $id_artikel = $_SESSION['id_artikel'];
    $id_kategori_artikel = $_POST['kategori_artikel'];
    $judul = $_POST['judul'];
    $isi = addslashes($_POST['isi']);
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $nama_file = $_FILES['foto']['name'];
    $direktori = 'foto/'.$nama_file;
 
    //get cover 
    $sql_f = "SELECT `foto` FROM `artikel` WHERE `id_artikel`='$id_artikel'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }
   
     if(empty($id_kategori_artikel)){
	    header("Location:index.php?include=edit-artikel&data=$id_artikel&notif=editkosong&jenis=kategoriartikel");
	}else if(empty($judul)){
	    header("Location:index.php?include=edit-artikel&data=$id_artikel&notif =editkosong&jenis=judul");
         }else if(empty($isi)){
	    header("Location:index.php?include=edit-artikel&data=$id_artikel&notif =editkosong&jenis=isi");
	}else{
         $lokasi_file = $_FILES['foto']['tmp_name'];
	   $nama_file = $_FILES['foto']['name'];
	   $direktori = 'foto/'.$nama_file;
	   if(move_uploaded_file($lokasi_file,$direktori)){
            if(!empty($foto)){
                unlink("foto/$foto");
            }
	$sql = "UPDATE `artikel` set 
     `id_kategori_artikel`='$id_kategori_artikel',`judul`='$judul',
	`isi`='$isi',`foto`='$nama_file'
	WHERE `id_artikel`='$id_artikel'";
	mysqli_query($koneksi,$sql);
}else{
	$sql = "UPDATE `artikel` set 
     `id_kategori_artikel`='$id_kategori_artikel',`judul`='$judul',`isi`='$isi'
	WHERE `id_artikel`='$id_artikel'";
	mysqli_query($koneksi,$sql);
}
header("Location:index.php?include=artikel&notif=editberhasil");
}
}
 
?>
