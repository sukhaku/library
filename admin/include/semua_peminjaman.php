<style type="text/css">
@import "css/demo_table_jui.css";
@import "include/themes/smoothness/jquery-ui-1.8.4.custom.css";
</style>
        <script src="js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $('#tabeldata').dataTable({
					     "oLanguage": {
						      "sLengthMenu": "Tampilkan _MENU_ data per halaman",
						      "sSearch": "Pencarian: ", 
						      "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
						      "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
						      "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
						      "sInfoFiltered": "(di filter dari _MAX_ total data)",
						      "oPaginate": {
						          "sFirst": "<<",
						          "sLast": ">>", 
						          "sPrevious": "<", 
						          "sNext": ">"
					       }
				      },
              "sPaginationType":"full_numbers",
              "bJQueryUI":true
            });
          })    
        </script>
        <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();	
		 		   $("#tanggal").kendoDatePicker();	
		        });
		</script>
	


<?php
if($_GET['hal']=="Lihat Peminjaman")
{
?>
<article class="module width_full">
	<header><h3>Lihat Peminjaman</h3></header>
		<div class="module_content">
			<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th>ID Anggota</th>
		<th>Nama</th>
		<th>Kode Buku</th>
		<th align='center'>Tanggal Pinjam</th>
		<th align='center'>Tanggal Max Kembali</th>
		<th align='center'>Tanggal Kembali</th>
		<th>Status</th>
	</tr>
</thead>
<tbody>	
<?php
$ambil=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and status_peminjaman='1' order by id_peminjaman desc");
$no=1;
while($tampil=mysql_fetch_array($ambil)){
?>

<tr>
<td><?php echo"$tampil[nis]";?></td>
<td><?php echo"$tampil[nama]";?></td>
<td align='center'><?php echo"$tampil[id_buku]";?></td>
<td align='center'>
	<?php
	$explode=explode("-",$tampil['tanggal_pinjam']);
	$tanggale=$explode[2];
	$bulane=$explode[1];
	$tahune=$explode[0];
	 echo"$tanggale-$bulane-$tahune";
	
	 ?>
</td>
<td align='center'>
	<?php 
	$pinjam=$tampil['tanggal_pinjam'];
	$ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
	$max_hari_pinjam=$ambil_pengaturan['max_hari_pinjam'];	

	$max_kembali=date('Y-m-d',strtotime($pinjam."+$max_hari_pinjam day"));
	$explode=explode("-",$max_kembali);
	$tanggale=$explode[2];
	$bulane=$explode[1];
	$tahune=$explode[0];
	
	echo"$tanggale-$bulane-$tahune";
	?>
</td>

<td align='center'>
	<?php
	$keterangan=$tampil['status_peminjaman'];
	if($keterangan=='1'){
		$return='-';
	}else if($keterangan=='0'){
		$explode=explode("-",$tampil['tanggal_kembali']);
		$tanggale=$explode[2];
		$bulane=$explode[1];
		$tahune=$explode[0];
		$return="$tanggale-$bulane-$tahune";
	}else{
		$return='kosong';
	}
	echo"$return";
	?>
</td>
<td>
<?php
$keterangan=$tampil['status_peminjaman'];
if($keterangan=='1'){
	echo"<a href='?hal=Pengembalian&id_peminjaman=$tampil[id_peminjaman]'><u style='color:blue;'>Pinjam</u></a>";
}else{
	$id_peminjaman=$tampil['id_peminjaman'];
	$ambil_terlambat=mysql_query("select*from denda_terlambat where id_peminjaman='$id_peminjaman'");
	$cek=mysql_num_rows($ambil_terlambat);
	if($cek>=1){
	echo"<u style='color:red;'>Kembali</u>";
	}else{
	echo"<u>Kembali</u>";
	}
}
?>

</td>

</tr>
<?php
$no++;
}


?>
</tbody>
</table>
<br>
<a href="?hal=Peminjaman" class="k-button" style="text-decoration:none; color:black;">Kembali</a>
			

		</div>				
</article><!-- end of styles article -->

<?php
}else{
?>

<article class="module width_full">
	<header><h3>Lihat Pengembalian</h3></header>
		<div class="module_content">
			<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th>ID Anggota</th>
		<th>Nama</th>
		<th>Kode Buku</th>
		<th align='center'>Tanggal Pinjam</th>
		<th align='center'>Tanggal Max Kembali</th>
		<th align='center'>Tanggal Kembali</th>
		<th align='center'>Terlambat</th>
		<th align='center'>Denda</th>
		<th align='center'>Status</th>
		<th align='center'>Kontrol</th>
	</tr>
</thead>
<tbody>	
<?php
$ambil=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and status_peminjaman='0' order by id_peminjaman desc");
$no=1;
while($tampil=mysql_fetch_array($ambil)){
?>

<tr>
<td><?php echo"$tampil[nis]";?></td>
<td><?php echo"$tampil[nama]";?></td>
<td align='center'><?php echo"$tampil[id_buku]";?></td>
<td align='center'>
	<?php
	$explode=explode("-",$tampil['tanggal_pinjam']);
	$tanggale=$explode[2];
	$bulane=$explode[1];
	$tahune=$explode[0];
	 echo"$tanggale-$bulane-$tahune";
	
	 ?>
</td>
<td align='center'>
	<?php 
	$pinjam=$tampil['tanggal_pinjam'];
	$ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
	$max_hari_pinjam=$ambil_pengaturan['max_hari_pinjam'];	

	$max_kembali=date('Y-m-d',strtotime($pinjam."+$max_hari_pinjam day"));
	$explode=explode("-",$max_kembali);
	$tanggale=$explode[2];
	$bulane=$explode[1];
	$tahune=$explode[0];
	
	echo"$tanggale-$bulane-$tahune";
	?>
</td>

<td align='center'>
	<?php
	$keterangan=$tampil['status_peminjaman'];
	if($keterangan=='1'){
		$return='-';
	}else if($keterangan=='0'){
		$explode=explode("-",$tampil['tanggal_kembali']);
		$tanggale=$explode[2];
		$bulane=$explode[1];
		$tahune=$explode[0];
		$return="$tanggale-$bulane-$tahune";
	}else{
		$return='kosong';
	}
	echo"$return";
	?>
</td>

<td align='center'>
<?php
$id_pinjame=$tampil['id_peminjaman'];
$id_bukune=$tampil['id_buku'];
$nise=$tampil['nis'];
$jupuk=mysql_query("select*from denda_terlambat,peminjaman,buku,siswa where denda_terlambat.id_peminjaman=peminjaman.id_peminjaman and peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and peminjaman.nis='$nise' and peminjaman.id_buku='$id_bukune' and denda_terlambat.id_peminjaman='$id_pinjame'");
$jupuke=mysql_fetch_array($jupuk);
$cek=mysql_num_rows($jupuk);
if($cek>0){
echo "$jupuke[jumlah_hari_telat] Hari";
}else{
	echo"-";
}
?>
</td>
<td align='center'>
<?php
if($cek>0){ 
echo "Rp.$jupuke[denda]";
}else{
echo"-";	
}
?>
</td>

<td>
<?php
$keterangan=$tampil['status_peminjaman'];
if($keterangan=='1'){
	echo"<a href='?hal=Pengembalian&id_peminjaman=$tampil[id_peminjaman]'><u style='color:blue;'>Pinjam</u></a>";
}else{
	$id_peminjaman=$tampil['id_peminjaman'];
	$ambil_terlambat=mysql_query("select*from denda_terlambat where id_peminjaman='$id_peminjaman'");
	$cek=mysql_num_rows($ambil_terlambat);
	if($cek>=1){
	echo"<u style='color:red;'>Kembali</u>";
	}else{
	echo"<u>Kembali</u>";
	}
}
?>

</td>
<td align='center'>
	<a href='?hal=hapus_peminjaman&id_transaksi=<?php echo"$tampil[id_peminjaman]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 

</td>
</tr>
<?php
$no++;
}


?>
</tbody>
</table>
<br>
<a href="?hal=Pengembalian Buku" class="k-button" style="text-decoration:none; color:black;">Kembali</a>
			

		</div>				
</article><!-- end of styles article -->






<?php
}

?>



