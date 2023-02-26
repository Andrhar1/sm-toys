<?php include ('koneksi/koneksi.php');?>
<?php
if(isset($_GET['data'])){
  $id_artikel = $_GET['data'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Navigation -->
        <nav class="bg-transparant navbar fixed-top">
            <div class="container flex flex-wrap items-center justify-between sm:px-4 lg:flex-nowrap lg:px-8">


                <!-- Image Logo -->
                <a class="inline-block mr-4 py-0,5 text-xl whitespace-nowrap hover:no-underline focus:no-underline" href="index.php">
                    <img width="75" height="75" src="dist/img/logo.png" alt="alternative" />
                </a>
                
                <!-- Text Logo - Use this if you don't have a graphic logo -->
                <!-- <a class="text-primary font-semibold text-3xl leading-4 no-underline page-scroll" href="index.php#artikel">SM Toys</a> -->

                <button class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400" type="button" data-toggle="offcanvas">
                    <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center  text-primary" id="navbarsExampleDefault">
                    <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                        <li>
                            <a class=" text-primary nav-link page-scroll" href="index.php#artikel">Home <span class="sr-only">(current)</span></a>
                        </li>
                    
                </div> <!-- end of navbar-collapse -->
            </div> <!-- end of container -->
        </nav> <!-- end of navbar -->
        <!-- end of navigation -->

        <!-- Header -->
        
        <header class="ex-header bg-gray">
            
            <div class="container px-4 sm:px-8 xl:px-4 text-center">
                <?php 
                    $sql_d = "SELECT `a`.`foto`,`k`.`kategori_artikel`,`a`.`judul`, `a`.`isi`, `a`.`id_kategori_artikel` FROM `artikel` `a` INNER JOIN `kategori_artikel` `k` ON `a`.`id_kategori_artikel`=`k`.`id_kategori_artikel` WHERE `a`.`id_artikel`='$id_artikel'";
                                $query_d = mysqli_query($koneksi,$sql_d);
                                while($data_d = mysqli_fetch_row($query_d)){
                                    $foto = $data_d[0];
                                    $kategori_artikel = $data_d[1];
                                    $judul_artikel = $data_d[2];
                                    $isi = $data_d[3];
                                    $id_kategori_artikel = $data_d[4];
                    ?>
                <h1 class="text-center xl:ml-24"><?php echo $judul_artikel;?></h1>
                <?php }?>
            </div> <!-- end of container -->
        </header> <!-- end of ex-header -->
        <!-- end of header -->

        <!-- Foto Artikel -->
        
        <div class="ex-basic-1 py-12">
            <div class="container px-4 sm:px-8">
                <?php 
                    $sql_d = "SELECT `a`.`foto`,`k`.`kategori_artikel`,`a`.`judul`, `a`.`isi`, `a`.`id_kategori_artikel` FROM `artikel` `a` INNER JOIN `kategori_artikel` `k` ON `a`.`id_kategori_artikel`=`k`.`id_kategori_artikel` WHERE `a`.`id_artikel`='$id_artikel'";
                                $query_d = mysqli_query($koneksi,$sql_d);
                                while($data_d = mysqli_fetch_row($query_d)){
                                    $foto = $data_d[0];
                                    $kategori_artikel = $data_d[1];
                                    $judul_artikel = $data_d[2];
                                    $isi = $data_d[3];
                                    $id_kategori_artikel = $data_d[4];
                    ?>
                <img class="inline mt-12 mb-4" src="admin/foto/<?php echo $foto;?>" alt="alternative" />
                <?php }?>
            </div> <!-- end of container -->
        </div> <!-- end of ex-basic-1 -->
        <!-- end of basic -->

        <!-- Isi Artikel -->
        <div class="ex-basic-1 pt-4 pb-12">
            <div class="container px-4 sm:px-8 xl:px-32 ">
                <?php 
                    $sql_d = "SELECT `a`.`foto`,`k`.`kategori_artikel`,`a`.`judul`, `a`.`isi`, `a`.`id_kategori_artikel` FROM `artikel` `a` INNER JOIN `kategori_artikel` `k` ON `a`.`id_kategori_artikel`=`k`.`id_kategori_artikel` WHERE `a`.`id_artikel`='$id_artikel'";
                                $query_d = mysqli_query($koneksi,$sql_d);
                                while($data_d = mysqli_fetch_row($query_d)){
                                    $foto = $data_d[0];
                                    $kategori_artikel = $data_d[1];
                                    $judul_artikel = $data_d[2];
                                    $isi = $data_d[3];
                                    $id_kategori_artikel = $data_d[4];
                    ?>
                <h2 class="text-center mb-4"><?php echo $judul_artikel;?></h2>
                <h3 class="mb-4">Kategori : <?php echo $kategori_artikel;?></h3>
                <p class="mb-4"><?php echo $isi;?></p>
                <?php }?>
            </div> <!-- end of container -->
        </div> <!-- end of ex-basic-1 -->
        <!-- end of basic -->
    </body>