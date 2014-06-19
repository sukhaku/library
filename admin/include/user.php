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
$(document).ready(function(){
    //untuk fokus ke nip ketika dijalankan login
    $("#id_siswa").focus();

   
});
</script>
       
<article class="module width_full">
			<header><h3>Data <?php echo"$_GET[hal]"; ?></h3></header>
				<div class="module_content">
					<?php
						if($_GET['hal']=='Petugas'){
					?>

					<?php
					if($namaku[kategori_petugas]==1){
						$data=mysql_query("select*from petugas");
					}else{
						$data=mysql_query("select*from petugas where nip='$_SESSION[user]'");	
					}
					$cek=mysql_num_rows($data);
					?>
				
					<table class='display' id='tabeldata'> 
						<thead>
							<tr>
							<th width="100">ID Petugas</th>
							<th>Nama</th>
							<th>Password</th>
							
							<th>Status</th>
							<th>Kontrol</th>
							</tr>
						</thead>
						<tbody>
					<?php
					$no=1;
					while($ambil=mysql_fetch_array($data)){

					?>
					<tr>
						<td align="center"><?php echo"$ambil[nip]";?></td>
						<td align="left"><?php echo"$ambil[nama_petugas]";?></td>
						<td align="center"><?php echo"$ambil[password]";?></td>
						
						<td align='center'>
							<?php if($ambil['kategori_petugas']==1){
								echo"admin";
							}else{
								echo"petugas";
							}
								?>
						</td>
						<td align="center"><a href="?hal=edit_petugas&id=<?php echo"$ambil[nip]";?>"><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href="?hal=hapus_petugas&id=<?php echo"$ambil[nip]";?>"><img src="images/icn_trash.png" width="15" height="15"/></a> 
					</tr>																																							
					<?php	
					$no++;
					}


					?>
					</tbody>
					</table>
					<br>
						<?php
						if($namaku[kategori_petugas]==1){
						?>
							<a href="?hal=tambah_petugas" class="k-button" style="text-decoration:none; color:black;">Tambah</a>
						<?php
						}else{
							
						}
						?>	




					<?php	
						}else if($_GET['hal']=='Siswa'){
					?>
					<form action="?hal=delete_siswa_all" method="post">
					<?php
					//query untuk mendapatkan jumlah seluruh baris
					$data=mysql_query("select*from siswa,kelas where siswa.id_kelas=kelas.id_kelas and status !=4 order by nis asc");
					$cek=mysql_num_rows($data);
					?>
					
					<table class='display' id='tabeldata'>
						<thead>
							<tr>
								<th></th>
								<th>ID Anggota</th>
								<th>Nama</th>
								<th>Password</th>
								
								<th>Kelas</th>
								<th>Kontrol</th>
							</tr>	
						</thead>
						<tbody>
							<?php
							$no=1;
							while($ambil=mysql_fetch_array($data)){
							?>
						<tr class='<?php echo"$class";?>'>
							<td><input type='checkbox' name="item[]" value='<?php echo"$ambil[nis]";?>'></td>
							<td align="center"><?php echo"$ambil[nis]";?></td>
							<td align="left"><?php echo"$ambil[nama]";?></td>
							<td align="center"><?php echo"$ambil[password]";?></td>
							
							<td align="center"><?php echo"$ambil[nama_kelas]";?></td>
							<td align="center">
								<a href='?hal=edit_siswa&id=<?php echo"$ambil[nis]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a> <a href='?hal=hapus_siswa&id=<?php echo"$ambil[nis]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
							</td>																																					
						</tr>
							<?php	
							$no++;
							}
							?>


						</tbody>

					</table>
					<br>
					<a href="?hal=Import Anggota" class="k-button" style="text-decoration:none; color:black;">Impor</a>   <a href="?hal=tambah_anggota" class="k-button" style="text-decoration:none; color:black;">Tambah</a>
					<button type='submit' class="k-button">Hapus</button>
						<?php	
						}else if($_GET['hal']=='Guru'){
					?>
					
					<?php
					//query untuk mendapatkan jumlah seluruh baris
					$data=mysql_query("select*from siswa where status='4' order by nis asc");
					$cek=mysql_num_rows($data);
					?>
					
					<table class='display' id='tabeldata'>
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama</th>
								<th>Password</th>
								<th>Kontrol</th>
							</tr>	
						</thead>
						<tbody>
							<?php
							$no=1;
							while($ambil=mysql_fetch_array($data)){
							?>
						<tr class='<?php echo"$class";?>'>
							<td align="center"><?php echo"$ambil[nis]";?></td>
							<td align="left"><?php echo"$ambil[nama]";?></td>
							<td align="center"><?php echo"$ambil[password]";?></td>
							
							<td align="center">
								<a href='?hal=edit_guru&id=<?php echo"$ambil[nis]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a> <a href='?hal=hapus_guru&id=<?php echo"$ambil[nis]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
							</td>																																					
						</tr>
							<?php	
							$no++;
							}
							?>


						</tbody>

					</table>
					<br>
					<a href="?hal=tambah_guru" class="k-button" style="text-decoration:none; color:black;">Tambah</a>


					<?php		
					}else if($_GET['hal']=='Pengunjung'){
					
					//query untuk mendapatkan jumlah seluruh baris
					$data=mysql_query("select pengunjung.nis,siswa.nama,pengunjung.tahun,count(id_pengunjung) as total_kunjungan from pengunjung,siswa where pengunjung.nis=siswa.nis group by nis,tahun order by total_kunjungan desc");
					$cek=mysql_num_rows($data);
						if(isset($_POST['input'])){
							$nis=$_POST['nis'];
							$tanggal=date("Y-m-d");
							$tahun=date("Y");
							$bulan=date("m");
							$input= mysql_query("INSERT into pengunjung values('','$nis','$tanggal','$bulan','$tahun')");
							if($input){
								echo "<meta http-equiv='refresh' content='0; ?hal=Pengunjung'/>";
							}else{
								echo"<script>alert('Gagal input');javascript:history.go(-1)</script>";
							}
						}
					?>
					

					<form action="?hal=Pengunjung" method="post" class="form_upload" enctype="multipart/form-data" id="validasiform">
					<table width="500px" height="120px" cellspacing="5" cellpadding="5">
						<tr>
							<td align='left'>ID Anggota</td>
							<td>
							<input type="text" class='k-textbox' id='id_siswa' name='nis' required validationMessage="Isikan Nis">
							</td>		
						</tr>
						<tr>
							<td></td>
							<td>
								<button type="submit" name="input" class="k-button">Simpan</button>
							</td>	
						</tr>	
					</table>
					</form>
					<br>

					<table class='display' id='tabeldata'>
						<thead>
							<tr>
								<th>Nis</th>
								<th>Nama</th>
								<th>Jumlah Kunjungan</th>
								<th>Tahun</th>
								<th>Kontrol</th>
							</tr>	
						</thead>
						<tbody>
							<?php
							$no=1;
							while($ambil=mysql_fetch_array($data)){
							?>
						<tr class='<?php echo"$class";?>'>
							<td align="center"><?php echo"$ambil[nis]";?></td>
							<td align="left"><?php echo"$ambil[nama]";?></td>
							<td align="center"><?php echo"<a href='?hal=Detail Pengunjung&nis=$ambil[nis]&tahun=$ambil[tahun]'>$ambil[total_kunjungan] kali</a>";?></td>
							<td align="center"><?php echo"$ambil[tahun]";?></td>
	
							<td align="center">
							<a href='?hal=hapus_pengunjung&nis=<?php echo"$ambil[nis]&tahun=$ambil[tahun]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
							</td>																																					
						</tr>
							<?php	
							$no++;
							}
							?>


						</tbody>

					</table>
					<br>
			
					<?php	
					}else if($_GET['hal']=='Detail Pengunjung'){
					$nis=$_GET['nis'];
					$tahun=$_GET['tahun'];
					$data=mysql_query("select pengunjung.nis,pengunjung.tanggal,siswa.nama,pengunjung.tahun from pengunjung,siswa where pengunjung.nis=siswa.nis and pengunjung.nis='$nis' and pengunjung.tahun='$tahun'");
					$cek=mysql_num_rows($data);
					?>
					
					<table class='display' id='tabeldata'>
						<thead>
							<tr>
								<th>No</th>
								<th>Nis</th>
								<th>Nama</th>
								<th>Tanggal</th>
								<th>Kontrol</th>
							</tr>	
						</thead>
						<tbody>
							<?php
							$no=1;
							while($ambil=mysql_fetch_array($data)){
							?>
						<tr class='<?php echo"$class";?>'>

							<td align="left"><?php echo"$no";?></td>
							<td align="center"><?php echo"$ambil[nis]";?></td>
							<td align="left"><?php echo"$ambil[nama]";?></td>
							<td align="center"><?php echo"$ambil[tanggal]";?></td>
							<td align="center">
							<a href='?hal=hapus_pengunjung_detail&nis=<?php echo"$ambil[nis]&tanggal=$ambil[tanggal]&tahun=$ambil[tahun]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
							</td>																																					
						</tr>
							<?php	
							$no++;
							}
							?>


						</tbody>

					</table>



					<?php	
					}else{
					}
					?>
				</div>
</article><!-- end of styles article -->