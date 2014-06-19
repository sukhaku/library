<style type="text/css">
@import "css/demo_table_jui.css";
@import "include/themes/smoothness/jquery-ui-1.8.4.custom.css";
</style>
<link href="styles/kendo.common.min.css" rel="stylesheet" />

		      <link href="css/kendo.default.min.css" rel="stylesheet" />
		      <script src="js/kendo.web.min.js"></script>
		      <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();		
		        });
		      </script>


<?php
if($_GET['hal']=='edit_visi'){
		if(isset($_POST['simpan'])){
				$id_profil=$_POST['id_profil'];
				$isi=$_POST['isi'];
				$kategori=$_POST['kategori'];

				$ubah=mysql_query("update profil set isi='$isi',id_kategori='$kategori' where id_profil='$id_profil'");
				if($ubah){
					echo"<script>alert('Berhasil diubah')</script>";
					echo"<meta http-equiv='refresh' content='0; ?hal=Visi Misi'/>";

				}else{
					echo"<script type='text/javascript'>alert('Tidak berhasil diubah');javascript:history.go(-1)</script>";
				}

		}else{
?>

			
<?php
$id=$_GET['id_profil'];
$ambil=mysql_query("select*from profil where id_profil='$id' limit 1");
$tampil=mysql_fetch_array($ambil);
?>	
		<article class="module width_full">
		<header><h3>Edit Visi Misi</h3></header>
		<div class="module_content">

					<form action="?hal=edit_visi" method="post" id="validasiform">
						<table cellpadding=5 cellspacing=5>
							
								<input type="hidden" name="id_profil" value='<?php echo"$tampil[id_profil]";?>' class="k-textbox" required validationMessage="Isikan id petugas">
									
							<tr>
								<th align='left'>Isi</th>
								<td><textarea name='isi' rows="9" cols="45" required validationMessage="Belum diisi"><?php echo"$tampil[isi]";?></textarea></td>
							</tr>
							<tr>
								<th align='left'>Kategori</th>
								<td><select name='kategori' class='k-textbox'>
									<?php
									$id_kat=$tampil['id_kategori'];
									$kategori=mysql_query("select*from kategori_profil");
									while($tampil_kategori=mysql_fetch_array($kategori))
									{
										if($id_kat==$tampil_kategori['id_kategori']){
										echo"<option value=$tampil_kategori[id_kategori] selected>$tampil_kategori[nama_kategori]</option>";
										}else{
										echo"<option value=$tampil_kategori[id_kategori]>$tampil_kategori[nama_kategori]</option>";	
										}
									}
									?>	
									</select>
								</td>
							</tr>
								<td colspan='2'><button type='submit' class='k-button' name="simpan">Ubah</button> <input type='reset'  class='k-button' value="reset"></td>
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
}else{
?>	

		<?php
		if(isset($_POST['simpan'])){
				$id_petunjuk=$_POST['id_petunjuk'];
				$isi=$_POST['isi'];
				$kategori=$_POST['kategori'];

				$ubah=mysql_query("update petunjuk set isi='$isi',id_kategori='$kategori' where id_petunjuk='$id_petunjuk'");
				if($ubah){
					echo"<script>alert('Berhasil diubah')</script>";
					echo"<meta http-equiv='refresh' content='0; ?hal=Petunjuk'/>";

				}else{
					echo"<script type='text/javascript'>alert('Tidak berhasil diubah');javascript:history.go(-1)</script>";
				}

		}else{
		$id=$_GET['id_petunjuk'];
		$ambil=mysql_query("select*from petunjuk where id_petunjuk='$id' limit 1");
		$tampil=mysql_fetch_array($ambil);
		?>	
		<article class="module width_full">
		<header><h3>Edit Petunjuk</h3></header>
		<div class="module_content">

					<form action="?hal=edit_petunjuk" method="post" id="validasiform">
						<table cellpadding=5 cellspacing=5>
							
								<input type="hidden" name="id_petunjuk" value='<?php echo"$tampil[id_petunjuk]";?>' class="k-textbox" required validationMessage="Isikan id petugas">
									
							<tr>
								<th align='left'>Isi</th>
								<td><textarea name='isi' rows="9" cols="45" required validationMessage="Belum diisi"><?php echo"$tampil[isi]";?></textarea></td>
							</tr>
							<tr>
								<th align='left'>Kategori</th>
								<td><select name='kategori' class="k-textbox">
									<?php
									$kategori=mysql_query("select*from kategori_petunjuk");
									while($tampil_kategori=mysql_fetch_array($kategori))
									{
										if($tampil['id_kategori']==$tampil_kategori['id_kategori']){
											echo"<option value=$tampil_kategori[id_kategori] selected>$tampil_kategori[nama_kategori]</option>";							
										}else{
										echo"<option value=$tampil_kategori[id_kategori]>$tampil_kategori[nama_kategori]</option>";	
										}
									}
									?>	
									</select>
								</td>
							</tr>
								<td colspan='2'><button type='submit' class='k-button' name="simpan">Ubah</button> <input type='reset'  class='k-button' value="reset"></td>
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