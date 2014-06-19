<style type="text/css">
@import "css/demo_table_jui.css";
@import "include/themes/smoothness/jquery-ui-1.8.4.custom.css";
</style>
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
        <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();	
		 		   $("#tanggal").kendoDatePicker();	
		        });
		</script>
	


<?php
if($_GET['hal']=='Buku'){
?>        
	<article class="module width_full">
				<header><h3>Data Buku</h3></header>
				<div class="module_content">
					
		<table class='display' id='tabeldata'>
		<thead>	
		<tr>
			<th>Kode Klarifikasi</th>
			<th>Judul</th>
			<th>Kategori</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun Terbit</th>
			<th>Tersedia</th>
			<th>Kontrol</th>
		</tr>
		</thead>

	<tbody>


	<?php
	$no=1;
	$data=mysql_query("select kode_klarifikasi,judul_buku,nama_kategori,pengarang,penerbit,tahun_terbit,count(id_buku)as stok_buku from buku,kategori_buku where buku.id_kategori=kategori_buku.id_kategori group by judul_buku");
	$cek=mysql_num_rows($data);
	while($ambil=mysql_fetch_array($data)){
	?>
	<form action="?hal=hapus_buku" method='post'>
	<tr class='info'>
		<td align="center"><?php echo"$ambil[kode_klarifikasi]";?></td>
		<td><?php echo"$ambil[judul_buku]";?></td>
		<td align="left"><?php echo"$ambil[nama_kategori]";?></td>
		<td><?php echo"$ambil[pengarang]";?></td>
		<td align="left"><?php echo"$ambil[penerbit]";?></td>
		<td align="center"><?php echo"$ambil[tahun_terbit]";?></td>
		<td align="center"><?php echo"$ambil[stok_buku]";?></td>
		<td align="center"><a href='?hal=edit_buku&id_buku=<?php echo"$ambil[id_buku]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href='?hal=hapus_buku&id_buku=<?php echo"$ambil[id_buku]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
				
	</tr>
	<?php
	$no++;	
	}
	?>
	</tbody>
	</table>

	</form>

	<br>
	<br>
	<a href="?hal=Import Buku" class="k-button" style="text-decoration:none; color:black;">Import</a>  <a href="?hal=tambah_buku" class="k-button" style="text-decoration:none; color:black;">Input Buku</a>
				</div>				
	</article><!-- end of styles article -->

<?php
}else if($_GET['hal']=='Buku Masuk'){
?>

	<article class="module width_full">
				<header><h3>Data Buku Masuk</h3></header>
				<div class="module_content">
					
		<table class='display' id='tabeldata'>
		<thead>	
		<tr>
			<th>Kode Buku</th>
			<th>Judul</th>
			<th>Kategori</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tahun Terbit</th>
			<th>Jumlah</th>
			<th>Waktu</th>
		</tr>
		</thead>

	<tbody>


	<?php
	$no=1;
	$data=mysql_query("select*from buku_masuk,buku,kategori_buku where buku.id_kategori=kategori_buku.id_kategori and buku_masuk.id_buku=buku.id_buku");
	$cek=mysql_num_rows($data);
	while($ambil=mysql_fetch_array($data)){
	?>
	<form action="?hal=hapus_buku" method='post'>
	<tr class='info'>
		<td align="center"><?php echo"$ambil[id_buku]";?></td>
		<td><?php echo"$ambil[judul_buku]";?></td>
		<td align="left"><?php echo"$ambil[nama_kategori]";?></td>
		<td><?php echo"$ambil[pengarang]";?></td>
		<td align="left"><?php echo"$ambil[penerbit]";?></td>
		<td align="center"><?php echo"$ambil[tahun_terbit]";?></td>
		<td align="center"><?php echo"$ambil[jumlah]";?></td>
		<td align="center"><?php echo"$ambil[tanggal]";?></td>			
	</tr>
	<?php
	$no++;	
	}
	?>
	</tbody>
	</table>

	</form>

	</div>				
	</article><!-- end of styles article -->




<?php	
}else{
	if(isset($_POST['Tambah'])){
		$toko_buku = $_POST['toko_buku'];
		$penerbit = $_POST['penerbit'];
		$total_buku = $_POST['total_buku'];
		$tanggal_terima = $_POST['tanggal_terima'];
		$explode=explode("/",$tanggal_terima);
		$tanggale=$explode[1];
		$bulane=$explode[0];
		$tahune=$explode[2];
		$tanggale_terima="$tahune-$bulane-$tanggale";
		$keterangan = $_POST['keterangan'];
		$total_harga = $_POST['total_harga'];
		$pengirim = $_POST['pengirim'];

		$tambah = mysql_query("insert into pengadaan_buku values('','$toko_buku','$total_buku','$tanggale_terima','$keterangan','$total_harga','$penerbit','$pengirim')");
		if($tambah){
			echo "<meta http-equiv='refresh' content='0; ?hal=Pengadaan Buku'/>";
		}else{
				echo "<script>alert('Gagal ditambahkan');javascript:history.go(-1)</script>";
		}		
	}
?>
	<article class="module width_full">
				<header><h3>Pengadaan Buku</h3></header>
				<div class="module_content">
		


			<form action="?hal=Pengadaan Buku" method="post" class="form_upload" enctype="multipart/form-data" id="validasiform">
				<table width="500px" height="120px" cellspacing="5" cellpadding="5" >
					<tr>
						<td align='left'>Toko Buku</td>
						<td>
						<input type="text" style="width:300px;" name='toko_buku' class='k-textbox' required validationMessage="Isikan nama toko buku">
						</td>		
					</tr>
					<tr>
						<td align='left'>Penerbit</td>
						<td>
						<input type="text" style="width:250px;" name='penerbit' class='k-textbox' required validationMessage="Isikan nama penerbit">
						</td>		
					</tr>
					<tr>
						<td align='left'>Total Buku</td>
						<td>
						<input type="text"  style="width:70px;" pattern="[0-9]*" name='total_buku' class='k-textbox' required validationMessage="Isikan total buku">
						</td>		
					</tr>
					<tr>
						<td align='left'>Tanggal Terima</td>
						<td>
						<input type="text" style="width:100px;" id="tanggal" name='tanggal_terima' class='k-textbox' required validationMessage="Isikan tanggal terima buku">
						</td>		
					</tr>
					
					<tr>
						<td align='left'>Keterangan</td>
						<td>
						<select name='keterangan' class='k-textbox' style="width:100px;">
							<option value='Doping'>Doping</option>
							<option value='Pembelian'>Pembelian</option>
							<option value='Bos'>Bos</option>
						</select>
						</td>		
					</tr>
					<tr>
						<td align='left'>Total Harga</td>
						<td>
						<input type="text" pattern="[0-9]*" name='total_harga' class='k-textbox' required validationMessage="Isikan total harga buku">
						</td>		
					</tr>
					<tr>
						<td align='left'>Pengirim</td>
						<td>
						<input type="text" style="width:280px;" name='pengirim' class='k-textbox' required validationMessage="Isikan pengirim buku">
						</td>		
					</tr>
					
					
					<tr>
						<td></td>
						<td>
							<button type="submit" name="Tambah" class="k-button">Tambah</button>
						</td>	
					</tr>	
				</table>
			</form>
			<br>				
		<table class='display' id='tabeldata'>
		<thead>	
		<tr>
			<th>No</th>
			<th>Toko Buku</th>
			<th>Penerbit</th>
			<th>Total Buku</th>
			<th>Tanggal Terima</th>
			<th>Keterangan</th>
			<th>Total Harga</th>
			<th>Pengirim</th>
			<th>Kontrol</th>
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
		<td align="center"><a href='include/cetak_pengadaan&id=<?php echo"$ambil[id_pengadaan]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href='?hal=hapus_pengadaan&id=<?php echo"$ambil[id_pengadaan]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
	

	</tr>
	<?php
	$no++;	
	}
	?>
	</tbody>
	</table>

	
	</div>				
	</article><!-- end of styles article -->





<?php	
}
?>
