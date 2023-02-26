<?php 
if(isset($_GET['data'])){
	$id_produk = $_GET['data'];
	//gat data produk
  $sql = "SELECT `a`.`foto`,`k`.`kategori_produk`,`a`.`nama` , `a`.`deskripsi` FROM `produk` `a` INNER JOIN `kategori_produk` `k` ON `a`.`id_kategori_produk`=`k`.`id_kategori_produk`WHERE `a`.`id_produk`='$id_produk'";
  $query = mysqli_query($koneksi,$sql);
  while($data = mysqli_fetch_row($query)){
    $foto = $data[0];
    $kategori_produk = $data[1];
    $nama = $data[2];
    $deskripsi = $data[3];
  }
 
}
?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data produk</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=produk">Data produk</a></li>
              <li class="breadcrumb-item active">Detail Data produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="index.php?include=produk" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
              <tbody>                      
                  <tr>
                    <td><strong>foto produk<strong></td>
                    <td><img src="foto/<?php echo $foto;?>" 
                    class="img-fluid" width="200px;"></td>
                  </tr>               
                  <tr>
                      <td width="20%"><strong>Kategori produk<strong></td>
                      <td width="80%"><?php echo $kategori_produk;?></td>
                  </tr>                 
                  <tr>
                      <td width="20%"><strong>nama<strong></td>
                      <td width="80%"><?php echo $nama;?></td>
                  </tr>
                      <td width="20%"><strong>deskripsi<strong></td>
                      <td width="80%"><?php echo $deskripsi;?></td>
                  </tr> 
                </tbody>
              </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>