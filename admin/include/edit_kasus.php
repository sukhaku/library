<?php
if($_GET['hal']=='tambah_kasus'){
	if(isset($_POST['input'])){
			$nis=$_POST['id_siswa'];
			$kode_buku=$_POST['kode_buku'];
			$tgl_kasus = date("Y-m-d");
			$kasus = $_POST['kasus'];
			$cek_nis=mysql_num_rows(mysql_query("select nis from siswa where nis='$nis'"));
			$cek_kode_buku=mysql_num_rows(mysql_query("select id_buku from buku where id_buku='$kode_buku'"));
			if($cek_nis<1){
				echo"<script type='text/javascript'>alert('ID anggota tidak ada')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Kasus'/>";
			}else if($cek_kode_buku<1){
				echo"<script type='text/javascript'>alert('kode buku tidak ada')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Kasus'/>";
			}else{
				$query = mysql_query("insert into kasus values('','$nis','$kode_buku','$kasus','$tgl_kasus')");
				if($query){
				echo"<script type='text/javascript'>alert('Berhasil')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Kasus'/>";
				}else{
				echo"<script type='text/javascript'>alert('Gagal')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Kasus'/>";	
				}
			}
		}	
}else if($_GET['hal']=='hapus_kasus'){
	$id_kasus = $_GET['id_kasus'];
	$query = mysql_query("delete from kasus where id_kasus='$id_kasus'");
				if($query){
				echo"<script type='text/javascript'>alert('Berhasil')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Kasus'/>";
				}else{
				echo"<script type='text/javascript'>alert('Gagal')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Kasus'/>";	
				}
}else if($_GET['hal']=='Ubah Kasus'){
?>
	


<?php
}else{
	echo"halaman tidak tersedia";
}


?>