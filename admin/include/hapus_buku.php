<?php
include"koneksi.php";

if($_GET['hal']=='hapus_pengadaan'){
		$id=$_GET['id'];
		$hapus_buku=mysql_query("delete from pengadaan_buku where id_pengadaan='$id'");
		if($hapus_buku){
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengadaan Buku'/>";
			}else{
				echo"<script>alert('gagal dihapus');javascript:history.go(-1)</script>";
		}
}else if($_GET['hal']=='hapus_semua_buku'){
	$jumlah = count($_POST['item']);
	for($i=0; $i<=$jumlah; $i++){
		$id = $_POST['item'][$i];
		mysql_query("delete from buku where id_buku='$id'");
	}
	header ("location:?hal=Lihat Buku");
	exit;
}else if($_GET['hal']=='hapus_buku_masuk'){
	$jumlah = count($_POST['item']);
	for($i=0; $i<=$jumlah; $i++){
		$id = $_POST['item'][$i];
		mysql_query("delete from buku_masuk where id_pemasukan='$id'");
	}
	header ("location:?hal=Buku Masuk");
	exit;
}else{

		$id_buku=$_GET['id_buku'];
		$hapus_buku=mysql_query("delete from buku where buku.id_buku='$id_buku'");
		if($hapus_buku){
			echo"<meta http-equiv='refresh' content='0; ?hal=Buku'/>";
			}else{
				echo"<script>alert('gagal dihapus');javascript:history.go(-1)</script>";
		}



}



?>