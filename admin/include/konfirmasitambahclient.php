<?php
include "../koneksi/koneksi.php";
$nama        = $_POST['nama'];
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file   = $_FILES['foto']['name'];
$direktori   = 'foto/' . $nama_file;

if (empty($nama)) {
 header("Location:index.php?include=tambah-client&notif=tambahkosong&jenis=nama");
} elseif (!move_uploaded_file($lokasi_file, $direktori)) {
 header("Location:index.php?include=tambah-client&notif=tambahkosong&jenis=foto");
} else {
 $sql_client = "INSERT INTO `client`
(`nama`,`foto`)
VALUES ('$nama','$nama_file')";
 mysqli_query($koneksi, $sql_client);
 $id_client = mysqli_insert_id($koneksi);
 header("Location:index.php?include=client&notif=tambahberhasil");
}