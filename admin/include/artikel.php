<?php 
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	 if($_GET['aksi']=='hapus'){
      $id_artikel = $_GET['data'];
      //get cover
      $sql_f = "SELECT `foto` FROM `artikel` WHERE `id_artikel`='$id_artikel'";
      $query_f = mysqli_query($koneksi,$sql_f);
      $jumlah_f = mysqli_num_rows($query_f);
      if($jumlah_f>0){
        while($data_f = mysqli_fetch_row($query_f)){
          $foto = $data_f[0];
          //menghapus cover
          unlink("foto/$foto");
        }
      }
    $sql_dm = "delete from `artikel` where `id_artikel` = '$id_artikel'";
    mysqli_query($koneksi,$sql_dm);
  }
}

if(isset($_POST['katakunci'])){
  $kata_kunci= $_POST['katakunci'];
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
            <h3><i class="fas fa-book"></i> artikel</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> artikel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  artikel</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-artikel" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  artikel</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=artikel">
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
                  <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%">Judul</th>
                        <th width="30%">Kategori</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $batas = 2;
                    if(!isset($_GET['halaman'])){
                         $posisi = 0;
                         $halaman = 1;
                    }else{
                         $halaman = $_GET['halaman'];
                         $posisi = ($halaman-1) * $batas;
                    } 

                    $sql_b = "SELECT `b`.`id_artikel`, `b`.`judul`,     
                    `k`.`kategori_artikel` FROM `artikel` `b`
                     INNER JOIN `kategori_artikel` `k` ON `b`.`id_kategori_artikel` = 
                     `k`.`id_kategori_artikel`";
                     
             
                    if(isset($kata_kunci) && !empty($kata_kunci)){
                      $sql_b .= "WHERE `judul` LIKE '%$kata_kunci%' ";
                     }
                     
                      $sql_b .= "ORDER BY `k`.`kategori_artikel`, `b`.`judul` limit $posisi,$batas";
                    $query_b = mysqli_query($koneksi,$sql_b);
                    $no = $posisi + 1;
                    
                    while($data_b = mysqli_fetch_row($query_b)){
                      $id_artikel = $data_b[0];
                      $kategori = $data_b[1];
                      $judul = $data_b[2];
                     
                      
                    ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= $kategori;?></td>
                      <td><?= $judul;?></td>
                      
                      <td align="center">
                      <a href="index.php?include=edit-artikel&data=<?php echo $id_artikel;?>" 
                      class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                      <a href="index.php?include=detail-artikel&data=<?php echo $id_artikel;?>" 
                      class="btn btn-xs btn-info" title="Detail"><i class="fas 
                      fa-eye"></i></a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus artikel <?php echo $judul; ?>?')) window.location.href ='index.php?include=artikel&aksi=hapus&data=<?php echo $id_artikel;?>¬if=hapusberhasil'"
                       class="btn btn-xs btn-warning"><i class="fas fa-trash">hapus</i></a>                         
                        </td>
                    </tr>
                    <?php $no++;}?>  


                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              <?php
              //hitung jumlah semua data 
              $sql_jum = "select `id_artikel`, `judul` from    
                          `artikel`";
              if(isset($kata_kunci) && !empty($kata_kunci)){
                  $sql_jum .= "WHERE `judul` LIKE '%$kata_kunci%' ";
              }
              $sql_jum .= "order by `judul`"; 
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
                <a class='page-link' href='index.php?include=artikel&halaman=1'>
                First</a></li>";
                echo "<li class='page-item'>
                <a class='page-link' href='index.php?include=artikel&halaman=$sebelum'>
                «</a></li>";
              }
              for($i=1; $i<=$jum_halaman; $i++){
                  if($i!=$halaman){
                    echo "<li class='page-item'>
                    <a class='page-link' href='index.php?include=artikel&halaman=$i'>
                    $i</a></li>";
                  }else{
                      echo "<li class='page-item'>
                      <a class='page-link'>$i</a></li>";
                  }
              }
              if($halaman!=$jum_halaman){
                  echo "<li class='page-item'>
                  <a class='page-link' href='index.php?include=artikel&halaman=$setelah'>
                  »</a></li>";
                  echo "<li class='page-item'>
                  <a class='page-link' href='index.php?include=artikel&halaman=$jum_halaman'>
                  Last</a></li>";
              }
              }?>
              </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>