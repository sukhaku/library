<?php
include"include/riwayat.php";
include"include/class_paging.php";
$id_buku=mysql_real_escape_string($_GET['id']);
$hitung_buku=mysql_fetch_array(mysql_query("select SUM(stok) as total_buku from buku")); 
$ambil_buku=mysql_fetch_array(mysql_query("select*from buku,kategori_buku where buku.id_kategori=kategori_buku.id_kategori and buku.id_buku='$id_buku'"));            
?>
<link rel="stylesheet" type="text/css" href="css/paging3.css">
<div class="blankSeparator"></div>
<div class="container singleblog"> 
  <!-- Blog Post ==================================================
================================================== -->
  <div class="two_third">

<section class="postone">
      <h2>Detail Buku</h2>
      <p class="meta"> <span class="left">Total: <strong><?php echo"$hitung_buku[total_buku]";?> Buku</strong></span> <span class="left">SMP N 1 Pedan<strong></strong></span>
        <span class="left comment"> <a href="#" title="">Kumpulan Buku Digilib SMP N 1 Pedan</a></span>
      </p>  
      <h4>Kode Buku : <?php echo "$ambil_buku[id_buku]";?> </h4>
      <h4>Klarifikasi Buku : <?php echo "$ambil_buku[kode_klarifikasi]";?> </h4>
      <h4>Judul : <?php echo "$ambil_buku[judul_buku]";?></h4>
      <h4>Penerbit : <?php echo "$ambil_buku[penerbit]";?></h4>
      <h4>Tahun Terbit : <?php echo "$ambil_buku[tahun_terbit]";?></h4>
      <h4>Pengarang : <?php echo "$ambil_buku[pengarang]";?></h4>
      <h4>Kategori : <?php echo "$ambil_buku[nama_kategori]";?></h4>
      <h4>Tersedia : <?php echo "$ambil_buku[stok] Buku";?></h4>
      
      
       
     
    </section>




  </div>

  <div class="one_third lastcolumn sidebar">
    <section class="first">
      <h3>Katalog</h3>
      <div class="boxtwosep"></div>
      <ul class="blogList">
        <li><a class="about" href="include/katalog.php" title="">Buku</a></li>
      </ul>
    </section>
   
   
    
  </div>
  <!-- one_third ends here --> 
</div>
<!-- container ends here -->
<div class="blankSeparator2"></div>  