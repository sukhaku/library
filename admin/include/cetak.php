	<?php 
	include"koneksi.php";
	$data=$_POST['data'];
	$file=$_POST['file'];
	if($data=='petugas'){
		header("Content-type:application/octet-stream");
		if($file=='xls'){
		header("Content-Disposition: attachment; filename=data_petugas.xls");	
		}else{
		header("Content-Disposition: attachment; filename=data_petugas.docx");
		}
		header("Pragma:no-cache");
		header("Expires:0");
		$data=mysql_query("select*from petugas");
		?>
		<table cellpadding="5" cellspacing="0" border='1'>
		<tr>
			<th colspan='5'>PERPUSTAKAAN SMP NEGERI 1 PEDAN<br>Jl. Gelora Pemuda Pedan, Pedan Klaten</th>
		</tr>	
		<tr>
			<th colspan='5'>DATA PETUGAS</th>
		</tr>
		<tr>
			<th>No</th>
			<th>NIP</th>
			<th>Password</th>
			<th>Nama Petugas</th>
			<th>Kategori Petugas</th>
		</tr>
		<?php
		$no=1;
		while($tampil=mysql_fetch_array($data)){
		if($tampil['kategori_petugas']=='1'){
			$status='Admin';
		}else if($tampil['kategori_petugas']=='2'){
			$status='Petugas';
		}else{
			$status='-';
		}
		?>
		<tr>
			<td><?php echo"$no";?></td>
			<td><?php echo"$tampil[nip]";?></td>
			<td><?php echo"$tampil[password]";?></td>
			<td><?php echo"$tampil[nama_petugas]";?></td>
			<td><?php echo"$status";?></td>
		</tr>		
		<?php
		$no++;
		}
		?>
		</table>
<?php
}else if($data=='anggota'){
?>
<?php
		header("Content-type:application/octet-stream");
		if($file=='xls'){
		header("Content-Disposition: attachment; filename=data_anggota.xls");	
		}else{
		header("Content-Disposition: attachment; filename=data_anggota.docx");
		}
		header("Pragma:no-cache");
		header("Expires:0");
		$data=mysql_query("select*from siswa,kelas where siswa.id_kelas=kelas.id_kelas order by nis asc");
		?>
		<table width="100%" cellpadding="5" cellspacing="0" border='1'>
		<tr>
			<th colspan='5'>PERPUSTAKAAN SMP NEGERI 1 PEDAN<br>Jl. Gelora Pemuda Pedan, Pedan Klaten</th>
		</tr>	
		<tr>
			<th colspan='5'>DATA SISWA</th>
		</tr>
		<tr>
			<th align='left'>No</th>
			<th align='left'>NIS</th>
			<th align='left'>Nama</th>
			<th align='left'>Password</th>
			<th align='left'>Kelas</th>
		</tr>
		<?php
		$no=1;
		while($tampil=mysql_fetch_array($data)){
	
		?>
		<tr>
			<td><?php echo"$no";?></td>
			<td><?php echo"$tampil[nis]";?></td>
			<td><?php echo"$tampil[nama]";?></td>
			<td><?php echo"$tampil[password]";?></td>
			<td><?php echo"$tampil[nama_kelas]";?></td>
		</tr>		
		<?php
		$no++;
		}
		?>
		</table>


<?php
}else if($data=='peminjam'){
header("Content-type:application/octet-stream");
		if($file=='xls'){
		header("Content-Disposition: attachment; filename=data_peminjam.xls");	
		}else{
		header("Content-Disposition: attachment; filename=data_peminjam.docx");
		}
		header("Pragma:no-cache");
		header("Expires:0");	
?>
<?php
	$bulan=$_POST['bulan'];
	$tahun=$_POST['tahun'];
	include"fungsi_bulan.php";
		if($bulan=='semua' and $tahun=='semua'){
			$data=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis");
		}else if($bulan!='semua' and $tahun=='semua'){
			$data=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and bulan_peminjaman='$bulan'");
		}else if($bulan=='semua' and $tahun!='semua'){
			$data=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and tahun_peminjaman='$tahun'");
		}else if($bulan!='semua' and $tahun!='semua'){
				$data=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and bulan_peminjaman='$bulan' and tahun_peminjaman='$tahun'");
		}else{
				echo "<script>alert('Pilihan salah');javascript:history.go(-1)</script>";	
		}
		?>
		<table width="100%" cellpadding="5" cellspacing="0" border='1'>
		<tr>
			<th colspan='10'>PERPUSTAKAAN SMP NEGERI 1 PEDAN<br>Jl. Gelora Pemuda Pedan, Pedan Klaten</th>
		</tr>	
		<tr>
			<th colspan='10'>DATA PEMINJAM <?php echo"$indo $tahun"?></th>
		</tr>
		<tr>
			<th align='left'>No</th>
			<th>Nis</th>
			<th>Nama</th>
			<th>Kode Buku</th>
			<th>Judul Buku</th>
			<th>Jumlah</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Max Kembali</th>
			<th>Tanggal Kembali</th>
			<th>Status</th>
		</tr>
		<?php
		$no=1;
		while($tampil=mysql_fetch_array($data)){
	
		?>
		<tr>
			<td><?php echo"$no";?></td>
			<td><?php echo"$tampil[nis]";?></td>
			<td><?php echo"$tampil[nama]";?></td>
			<td><?php echo"$tampil[id_buku]";?></td>
			<td><?php echo"$tampil[judul_buku]";?></td>
			<td align='center'><?php echo"$tampil[jumlah]";?></td>
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
				$keterangan=$tampil['status_peminjaman'];
				if($keterangan=='1'){
					echo"<u style='color:blue;'>Pinjam</u>";
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
		</table>

<?php
}else if($data=='keterlambatan'){
		header("Content-type:application/octet-stream");
		if($file=='xls'){
		header("Content-Disposition: attachment; filename=data_keterlambatan.xls");	
		}else{
		header("Content-Disposition: attachment; filename=data_keterlambatan.docx");
		}
		header("Pragma:no-cache");
		header("Expires:0");	
	$bulan=$_POST['bulan'];
	$tahun=$_POST['tahun'];
	include"fungsi_bulan.php";
	if($bulan=='semua' and $tahun=='semua'){		
		$data=mysql_query("select*from denda_terlambat,peminjaman,buku,siswa where denda_terlambat.id_peminjaman=peminjaman.id_peminjaman and peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis order by denda asc ");
	}else if($bulan!='semua' and $tahun=='semua'){
		$data=mysql_query("select*from denda_terlambat,peminjaman,buku,siswa where denda_terlambat.id_peminjaman=peminjaman.id_peminjaman and peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and peminjaman.bulan_peminjaman='$bulan'  order by denda asc ");
	}else if($bulan=='semua' and $tahun!='semua'){
		$data=mysql_query("select*from denda_terlambat,peminjaman,buku,siswa where denda_terlambat.id_peminjaman=peminjaman.id_peminjaman and peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and peminjaman.tahun_peminjaman='$tahun'  order by denda asc ");
	}else{
		echo "<script>alert('Pilihan salah');javascript:history.go(-1)</script>";	
	}			
?>
<table width="100%" cellpadding="5" cellspacing="0" border='1'>
		<tr>
			<th colspan='11'>PERPUSTAKAAN SMP NEGERI 1 PEDAN<br>Jl. Gelora Pemuda Pedan, Pedan Klaten</th>
		</tr>
		<tr>
			<th colspan='11'>DATA KETERLAMBATAN <?php echo"$indo $tahun";?></th>
		</tr>
		<tr>
			<th>No</th>
			<th>Nis</th>
			<th>Nama</th>
			<th>Kode Buku</th>
			<th>Judul Buku</th>
			<th>Jumlah Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Max Kembali</th>
			<th>Tanggal Kembali</th>
			<th>Jumlah hari telat</th>
			<th>Denda</th>
		</tr>
		<?php
		$no=1;
		while($tampil=mysql_fetch_array($data)){
	
		?>
		<tr>
			<td><?php echo"$no";?></td>
			<td><?php echo"$tampil[nis]";?></td>
			<td><?php echo"$tampil[nama]";?></td>
			<td><?php echo"$tampil[id_buku]";?></td>
			<td><?php echo"$tampil[judul_buku]";?></td>
			<td><?php echo"$tampil[jumlah]";?></td>
			<td>
				<?php
						$explode=explode("-",$tampil['tanggal_pinjam']);
					$tanggale=$explode[2];
					$bulane=$explode[1];
					$tahune=$explode[0];
					 echo"$tanggale-$bulane-$tahune";
				?>

			</td>
			<td>
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
			<td>
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
			<td><?php echo"$tampil[jumlah_hari_telat]";?></td>
			<td><?php echo"Rp.$tampil[denda]";?></td>
		</tr>		
		<?php
		$no++;
		}
		?>
		</table>

	
<?php
}else if($data=='buku'){
		header("Content-type:application/octet-stream");
		if($file=='xls'){
		header("Content-Disposition: attachment; filename=data_buku.xls");	
		}else{
		header("Content-Disposition: attachment; filename=data_buku.docx");
		}
		header("Pragma:no-cache");
		header("Expires:0");	
?>
	<table width="100%" cellpadding="5" cellspacing="0" border='1'>
	<thead>	
		<tr>
			<th colspan='8'>PERPUSTAKAAN SMP NEGERI 1 PEDAN<br>Jl. Gelora Pemuda Pedan, Pedan Klaten</th>
		</tr>
		<tr>
			<th colspan='8'>Data Buku</th>	
		</tr>	
		<tr>
			<th>Kode Buku</th>
			<th>Kode Klarifikasi</th>
			<th>Judul</th>
			<th>Kategori</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun Terbit</th>
			<th>Tersedia</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no=1;
	$data=mysql_query("select*from buku,kategori_buku where buku.id_kategori=kategori_buku.id_kategori order by id_buku asc");
	$cek=mysql_num_rows($data);
	while($ambil=mysql_fetch_array($data)){
	?>
	<form action="?hal=hapus_buku" method='post'>
	<tr class='info'>
		<td align="center"><?php echo"$ambil[id_buku]";?></td>
		<td align="center"><?php echo"$ambil[kode_klarifikasi]";?></td>
		<td><?php echo"$ambil[judul_buku]";?></td>
		<td align="left"><?php echo"$ambil[nama_kategori]";?></td>
		<td><?php echo"$ambil[pengarang]";?></td>
		<td align="left"><?php echo"$ambil[penerbit]";?></td>
		<td align="center"><?php echo"$ambil[tahun_terbit]";?></td>
		<td align="center"><?php echo"$ambil[stok]";?></td>		
	</tr>
	<?php
	$no++;	
	}
	?>
	</tbody>
	</table>

<?php
}else if($data=='pengadaan_buku'){
		header("Content-type:application/octet-stream");
		if($file=='xls'){
		header("Content-Disposition: attachment; filename=pengadaan_buku.xls");	
		}else{
		header("Content-Disposition: attachment; filename=pengadaaan_buku.docx");
		}
		header("Pragma:no-cache");
		header("Expires:0");	
?>
	<table width="100%" cellpadding="5" cellspacing="0" border='1'>
	<thead>	
		<tr>
			<th colspan='8'>PERPUSTAKAAN SMP NEGERI 1 PEDAN<br>Jl. Gelora Pemuda Pedan, Pedan Klaten</th>
		</tr>
		<tr>
			<th colspan='8'>Pengadaan Buku</th>	
		</tr>
		<tr>
			<th>No</th>
			<th>Toko Buku</th>
			<th>Penerbit</th>
			<th>Total Buku</th>
			<th>Tanggal Terima</th>
			<th>Keterangan</th>
			<th>Total Harga</th>
			<th>Pengirim</th>
		</tr>
		</thead>

	<tbody>


	<?php
	$no=1;
	$data=mysql_query("select*from pengadaan_buku");
	$cek=mysql_num_rows($data);
	while($ambil=mysql_fetch_array($data)){
	?>
	<tr class='info'>
		<td align="left"><?php echo"$no";?></td>
		<td align="left"><?php echo"$ambil[toko_buku]";?></td>
		<td align="left"><?php echo"$ambil[penerbit]";?></td>
		<td align="center"><?php echo"$ambil[total_buku]";?></td>
		<td align="center">
			<?php
			 	$explode=explode("-",$ambil['tanggal_terima']);
				$tanggale=$explode[2];
				$bulane=$explode[1];
				$tahune=$explode[0];			
				echo"$tanggale-$bulane-$tahune";	
			?>
		</td>
		<td align="center"><?php echo"$ambil[keterangan]";?></td>
		<td align="center"><?php echo"$ambil[total_harga]";?></td>
		<td align="left"><?php echo"$ambil[pengirim]";?></td>
	</tr>
	<?php
	$no++;	
	}
	?>
	</tbody>
	</table>
	

<?php
}else if($data=='kasus'){
		header("Content-type:application/octet-stream");
		if($file=='xls'){
		header("Content-Disposition: attachment; filename=kasus_peminjaman.xls");	
		}else{
		header("Content-Disposition: attachment; filename=kasus_peminjaman.docx");
		}
		header("Pragma:no-cache");
		header("Expires:0");	
?>
	<table width="100%" cellpadding="5" cellspacing="0" border='1'>
	<thead>	
		<tr>
			<th colspan='7'>PERPUSTAKAAN SMP NEGERI 1 PEDAN<br>Jl. Gelora Pemuda Pedan, Pedan Klaten</th>
		</tr>
		<tr>
			<th colspan='7'>Kasus Peminjaman Buku</th>	
		</tr>
		<tr>
			<th>No</th>
			<th>Nis</th>
			<th>Nama</th>
			<th>ID Buku</th>
			<th>Judul</th>
			<th>Catatan Kasus</th>
			<th>Tanggal Kasus</th>				
		</tr>
		</thead>

	<tbody>
		<?php
					$no=1;
					$data=mysql_query("select*from kasus,siswa,buku where kasus.id_anggota=siswa.nis and kasus.id_buku=buku.id_buku");
					$cek=mysql_num_rows($data);
					while($ambil=mysql_fetch_array($data)){
					?>
					<tr class='info'>
						<td align="center"><?php echo"$no";?></td>
						<td align="center"><?php echo"$ambil[id_anggota]";?></td>
						<td align="left"><?php echo"$ambil[nama]";?></td>
						<td align="left"><?php echo"$ambil[id_buku]";?></td>
						<td align="left"><?php echo"$ambil[judul_buku]";?></td>
						<td align="center"><?php echo"$ambil[jenis_kasus]";?></td>
						<td align="center">
							<?php
							$explode=explode("-",$ambil['tgl_kasus']);
							$tanggale=$explode[2];
							$bulane=$explode[1];
							$tahune=$explode[0];
							 echo"$tanggale-$bulane-$tahune";
							 ?>
						</td>
					</tr>
					<?php
					$no++;	
					}
					?>

	
	</tbody>
	</table>
	
<?php	
}else{
	echo"<script type='text/javascript'>alert('Tidak diizinkan');javascript:history.go(-1)</script>";
}
?>