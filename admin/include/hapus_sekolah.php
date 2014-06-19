<?php
if($_GET['hal']=='hapus_petunjuk')
{
	$id=$_GET['id_petunjuk'];
	$hapus=mysql_query("delete from petunjuk where id_petunjuk='$id'");
	if($hapus){
		echo"<script>alert('Berhasil dihapus')</script>";
		echo"<meta http-equiv='refresh' content='0; ?hal=Petunjuk'";
	}else{
		echo"<script>alert('Gagal dihapus');javascript;history.go(-1)</script>";
	}
}else if($_GET['hal']=='hapus_galeri'){
	$id=$_GET['id_galeri'];
	$name=$_GET['name'];
	//pindah link
	$unlink=unlink("../images/Galeri/$name");
	if($unlink){
		$hapus=mysql_query("delete from gallery where id_gallery='$id'");
		if($hapus){
			echo"<script>alert('Berhasil dihapus')</script>";
			echo"<meta http-equiv='refresh' content='0; ?hal=Galeri'";
		}else{
			echo"<script>alert('Gagal dihapus');javascript;history.go(-1)</script>";
		}
	}else{echo'gagal';}	
}else if($_GET['hal']=='hapus_profil'){
	$id=$_GET['id_profil'];
	$hapus=mysql_query("delete from profil where id_profil='$id'");
	if($hapus){
		echo"<script>alert('Berhasil dihapus')</script>";
		echo"<meta http-equiv='refresh' content='0; ?hal=Visi Misi'";
	}else{
		echo"<script>alert('Gagal dihapus');javascript;history.go(-1)</script>";
	}
}else if($_GET['hal']=='hapus_slider'){
	$id=$_GET['id_slider'];
	$name=$_GET['name'];
	//pindah link
	$unlink=unlink("../images/flexslider/$name");
	if($unlink){
		$hapus=mysql_query("delete from slider where id_slider='$id'");
		if($hapus){
			echo"<script>alert('Berhasil dihapus')</script>";
			echo"<meta http-equiv='refresh' content='0; ?hal=Slider'";
		}else{
			echo"<script>alert('Gagal dihapus');javascript;history.go(-1)</script>";
		}
	}else if(empty($unlink)){
		$hapus=mysql_query("delete from slider where id_slider='$id'");
		if($hapus){
			echo"<script>alert('Berhasil dihapus')</script>";
			echo"<meta http-equiv='refresh' content='0; ?hal=Slider'";
		}else{
			echo"<script>alert('Gagal dihapus');javascript;history.go(-1)</script>";
		}
	}else{
		
	}	
}else{
	echo"halaman tidak ditemukan";
}


?>