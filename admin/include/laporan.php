<article class="module width_full">
<header><h3><?php echo"$_GET[hal]";?></h3></header>
<div class="module_content">
<form action='include/cetak.php' method="post">
	<table cellspacing="10" cellspacing="10">
		<tr>
			<td>Data</td>
			<td>
				<select name='data' class="k-textbox">
				<option value='buku'>Buku</option>	
				<option value='pengadaan'>Pengadaan Buku</option>
				<option value='petugas'>Petugas</option>
				<option value='anggota'>Anggota</option>
				<option value='peminjam'>Peminjam</option>
				<option value='keterlambatan'>Keterlambatan</option>
				<option value='kasus'>Kasus Peminjaman</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Periode</td>
			<td>
				<select name="bulan" class="k-textbox">
					<option value="semua">semua</option>
					<?php
					$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","Sepetember","Oktober","November","Desember");	
					for($i=1;$i<=12;$i++){
						echo"<option value='$i'>$bulan[$i]</option>";
					}
					?>
				</select>
				<select name="tahun" class="k-textbox">
					<option value="semua">semua</option>
					<?php
						$tahun=date("Y");
						for($i=2010;$i<=$tahun;$i++){
							echo "<option value='$i'>$i</option>";
						}
					?>
				</select>				
			</td>
		</tr>		
		<tr>
			<td>File</td>
			<td><input type='radio' checked name='file' value='xls'><img src="images/excel.png" width='25px' height='25px'> <!--<input type='radio' name='file' value='docx'><img src="images/word.png" width='25px' height='25px'>--></td>
		</tr>
		<tr>
			<td></td>
			<td><button type='submit' name='print' class="k-button">Ekspor Data</button>
			</td>
		</tr>
	</table>
</form>	



</div>
</article>