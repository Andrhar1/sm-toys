<?php 
if(isset($_GET['data'])){
	$id_artikel = $_GET['data'];
	//gat data artikel
  $sql = "SELECT `a`.`foto`,`k`.`kategori_artikel`,`a`.`judul` , `a`.`isi` FROM `artikel` `a` INNER JOIN `kategori_artikel` `k` ON `a`.`id_kategori_artikel`=`k`.`id_kategori_artikel`WHERE `a`.`id_artikel`='$id_artikel'";
  $query = mysqli_query($koneksi,$sql);
  while($data = mysqli_fetch_row($query)){
    $foto = $data[0];
    $kategori_artikel = $data[1];
    $judul = $data[2];
    $isi = $data[3];
  }
 
}
?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data artikel</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=artikel">Data artikel</a></li>
              <li class="breadcrumb-item active">Detail Data artikel</li>
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
                  <a href="index.php?include=artikel" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
              <tbody>                      
                  <tr>
                    <td><strong>foto artikel<strong></td>
                    <td><img src="foto/<?php echo $foto;?>" 
                    class="img-fluid" width="200px;"></td>
                  </tr>               
                  <tr>
                      <td width="20%"><strong>Kategori artikel<strong></td>
                      <td width="80%"><?php echo $kategori_artikel;?></td>
                  </tr>                 
                  <tr>
                      <td width="20%"><strong>Judul<strong></td>
                      <td width="80%"><?php echo $judul;?></td>
                  </tr>
                      <td width="20%"><strong>Isi<strong></td>
                      <td width="80%"><?php echo $isi;?></td>
                  </tr> 
                </tbody>
              </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>