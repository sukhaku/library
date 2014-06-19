		      <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();		
		        });
		      </script>


<?php
if($_GET['hal']=='tambah_petugas'){
		if(isset($_POST['simpan'])){
		$id_petugas=$_POST['id_petugas'];
		$nama=$_POST['nama'];
		$password=md5($_POST['pass']);
		$status=$_POST['status'];

		$lihat=mysql_query("select*from siswa where nis='$id_petugas'");
		$cek=mysql_num_rows($lihat);
		if($cek<=0){
			$input=mysql_query("insert into petugas(nip,nama_petugas,password,kategori_petugas)values('$id_petugas','$nama','$password','$status')");
			if($input){
				echo"<script type='text/javascript'>alert('berhasil disimpan')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Petugas'/>";
			}else{
				echo"<script type='text/javascript'>alert('Gagal input');javascript:history.go(-1)</script>";
			}		
		}else{
			echo"<script type='text/javascript'>alert('ID tidak boleh sama !!!!');javascript:history.go(-1)</script>";
			}

		}else{
?>

		<article class="module width_full">
		<header><h3>Tambah Petugas</h3></header>
		<div class="module_content">

					<form action="?hal=tambah_petugas" method="post" id="validasiform" class="form_tambah_user">
						<table>
							<tr>
								<th align="left">Id petugas</th>
								<td><input type="text" name="id_petugas" class="k-textbox" required validationMessage="Isikan id petugas">
							</tr>
							<tr>
								<th align="left">Password</th>
								<td><input type="password" name="pass" class="k-textbox" required validationMessage="Isikan password">
							</tr>		
							<tr>
								<th align="left">Nama</th>
								<td><input type="text" name="nama" class="k-textbox" required validationMessage="Isikan nama">
							</tr>
							<tr>
								<th align="left">Status</tath>
								<td>
									<select name='status' class='k-textbox'>
										<?php
											if($namaku[kategori_petugas]==1){
												echo"<option value='1'>Admin</option>
													<option value='2'>Petugas</option>";
											}else{
													echo"<option value='2'>Petugas</option>";	
											}
										?>
									</select>	
								</td>	
							</tr>
							<tr>
								<td colspan='2'><button type='submit' class='k-button' name="simpan">simpan</button> <input type='reset'  class='k-button' value="reset"></td>
							</tr>	
						</table>	

					</form>
					</footer>
				</article><!-- end of post new article -->
				
				
			
		</div>
		</article>
		<?php
		}
		?>

<?php
}else if($_GET['hal']=='tambah_anggota'){
?>	

		<?php
		if(isset($_POST['simpan'])){
		$id_anggota=$_POST['id_anggota'];
		$nama=$_POST['nama'];
		$password=md5($_POST['pass']);
		$kelas=$_POST['kelas'];


		
		$data_petugas=mysql_query("select*from petugas where nip='$id_anggota'");

		
		$cek_petugas=mysql_num_rows($data_petugas);

			if($cek_petugas<=0){
				$input=mysql_query("insert into siswa(nis,nama,password,status,id_kelas) values('$id_anggota','$nama','$password','3','$kelas')");
				if($input){
					echo"<script type='text/javascript'>alert('berhasil disimpan')</script>";
					echo"<meta http-equiv='refresh' content='0; ?hal=Siswa'/>";
				}else{
				echo"<script type='text/javascript'>alert('ID tidak boleh sama!!!');javascript:history.go(-1)</script>";
				}
			}else{
				echo"<script type='text/javascript'>alert('ID tidak boleh sama!!!');javascript:history.go(-1)</script>";
				}	
		}else{
		?>

		
		<article class="module width_full">
		<header><h3>Tambah Anggota</h3></header>
		<div class="module_content">

					<form action="?hal=tambah_anggota" method="post" id="validasiform" class="form_tambah_user">
						<table>
							<tr>
								<th align="left">ID anggota</th>
								<td><input type="text" name="id_anggota" class="k-textbox"  required validationMessage="Isikan 8 digit id anggota">
							</tr>
							<tr>
								<th align="left">Password</th>
								<td><input type="password" name="pass" class="k-textbox" required validationMessage="Isikan password">
							</tr>		
							<tr>
								<th align="left">Nama</th>
								<td><input type="text" name="nama" class="k-textbox" required validationMessage="Isikan nama">
							</tr>
							<tr>
								<th align="left">Kelas</th>
								<td>
									<select name='kelas' class='k-textbox'>
									<?php
										include'koneksi.php';
										$kelas=mysql_query("select*from kelas");
										while($ambil_kelas=mysql_fetch_array($kelas)){
											echo"<option value='$ambil_kelas[id_kelas]'>$ambil_kelas[nama_kelas]</option>";
										}
									?>
									</select> 
								</td>	
							</tr>
							<tr>
								<td colspan='2'><button type='submit' class='k-button' name="simpan">simpan</button> <input type='reset'  class='k-button' value="reset"></td>
							</tr>	


					</form>
					</footer>
				</article><!-- end of post new article -->
				
				
			
		</div>
		</article>
		<?php
		}
		?>
<?php
}else if($_GET['hal']=='tambah_guru'){
?>	
		<?php
		if(isset($_POST['simpan'])){
		$id_anggota=$_POST['id_anggota'];
		$nama=$_POST['nama'];
		$password=md5($_POST['pass']);
		$data_petugas=mysql_query("select*from petugas where nip='$id_anggota'");

		
		$cek_petugas=mysql_num_rows($data_petugas);

			if($cek_petugas<=0){
				$input=mysql_query("insert into siswa(nis,nama,password,status,id_kelas) values('$id_anggota','$nama','$password','4','12')");
				if($input){
					echo"<script type='text/javascript'>alert('berhasil disimpan')</script>";
					echo"<meta http-equiv='refresh' content='0; ?hal=Guru'/>";
				}else{
				echo"<script type='text/javascript'>alert('ID tidak boleh sama!!!');javascript:history.go(-1)</script>";
				}
			}else{
				echo"<script type='text/javascript'>alert('ID tidak boleh sama!!!');javascript:history.go(-1)</script>";
				}	
		}else{
		?>

		
		<article class="module width_full">
		<header><h3>Tambah Guru</h3></header>
		<div class="module_content">

					<form action="?hal=tambah_guru" method="post" id="validasiform" class="form_tambah_user">
						<table>
							<tr>
								<th align="left">NIP</th>
								<td><input type="text" name="id_anggota" class="k-textbox"  required validationMessage="Isikan 8 digit id anggota">
							</tr>		
							<tr>
								<th align="left">Nama</th>
								<td><input type="text" name="nama" class="k-textbox" required validationMessage="Isikan nama">
							</tr>
							<tr>
								<th align="left">Password</th>
								<td><input type="password" name="pass" class="k-textbox" required validationMessage="Isikan password">
							</tr>
							<tr>
								<td colspan='2'><button type='submit' class='k-button' name="simpan">simpan</button> <input type='reset'  class='k-button' value="reset"></td>
							</tr>	


					</form>
					</footer>
				</article><!-- end of post new article -->
				
				
			
		</div>
		</article>
		<?php
		}
		?>		

<?php


}


?>