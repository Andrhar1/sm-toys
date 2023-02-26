<?php
$koneksi = mysqli_connect("localhost","root","","uas1");
// cek koneksi
if (!$koneksi){
  die("Error koneksi: " . mysqli_connect_errno());
}
?>
