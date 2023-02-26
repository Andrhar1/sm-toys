
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah produk</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?include=produk">Data produk</a></li>
              <li class="breadcrumb-item active">Tambah produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data produk</h3>
        <div class="card-tools">
          <a href="index.php?include=produk" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
      <div class="col-sm-10">
      <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis']))){?>
       <?php if($_GET['notif']=="tambahkosong"){?>
          <div class="alert alert-danger" role="alert">Maaf data 
          <?php echo $_GET['jenis'];?> wajib di deskripsi</div>
       <?php }?>
    <?php }?>
</div> 

      </div>
      <form class="form-horizontal" action="index.php?include=konfirmasi-tambah-produk" 
        method="post" enctype="multipart/form-data"
>
        <div class="card-body">
          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">foto produk </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori    
            produk</label>
            <div class="col-sm-7">
            <select class="form-control" id="kategori" name="kategori_produk">
            <option value="">- Pilih Kategori -</option>
          <?php 
          $sql_k = "SELECT `id_kategori_produk`,`kategori_produk` FROM 
          `kategori_produk` ORDER BY `kategori_produk`";
           $query_k = mysqli_query($koneksi, $sql_k);
           while($data_k = mysqli_fetch_row($query_k)){
                $id_kat = $data_k[0];
                $kat = $data_k[1];
           ?>
            <option value="<?php echo $id_kat;?>"><?php echo $kat;?></option>
           <?php }?>
            </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-3 col-form-label">deskripsi</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="deskripsi" id="editor1" rows="12"></textarea>
            </div>
          </div>          
              </div>
            </div> 


          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>