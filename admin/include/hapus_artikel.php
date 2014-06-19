<?Php
$id_artikel=$_GET['id_artikel'];
$name=$_GET['name'];
//pindah link
$unlink=unlink("artikel/$name");

if($unlink){
	$hapus=mysql_query("delete from artikel where id_artikel='$id_artikel'");
	echo"<meta http-equiv='refresh' content='0; ?hal=Artikel'/>";
}else{
			$hapus=mysql_query("delete from artikel where id_artikel='$id_artikel'");
		echo"<meta http-equiv='refresh' content='0; ?hal=Artikel'/>";	
}

?>