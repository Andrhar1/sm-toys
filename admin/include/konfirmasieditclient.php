<?php
if (isset($_SESSION['id_client'])) {
 $id_client  = $_SESSION['id_client'];
 $nama     = $_POST['nama'];
 //get foto
 $sql_f   = "SELECT `foto` FROM `client` WHERE `id_client`='$id_client'";
 $query_f = mysqli_query($koneksi, $sql_f);
 while ($data_f = mysqli_fetch_row($query_f)) {
  $foto = $data_f[0];
 }

 if (empty($nama)) {
  header("Location:index.php?include=edit-client&notif=tambahkosong&jenis=nama");
 } else {
  $lokasi_file = $_FILES['foto']['tmp_name'];
  $nama_file   = $_FILES['foto']['name'];
  $direktori   = 'foto/' . $nama_file;
  if (move_uploaded_file($lokasi_file, $direktori)) {
   if (!empty($foto)) {
    unlink("foto/$foto");
   }
   $sql = "UPDATE `client` set `id_client`='$id_client',`nama`='$nama',`foto`='$nama_file' WHERE `id_client`='$id_client'";
   mysqli_query($koneksi, $sql);
  } else {
   $sql = "update `client` set `nama`='$nama' where `id_client`='$id_client'";
   //echo $sql;
   mysqli_query($koneksi, $sql);
  }
  header("Location:index.php?include=client&notif=editberhasil");
 }
}