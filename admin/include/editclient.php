<?php
if (isset($_GET['data'])) {
 $id_client             = $_GET['data'];
 $_SESSION['id_client'] = $id_client;
 $sql_client            = "SELECT `nama`,`foto` FROM `client` WHERE `id_client` = $id_client";
 $query_client = mysqli_query($koneksi, $sql_client);
 while ($data_client = mysqli_fetch_row($query_client)) {
  $nama     = $data_client[0];
  $foto     = $data_client[1];
 }
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-edit"></i> Edit Data client</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=client">Data client</a></li>
          <li class="breadcrumb-item active">Edit Data client</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data client</h3>
      <div class="card-tools">
        <a href="index.php?include=client" class="btn btn-sm btn-warning float-right"><i
            class="fas fa-arrow-alt-circle-left"></i>
          Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br>
    <div class="col-sm-10">
      <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
      <?php if ($_GET['notif'] == "editkosong") { ?>
      <div class="alert alert-danger" role="alert">Maaf data
        <?php echo $_GET['jenis']; ?> wajib di isi</div>
      <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?include=konfirmasi-edit-client" method="POST"
      enctype="multipart/form-data">
      <div class="card-body">
        <div class="form-group row">
          <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-client-circle"></i>
              <u>Data client</u></span></label>
        </div>

        <div class="form-group row">
          <label for="foto" class="col-sm-3 col-form-label">Foto </label>
          <div class="col-sm-7">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="foto" id="customFile" value="">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama ?>">
          </div>
        </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
    </div>
  </div>
  <!-- /.card-footer -->
  </form>
  </div>
  <!-- /.card -->

</section>