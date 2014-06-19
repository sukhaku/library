<?php
session_start();
include"include/koneksi.php";
include"include/conter.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Digital Library</title>

<!-- CSS ==================================================
================================================== -->

<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/screen.css">
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
<style type="text/css">
.scrolltop {
  display: none;
  background: url(images/scrolltop.png) no-repeat;
  width: 44px;
  height: 44px;
  position: fixed;
  right: 70px;
  bottom: 30px;
  cursor: pointer;
  }
</style>
<!-- Favicons ==================================================
================================================== -->
<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script> 
<link rel="shortcut icon" href="images/katalog.ico">


<script type="text/javascript">
$(document).ready(function(){ 
    $(window).scroll(function(){
    if ($(this).scrollTop() > 80) {
    $(".scrolltop").fadeIn();
    } 
    else {
    $(".scrolltop").fadeOut();
    }
    });
    $(".scrolltop").click(function(){
    $("html, body").animate({ scrollTop: 0 }, 'slow');
    });
});
</script>
<!-- Google Fonts ==================================================
================================================== -->

<link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

<body>

<!-- Home Awal ==================================================
================================================== -->
<div id="header">
  <div class="container header"> 
    <!-- Header | Logo, Menu
		================================================== -->
      <header>
      <div class="logo"><a href="http://digilib-smpn1pedan.web.id"><img src="images/smp.png" alt="" /></a></div>
      <div class="mainmenu">
        <div id="mainmenu">
          <ul class="sf-menu">
            <li><a href="index.php" id='<?php if(empty($_GET['hal'])){echo "visited";};?>'><span class="home"><img src="images/home.png" alt="" /></span>Beranda</a></li>
            <li><a href="#" id='<?php if($_GET['hal']=='profil'){echo "visited";}else if($_GET['hal']=='galeri'){echo "visited";}else{}?>'><span class="home"><img src="images/about.png" alt="" /></span>Profil</a>
                <ul>
                  <li><a href="?hal=profil">Visi Misi</a></li>
                  <li><a href="?hal=galeri">Galeri</a></li>
                </ul>  
            </li>
            <li><a href="" id='<?php if($_GET['hal']=='petunjuk'){echo "visited";}else{}?>'><span class="home"><img src="images/features.png" alt="" /></span>Petunjuk</a>
                <ul>
                <li><a href="?hal=petunjuk">Peminjaman</a></li>
                <li><a href="include/USER MANUAL Pengguna.pdf" target="_blank">user manual anggota</a></li>
                 <?php
                if($_SESSION['status']==1 or $_SESSION['status']==2){
                     echo"<li><a href='include/USER MANUAL Pustakawan.pdf' target='_blank'/>user manual petugas</a></li>";
                }
                ?>
              </ul>

            </li>
            <li><a href="?hal=contact" id='<?php if($_GET['hal']=='contact'){echo "visited";}else{}?>'><span class="home"><img src="images/contact.png" alt="" /></span>Kontak</a></li>
       
       
            
            <?php
            if(!isset($_SESSION['user'])){
              
            ?>
            <li><a href="include/katalog.php" id='<?php if($_GET['hal']=='detail_buku'){echo "visited";}else{}?>'><span class="home"><img src="images/portfolio.png" alt="" /></span>Katalog</a></li>
            <li><a href="include/login.php"><span class="home"><img src="images/about.png" alt="" /></span>Masuk</a></li>
            <?php
            }else{
           
            ?>
            <li><a href="include/katalog.php" id='<?php if($_GET['hal']=='artikel'){echo "visited";}?>'><span class="home"><img src="images/portfolio.png" alt="" /></span>Katalog</a>
              <ul>
                <li><a href="include/katalog.php">Buku</a></li>
                <li><a href="?hal=artikel">Artikel</a></li>
              </ul>

            </li>
            <li><a href="#" id='<?php if($_GET['hal']=='profil_anggota'){echo "visited";}else if($_GET['hal']=='riwayat_transaksi'){echo"visited";}else if($_GET['hal']=='keterlambatan'){echo"visited";}else if($_GET['hal']=='riwayat_kasus'){echo"visited";}?>'><span class="home"><img src="images/features.png" alt="" /></span>User</a>
              
              <ul>
                <?php
                if($_SESSION['status']==1 or $_SESSION['status']==2){
                     echo"<li><a href=admin/>Halaman Petugas</a></li>";
                     echo"<li><a href=include/logout.php>Keluar</a></li>";     
                }else{
                ?>
                <li><a href="?hal=profil_anggota">Profil Diri</a></li>
                <li><a href="?hal=riwayat_transaksi">Riwayat Transaksi</a></li>
                <li><a href="include/logout.php">Keluar</a></li>
                <?php  
                }
                ?>
              </ul>

            </li> 
            <?php
            }
            ?>

          </ul>
        </div>
        
        <!-- Menu -->
        
       
      </div>
    </header>
  </div>
