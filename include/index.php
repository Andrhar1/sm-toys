    
    <!-- header section start -->
    <header class="bg-transparant fixed-top top-0 left-0 w-full flex items-center z-10">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <div class="px-4 p-4 md:w-1/2 lg:w-1/3">
                    <img width="75" height="75" src="dist/img/logo.png" alt="Logo">
                    <!--<a href="#home" class="text-primary block py-6">LOGO</a>-->
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>

                    <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="group ">
                                <a href="#home" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Home</a>
                            </li>
                            <li class="group">
                                <a href="#about" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">About</a>
                            </li>
                            <li class="group">
                                <a href="#artikel" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Article</a>
                            </li>
                            <li class="group">
                                <a href="#product" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Products</a>
                            </li>
                            <li class="group">
                                <a href="#clients" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Clients</a>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header section end -->
    
    <!-- home section start -->
    

    <section id="home" class="pt-36">
        <div class="container">
            <div class="flex flex-wrap" >
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="text-base font-bold text-primary md:text-xl lg:text-2xl">Welcome!<span class="block font-bold text-slate-900 text-4xl" >SM TOYS</span></h1>
                    <h2 class="font-normal text-sky-900 text-lg mb-2 md:text-2xl lg:text-3xl">Toys Production</h2>
                    <p class="font-normal text-slate-700 mb-6 leading-relaxed "> Tempat dimana <span class="font-bold"> Teman</span>  diciptakan.</p>
                    <a href="#product" class="text-base font-bold text-white bg bg-primary py-3 px-7 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out mb-5">Cek Produk</a>
                </div>
                <div class="w-full self-end px-4 lg:w-1/2"> 
                    <div class="relative mt-3 lg:mt-3 lg:mb-5 lg:right-0">
                        <img width="350" height="350" src="dist/img/foto-profile.png" alt="front-image"
                        class="max-w-auto mx-auto">
                        <span class="absolute -bottom-0 -z-10 left-1/2 -translate-x-1/2 rotate-180 lg:scale-110">
                            <svg width="300" height="300" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#0f766e" d="M56.2,-63.9C72.2,-53.5,84.2,-35.2,84.9,-17.1C85.6,1.1,75,19.2,64,35.8C53,52.5,41.7,67.8,25.5,76.7C9.2,85.5,-11.8,87.8,-28.3,80.5C-44.7,73.3,-56.7,56.5,-62.1,39.5C-67.4,22.6,-66.2,5.6,-65.3,-13.6C-64.4,-32.8,-63.9,-54.2,-53.1,-65.5C-42.3,-76.7,-21.1,-77.9,-0.5,-77.3C20.1,-76.6,40.2,-74.2,56.2,-63.9Z" transform="translate(100 100) "/>
                              </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero section end -->

    <!-- About section start -->
    <?php 
    $sql_k = "SELECT `judul`,`isi`,`tanggal` FROM `konten` WHERE 
    `id_konten`='1'";
    $query_k = mysqli_query($koneksi,$sql_k);
    while($data_k = mysqli_fetch_row($query_k)){
        $judul = $data_k[0];
        $isi = $data_k[1];
        $tanggal = $data_k[2];
    }
    ?>
    <section id="about" class="pt-36 pb-32">
        <div class="container">
            <div class="flex flex-wrap">

                <div class="w-full px-4 mb-6 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3"><?php echo $judul;?></h4>
                    <h2 class="font-semibold text-sky-900
                     text-3xl mb-1 max-w-xl lg:text-3xl">SM TOYS</h2>
                    <p class="font-medium text-base text-dark"><?php echo $isi;?> 🧸</p>
                </div>
                <?php 
                    $sql_k = "SELECT `judul`,`isi` FROM `konten` WHERE 
                    `id_konten`='2'";   
                    $query_k = mysqli_query($koneksi,$sql_k);
                    while($data_k = mysqli_fetch_row($query_k)){
                        $judul_konten = $data_k[0];
                        $isi_konten = $data_k[1];
                    }
                    ?>    
                
                <div class="w-full px-4 mb-3 lg:w-1/2">
                    <h3 class="font-semibold text-2xl text-sky-900 mb-2 lg:pt-10"><?php echo $judul_konten;?></h3>
                    <p class="font-semibold text-base text-dark mb-1"><?php echo $isi_konten;?> </p>
                <div class="flex items-center pt-2  ">
 
                        <!-- youtube
                        <a href="https://www.youtube.com/channel/UCWlS1x5U55MT5q1U6ubLRnw" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-sky-200 hover:border-primary hover:bg-primary hover:text-white"><svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a> -->

                        <!-- instagram -->
                        <a href="https://www.instagram.com/smtoys.id/" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-sky-200 hover:border-primary hover:bg-primary hover:text-white"><svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>

                        <!-- twitter -->
                        <a href="https://twitter.com/ToysSm" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-sky-200 hover:border-primary hover:bg-primary hover:text-white"><svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>

                        <!-- tiktok -->
                        <!-- <a href="https://www.tiktok.com/@andriharii" target="_blank" class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-sky-200 hover:border-primary hover:bg-primary hover:text-white"><svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>TikTok</title><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- artikel section start -->
    <section id="artikel" class="pt-36 pb-16 bg-slate-200">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-10">
                    <h4 class="font-semibold text-lg text-primary mb-2">Artikel</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4">Ayo sempatkan waktu membaca artikel dari kami</h2>
                    <p class="font-medium text-md text-slate-600">Yuk baca artikelnya agar kalian tidak ketinggalan info menarik di dunia perbonekaan!</p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto ">
                <?php 
                $sql_b = "SELECT `a`.`id_artikel`, `a`.`foto`, `a`.`judul` FROM `artikel` `a` ORDER BY `a`.`id_artikel` ASC LIMIT 6";
                //echo $sql_b;
                $query_b = mysqli_query($koneksi,$sql_b);
                while($data_b = mysqli_fetch_row($query_b)){
                    $id_artikel = $data_b[0];
                    $foto = $data_b[1];
                    $judul = $data_b[2];
                ?>
                
                <div class="mb-14 p-4 md:w-1/2 lg:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <a href="index.php?include=detail-artikel&data=<?php echo $id_artikel;?>"?>
                        <img src="admin/foto/<?php echo $foto;?>" alt="Product1"></a>
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3"><?php echo $judul;?></h3>
                    <div class="btn-group">
                      <a href="index.php?include=detail-artikel&data=<?php echo $id_artikel;?>"
                       class="text-base font-bold text-white bg bg-primary py-2 px-4 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out mb-5">Baca Artikel</a>
                    </div>
                </div>
            
            <?php }?>
            </div>
    </section>
    <!-- artikel section end -->
    
    <!-- portfolio section start -->
    <section id="product" class="pt-36 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-10">
                    <h4 class="font-semibold text-lg text-primary mb-2">PRODUCT</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4">Contoh Product Kami</h2>
                    <p class="font-medium text-md text-slate-600">Contoh hasil produk kami yang siap dipasarkan ke seluruh indonesia!</p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto ">
                <?php 
                $sql_b = "SELECT `p`.`id_produk`,`p`.`foto`,  `p`.`nama`, `p`.`deskripsi` , `p` . `id_kategori_produk` ,`k` . `kategori_produk` FROM `produk` `p` INNER JOIN `kategori_produk` `k` ON `p`.`id_kategori_produk`=`k`.`id_kategori_produk` ORDER BY `p`.`id_produk` ASC LIMIT 6";
                //echo $sql_b;
                $query_b = mysqli_query($koneksi,$sql_b);
                while($data_b = mysqli_fetch_row($query_b)){
                    $id_produk = $data_b[0];
                    $foto = $data_b[1];
                    $nama_produk = $data_b[2];
                    $deskripsi = $data_b[3];
                    $id_kategori_produk = $data_b[4];
                    $kategori_produk = $data_b[5];
                ?>
                
                <div class="mb-14 p-4 md:w-1/2 lg:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <a href="index.php?include=detail-produk&data=<?php echo $id_produk;?> ">
                        <img src="admin/foto/<?php echo $foto;?>" alt="Product1"></a>
                    </div>
                    <a href="index.php?include=detail-produk&data=<?php echo $id_produk;?> ">
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3"> <u> <?php echo $nama_produk;?> </u> </h3></a>
                    <p class="font-medium text-base text-slate-600 mb-3"><?php echo $kategori_produk;?></p>
                    <!-- <div class="btn-group">
                      <a href="index.php?include=detail-buku&data=<?php //echo $id_produk;?>"
                       class="text-base font-bold text-white bg bg-primary py-2 px-4 rounded-full hover:shadow-lg hover:opacity-80 transition duration-200 ease-in-out mb-5">Detail</a>
                    </div> -->
            
                </div>
                <?php }?>
            </div>
    </section>
   
    <!-- portfolio section end -->

    <!-- client section start -->
    <section id="clients" class="pt-36 pb-32 bg-slate-700">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto text-center mb-10">
                    <h4 class="font-semibold text-lg text-primary mb-2 uppercase">clients</h4>
                    <h2 class="font-bold text-white text-3xl mb-4 lg:text-5xl">Mitra Kerja Sama</h2>
                    <p class="font-medium text-md text-slate-400">SM Toys berupaya memasarkan produknya ke seluruh Indonesia dengan bekerja sama dengan perusahaan terkemuka di Indonesia.</p>
            </div>
            <div class="w-full mx-4 lg:w-max">
            <div class="flex flex-wrap items-center justify-center">
            <?php 
                $sql_c = "SELECT `c`.`id_client`, `c`.`nama`, `c`.`foto` FROM `client` `c` ORDER BY `c`.`id_client`";
                //echo $sql_b;
                $query_c = mysqli_query($koneksi,$sql_c);
                while($data_c = mysqli_fetch_row($query_c)){
                    $id_client = $data_c[0];
                    $nama_client = $data_c[1];
                    $logo_client = $data_c[2];
            ?>
                
                    <a class="max-w-[120px] mx-auto  py-4 grayscale opacity-60 transition duration-200 hover:grayscale-0 hover:opacity-100 lg:mx-auto xl:mx-8">
                        <img src="admin/foto/<?php echo $logo_client;?>" alt="<?php echo $nama_client;?>">
                    </a>
                    <?php }?>
                </div>
            </div>            
        </div>
    </section>
    <!-- client section end -->

    <!-- contact section start
    <section id="contact" class="pt-36 pb-32">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-10">
                    <h4 class="font-semibold text-lg text-primary mb-2 uppercase">contact</h4>
                    <h2 class="font-bold text-dark text-3xl mb-4">Hubungi Kami</h2>
                    <p class="font-medium text-md text-slate-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis quaerat ipsam quas?</p>
                </div>
            </div>

            <form action="">
                <div class="w-full lg:w-2/3 lg:mx-auto">
                <div class="w-full px-4 mb-8">
                    <label for="name" class="text-base text-primary font-bold uppercase">nama</label>
                    <input type="text" id="name" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary">
                </div>
                <div class="w-full px-4 mb-8">
                    <label for="email" class="text-base text-primary font-bold uppercase">email</label>
                    <input type="text" id="email" class="w-full bg-slate-200 text-dark p-3 rounded-md focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary">
                </div>
                <div class="w-full px-4 mb-8">
                    <label for="massage" class="text-base text-primary font-bold uppercase">pesan</label>
                    <textarea type="text" id="name" class="w-full bg-slate-200 text-dark p-3 rounded-md h-32 focus:outline-none focus:ring-primary focus:ring-1 focus:border-primary"></textarea>
                </div>
                <div class="w-full">
                    <button class="text-base font-semibold text-white bg-primary py-3 px-8 rounded-full w-full hover:opacity-80 hover:shadow-lg transition duration-500">kirim</button>
                </div>
                </div>
            </form>
        </div>
    </section>
     contact section end -->

    <!-- footer section start -->
    
    <!-- footer section end -->
    
</body>
</html>