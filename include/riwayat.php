<?php
$nis=$_SESSION['user'];
$hitung_transaksi=mysql_num_rows(mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and siswa.nis='$nis'"));
$hitung_terlambat=mysql_num_rows(mysql_query("SELECT * FROM peminjaman, denda_terlambat WHERE peminjaman.id_peminjaman = denda_terlambat.id_peminjaman AND nis = '$nis'"));

?>