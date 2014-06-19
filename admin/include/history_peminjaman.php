<style type="text/css">
@import "css/demo_table_jui.css";
@import "include/themes/smoothness/jquery-ui-1.8.4.custom.css";
</style>

		      <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();	
		 	
		        });
		        </script>
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
<?php
if($_GET['hal']=='History Peminjaman'){
?>        
<article class="module width_full">
		<header><h3>Riwayat Peminjaman</h3></header>
		<div class="module_content">
<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th>No</th>
		<th>ID Anggota</th>
		<th>Nama</th>
		<th>Kelas</th>
		<th>Jumlah Peminjaman</th>
		<th>Tahun</th>
	</tr>	
</thead>
<tbody>
<?php
$no=1;
$ambil_peminjam=mysql_query("SELECT kelas.nama_kelas,siswa.nis,siswa.status,tahun_peminjaman,siswa.nama,COUNT(id_peminjaman) as jumlah_peminjaman from peminjaman,siswa,kelas,buku where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and siswa.id_kelas=kelas.id_kelas group by peminjaman.nis,tahun_peminjaman order by jumlah_peminjaman desc");
while($tampil_peminjam=mysql_fetch_array($ambil_peminjam)){
?>
	<tr>
		<td align='center'><?php echo"$no";?></td>
		<td align='center'><?php echo"<a href='?hal=Detail Peminjaman&nis=$tampil_peminjam[nis]&tahun=$tampil_peminjam[tahun_peminjaman]' style='color:black; text-decoration:none;'>$tampil_peminjam[nis]</a>";?></td>
		<td align='center'><?php echo"$tampil_peminjam[nama]";?></td>
		<td align='center'>
			<?php 
			if($tampil_peminjam['status']==4){
				echo "-";
			}else{
			echo"$tampil_peminjam[nama_kelas]";
			}
			?>
		</td>	
		<td align='center'>
			<?php echo"$tampil_peminjam[jumlah_peminjaman] kali";?>
		</td>
		<td align='center'><?php echo"$tampil_peminjam[tahun_peminjaman]";?></td>
	</tr>	
<?php
$no++;
}
?>

</tbody>	

</table>

		</div>
</article>			
<?php
}else if($_GET['hal']=='Detail Peminjaman'){
	$year=$_GET['tahun'];
?>

<article class="module width_full">
		<header><h3>Detail Peminjaman Tahun <?php echo"$year";?> </h3></header>
		<div class="module_content">
<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th>No</th>
		<th>ID Anggota</th>
		<th>Nama</th>
		<th>Kode Buku</th>
		<th>Judul</th>
		<th>Peminjaman</th>
	</tr>	
</thead>
<tbody>
<?php
$nis=$_GET['nis'];
$no=1;
$ambil_peminjam=mysql_query("SELECT peminjaman.tahun_peminjaman,peminjaman.nis,siswa.nama,buku.judul_buku,kategori_buku.nama_kategori,peminjaman.id_buku, COUNT( peminjaman.id_buku ) AS jumlah_pinjam
FROM peminjaman,siswa,buku,kategori_buku
WHERE peminjaman.nis ='$nis' and peminjaman.tahun_peminjaman ='$year' and peminjaman.nis=siswa.nis and peminjaman.id_buku=buku.id_buku and buku.id_kategori=kategori_buku.id_kategori
GROUP BY id_buku");

while($tampil_peminjam=mysql_fetch_array($ambil_peminjam)){
?>
	<tr>
		<td align='center'><?php echo"$no";?></td>
		<td align='center'><?php echo"$tampil_peminjam[nis]";?></td>
		<td align='center'><?php echo"$tampil_peminjam[nama]";?></td>
		<td align='center'><?php echo"$tampil_peminjam[id_buku]";?></td>
		<td align='center'><?php echo"$tampil_peminjam[judul_buku]";?></td>	
		<td align='center'>
			<?php echo"<a href='?hal=Detail Peminjaman Anggota&tahun=$tampil_peminjam[tahun_peminjaman]&nis=$tampil_peminjam[nis]&id_buku=$tampil_peminjam[id_buku]' style='text-decoration:none; color:black;'>$tampil_peminjam[jumlah_pinjam] kali</a>";?>
		</td>
	</tr>	
<?php
$no++;
}
?>

</tbody>	

</table>

		</div>
</article>			












<?php
}else{
	$tahun=$_GET['tahun'];
?>
<article class="module width_full">
		<header><h3>Detail Peminjaman Anggota Tahun <?php echo "$tahun";?> </h3></header>
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
		<th>Kontrol</th>
	</tr>
</thead>
<tbody>	
<?php

$nis=$_GET['nis'];
$id_buku=$_GET['id_buku'];
$ambil=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and peminjaman.id_buku='$id_buku' and peminjaman.nis='$nis' and peminjaman.tahun_peminjaman='$tahun'");
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
<td align='center'>
<?php
if($keterangan==1){
?>
	<a href='#'><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href='#'><img src="images/icn_trash.png" width="15" height="15"/></a> 
<?php
}else{
?>
	<a href='?hal=edit_transaksi&id_transaksi=<?php echo"$tampil[id_peminjaman]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href='?hal=hapus_peminjaman&id_transaksi=<?php echo"$tampil[id_peminjaman]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
<?php
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


		</div>
</article>			





<?php
}
?>