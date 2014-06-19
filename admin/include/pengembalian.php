<?php
$id_peminjaman=mysql_escape_string(($_GET['id_peminjaman']));
$back=gmdate('Y-m-d',time()+60*60*7);


	//untuk mengambil jumlah yang dipinjam
	$ambil_pinjam=mysql_query("select id_buku,jumlah,tanggal_kembali from peminjaman where id_peminjaman='$id_peminjaman'");
	$tampil_pinjam=mysql_fetch_array($ambil_pinjam);


	//mengambil selisih antara tanggal kembali buku dan tanggal seharusnya kembali
	$tanggal_sekarang=gmdate('Y-m-d',time()+60*60*7); 
	$tanggal_harus_kembali=$tampil_pinjam['tanggal_kembali']; 
	$selisih_tanggal_pinjam=(strtotime($tanggal_harus_kembali)-strtotime($tanggal_sekarang))/(60*60*24);

	//jumlah buku yang dipinjam
	$jumlah_kembali=$tampil_pinjam['jumlah'];
   

	//untuk update stok buku setelah pengembalian
	$id_buku=$tampil_pinjam['id_buku'];
	$ambil_stok=mysql_query("select stok from buku where id_buku='$id_buku'");
	$tampil_stok=mysql_fetch_array($ambil_stok);
	$stok=$tampil_stok['stok'];

	$stok_buku_now=$stok + $jumlah_kembali;
	$update_stok=mysql_query("update buku set stok='$stok_buku_now' where id_buku='$id_buku'");
	

		if($selisih_tanggal_pinjam<0){
			//untuk menghitung jumlah hari minggu /*
			$hari_ini=date("Y-m-d");
			$hari_selanjutnya=$tanggal_harus_kembali;
			$explode=explode("-",$hari_selanjutnya);
			$bulan=$explode[1];
			$tahun=$explode[0];
			$tanggal=$explode[2];

			$selisih=mysql_fetch_array(mysql_query("select datediff('$hari_ini','$hari_selanjutnya') as selisih"));
			$selisihe=$selisih['selisih'];

			for($i=0; $i<$selisihe; $i++){

				$minggu= date("Y-m-d", mktime(0, 0, 0, $bulan, $tanggal+$i, $tahun ));

				if(date("w", mktime(0, 0, 0, $bulan, $tanggal+$i, $tahun))==0){
					$hitung[]=$minggu;
				}
			}
				$sudo = count($hitung);
				$konvert = $selisih_tanggal_pinjam*-1;
			//akhir hitung jumlah hari minggu */ 
					
				$jumlah_terlambat=$konvert-$sudo;	
			if($jumlah_terlambat>0){
				$update_data=mysql_query("update peminjaman set status_peminjaman='0',tanggal_kembali='$tanggal_sekarang' where id_peminjaman='$id_peminjaman'");
				$ambil_peraturan_denda=mysql_fetch_array(mysql_query("select*from pengaturan where status_pengaturan='1'"));
				$bayar=$ambil_peraturan_denda['denda_terlambat'];
				$denda=$bayar*$jumlah_terlambat*$jumlah_kembali;
				$input_terlambat=mysql_query("insert into denda_terlambat values('NULL','$id_peminjaman','$jumlah_terlambat','$denda')");
				echo"<script>alert('Terlambat mengembalikan !!')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Pengembalian Buku'/>";}
		}else{
			$update_data=mysql_query("update peminjaman set status_peminjaman='0',tanggal_kembali='$tanggal_sekarang' where id_peminjaman='$id_peminjaman'");
			echo"<script>alert('Berhasil dikembalikan')</script>";
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengembalian Buku'/>";
		}	


?>