</div>
<!-- Slider ==================================================
================================================== -->
<?php
if(empty($_GET['hal'])){
?>
<div class="flexslider">
  <ul class="slides">
  <?php
  include"include/koneksi.php";
  $slider=mysql_query("select*from slider order by id_slider desc limit 5");
  while($tampil=mysql_fetch_array($slider)){
  ?>
    <li> <a href="#"><img src="images/flexslider/<?php echo"$tampil[name]"; ?>" alt=""/></a>
     <!--<p class="flex-caption"></p>-->
    </li>
<?php
}
?>
  
  </ul>
</div>
<!-- awal cotainer ==================================================
================================================== -->
<div class="blankSeparator"></div>
<div class="container">
  <div class="info">
    <div class="one_third">
      <h2>Katalog</h2>
      <p>Kumpulan <span class="red">Buku-buku</span> <span class="green">Perpustakaan SMP Negeri 1 Pedan Klaten </span>.</p>
      <a href="include/katalog.php" title="" class="buttonhome">&rarr; Lihat</a> </div>
    <div class="two_third lastcolumn">
      <div class="one_half">
        <h2>Download</h2>
        <p>Kumpulan<span class="red"> Artikel, Jurnal </span><span class="green"> Perpustakaan SMP Negeri 1 Pedan Klaten</span>.</p>
      <?php
        if(empty($_SESSION['user'])){
      ?>
        <a href="include/login.php" title="" class="buttonhome">&rarr; Download</a> 
      <?php
      }else{
        echo"<a href='?hal=artikel' title='' class='buttonhome'>&rarr; Download</a>";   
      }
      ?>  
      </div>
      <div class="one_half lastcolumn">
        <h2>SMP Negeri 1 Pedan</h2>
        <p>"Unggul dalam<span class="red"> prestasi, berbudi luhur</span> serta menguasai<span class="green"> IPTEK</span></p>
        <a href="?hal=galeri" title="" class="buttonhome">&rarr; Lihat</a> </div>
    </div>
  </div>
</div>
<!-- akhir -->  

<!-- Home Content Part - Box Three ==================================================
================================================== -->
<div class="container boxthree">
  <div class="sepContainer1"><!-- --></div>
  <div class="blankSeparator"></div>
  <div class="one_third">
     <section class="boxthreeleft"> <img src="images/home/library.jpg" alt=""/>
      <h3>Digital Library</h3>
      <p>Perpustakaan SMP N 1 Pedan Klaten</p>
      <a class ="simple" href="?hal=galeri">+ Lebih lanjut</a> </section>
  </div>
  <!-- one-third column ends here -->
  <div class="one_third">
    <section class="boxthreecenter"> <img src="images/home/depan.jpg" alt=""/>
      <h3>Sekolah</h3>
      <p>SMP N 1 Pedan Klaten</p>
      <a class ="simple" href="?hal=profil">+ Lebih lanjut</a> </section>
  </div>
  <!-- one-third column ends here -->
  <div class="one_third lastcolumn">
    <section class="boxthreeright"> <img src="images/home/test.jpg" alt=""/>
      <h3>Siswa</h3>
      <p>Kegiatan siswa SMP N 1 Pedan Klaten</p>
      <a class ="simple" href="?hal=galeri">+ Lebih lanjut</a> </section>
  </div>
  <!-- one-third column ends here --> 
</div>
<!-- container ends here -->
<?php
}else{
  include"include/switch.php";
}
?>
<div class="blankSeparator1"></div>

