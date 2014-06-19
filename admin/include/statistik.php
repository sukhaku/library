<script src="js/jquery-1.4.min.js"></script>
<script src="js/jquery.fusioncharts.js"></script>

<?php 
if($_GET['hal']=='Statistik Peminjam'){
?>
	<article class="module width_full">
	<header><h3>Statistik Peminjam</h3></header>
	<div class="module_content">
			
	<?php
	$tahun=mysql_query("select distinct tahun_peminjaman from peminjaman");
	include"include/fungsi_blan.php";
	while($view=mysql_fetch_array($tahun)){
	$tahun_peminjaman=$view['tahun_peminjaman'];
	?>
		<center>
					<div><b><h3>Total Peminjam Buku Per Bulan Tahun <?php echo"$view[tahun_peminjaman]";?> </h3></b></div>
	<table id='<?php echo"$tahun_peminjaman";?>' border="0" align="center" cellpadding="5">
	<tr bgcolor="#FF9900"><th>Bulan</th> <th>Total Peminjaman Buku</th></tr>
	<?php
	//include"include/fungsi_blan.php";

	$data_pinjam=mysql_query("SELECT bulan_peminjaman,count(id_peminjaman) AS total_peminjam FROM peminjaman,buku,siswa where peminjaman.nis=siswa.nis and peminjaman.id_buku=buku.id_buku and tahun_peminjaman='$tahun_peminjaman' GROUP BY bulan_peminjaman");
	while($tampil=mysql_fetch_array($data_pinjam)){
	$bulan=konversi_bulan($tampil['bulan_peminjaman']);
	?>
	      <tr bgcolor='#D5F35B'>
	              <td><?php echo"$bulan";?></td>
	              <td align='center'><?php echo"$tampil[total_peminjam]";?></td>
	      </tr>


	<?php
	}
	?>      
	</table>
	<br><br>
	<script type="text/javascript">
		$('#<?php echo"$tahun_peminjaman";?>').convertToFusionCharts({
			swfPath: "js/Charts/",
			type: "MSColumn3D",
			data: '#<?php echo"$tahun_peminjaman";?>',
			dataFormat: "HTMLTable"
		});
		</script>
	<br>
		
		



<?php
}
?>
	</center>
	</div>
	</article>

	<?php
	}else if($_GET['hal']=='Statistik Pengunjung'){
	?>
		<article class="module width_full">
	<header><h3>Statistik Pengunjung</h3></header>
	<div class="module_content">
			
	<?php
	$tahun=mysql_query("select distinct tahun from pengunjung");
	include"include/fungsi_blan.php";
	while($view=mysql_fetch_array($tahun)){
	$tahun_pengunjung=$view['tahun'];
	?>
		<center>
					<div><b><h3>Total Pengunjung Perpustakaan Per Bulan Tahun <?php echo"$view[tahun]";?> </h3></b></div>
	<table id='<?php echo"$tahun_pengunjung";?>' border="0" align="center" cellpadding="5">
	<tr bgcolor="#FF9900"><th>Bulan</th> <th>Total Pengunjung Perpustakaan</th></tr>
	<?php
	//include"include/fungsi_blan.php";

	$data_kunjung=mysql_query("SELECT bulan,count(id_pengunjung) AS total_pengunjung FROM pengunjung,siswa where pengunjung.nis=siswa.nis and tahun='$tahun_pengunjung' GROUP BY bulan");
	while($tampil=mysql_fetch_array($data_kunjung)){
	$bulan=konversi_bulan($tampil['bulan']);
	?>
	      <tr bgcolor='#D5F35B'>
	              <td><?php echo"$bulan";?></td>
	              <td align='center'><?php echo"$tampil[total_pengunjung]";?></td>
	      </tr>


	<?php
	}
	?>      
	</table>
	<br><br>
	<script type="text/javascript">
		$('#<?php echo"$tahun_pengunjung";?>').convertToFusionCharts({
			swfPath: "js/Charts/",
			type: "MSColumn3D",
			data: '#<?php echo"$tahun_pengunjung";?>',
			dataFormat: "HTMLTable"
		});
		</script>
	<br>
		
	



<?php
}
?>
</center>
</div>
</article>






<?php
}else{
	echo"<script>alert('Halaman tidak tersedian');javascript:history.go(-1)</script>";
}
?>
