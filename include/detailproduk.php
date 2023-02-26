<?php include ('koneksi/koneksi.php');?>
<?php
if(isset($_GET['data'])){
  $id_produk = $_GET['data'];
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
                <!-- <a class="text-primary font-semibold text-3xl leading-4 no-underline page-scroll" href="index.php#produk">SM Toys</a> -->

                <button class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400" type="button" data-toggle="offcanvas">
                    <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse lg:flex lg:flex-grow lg:items-center  text-primary" id="navbarsExampleDefault">
                    <ul class="pl-0 mt-3 mb-2 ml-auto flex flex-col list-none lg:mt-0 lg:mb-0 lg:flex-row">
                        <li>
                            <a class=" text-primary nav-link page-scroll" href="index.php#produk">Home <span class="sr-only">(current)</span></a>
                        </li>
                    
                </div> <!-- end of navbar-collapse -->
            </div> <!-- end of container -->
        </nav> <!-- end of navbar -->
        <!-- end of navigation -->

        <!-- Header -->
        
        <header class="ex-header bg-gray">
            
            <div class="container text-center">
                <?php 
                    $sql_d = "SELECT `a`.`foto`,`k`.`kategori_produk`,`a`.`nama`, `a`.`deskripsi`, `a`.`id_kategori_produk` FROM `produk` `a` INNER JOIN `kategori_produk` `k` ON `a`.`id_kategori_produk`=`k`.`id_kategori_produk` WHERE `a`.`id_produk`='$id_produk'";
                                $query_d = mysqli_query($koneksi,$sql_d);
                                while($data_d = mysqli_fetch_row($query_d)){
                                    $foto = $data_d[0];
                                    $kategori_produk = $data_d[1];
                                    $nama_produk = $data_d[2];
                                    $deskripsi = $data_d[3];
                                    $id_kategori_produk = $data_d[4];
                    ?>
                <h1 class="text-center xl:ml-24">Detail Produk</h1>
                <?php }?>
            </div> <!-- end of container -->
        </header> <!-- end of ex-header -->
        <!-- end of header -->

        <!-- Foto produk -->
        
        <section id="home" class="pt-9 pb-16">
        <div class="container">
            <div class="flex flex-wrap" >
                <div class="w-full self-end px-4 lg:w-1/2"> 
                    <div class="relative mt-3 lg:mt-3 lg:mb-5 lg:right-0">
                        <?php 
                            $sql_d = "SELECT `a`.`foto`,`k`.`kategori_produk`,`a`.`nama`, `a`.`deskripsi`, `a`.`id_kategori_produk` FROM `produk` `a` INNER JOIN `kategori_produk` `k` ON `a`.`id_kategori_produk`=`k`.`id_kategori_produk` WHERE `a`.`id_produk`='$id_produk'";
                                        $query_d = mysqli_query($koneksi,$sql_d);
                                        while($data_d = mysqli_fetch_row($query_d)){
                                            $foto = $data_d[0];
                                            $kategori_produk = $data_d[1];
                                            $nama_produk = $data_d[2];
                                            $deskripsi = $data_d[3];
                                            $id_kategori_produk = $data_d[4];
                        ?>
                        <img width="350" height="350" src="admin/foto/<?php echo $foto;?>" alt="front-image"
                        class="max-w-auto mx-auto">
                        <?php }?>
                        <!-- <span class="absolute -bottom-0 -z-10 left-1/2 -translate-x-1/2 rotate-180 lg:scale-110">
                            <svg width="300" height="300" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#0f766e" d="M56.2,-63.9C72.2,-53.5,84.2,-35.2,84.9,-17.1C85.6,1.1,75,19.2,64,35.8C53,52.5,41.7,67.8,25.5,76.7C9.2,85.5,-11.8,87.8,-28.3,80.5C-44.7,73.3,-56.7,56.5,-62.1,39.5C-67.4,22.6,-66.2,5.6,-65.3,-13.6C-64.4,-32.8,-63.9,-54.2,-53.1,-65.5C-42.3,-76.7,-21.1,-77.9,-0.5,-77.3C20.1,-76.6,40.2,-74.2,56.2,-63.9Z" transform="translate(100 100) "/>
                              </svg>
                        </span> -->
                    </div>
                </div>  
                <div class="w-full self-center px-8 lg:w-1/2">
                    <?php 
                    $sql_d = "SELECT `a`.`foto`,`k`.`kategori_produk`,`a`.`nama`, `a`.`deskripsi`, `a`.`id_kategori_produk` FROM `produk` `a` INNER JOIN `kategori_produk` `k` ON `a`.`id_kategori_produk`=`k`.`id_kategori_produk` WHERE `a`.`id_produk`='$id_produk'";
                                $query_d = mysqli_query($koneksi,$sql_d);
                                while($data_d = mysqli_fetch_row($query_d)){
                                    $foto = $data_d[0];
                                    $kategori_produk = $data_d[1];
                                    $nama_produk = $data_d[2];
                                    $deskripsi = $data_d[3];
                                    $id_kategori_produk = $data_d[4];
                    ?>
                    <h1 class="text-base font-bold text-primary md:text-xl lg:text-2xl">
                        <span class="block font-bold text-slate-900 text-4xl" > <?php echo $nama_produk;?></span></h1>
                    <h2 class="font-normal text-sky-900 text-lg md:text-2xl lg:text-3xl">Kategori : <?php echo $kategori_produk;?></h2>
                    <p class="font-normal text-slate-900 mb-6 "> <?php echo $deskripsi;?></p>
                    <?php }?>
                </div>
                
            </div>
        </div>
        </section>
    </body>