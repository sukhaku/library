 <link href="css/kendo.common.min.css" rel="stylesheet" />
		      <link href="css/kendo.default.min.css" rel="stylesheet" />
		      <script src="js/kendo.web.min.js"></script>
		      <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();	
		          $("#nomor").kendoNumericTextBox();	
		        });
		        </script>

<?php
$kode_buku=$_GET['id_buku'];
$data_buku=mysql_query("select*from buku where id_buku='$kode_buku'");
$ambil_buku=mysql_fetch_array($data_buku);

if(isset($_POST['ubah'])){
	$id_buku=$_POST['id_buku'];
	$judul=$_POST['judul'];
	$pengarang=$_POST['pengarang'];
	$tahun_terbit=$_POST['tahun_terbit'];
	$penerbit=$_POST['penerbit'];
	$stok=$_POST['stok'];
	$id_kategori=$_POST['kategori'];

	$ubah_buku=mysql_query("UPDATE buku SET id_kategori='$id_kategori',stok='$stok',judul_buku='$judul',pengarang='$pengarang',tahun_terbit='$tahun_terbit',penerbit='$penerbit' where id_buku='$id_buku'");
	if($ubah_buku){
		echo"<meta http-equiv='refresh' content='0; index.php?hal=Buku'/>";
	}else{
		echo"<script>alert('gagal diubah');javascript:history.go(-1)</script>";
	}

}else{


?>
<html>
<head>
</head>
<body>
<article class="module width_full">
	<header><h3>Edit Buku</h3></header>
	<div class="module_content">
<form action="?hal=edit_buku" method="post">

<table class='table table-bordered' id='pelabelan_isi' cellpadding='10' cellspacing='10'>
			
			<input type='hidden' class="k-textbox" name='id_buku' value='<?php echo"$ambil_buku[id_buku]";?>'>
			<tr class='info'>
				<td>Judul</td>
				<td><input type='text' style="width:400px;" class="k-textbox" name='judul' value='<?php echo"$ambil_buku[judul_buku]";?>'></td>
			</tr>
			<tr class='info'>
				<td>Pengarang</td>
				<td><input type='text' class="k-textbox" name='pengarang' value='<?php echo"$ambil_buku[pengarang]";?>'></td>
			</tr>
			<tr class='info' >
				<td>Tahun Terbit</td>
				<td>
					<select name="tahun_terbit" class="k-textbox">
						<?php
						$tahun_saat_terbit=$ambil_buku['tahun_terbit'];
						$tahun_sekarang=gmdate("Y",time()+60*60*7);
						for($tahun=1990; $tahun<=$tahun_sekarang; $tahun++){
							if($tahun_saat_terbit==$tahun){
								echo"<option value='$tahun' selected>$tahun</option>";
							}else{
								echo"<option value='$tahun'>$tahun</option>";
							}
						}
						?>
					</select>
				</td>
			</tr>
			<tr class='info'>
				<td>Penerbit</td>
				<td><input type='text' class="k-textbox" name='penerbit' value='<?php echo"$ambil_buku[penerbit]";?>'></td>
			</tr>
			<tr class='info'>
				<td>Stok</td>
				<td>
					<select name='stok' class="k-textbox">
						<option value='1'></option>
						<?php
						$jum=$ambil_buku['stok']; 
						if($jum==1){
							echo "<option value='$jum' selected>$jum</option>";
							echo "<option value='0' >0</option>";	
						}else if($jum==0){
							echo "<option value='$jum' selected>$jum</option>";
							echo "<option value='1' >1</option>";	
						}else{
							echo "<option value='$jum' selected>$jum</option>";
							echo "<option value='0'>0</option>";
							echo "<option value='1' >1</option>";		
						}
						?>
					</select>
				</td>
			</tr>
			<tr class='info'>
				<td>Kategori</td>
				<td>
					<select name='kategori' class="k-textbox">
					<?php
					include"koneksi.php";
					$kategori=mysql_query("select*from kategori_buku");
					$kategori2=$ambil_buku['id_kategori'];
					while($tampil_kategori=mysql_fetch_array($kategori))
					{
						if($kategori2==$tampil_kategori['id_kategori']){
						echo"<option value='$tampil_kategori[id_kategori]' selected>$tampil_kategori[nama_kategori]</option>";
						}else{
						echo"<option value='$tampil_kategori[id_kategori]'>$tampil_kategori[nama_kategori]</option>";	
						}
					}
					?>	
					</select>
					<a href="?hal=tambah_kategori"><i class='icon-plus'></i></a>	
				</td>
			</tr>
			<tr class='info'>
				<td></td>
				<td>
					<button type='submit' name='ubah' class="k-button">Ubah</button>
				</td>	

	
</table>
</form>

</div>
</articel>
</body>
</html>
<?php


}
?>