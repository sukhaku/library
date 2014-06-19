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
			       $('#ceksemua').click(function () {
				        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
			       });
		      });  
    	</script>
   

      
<article class="module width_full">
<?php
if($_GET['hal']=='Riwayat Pengunjung'){
?>  	
			<form action='?hal=hapus_banyak_pengunjung' method='post'>
			<header><h3>Riwayat Pengunjung</h3></header>
			<div class="module_content">
				<table class='display' id='tabeldata'>
					<thead>	
					<tr>
						<th width='5'></th>
						<th>IP Pengunjung</th>
						<th>Tanggal</th>
						<th>Hits</th>
						<th>Kontrol</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$no=1;
						$ambil=mysql_query("select*from konter");
						while($tampil=mysql_fetch_array($ambil)){
						?>	
						<tr>
							<td><input type='checkbox' name="item[]" id="item[]" value='<?php echo"$tampil[ip]" ?>'/></td>
							<td><?php echo"$tampil[ip]";?></td>
							<td align='center'><?php echo"$tampil[tanggal]";?></td>
							<td align='center'><?php echo"$tampil[hits] Kali";?></td>
							<td align='center'> <a href='?hal=hapus_pengunjung_website&id_pengunjung=<?php echo"$tampil[ip]";?>&tanggal=<?php echo"$tampil[tanggal]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a></td>
						</tr>								
						<?php
						$no++;
						}
						?>	
					</tbody>
				</table>	
						<br>	
					<button type="submit" name="hapus" class="k-button">Hapus</button>
					<a href='?hal=hapus_semua_pengunjung' class='k-button' style='color:black; text-decoration:none;'>Hapus Semua</a>
				</form>
			</div>				


<?php
}else{
?>
		<form action='?hal=hapus_banyak' method='post' />
			<header><h3>Riwayat Login</h3></header>
			<div class="module_content">
					<table class='display' id='tabeldata'>
					<thead>	
						<tr>
							<th width='5' align="left"></th>
							<th>Ip adress</th>
							<th>ID User</th>
							<th>Nama</th>
							<th>Password</th>
							<th>Status</th>
							<th>Waktu Masuk</th>
							<th>Kontrol</th>
						</tr>
					</thead>	
					<tbody>
						<?php
						$no=1;
						$ambil=mysql_query("select*from riwayat_login");
						while($tampil=mysql_fetch_array($ambil)){
						?>	
						<tr>
							<td><input type='checkbox' name="item[]" id="item[]" value='<?php echo"$tampil[id_riwayat]";?>'/></td>
							<td><?php echo"$tampil[IP]";?></td>
							<td><?php echo"$tampil[id_user]";?></td>
							<td align='left'><?php echo"$tampil[nama]";?></td>
							<td align='left'><?php echo"$tampil[password]";?></td>
							<td align='left'><?php echo"$tampil[status]";?></td>
							<td align='center'><?php echo"$tampil[waktu_masuk]";?></td>
							<td align='center'><a href='?hal=hapus_riwayat&id_riwayat=<?php echo"$tampil[id_riwayat]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a></td>
						</tr>								
						<?php
						$no++;
						}
						?>	
					</tbody>
				</table>
							<br>	
<button type="submit" name="upload" class="k-button">Hapus</button>
	<a href='?hal=hapus_semua_login' class='k-button' style='color:black; text-decoration:none;'>Hapus Semua</a>
				

			</div>			

<?php
}
?>			
</article><!-- end of styles article -->


