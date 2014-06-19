<article class="module width_full">
		<header><h3>Pengaturan Peminjaman</h3></header>
		<div class="module_content">

<?php
$id_pengaturan=$_GET['id_pengaturan'];

if($_GET['hal']=='ubah_status_aktif'){
	$ambil=mysql_num_rows(mysql_query("select*from pengaturan where status_pengaturan='1'"));
	if($ambil>1){
		$ubah=mysql_query("UPDATE pengaturan set status_pengaturan='0' where id_pengaturan='$id_pengaturan'");
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
	
	}else{
		echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
	}

}else if($_GET['hal']=='ubah_status_non'){
		$ubah=mysql_query("UPDATE pengaturan set status_pengaturan='1' where id_pengaturan='$id_pengaturan'");
		if($ubah){
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
		}

}else if($_GET['hal']=='hapus_pengaturan'){
	$ambil=mysql_num_rows(mysql_query("select*from pengaturan where status_pengaturan='1'"));
	$ambil_non=mysql_num_rows(mysql_query("select*from pengaturan where status_pengaturan='0'"));
	if($ambil>1){
		$hapus_pengaturan=mysql_query("DELETE from pengaturan where id_pengaturan='$id_pengaturan'");
		if($hapus_pengaturan){
				echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
			
		}else{
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
		}
	}else if($ambil_non>=1){
		$hapus_pengaturan=mysql_query("DELETE from pengaturan where id_pengaturan='$id_pengaturan'");
		if($hapus_pengaturan){
				echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
			
		}else{
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
		}
	}else{
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
	}	

}else if($_GET['hal']=='Tambah Pengaturan'){
	if(isset($_POST['tambah'])){
		$buku=$_POST['buku'];
		$denda=$_POST['denda'];
		$denda_max=$_POST['denda_max'];
		$hari=$_POST['hari'];

		$input=mysql_query("INSERT INTO pengaturan values('','$buku','$hari','$denda','$denda_max','0')");
		if($input){
					echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
		}else{

		}

			
	}

?>
<script src="js/jquery.maskedinput.js"></script>
<script type="text/javascript">
 $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();		
		        });
      $(document).ready(function() {
        $("#buku").mask("9")
        $("#hari").mask("9")
         
      });
</script> 
<form action="?hal=Tambah Pengaturan" method="post" id="validasiform" class="form_tambah_user">
						<table cellpadding='10'>
							<tr>
								<th align="left">Maksimal Peminjaman Buku</th>
								<td><input type="text" name="buku" class="k-textbox" id="buku" required validationMessage="Harus diisi dan hanya angka">
							</tr>
							<tr>
								<th align="left">Maksmimal Hari Peminjaman</th>
								<td><input type="text" name="hari" class="k-textbox" id="hari" required validationMessage="Harus diisi dan hanya angka">
							</tr>		
							<tr>
								<th align="left">Denda Keterlambatan</th>
								<td><input type="text" name="denda" class="k-textbox" pattern="[0-9]*" required validationMessage="Harus diisi dan hanya angka">
							</tr>
							<tr>
								<th align="left">Denda Maksimal</th>
								<td><input type="text" name="denda_max" class="k-textbox" pattern="[0-9]*" required validationMessage="Harus diisi dan hanya angka">
							</tr>
							<tr>
								<td colspan='2'><button type='submit' class='k-button' name="tambah">Simpan</button> <input type='reset'  class='k-button' value="Ulang"></td>
							</tr>	
						</table>	

					</form>



<?php
}else if($_GET['hal']=='edit_pengaturan'){

	if(isset($_POST['ubah'])){
		$id=$_POST['id_pengaturan'];
		$buku=$_POST['buku'];
		$denda=$_POST['denda'];
		$denda_max=$_POST['denda_max'];
		$hari=$_POST['hari'];

		$ubah=mysql_query("UPDATE pengaturan set max_buku='$buku',max_hari_pinjam='$hari',denda_terlambat='$denda',denda_max='$denda_max' where id_pengaturan='$id'");
		if($ubah){
				echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
		}else{
			echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
		}
	}

$ambil_pengaturan=mysql_fetch_array(mysql_query("select*from pengaturan where id_pengaturan='$id_pengaturan'"));	
?>
<script src="js/jquery.maskedinput.js"></script>
<script type="text/javascript">
 $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();		
		        });
      $(document).ready(function() {
        $("#buku").mask("9")
        $("#hari").mask("9")
        $("#denda").mask("9999") 
      });
</script> 
<form action="?hal=edit_pengaturan" method="post" id="validasiform" class="form_tambah_user">
						<table cellpadding='10'>
							<tr>
								<input type='hidden' value='<?php echo"$id_pengaturan";?>'name='id_pengaturan'>
								<th align="left">Maksimal Peminjaman Buku</th>
								<td><input type="text" name="buku" class="k-textbox" value='<?php echo"$ambil_pengaturan[max_buku]";?>' pattern="[0-9]*" required validationMessage="Harus diisi dan hanya angka">
							</tr>
							<tr>
								<th align="left">Maksmimal Hari Peminjaman</th>
								<td><input type="text" name="hari" class="k-textbox" value='<?php echo"$ambil_pengaturan[max_hari_pinjam]";?>' pattern="[0-9]*" required validationMessage="Harus diisi dan hanya angka">
							</tr>		
							<tr>
								<th align="left">Denda Keterlambatan</th>
								<td><input type="text" name="denda" class="k-textbox" value='<?php echo"$ambil_pengaturan[denda_terlambat]";?>' pattern="[0-9]*" required validationMessage="Harus diisi dan hanya angka">
							</tr>
							<tr>
								<th align="left">Denda Maksimal</th>
								<td><input type="text" name="denda_max" class="k-textbox" value='<?php echo"$ambil_pengaturan[denda_max]";?>' pattern="[0-9]*" required validationMessage="Harus diisi dan hanya angka">
							</tr>
							<tr>
								<td colspan='2'><button type='submit' class='k-button' name="ubah">Simpan</button> <input type='reset'  class='k-button' value="reset"></td>
							</tr>	
						</table>	





<?php
}else{
		echo"<meta http-equiv='refresh' content='0; ?hal=Pengaturan'/>";
}	
?>			


		</div>


</article>			