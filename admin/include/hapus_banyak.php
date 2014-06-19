<?php
if($_GET['hal']=="hapus_banyak"){
	$jumlah = count($_POST['item']);
	for($i=0; $i<$jumlah; $i++){
		$id = $_POST['item'][$i];
		mysql_query("delete from riwayat_login where id_riwayat='$id'");
	}
	header ("location:?hal=Riwayat Login");
	exit;
}else if($_GET['hal']=="hapus_banyak_pengunjung"){
	$jumlah = count($_POST['item']);
	for($i=0; $i<$jumlah; $i++){
		$ip = $_POST['item'][$i];
		mysql_query("delete from konter where ip='$ip'");
	}
	header ("location:?hal=Riwayat Pengunjung");
	exit;
}else if($_GET['hal']=="hapus_semua_pengunjung"){
		$query = mysql_query("delete from konter");

	header ("location:?hal=Riwayat Pengunjung");
}else{
	$query = mysql_query("delete from riwayat_login");

	header ("location:?hal=Riwayat Login");
}

?>