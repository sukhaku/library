<article class="module width_full">
	<header><h3>Edit Kategori Buku</h3></header>
	<div class="module_content">

<?php
$id_kategori=$_GET['id_kategori'];
$kategori=mysql_query("select*from kategori_buku where id_kategori='$id_kategori'");
$tampil=mysql_fetch_array($kategori);
if(isset($_POST['ubah_kategori'])){
	$id_kat=$_POST['id_kategori'];
	$kategori=$_POST['nama_kategori'];
	$ubah=mysql_query("update kategori_buku set nama_kategori='$kategori' where id_kategori='$id_kat'");
	if($ubah){
		header("location:?hal=Tambah Kategori Buku");
	}else{
			echo"<script>alert('Gagal hapus kategori');javascript:history.go(-1)</script>";

	}
}
?>

<form action='?hal=edit_kategori' method="post">
<input type="hidden" value='<?php echo"$id_kategori";?>' name='id_kategori'>
<input type='text' name='nama_kategori' value='<?php echo"$tampil[nama_kategori]"?>' class='k-textbox'>
<button type='submit' name='ubah_kategori'>Ubah</button> 
</form>


</div>
</article>