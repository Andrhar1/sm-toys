<?php 
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	if($_GET['aksi']=='hapus'){
		$id_kategori_artikel = $_GET['data'];
		//hapus kategori artikel
		$sql_dh = "delete from `kategori_artikel`
		where `id_kategori_artikel` = '$id_kategori_artikel'";
		mysqli_query($koneksi,$sql_dh);
	}
}
if(isset($_POST['katakunci'])){
  $kata_kunci = $_POST['katakunci'];
  $_SESSION['katakunci'] = $kata_kunci;
}
if(isset($_SESSION['katakunci'])){
  $kata_kunci = $_SESSION['katakunci'];
}
?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-address-book"></i> Kategori Artikel</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Kategori Artikel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Kategori Artikel</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-kategori-artikel" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah  Kategori Artikel</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=kategori-artikel">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <div class="col-sm-12">
              <?php if(!empty($_GET['notif'])){?>
                  <?php if($_GET['notif']=="tambahberhasil"){?>
                  <div class="alert alert-success" role="alert"> 
                    Data Berhasil Ditambahkan</div>
                  <?php } else if($_GET['notif']=="editberhasil"){?>
                    <div class="alert alert-success" role="alert">
                    Data Berhasil Diubah</div>
                  <?php } else if($_GET['notif']=="hapusberhasil"){?>
                    <div class="alert alert-success" role="alert">
                    Data Berhasil Dihapus</div>
                   <?php }?>
              <?php }?>
              </div>

              </div>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%">No</th>
                      <th width="80%">Kategori Artikel</th>
                      <th width="15%"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $batas = 2;
                    if(!isset($_GET['halaman'])) {
                          $posisi = 0;
                          $halaman = 1;
                    }else{
                          $halaman = $_GET['halaman'];
                          $posisi = ($halaman-1) * $batas;
                    }

                    $sql_k = "SELECT `id_kategori_artikel`,`kategori_artikel` FROM 
                    `kategori_artikel` ";
                    if(isset($kata_kunci) && !empty($kata_kunci)){
                      $sql_k .= "WHERE `kategori_artikel` LIKE '%$kata_kunci%' ";
                    }

                    $sql_k .= "ORDER BY `kategori_artikel` limit $posisi, $batas";

                    $query_k = mysqli_query($koneksi,$sql_k);
                    $no = 1;
                    while($data_k = mysqli_fetch_row($query_k)){
                      $id_kategori_artikel = $data_k[0];
                      $kategori_artikel = $data_k[1];
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $kategori_artikel;?></td>
                      <td align="center">
                        <a href="index.php?include=edit-kategori-artikel&data= <?php echo $id_kategori_artikel;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="index.php?include=kategori-artikel&aksi=hapus&data= <?php echo $id_kategori_artikel;?>&notif=hapusberhasil" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; }?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <?php
              //hitung jumlah semua data 
              $sql_jum = "select `id_kategori_artikel`, `kategori_artikel` from    
                      `kategori_artikel`"; 
              if(isset($kata_kunci) && !empty($kata_kunci)){
                $sql_k .= "WHERE `kategori_artikel` LIKE '%$kata_kunci%' ";
              }
              $sql_jum .= "order by `kategori_artikel`";

              $query_jum = mysqli_query($koneksi,$sql_jum);
              $jum_data = mysqli_num_rows($query_jum);
              $jum_halaman = ceil($jum_data/$batas);
              ?>
              <ul class="pagination pagination-sm m-0 float-right">
              <?php 
              if($jum_halaman==0){
                //tidak ada halaman
              }else if($jum_halaman==1){
                echo "<li class='page-item'><a class='page-link'>1</a></li>";
              }else{
                $sebelum = $halaman-1;
                $setelah = $halaman+1;
              if($halaman!=1){
                echo "<li class='page-item'>
                <a class='page-link' href='index.php?include=kategori-artikel&halaman=1'>
                First</a></li>";
                echo "<li class='page-item'>
                <a class='page-link' href='index.php?include=kategori-artikel&halaman=$sebelum'>
                «</a></li>";
              }
              for($i=1; $i<=$jum_halaman; $i++){
                  if($i!=$halaman){
                    echo "<li class='page-item'>
                    <a class='page-link' href='index.php?include=kategori-artikel&halaman=$i'>
                    $i</a></li>";
                  }else{
                      echo "<li class='page-item'>
                      <a class='page-link'>$i</a></li>";
                  }
              }
              if($halaman!=$jum_halaman){
                  echo "<li class='page-item'>
                  <a class='page-link' href='index.php?include=kategori-artikel&halaman=$setelah'>
                  »</a></li>";
                  echo "<li class='page-item'>
                  <a class='page-link' href='index.php?include=kategori-artikel&halaman=$jum_halaman'>
                  Last</a></li>";
              }
              }?>
              </ul>

              </div>
            </div>
            <!-- /.card -->

    </section>
