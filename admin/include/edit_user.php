<link href="styles/kendo.common.min.css" rel="stylesheet" />

		      <link href="css/kendo.default.min.css" rel="stylesheet" />
		      <script src="js/kendo.web.min.js"></script>
		      <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();		
		        });
		      </script>


<?php
if($_GET['hal']=='edit_petugas'){
		if(isset($_POST['simpan'])){
		$id_petugas=$_POST['id_petugas'];
		$nama=$_POST['nama'];
		$password=$_POST['pass'];
		$ambil_password=mysql_fetch_array(mysql_query("select password from petugas where nip='$id_petugas'"));
		if($ambil_password['password']==$password){
			$input_password=$password;
		}else{
			$input_password=md5($password);		
		}
		$status=$_POST['status'];

		$input=mysql_query("update petugas set nama_petugas='$nama',password='$input_password',kategori_petugas='$status' where nip='$id_petugas'");
			if($input){
				echo"<script type='text/javascript'>alert('berhasil disimpan')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Petugas'/>";
			}else{
				echo"<script type='text/javascript'>alert('Gagal disimpan!!');javascript:history.go(-1)</script>";
			}
		}else{
?>

			
<?php
$id=$_GET['id'];
$ambil=mysql_query("select*from petugas where nip='$id' limit 1");
$tampil=mysql_fetch_array($ambil);
?>	
		<article class="module width_full">
		<header><h3>Edit Petugas</h3></header>
		<div class="module_content">

					<form action="?hal=edit_petugas" method="post" id="validasiform">
						<table cellpadding='5' cellspacing='5'>
							
								<input type="hidden" name="id_petugas" value='<?php echo"$tampil[nip]";?>' class="k-textbox" required validationMessage="Isikan id petugas">
									
							<tr>
								<th align="left">Nama</th>
								<td><input type="text" name="nama" value='<?php echo"$tampil[nama_petugas]";?>' class="k-textbox" required validationMessage="Isikan nama">
							</tr>
							<tr>
								<th align="left">Password</th>
								<td><input type="password" name="pass" value='<?php echo"$tampil[password]";?>' class="k-textbox" required validationMessage="Isikan password">
							</tr>
							<tr>
								<th align="left">Status</tath>
								<td>
									<select name='status' class='k-textbox'>
										<?php
										$status=$tampil['kategori_petugas'];
									if($namaku[kategori_petugas]==1){	

										if($status==1){
										echo"<option value='1' selected>Admin</option>
										<option value='2'>Petugas</option>";
										}else{
										echo"<option value='1' selected>Admin</option>
										<option value='2' selected>Petugas</option>";	
										}
									}else{
										echo"<option value='2' selected>Petugas</option>";
									}	
										?>
								</td>	
							</tr>
							<tr>
								<td colspan='2'><button type='submit' class='k-button' name="simpan">Simpan</button> <input type='reset'  class='k-button' value="Ulang"></td>
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
}else if($_GET['hal']=='edit_siswa'){
?>	

		<?php
		if(isset($_POST['ubah'])){
		$id_anggota=$_POST['id_anggota'];
		$nama=$_POST['nama'];
		$password=$_POST['pass'];
		$kelas=$_POST['kelas'];

		$ambil_password=mysql_fetch_array(mysql_query("select password from siswa where nis='$id_anggota'"));
		if($password==$ambil_password['password']){		
			$input_password=$password;			
		}else{
			$input_password=md5($password);
		}

		$input=mysql_query("update siswa set nama='$nama',id_kelas='$kelas',password='$input_password' where nis='$id_anggota'");
			if($input){
				echo"<script type='text/javascript'>alert('berhasil disimpan')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Siswa'/>";
			}else{	
				echo"<script type='text/javascript'>alert('Gagal disimpan!!!'):javascript:history.go(-1)</script>";
			}
		}else{
		$id=$_GET['id'];
		$ambil=mysql_query("select*from siswa where nis='$id' limit 1");
		$tampil=mysql_fetch_array($ambil);

		?>	
		<article class="module width_full">
		<header><h3>Edit Siswa</h3></header>
		<div class="module_content">

					<form action="?hal=edit_siswa" method="post" id="validasiform">
						<table cellpadding='5' cellspacing='5'>
							
							<input type="hidden" name="id_anggota" value='<?php echo"$tampil[nis]";?>'>
							<tr>
								<th align="left">Nama</th>
								<td><input type="text" name="nama" value='<?php echo"$tampil[nama]";?>' class="k-textbox" required validationMessage="Isikan nama">
							</tr>
							<tr>
								<th align="left">Password</th>
								<td><input type="password" name="pass" value='<?php echo"$tampil[password]";?>' class="k-textbox" required validationMessage="Isikan password">
							</tr>		
						
							<tr>
								<th align="left">Kelas</th>
								<td>
									<select name='kelas' class='k-textbox'>
									<?php
										include'koneksi.php';
										$id_kelas=$tampil['id_kelas'];
										$kelas=mysql_query("select*from kelas");
										while($ambil_kelas=mysql_fetch_array($kelas)){
											if($id_kelas==$ambil_kelas['id_kelas']){
											echo"<option value='$ambil_kelas[id_kelas]' selected>$ambil_kelas[nama_kelas]</option>";
											}else{
												echo"<option value='$ambil_kelas[id_kelas]'>$ambil_kelas[nama_kelas]</option>";
											}
										}
									?>
									</select> 
								</td>	
							</tr>
							<tr>
								<td colspan='2'><button type='submit' class='k-button' name="ubah">simpan</button> <input type='reset'  class='k-button' value="reset"></td>
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
}else if($_GET['hal']=='edit_guru'){
?>	

		<?php
		if(isset($_POST['ubah'])){
		$id_anggota=$_POST['id_anggota'];
		$nama=$_POST['nama'];
		$password=$_POST['pass'];

		$ambil_password=mysql_fetch_array(mysql_query("select password from siswa where nis='$id_anggota'"));
		if($password==$ambil_password['password']){		
			$input_password=$password;			
		}else{
			$input_password=md5($password);
		}

		$input=mysql_query("update siswa set nama='$nama',password='$input_password' where nis='$id_anggota'");
			if($input){
				echo"<script type='text/javascript'>alert('berhasil disimpan')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Guru'/>";
			}else{	
				echo"<script type='text/javascript'>alert('Gagal disimpan!!!'):javascript:history.go(-1)</script>";
			}
		}else{
		$id=$_GET['id'];
		$ambil=mysql_query("select*from siswa where nis='$id' limit 1");
		$tampil=mysql_fetch_array($ambil);

		?>	
		<article class="module width_full">
		<header><h3>Edit Guru</h3></header>
		<div class="module_content">

					<form action="?hal=edit_guru" method="post" id="validasiform">
						<table cellpadding='5' cellspacing='5'>
							
							<input type="hidden" name="id_anggota" value='<?php echo"$tampil[nis]";?>'>
							<tr>
								<th align="left">Nama</th>
								<td><input type="text" name="nama" value='<?php echo"$tampil[nama]";?>' class="k-textbox" required validationMessage="Isikan nama">
							</tr>
							<tr>
								<th align="left">Password</th>
								<td><input type="password" name="pass" value='<?php echo"$tampil[password]";?>' class="k-textbox" required validationMessage="Isikan password">
							</tr>		
						
							<tr>
								<td colspan='2'><button type='submit' class='k-button' name="ubah">simpan</button> <input type='reset'  class='k-button' value="reset"></td>
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