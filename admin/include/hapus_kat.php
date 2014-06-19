<?php
$id_kategori=$_GET['id_kategori'];
$hapus=mysql_query("delete from kategori_buku where id_kategori='$id_kategori'");
if($hapus){
	header("location:?hal=Tambah Kategori Buku");
}else{
	echo"<script>alert('Gagal hapus kategori');javascript:history.go(-1)</script>";
}

?>