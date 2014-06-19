<article class="module width_full">
	<header><h3><?php echo"$_GET[hal]"; ?></h3></header>
	<div class="module_content">
		<?php
		if($_GET['hal']=='tambah_visi'){	
			if(isset($_POST['Tambah'])){

				$isi=$_POST['isi'];
				$kategori=$_POST['kategori'];

				$input=mysql_query("insert into profil values('NULL','$isi','$kategori')");
				if($input){
					echo"<script>alert('Berhasil ditambahkan')</script>";
					echo"<meta http-equiv='refresh' content='0; ?hal=Visi Misi'/>";

				}else{
					echo"<script type='text/javascript'>alert('Tidak berhasil ditambahkan');javascript:history.go(-1)</script>";
				}


			}else{
		?>

				<script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();		
		        });
		        </script>
		     <form action="?hal=tambah_visi" method="post" id="validasiform">	
						<table cellspacing="8">
							<tr>
								<th align='left'>Isi</th>
								<td><textarea name='isi' rows="9" cols="45" required validationMessage="Belum diisi"></textarea></td>
							</tr>
							<tr>
								<th align='left'>Kategori</th>
								<td><select name='kategori' class="k-textbox">
									<?php
									$kategori=mysql_query("select*from kategori_profil");
									while($tampil_kategori=mysql_fetch_array($kategori))
									{
										echo"<option value=$tampil_kategori[id_kategori]>$tampil_kategori[nama_kategori]</option>";
									}
									?>	
									</select>
								</td>
							</tr>
							<tr>
								<th></th>
								<td><button type='submit'  name="Tambah" class="k-button">Simpan</button></td>
							</tr>	
						</table>
						</form>					   	





		<?php		
				 }
		}else{
			if(isset($_POST['Tambah'])){

				$isi=$_POST['isi'];
				$kategori=$_POST['kategori'];

				$input=mysql_query("insert into petunjuk values('NULL','$isi','$kategori')");
				if($input){
					echo"<script>alert('Berhasil ditambahkan')</script>";
					echo"<meta http-equiv='refresh' content='0; ?hal=Petunjuk'/>";

				}else{
					echo"<script type='text/javascript'>alert('Tidak berhasil ditambahkan');javascript:history.go(-1)</script>";
				}


			}else{
		?>
			<script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();		
		        });
		        </script>
		     <form action="?hal=tambah_petunjuk" method="post" id="validasiform">	
						<table cellpadding="10">
							<tr>
								<th align='left'>Isi</th>
								<td><textarea name='isi' rows="9" cols="45" required validationMessage="Belum diisi"></textarea></td>
							</tr>
							<tr>
								<th align='left'>Kategori</th>
								<td><select name='kategori' class="k-textbox">
									<?php
									$kategori=mysql_query("select*from kategori_petunjuk");
									while($tampil_kategori=mysql_fetch_array($kategori))
									{
										echo"<option value=$tampil_kategori[id_kategori]>$tampil_kategori[nama_kategori]</option>";
									}
									?>	
									</select>
								</td>
							</tr>
							<tr>
								<th></th>
								<td><button type='submit' name="Tambah" class="k-button">Simpan</button></td>
							</tr>	
						</table>
						</form>					   	






		<?php	
			}
		}
		?>		
	</div>
</article>