<!--Footer ==================================================
================================================== -->
<div id="footer">
  <div class="container footer">
    <div class="one_fourth">
      <h3>Digital Library</h3>
      <div id="tweets">Sistem Informasi Perpustakaan yang dibuat agar memudahkan dalam managemen Perpustakaan SMP Negeri 1 Pedan Klaten</div>
    </div>
    <div class="one_fourth">
      <h3>Menu</h3>
      <ul>
        <li class="lines"><a href="index.php" title="">Beranda</a></li>
        <li class="lines"><a href="?hal=profil" class="">Profil</a></li>
        <li class="lines"><a href="?hal=galeri" class="">Galeri</a></li>
        <li class="lines"><a href="?hal=petunjuk" class="">Petunjuk</a></li>
        <li class="lines"><a href="include/katalog.php" class="">Katalog</a></li>
      </ul>
    </div>
    <div class="one_fourth">
      <h3>Link</h3>
      <ul>
        <li class="lines"><a href="http://digilib.ittelkom.ac.id/" class="" target="_blank">Digilib IT Telkom</a></li>
        <li class="lines"><a href="http://digilib.itb.ac.id/" class="" target="_blank">Digilib ITB</a></li>
        <li class="lines"><a href="http://dglib.uns.ac.id/" class="" target="_blank">Digilib UNS</a></li>
        <li class="lines"><a href="http://lontar.ui.ac.id/" class="" target="_blank">Digilib UI</a></li>
        <li class="lines"><a href="http://digilib.its.ac.id/" class="" target="_blank">Digilib ITS</a></li>
      </ul>
    </div>
    <div class="one_fourth lastcolumn">
      <h3>Alamat</h3>
      <p>Jalan Gelora Pemuda Pedan<br>
      Klaten, Jawa Tengah<br>
      Telp : 0272897460</p>
      <p>Visit <a href="http://digilib-smpn1pedan.web.id" target="_blank">Digital Library </a>SMP Negeri 1 Pedan Klaten. <a href='?hal=sitemap'>Sitemap</a></p>
    </div>
  </div>
  <!-- container ends here --> 
</div>
<!-- footer ends here --> 
<!-- Copyright ==================================================
================================================== -->
<div id="copyright">
  <div class="container">
    <div class="eleven columns alpha">
      <p class="copyright">&copy; Copyright 2014. &quot;Digital Library SMP Negeri 1 Pedan Klaten&quot; by <a href="http://www.facebook.com/rizal.efendi.161" target="_blank">Rizal Efendi</a>. All rights reserved.</p>
    </div>
    <div class="five columns omega">
      <section class="socials">
        <ul class="socials fr">
          <li><a href="http://twitter.com" target="_blank"><img src="images/socials/twitter.png" class="poshytip" title="Twitter"  alt="" /></a></li>
          <li><a href="http://twitter.com" target="_blank"><img src="images/socials/facebook.png" class="poshytip" title="Facebook" alt="" /></a></li>
          <li><a href="http://accounts.google.com" target="_blank"><img src="images/socials/google.png" class="poshytip" title="Google" alt="" /></a></li>
        </ul>
      </section>
    </div>
  </div>
  <!-- container ends here --> 
</div>
<!-- copyright ends here --> 
<!-- End Document
================================================== --> 
<!-- Scripts ==================================================
================================================== --> 

<!-- Main js files --> 
<script src="js/screen.js" type="text/javascript"></script> 
<!-- Tooltip --> 
<script src="js/poshytip-1.0/src/jquery.poshytip.min.js" type="text/javascript"></script> 
<!-- Tabs --> 
<script src="js/tabs.js" type="text/javascript"></script> 
<!-- Tweets --> 
<script src="js/jquery.tweetable.js" type="text/javascript"></script> 
<!-- Include prettyPhoto --> 
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script> 
<!-- Include Superfish --> 
<script src="js/superfish.js" type="text/javascript"></script> 
<script src="js/hoverIntent.js" type="text/javascript"></script> 
<!-- Flexslider --> 
<script src="js/jquery.flexslider-min.js" type="text/javascript"></script> 
<script type="text/javascript" src="js/modernizr.custom.29473.js"></script>
</head>
 <div class="scrolltop"></div>
</body>
</html>