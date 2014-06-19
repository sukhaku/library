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
<article class="module width_full">
	<header><h3><?php echo"$_GET[hal]"; ?></h3></header>
	<div class="module_content">

	<?php
	if(isset($_POST['input_kategori'])){
		$nama_kategori=$_POST['nama_kategori'];
		$ambil=mysql_query("select*from kategori_buku where nama_kategori='$nama_kategori'");
		$cek=mysql_num_rows($ambil);
		if($cek<=0){
			$input=mysql_query("insert into kategori_buku values('','$nama_kategori')");
			if($input){
				header("location:?hal=Tambah Kategori Buku");
			}
		}

	}else{
	?>	
	
	<form action="?hal=Tambah Kategori Buku" method="post">
	<table cellpadding='5'>
		<tr>
			<th>Nama Kategori</th>
			<td><input type='text' name='nama_kategori' class="k-textbox"></td>
		</tr>
		
		<tr>
		<th></th>
		<td><button type='submit' name="input_kategori" class="k-button">Tambah</button></td>
		</tr>

	</table>							
	</form>
	<table class='display' id='tabeldata' width='400px'>
	<thead>
		<tr>
			<td width='10px'>No</td>
			<td>Jenis Kategori</td>
			<td width='40px'>Operasi</td>
		</tr>
	</thead>
	<tbody>	
		<?php 
		$no=1;
		$buku=mysql_query("select*from kategori_buku");
		while($kat=mysql_fetch_array($buku)){
		?>
		<tr>
			<td><?php echo"$no";?></td>	
			<td>
			<?php echo"$kat[nama_kategori]";?>	
			</td>
<td align="center"><a href='?hal=edit_kategori&id_kategori=<?php echo"$kat[id_kategori]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href='?hal=hapus_kat&id_kategori=<?php echo"$kat[id_kategori]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
	
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
	</div>
</article>
