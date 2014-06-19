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
		<header><h3>Pengaturan Peminjaman</h3></header>
		<div class="module_content">
<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th>No</th>
		<th>Maksimal Peminjaman Buku</th>
		<th>Maksimal Hari Peminjaman Buku</th>
		<th>Denda Terlambat perhari</th>
		<th>Denda Maksimal</th>
		<th>Status</th>
		<th>Kontrol</th>
	</tr>	
</thead>
<tbody>
<?php
$no=1;
$ambil_pengatuan=mysql_query("select*from pengaturan");
while($tampil_pengaturan=mysql_fetch_array($ambil_pengatuan)){

?>
	<tr>
		<td align='center'><?php echo"$no";?></td>
		<td align='center'><?php echo"$tampil_pengaturan[max_buku] Buku";?></td>
		<td align='center'><?php echo"$tampil_pengaturan[max_hari_pinjam] Hari";?></td>
		<td align='center'><?php echo"Rp. $tampil_pengaturan[denda_terlambat]";?></td>
		<td align='center'><?php echo"Rp. $tampil_pengaturan[denda_max]";?></td>	
		<td align='center'>
			<?php 
			$status=$tampil_pengaturan['status_pengaturan'];
			if($status==1){
				echo"<a href='?hal=ubah_status_aktif&id_pengaturan=$tampil_pengaturan[id_pengaturan]'>Aktif</a>";
			}else{
				echo"<a href='?hal=ubah_status_non&id_pengaturan=$tampil_pengaturan[id_pengaturan]'>Tidak Aktif</a>";	
			}
			?>
		</td>
		<td align="center">
		 	<a href='?hal=edit_pengaturan&id_pengaturan=<?php echo"$tampil_pengaturan[id_pengaturan]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a> <a href='?hal=hapus_pengaturan&id_pengaturan=<?php echo"$tampil_pengaturan[id_pengaturan]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
		</td>	
	</tr>	
<?php
$no++;
}
?>

</tbody>	

</table>
<br><br>
<a href="?hal=Tambah Pengaturan" class="k-button" style="text-decoration:none; color:black;">Tambah</a>

		</div>
</article>			