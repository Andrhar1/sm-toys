<?php 
if((isset($_GET['aksi']))&&(isset($_GET['data']))){
	 if($_GET['aksi']=='hapus'){
      $id_produk = $_GET['data'];
      //get cover
      $sql_f = "SELECT `foto` FROM `produk` WHERE `id_produk`='$id_produk'";
      $query_f = mysqli_query($koneksi,$sql_f);
      $jumlah_f = mysqli_num_rows($query_f);
      if($jumlah_f>0){
        while($data_f = mysqli_fetch_row($query_f)){
          $foto = $data_f[0];
          //menghapus cover
          unlink("foto/$foto");
        }
      }
    $sql_dm = "delete from `produk` where `id_produk` = '$id_produk'";
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
            <h3><i class="fas fa-box-open"></i> produk</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  produk</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambah-produk" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah  produk</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="index.php?include=produk">
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
                        <th width="20%">nama</th>
                        <th width="20%">Kategori</th>
                        <th width="10%">Foto</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $batas = 5;
                    if(!isset($_GET['halaman'])){
                         $posisi = 0;
                         $halaman = 1;
                    }else{
                         $halaman = $_GET['halaman'];
                         $posisi = ($halaman-1) * $batas;
                    } 

                    $sql_b = "SELECT `b`.`id_produk`, `b`.`nama`,     
                    `k`.`kategori_produk` ,`b`.`foto` FROM `produk` `b`
                     INNER JOIN `kategori_produk` `k` ON `b`.`id_kategori_produk` = 
                     `k`.`id_kategori_produk`";
                     
             
                    if(isset($kata_kunci) && !empty($kata_kunci)){
                      $sql_b .= "WHERE `nama` LIKE '%$kata_kunci%' ";
                     }
                     
                      $sql_b .= "ORDER BY `b`.`nama` limit $posisi,$batas";
                    $query_b = mysqli_query($koneksi,$sql_b);
                    $no = $posisi + 1;
                    
                    while($data_b = mysqli_fetch_row($query_b)){
                      $id_produk = $data_b[0];
                      $nama = $data_b[1];
                      $kategori = $data_b[2];
                      $foto = $data_b[3];
                      
                      
                     
                      
                    ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= $nama;?></td>
                      <td><?= $kategori;?></td>
                      <td><img src="foto/<?php echo $foto;?>" class="img-fluid"></td>
                      
                      
                      <td align ="center">
                      <a href="index.php?include=edit-produk&data=<?php echo $id_produk;?>" 
                      class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                      <a href="index.php?include=detail-produk&data=<?php echo $id_produk;?>" 
                      class="btn btn-xs btn-info" title="Detail"><i class="fas 
                      fa-eye"></i></a>
                      <a href="javascript:if(confirm('Anda yakin ingin menghapus produk <?php echo $nama; ?>?')) window.location.href ='index.php?include=produk&aksi=hapus&data=<?php echo $id_produk;?>¬if=hapusberhasil'"
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
              $sql_jum = "select `id_produk`, `nama` from    
                          `produk`";
              if(isset($kata_kunci) && !empty($kata_kunci)){
                  $sql_jum .= "WHERE `nama` LIKE '%$kata_kunci%' ";
              }
              $sql_jum .= "order by `nama`"; 
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
                <a class='page-link' href='index.php?include=produk&halaman=1'>
                First</a></li>";
                echo "<li class='page-item'>
                <a class='page-link' href='index.php?include=produk&halaman=$sebelum'>
                «</a></li>";
              }
              for($i=1; $i<=$jum_halaman; $i++){
                  if($i!=$halaman){
                    echo "<li class='page-item'>
                    <a class='page-link' href='index.php?include=produk&halaman=$i'>
                    $i</a></li>";
                  }else{
                      echo "<li class='page-item'>
                      <a class='page-link'>$i</a></li>";
                  }
              }
              if($halaman!=$jum_halaman){
                  echo "<li class='page-item'>
                  <a class='page-link' href='index.php?include=produk&halaman=$setelah'>
                  »</a></li>";
                  echo "<li class='page-item'>
                  <a class='page-link' href='index.php?include=produk&halaman=$jum_halaman'>
                  Last</a></li>";
              }
              }?>
              </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>