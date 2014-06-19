<?php ob_start(); ?>
<?php
session_start();
include"include/koneksi.php";
if(!isset($_SESSION['user'])){
	header("location:../index.php");
}else{
	if($_SESSION['status']==3 or $_SESSION['status']==4){
		header("location:../index.php");
	}else{
$namaku=mysql_fetch_array(mysql_query("select*from petugas where nip='$_SESSION[user]' limit 1"));

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Digital Library</title>
	<link rel="stylesheet" href="css/desain.css" type="text/css" media="screen"/>
	<link rel="shortcut icon" href="../images/katalog.ico" >
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<link href="css/kendo.common.min.css" rel="stylesheet" />
	<link href="css/kendo.default.min.css" rel="stylesheet" />
	<script src="js/kendo.web.min.js"></script>

	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">

	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
   

</head>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">Admin Library</a></h1>
			<h2 class="section_title">SMP Negeri 1 Pedan Klaten</h2><div class="btn_view_site"><a href="../" target="_blank">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo"<a href='?hal=edit_petugas&id=$_SESSION[user]'>$namaku[nama_petugas]</a>";?> </p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Admin Library</a> <div class="breadcrumb_divider"></div> <a class="current"><?php if(empty($_GET['hal'])){echo"Dashboard";}else{echo"$_GET[hal]";}?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<?php
			$query = mysql_fetch_array(mysql_query("select denda_terlambat from pengaturan"));
		?>
		<p style="color:red; font-weight:bold;">Denda Peminjaman Rp. <?php echo"$query[denda_terlambat]";?> /hari</p>
		<hr/>
		<h3>Sekolah</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="?hal=Visi Misi">Visi dan Misi</a></li>
			<li class="icn_photo"><a href="?hal=Galeri">Galeri</a></lir>
			<li class="icn_categories"><a href="?hal=Petunjuk">Petunjuk</a></li>
			<li class="icn_tags"><a href="?hal=Slider">Slider</a></li>
		</ul>
		<h3>Katalog</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="?hal=Buku">Buku</a></li>
			<li class="icn_tags"><a href="?hal=Buku Masuk">Buku Masuk</a></li>
			<li class="icn_new_article"><a href="?hal=Artikel">Artikel</a></li>
			<li class="icn_tags"><a href="?hal=Pengadaan Buku">Pengadaan Buku</a></li>		
		</ul>
		<h3>User</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="?hal=Siswa">Siswa</a></li>
			<li class="icn_add_user"><a href="?hal=Guru">Guru</a></li>
			<li class="icn_view_users"><a href="?hal=Petugas">Petugas</a></li>
			<li class="icn_view_users"><a href="?hal=Pengunjung" target="_blank">Riwayat Pengunjung</a></li>
		</ul>
		<h3>Transaksi</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><a href="?hal=Peminjaman" target="_blank">Peminjaman</a></li>
			<li class="icn_settings"><a href="?hal=Pengembalian Buku" target="_blank">Pengembalian</a></li>
			<li class="icn_settings"><a href="?hal=History Peminjaman">Riwayat Peminjaman</a></li>
			<li class="icn_settings"><a href="?hal=Kasus">Kasus</a></li>
			<li class="icn_settings"><a href="?hal=Pengaturan">Pengaturan</a></li>
		</ul>
		<h3>Laporan</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="?hal=Laporan">Data</a></li>
		</ul>
		<h3>Statistik</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><a href="?hal=Statistik Peminjam">Peminjam</a></li>
			<li class="icn_jump_back"><a href="?hal=Statistik Pengunjung">Pengunjung</a></li>
		</ul>
		<h3>Monitoring</h3>
		<ul class="toggle">
			<?php
			if($namaku[kategori_petugas]==1){
			?>
			<li class="icn_settings"><a href="?hal=Riwayat Pengunjung">Riwayat pengunjung Website</a></li>
			<li class="icn_security"><a href="?hal=Riwayat Login">Riwayat masuk</a></li>
			<?php
			}
			?>
			<li class="icn_jump_back"><a href="include/logout.php">Keluar</a></li>
		</ul>
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2014 Digital Library</strong></p>
			<p>powered by <a href="http://www.facebook.com/rizal.efendi.161" target="_blank">Rizal Efendi</a></p>
		</footer>
		
		
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		
		
		<?php
		if(empty($_GET['hal'])){
			include"include/utama.php";
		}else{
			include"include/switch.php";
		}

		?>
		<div class="spacer"></div>
	</section>


</body>

</html>
<?php
	}
}

?>

