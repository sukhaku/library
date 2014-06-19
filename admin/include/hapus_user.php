<?php
$id=$_GET['id'];
if($_GET['hal']=='hapus_siswa')
{
		$hapus=mysql_query("DELETE FROM siswa where nis='$id'");
		if($hapus){
			echo"<meta http-equiv='refresh' content='0; ?hal=Siswa'/>";
			}else{
			 echo"<script>alert('gagal dihapus');javascript:history.go(-1)</script>";

		}
}else if($_GET['hal']=='hapus_guru')
{
		$hapus=mysql_query("DELETE FROM siswa where nis='$id'");
		if($hapus){
			echo"<meta http-equiv='refresh' content='0; ?hal=Guru'/>";
			}else{
			 echo"<script>alert('gagal dihapus');javascript:history.go(-1)</script>";

		}		
}else if($_GET['hal']=='hapus_petugas'){
$hapus=mysql_query("delete from petugas where nip='$id'");
		if($hapus){
			echo"<meta http-equiv='refresh' content='0; ?hal=Petugas'/>";
			}else{
			 echo"<script>alert('gagal dihapus');javascript:history.go(-1)</script>";
		}

}else if($_GET['hal']=='hapus_pengunjung'){
	$nis=$_GET['nis'];
	$tahun=$_GET['tahun'];
	$hapus=mysql_query("delete from pengunjung where nis='$nis' and tahun='$tahun'");
		if($hapus){
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengunjung'/>";
			}else{
			 echo"<script>alert('gagal dihapus');javascript:history.go(-1)</script>";
		}
}else if($_GET['hal']=='hapus_pengunjung_detail'){
	$nis=$_GET['nis'];
	$tanggal=$_GET['tanggal'];
	$tahun=$_GET['tahun'];
	$hapus=mysql_query("delete from pengunjung where nis='$nis' and tanggal='$tanggal'");
		if($hapus){
			echo"<meta http-equiv='refresh' content='0; ?hal=Detail Pengunjung&nis=$nis&tahun=$tahun'/>";
			}else{
			 echo"<script>alert('gagal dihapus');javascript:history.go(-1)</script>";
		}
}else if($_GET['hal']=='delete_siswa_all'){
	$jumlah = count($_POST['item']);
	for($i=0; $i<=$jumlah; $i++){
		$nis = $_POST['item'][$i];
		mysql_query("delete from siswa where nis='$nis'");
	}
	header("location:?hal=Siswa");
	exit;
}else{

}	


?>