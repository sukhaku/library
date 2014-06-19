<?php
if(isset($_POST['input_buku']))
{
	$kode_buku=$_POST['kode_buku'];
	$kode_klarifikasi=$_POST['kode_klarifikasi'];
	$judul=$_POST['judul'];
	$pengarang=$_POST['pengarang'];
	$tahun_terbit=$_POST['tahun_terbit'];
	$penerbit=$_POST['penerbit'];
	$kategori=$_POST['kategori'];

	if(empty($kode_buku)){
		echo"<script type='text/javascript'>alert('kode buku belum diisi');javascript:history.go(-1)</script>";
	}elseif(empty($judul)){
			echo"<script type='text/javascript'>alert('judul belum diisi');javascript:history.go(-1)</script>";	
	}else{
		$cek_kode_buku=mysql_num_rows(mysql_query("select id_buku from buku where id_buku='$kode_buku'"));
		if($cek_kode_buku<1){
			$data=mysql_query("select id_buku from buku where id_buku='$kode_buku'");
			$cek=mysql_num_rows($data);
				if($cek>=1){
				echo"<script type='text/javascript'>alert('kode buku tidak boleh sama');javascript:history.go(-1)</script>";
				}else{	
				$tambah_buku=mysql_query("insert into buku(id_buku,kode_klarifikasi,judul_buku,penerbit,tahun_terbit,pengarang,id_kategori,stok)values('$kode_buku','$kode_klarifikasi','$judul','$penerbit','$tahun_terbit','$pengarang','$kategori','1')");
				
				$tambah_buku_masuk=mysql_query("insert into buku_masuk(id_pemasukan,tanggal,jumlah,id_buku)values('NULL',CURRENT_TIMESTAMP,'1','$kode_buku')");
				
					if($tambah_buku and $tambah_buku_masuk){
					echo"<script>alert('Berhasil Ditambahkan')</script>";		
					echo"<meta http-equiv='refresh' content='0; ?hal=Buku'/>";
					}else{
					echo"<script type='text/javascript'>alert('Gagal ditambahkan')</script>";	
					echo"<meta http-equiv='refresh' content='0; ?hal=tambah_buku'/>";
						}
					}
				
				
		}else{
			echo"<script>alert('Kode Buku tidak boleh sama');javascript:history.go(-1)</script>";
		}
	}				
}
?>

				
			
		      <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();	
		          $("#nomor").kendoNumericTextBox();	
		        });
		        </script>


<article class="module width_full">
<header><h3>Tambah Buku</h3></header>
<div class="module_content">
						<form action="?hal=tambah_buku" method="post" id="validasiform" class="form_tambah_buku">	
						<table>
							<tr>
								<th align='left'>Kode Buku</th>
								<td><input type="text" class="k-textbox" name="kode_buku"  required validationMessage="Isikan Kode Buku"></td>
							</tr>
							<tr>
								<th align='left'>Kode Klarifikasi</th>
								<td><input type="text" class="k-textbox" name="kode_klarifikasi"  required validationMessage="Isikan Kode Klarifikasi"></td>
							</tr>
							
							<tr>
								<th align='left'>Judul</th>
								<td><input type="text" style="width:400px;" class="k-textbox" name="judul" required validationMessage="Isikan judul buku"></td>
							</tr>
						
							<tr>
								<th align='left'>Pengarang</th>
								<td><input type='text' class="k-textbox" name='pengarang' required validationMessage="Isikan nama pengarang"></td>
							</tr>
							<tr>		
								<th align='left'>Penerbit</th>
								<td><input type="text"  class="k-textbox" name="penerbit" required validationMessage="Isikan Penerbit"></td>
							<tr>
								<th align='left'>Tahun terbit</th>
								<td>
									<select name="tahun_terbit" id="time" required data-required-msg="Select start time" class="k-textbox">
										<?php
										$tahun_sekarang=gmdate("Y",time()+60*60*7);
										for($tahun=1990; $tahun<=$tahun_sekarang; $tahun++){
											echo"<option value='$tahun'>$tahun</option>";
										}
										?>

									</select>
								</td>		
							<tr>
								<th align='left'>Kategori</th>
								<td><select name='kategori' class="k-textbox">
									<?php
									$kategori=mysql_query("select*from kategori_buku");
									while($tampil_kategori=mysql_fetch_array($kategori))
									{
										echo"<option value=$tampil_kategori[id_kategori]>$tampil_kategori[nama_kategori]</option>";
									}
									?>	
									</select><a href='?hal=Tambah Kategori Buku'>Tambah kategori</a>
								</td>
							</tr>
							<tr>
								<th></th>
								<td><button type='submit' name="input_buku" class="k-button">Simpan</button></td>
							</tr>	
						</table>
						</form>					
				</div>
			
		</article><!-- end of post new article -->
		
		
	
</div>
</article>