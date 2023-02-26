<?php 
	$id_user = $_SESSION['id_user'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$level = $_POST['level'];
	$password = mysqli_real_escape_string($koneksi, MD5($pass));
 
    //get foto 
    $sql_f = "SELECT `foto` FROM `user` WHERE `id_user`='$id_user'";
    $query_f = mysqli_query($koneksi,$sql_f);
    while($data_f = mysqli_fetch_row($query_f)){
        $foto = $data_f[0];
        //echo $foto;
    }
 
	if(empty($nama)){
	    header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=nama");
	}else if(empty($email)){
	    header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=email");
	}else if(empty($username)){
	    header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=username");
	}
	else{
        $lokasi_file = $_FILES['foto']['tmp_name'];
		$nama_file = $_FILES['foto']['name'];
		$direktori = 'foto/'.$nama_file;
		if(move_uploaded_file($lokasi_file,$direktori)){
            	   if(!empty($foto)){
                     unlink("foto/$foto");
                  }
		   $sql = "insert into `user` (nama, email, username, password, foto, level) VALUES ('$nama', '$email', '$username', '$password', '$nama_file', '$level')";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}else{
		   $sql = "insert into `user` (nama, email, username, password, level ) VALUES ('$nama', '$email', '$username', '$password', '$level')";
                  //echo $sql;
		   mysqli_query($koneksi,$sql);
		}
      	    header("Location:index.php?include=user&notif=tambahberhasil");
	}

?>