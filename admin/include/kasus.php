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
        <script type="text/javascript">
			$(document).ready(function(){
				$("#id_siswa").focus();	
			    //untuk fokus ke nip ketika dijalankan login
			});
		</script>
		<script type="text/javascript">
			var x=8;//nr characters 
			function submitT(t,f){ 	
				if(t.value.length>=x){ 
					$("#kode_buku").focus();	
				} 
			}
		</script>

<article class="module width_full">
	<header><h3><?php echo"$_GET[hal]"; ?></h3></header>
	<div class="module_content">

		<form action="?hal=tambah_kasus" method="post" id="validasiform">
			<table cellpadding="8" cellspacing="8">
								<tr>
								<th align="left">ID Anggota</th>
								<td><input type="text" id="id_siswa" onkeyup="submitT(this,this.form)" name="id_siswa" class="k-textbox" required validationMessage="Isikan ID Anggota">
								</tr>
								<tr>
									<th align="left">Kode Buku</th>
									<td><input type="text" id="kode_buku" name="kode_buku" class="k-textbox" required validationMessage="Isikan kode buku">
								</tr>
								<tr>
									<th align="left">Kasus</th>
									<td>
										<select name='kasus' class='k-textbox'>
											<option>--Kasus--</option>
											<option value='Hilang'>Hilang</option>
											<option value='Rusak'>Rusak</option>
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><button type='submit'  class='k-button' value="input" name='input'>Tambah</button></td>
								</tr>	
			</table>			
		</form>
		<table class='display' id='tabeldata'>
				<thead>	
					<tr>
						<th>No</th>
						<th>Nis</th>
						<th>Nama</th>
						<th>ID Buku</th>
						<th>Judul</th>
						<th>Catatan Kasus</th>
						<th>Tanggal Kasus</th>
						<th>Kontrol</th>
					</tr>
				</thead>
				<tbody>	
					<?php
					$no=1;
					$data=mysql_query("select*from kasus,siswa,buku where kasus.id_anggota=siswa.nis and kasus.id_buku=buku.id_buku");
					$cek=mysql_num_rows($data);
					while($ambil=mysql_fetch_array($data)){
					?>
					<tr class='info'>
						<td align="center"><?php echo"$no";?></td>
						<td align="center"><?php echo"$ambil[id_anggota]";?></td>
						<td align="left"><?php echo"$ambil[nama]";?></td>
						<td align="left"><?php echo"$ambil[id_buku]";?></td>
						<td align="left"><?php echo"$ambil[judul_buku]";?></td>
						<td align="center"><?php echo"$ambil[jenis_kasus]";?></td>
						<td align="center">
							<?php
							$explode=explode("-",$ambil['tgl_kasus']);
							$tanggale=$explode[2];
							$bulane=$explode[1];
							$tahune=$explode[0];
							 echo"$tanggale-$bulane-$tahune";
							 ?>
						</td>
						<td align="center">
							<!--<a href='?hal=edit_kasus&id_kasus=<?php echo"$ambil[id_kasus]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a> --> 
							 <a href='?hal=hapus_kasus&id_kasus=<?php echo"$ambil[id_kasus]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
					</tr>
					<?php
					$no++;	
					}
					?>
					</tbody>
		</table>		
	</div>
</article>