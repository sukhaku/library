<?php
$tanggal = date("Ymd");
$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM konter WHERE tanggal='$tanggal' GROUP BY ip")); // Hitung jumlah pengunjung
$totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM konter"), 0); // hitung total pengunjung
$hits=mysql_result(mysql_query("SELECT SUM(hits) FROM konter"), 0);
$bataswaktu       = time() - 300;
$pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM konter WHERE online > '$bataswaktu'")); // hitung pengunjung online
$tahun = date("Y");
$ambil_peminjam=mysql_fetch_array(mysql_query("SELECT kelas.nama_kelas,siswa.nis,tahun_peminjaman,siswa.nama,COUNT(id_peminjaman) as jumlah_peminjaman from peminjaman,siswa,kelas where peminjaman.nis=siswa.nis and siswa.id_kelas=kelas.id_kelas and tahun_peminjaman='$tahun' group by peminjaman.nis order by jumlah_peminjaman desc,id_peminjaman asc limit 0,1"));				
?>

<script src="js/jquery-1.4.min.js"></script>
<script src="js/jquery.fusioncharts.js"></script>
<h4 class="alert_info">Selamat datang, Digital Library SMP Negeri 1 Pedan Klaten</h4>
<article class="module width_full">
			<header><h3>Pengunjung</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<p><h3>Siswa yang paling sering meminjam Tahun <?php echo"$tahun";?></h3></p>
					<ul>
						<li><?php echo"<b>$ambil_peminjam[nis]</b>";?></li>
						<li><?php echo"<b>$ambil_peminjam[nama]</b>";?></li>
						<li><?php echo"<b>$ambil_peminjam[nama_kelas]</b>";?></li>
						<li><?php echo"<b>$ambil_peminjam[jumlah_peminjaman] kali peminjaman</b>";?></li>
					</ul>	
				

				</article>

				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Today</p>
						<p class="overview_count"><?php echo "$pengunjung";?></p>
						<p class="overview_type">Visitor</p>
						<p class="overview_count"><?php echo "$pengunjungonline";?></p>
						<p class="overview_type">Online</p>
					</div>
					<div class="overview_previous">
						<p class="overview_day">Total</p>
						<p class="overview_count"><?php echo"$totalpengunjung";?></p>
						<p class="overview_type">Visitor</p>
						<p class="overview_count"><?php echo"$hits";?></p>
						<p class="overview_type">Hits</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article><!-- end of stats article -->
		
		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Peminjam Terbaik</h3></header>
				<div class="module_content">
					<center>
				<div><b><h3>Peminjam Terbaik Tahun <?php echo"$tahun";?> </h3></b></div>
				<table id='myHTMLTables' border="0" align="center" cellpadding="5">
				<tr bgcolor="#FF9900"><th>Nama</th> <th>Total Peminjaman Buku</th></tr>
				<?php
				//include"include/fungsi_blan.php";
				$ambil_pinjam=mysql_query("SELECT kelas.nama_kelas,siswa.nis,tahun_peminjaman,siswa.nama,COUNT(id_peminjaman) as jumlah_peminjaman from peminjaman,siswa,kelas,buku where peminjaman.nis=siswa.nis and siswa.id_kelas=kelas.id_kelas and peminjaman.id_buku=buku.id_buku and tahun_peminjaman='$tahun' group by peminjaman.nis order by jumlah_peminjaman desc,id_peminjaman asc limit 3");
				while($tampil=mysql_fetch_array($ambil_pinjam)){
				?>
				      <tr bgcolor='#D5F35B'>
				              <td><?php echo"$tampil[nama]";?></td>
				              <td align='center'><?php echo"$tampil[jumlah_peminjaman]";?></td>
				      </tr>


				<?php
				}
				?>      
				</table>
				<br><br>
				<script type="text/javascript">
					$('#myHTMLTables').convertToFusionCharts({
						swfPath: "js/Charts/",
						type: "MSColumn3D",
						data: '#myHTMLTables',
						dataFormat: "HTMLTable"
					});
					</script>
				<br>
				</center>

	
				
				</div>
		</article><!-- end of stats article -->


		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Peminjam</h3></header>
			<div class="module_content">
				<center>
				<div><b><h3>Total Peminjam Buku Per Tahun </h3></b></div>
				<table id='myHTMLTable' border="0" align="center" cellpadding="5">
				<tr bgcolor="#FF9900"><th>Tahun</th> <th>Total Peminjaman Buku</th></tr>
				<?php
				//include"include/fungsi_blan.php";
				
				$data_pinjam=mysql_query("SELECT count(id_peminjaman) AS total_peminjam,tahun_peminjaman FROM peminjaman,buku,siswa where peminjaman.nis=siswa.nis and peminjaman.id_buku=buku.id_buku GROUP BY tahun_peminjaman");
				while($tampil=mysql_fetch_array($data_pinjam)){
				?>
				      <tr bgcolor='#D5F35B'>
				              <td><?php echo"$tampil[tahun_peminjaman]";?></td>
				              <td align='center'><?php echo"$tampil[total_peminjam]";?></td>
				      </tr>


				<?php
				}
				?>      
				</table>
				<br><br>
				<script type="text/javascript">
					$('#myHTMLTable').convertToFusionCharts({
						swfPath: "js/Charts/",
						type: "MSColumn3D",
						data: '#myHTMLTable',
						dataFormat: "HTMLTable"
					});
					</script>
				<br>
				</center>



			</div>			
				
		</article><!-- end of styles article -->


