<?php
if($_GET['hal']=='hapus_peminjaman'){

	$id_transaksi=mysql_real_escape_string($_GET['id_transaksi']);
	$hapus=mysql_query("DELETE FROM peminjaman where id_peminjaman='$id_transaksi' limit 1");
	if($hapus){
		echo"<meta http-equiv='refresh' content='0; ?hal=Lihat Pengembalian'/>";
	}else{

		echo"<script>alert('Gagal dihapus');javascript:history.go(-1)</script>";
	}

}else if($_GET['hal']=='hapus_mengembalikan'){
	$id_transaksi=mysql_real_escape_string($_GET['id_transaksi']);
	$hapus=mysql_query("DELETE FROM peminjaman where id_peminjaman='$id_transaksi' limit 1");
	if($hapus){
		echo"<meta http-equiv='refresh' content='0; ?hal=Pengembalian Buku'/>";
	}else{
		echo"<script>alert('Gagal dihapus');javascript:history.go(-1)</script>";

	}	
}else if($_GET['hal']=='hapus_pengunjung_website'){
	$ip_pengunjung=mysql_real_escape_string($_GET['id_pengunjung']);
	$tanggal=mysql_real_escape_string($_GET['tanggal']);
	$hapus=mysql_query("DELETE FROM konter where ip='$ip_pengunjung' and tanggal='$tanggal' limit 1");
	if($hapus){
		echo"<meta http-equiv='refresh' content='0; ?hal=Riwayat Pengunjung'/>";
	}else{
		echo"<script>alert('Gagal dihapus');javascript:history.go(-1)</script>";

	}
}else if($_GET['hal']=='hapus_riwayat'){
	$id_riwayat=mysql_escape_string($_GET['id_riwayat']);
	$hapus=mysql_query("DELETE FROM riwayat_login where id_riwayat='$id_riwayat' limit 1");
	if($hapus){
		echo"<meta http-equiv='refresh' content='0; ?hal=Riwayat Login'/>";
	}else{
		echo"<script>alert('Gagal dihapus');javascript:history.go(-1)</script>";

	}
}else if($_GET['hal']=='hapus_keterlambatan'){
	$id_denda=mysql_escape_string($_GET['id_denda']);
	$hapus=mysql_query("DELETE FROM denda_terlambat where id_denda='$id_denda' limit 1");
	if($hapus){
		echo"<meta http-equiv='refresh' content='0; ?hal=Keterlambatan'/>";
	}else{
		echo"<script>alert('Gagal dihapus');javascript:history.go(-1)</script>";

	}	
}else{
	echo"<script>alert('Halaman tidak ada');javascript:history.go(-1)</script>";
}

?>
