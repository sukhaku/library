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
        


<article class="module width_full">
	<header><h3><?php echo"$_GET[hal]"; ?></h3></header>
	<div class="module_content">
		<?php
		if($_GET['hal']=='Visi Misi'){
		?>
			
			<table class='display' id='tabeldata'>
				<thead>	
					<tr>
						<th>No</th>
						<th>Isi</th>
						<th>Kategori</th>
						<th>Kontrol</th>
					</tr>
				</thead>
				<tbody>	
					<?php
					$no=1;
					$data=mysql_query("select*from profil,kategori_profil where profil.id_kategori=kategori_profil.id_kategori");
					$cek=mysql_num_rows($data);
					while($ambil=mysql_fetch_array($data)){
					?>
					<form action="?hal=hapus_visi" method='post'>
					<tr class='info'>
						<td align="center"><?php echo"$no";?></td>
						<td align="left"><?php echo"$ambil[isi]";?></td>
						<td align="center"><?php echo"$ambil[nama_kategori]";?></td>
						<td align="center"><a href='?hal=edit_visi&id_profil=<?php echo"$ambil[id_profil]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href='?hal=hapus_profil&id_profil=<?php echo"$ambil[id_profil]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
								
					</tr>
					<?php
					$no++;	
					}
					?>
					</tbody>
				</table>
				</form>

<br><br>
<a href="?hal=tambah_visi" class="k-button" style="text-decoration:none; color:black;">Tambah</a>


			<?php	
			}elseif($_GET['hal']=='Galeri'){
			?>

			<?php
if(isset($_POST['upload'])){
	$kategori = $_POST['kategori'];
	$F1 = $_FILES['F1']['tmp_name'];
	$F1_name = $_FILES['F1']['name'];
	$F1_type = $_FILES['F1']['type'];
	$F1_size = $_FILES['F1']['size'];
	
	if($F1_size<=2000000){
		if(!empty($F1_type)){
		switch ($F1_type) {
			case "image/jpeg" :
				$simpan=mysql_query("insert into gallery(id_gallery,name,type,size,kategori)values('','$F1_name','$F1_type','$F1_size','$kategori')");
				if($simpan){
				$pindah=move_uploaded_file($F1,'../images/Galeri/'.$F1_name);
				echo"<meta http-equiv='refresh' content='0; ?hal=Galeri'/>";
				}else{
				echo"<script type='text/javascript'>alert('gagal');javascript:history.go(-1)</script>";
					}	
			break;
			
			case "image/pjpeg" :
			$simpan=mysql_query("insert into gallery(id_gallery,name,type,size,kategori)values('','$F1_name','$F1_type','$F1_size','$kategori')");
				if($simpan){
				$pindah=move_uploaded_file($F1,'../images/Galeri/'.$F1_name);
				echo"<meta http-equiv='refresh' content='0; ?hal=Galeri'/>";
				}else{
				echo"<script type='text/javascript'>alert('gagal');javascript:history.go(-1)</script>";
					}
			break;
			
			default;
			echo "<script>alert('Tidak diizinkan upload');javascript:history.go(-1)</script>";
			exit;
			}
		}else{
			echo "<script>alert('Tidak diizinkan upload');javascript:history.go(-1)</script>";
		}	
	}


	
}else{
?>
<form action="?hal=Galeri" method="post" class="form_upload" enctype="multipart/form-data" id="validasiform">
<table width="500px" height="120px" cellspacing="5" cellpadding="5">
	<tr>
		<td align='left'>Gambar</td>
		<td>
		<input type="file" name='F1' required validationMessage="Pilih file yang diupload">
		</td>		
	</tr>
	<tr>
		<td align='left'></td>
		<td>
		<p style="color:red;">Gambar harus .jpg/.jpeg</p>
		<p style="color:red;">Ukuran file tidak boleh lebih dari 2 MB</p>
		<p style="color:red;">Pastikan ukuran gambar width=940px height=600px</p>

		</td>		
	</tr>
	<tr>
		<td align='left'>Kategori</td>
		<td>
		<select name='kategori' class='k-textbox'>
			<option value='sekolah'>Sekolah</option>
			<option value='perpustakaan'>Perpustakaan</option>
			<option value='dokumentasi'>Dokumentasi</option>
		</select>
		</td>		
	</tr>
	<tr>
		<td></td>
		<td>
			<button type="submit" name="upload" class="k-button">Simpan</button>
		</td>	
	</tr>	
</table>

</form>
<br>
	<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th width="20px">No</th>
		<th>Gambar</th>
		<th>Nama File</th>
		<th>Kategori</th>
		<th>Tipe</th>
		<th>Ukuran</th>
		<th>Kontrol</th>
	</tr>
</thead>
<tbody>	
<?php
$ambil=mysql_query("select*from gallery order by size asc");
$no=1;
while($tampil=mysql_fetch_array($ambil)){
?>

<tr>
<td align=center><?php echo"$no";?></td>
<td align='center'><a target='_blank' href='../images/Galeri/<?php echo"$tampil[name]";?>'><img src='../images/Galeri/<?php echo"$tampil[name]";?>' width='100px' height='100px'/></a></td>
<td><?php echo"$tampil[name]";?></td>
<td align='center'><?php echo"$tampil[kategori]";?></td>
<td><?php echo"$tampil[type]";?></td><td><?php echo"$tampil[size]";?></td>
<td align="center">
<a href='?hal=hapus_galeri&id_galeri=<?php echo"$tampil[id_gallery]";?>&name=<?php echo"$tampil[name]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
</td>
</tr>
<?php
$no++;
}


?>
</tbody>
</table>				
<?php
}
?>
					<?php		
					}elseif($_GET['hal']=='Petunjuk'){
					?>

		<table class='display' id='tabeldata'>
				<thead>	
					<tr>
						<th>No</th>
						<th>Isi</th>
						<th>Kategori</th>
						<th>Kontrol</th>
					</tr>
				</thead>
				<tbody>	
					<?php
					$no=1;
					$data=mysql_query("select*from petunjuk,kategori_petunjuk where petunjuk.id_kategori=kategori_petunjuk.id_kategori");
					$cek=mysql_num_rows($data);
					while($ambil=mysql_fetch_array($data)){
					?>
					<form action="?hal=hapus_visi" method='post'>
					<tr class='info'>
						
						<td align="center" width='5px'><?php echo"$no";?></td>
						<td align="left"><?php echo"$ambil[isi]";?></td>
						<td align="center"><?php echo"$ambil[nama_kategori]";?></td>
						<td align="center">
							<a href='?hal=edit_petunjuk&id_petunjuk=<?php echo"$ambil[id_petunjuk]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href='?hal=hapus_petunjuk&id_petunjuk=<?php echo"$ambil[id_petunjuk]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
						</td>		
					</tr>
					<?php
					$no++;	
					}
					?>
					</tbody>
				</table>
				
				</form>

			<br><br>
<a href="?hal=tambah_petunjuk" class="k-button" style="text-decoration:none; color:black;">Tambah</a>



		
					<?php
//untuk slider	
					}else if($_GET['hal']=='Slider'){

if(isset($_POST['upload'])){
	$F1 = $_FILES['F1']['tmp_name'];
	$F1_name = $_FILES['F1']['name'];
	$F1_type = $_FILES['F1']['type'];
	$F1_size = $_FILES['F1']['size'];

	if($F1_size<=2000000){
		if(!empty($F1_type)){
		switch ($F1_type) {
			case "image/jpeg" :
				$simpan=mysql_query("insert into slider(id_slider,name,type,size)values('NULL','$F1_name','$F1_type','$F1_size')");
				if($simpan){
				$pindah=move_uploaded_file($F1,'../images/flexslider/'.$F1_name);
				echo"<meta http-equiv='refresh' content='0; ?hal=Slider'/>";
				}else{
				echo"<script type='text/javascript'>alert('gagal');javascript:history.go(-1)</script>";
					}	
			break;
			
			case "image/pjpeg" :
			$simpan=mysql_query("insert into slider(id_slider,name,type,size)values('NULL','$F1_name','$F1_type','$F1_size')");
				if($simpan){
				$pindah=move_uploaded_file($F1,'../images/flexslider/'.$F1_name);
				echo"<meta http-equiv='refresh' content='0; ?hal=Slider'/>";
				}else{
				echo"<script type='text/javascript'>alert('gagal');javascript:history.go(-1)</script>";
					}
			break;
			
			default;
			echo "Tidak diijinkan upload";
			exit;
			}
		}else{
			echo "<script>alert('Tidak diizinkan upload');javascript:history.go(-1)</script>";
		}	
	}


}else{
//untuk upload slider
?>

<form action="?hal=Slider" method="post" class="form_upload" enctype="multipart/form-data" id="validasiform">
<table width="500px" height="120px">
	<tr>
		<td align='left'>Slider</td>
		<td>
		<input type="file" name='F1' required validationMessage="Pilih file yang diupload">
		</td>		
	</tr>
	<tr>
		<td align='left'></td>
		<td>
		<p style="color:red;">Gambar harus .jpg/.jpeg</p>
		<p style="color:red;">Ukuran file tidak boleh lebih dari 2 MB</p>
		<p style="color:red;">Pastikan ukuran gambar width=1920px height=412px</p>
		</td>		
	</tr>
	<tr>
		<td></td>
		<td>
			<button type="submit" name="upload" class="k-button">Simpan</button>
		</td>	
	</tr>	
</table>
</form><br>
<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th width="20px">No</th>
		<th>Gambar</th>
		<th>Nama File</th>
		<th>Tipe</th>
		<th>Ukuran</th>
		<th>Kontrol</th>
	</tr>
</thead>
<tbody>	
<?php
$ambil=mysql_query("select*from slider order by size asc");
$no=1;
while($tampil=mysql_fetch_array($ambil)){
?>

<tr>
<td align=center><?php echo"$no";?></td>
<td align='center'><a target='_blank' href='../images/flexslider/<?php echo"$tampil[name]";?>'><img src='../images/flexslider/<?php echo"$tampil[name]";?>' width='150px' height='100px'/></a></td>
<td><?php echo"$tampil[name]";?></td>
<td><?php echo"$tampil[type]";?></td><td><?php echo"$tampil[size]";?></td>
<td align="center">
<a href='?hal=hapus_slider&id_slider=<?php echo"$tampil[id_slider]";?>&name=<?php echo"$tampil[name]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
</td>
</tr>
<?php
$no++;
}


?>
</tbody>
</table>	






<?php
}

					}else{
//jika tidak terset $_GET['hal']
						echo"halaman tidak ditemukan";
					}
					?>

					
				</div>
</article><!-- end of styles article -->