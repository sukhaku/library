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
		<header><h3>Keterlambatan Pengembalian</h3></header>
		<div class="module_content">

<table class='display' id='tabeldata'>
<thead>	
	<tr>
			<th>Nis</th>
			<th>Nama</th>
			<th>Kode Buku</th>
			<th>Jumlah Buku</th>
			<th>Tanggal Pinjam</th>
			<th>Tanggal Max Kembali</th>
			<th>Tanggal Kembali</th>
			<th>Jumlah hari telat</th>
			<th>Denda</th>
			<th>Aksi</th>
				
	</tr>
</thead>
<tbody>	
<?php
$ambil=mysql_query("select*from denda_terlambat,peminjaman,buku,siswa where denda_terlambat.id_peminjaman=peminjaman.id_peminjaman and peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis order by denda asc ");			
$no=1;
while($tampil=mysql_fetch_array($ambil)){
?>

<tr>
			<td><?php echo"$tampil[nis]";?></td>
			<td><?php echo"$tampil[nama]";?></td>
			<td align='center'><?php echo"$tampil[id_buku]";?></td>
			<td align='center'><?php echo"$tampil[jumlah]";?></td>
			<td align='center'>
				<?php 
				$explode=explode("-",$tampil['tanggal_pinjam']);
				$tanggale=$explode[2];
				$bulane=$explode[1];
				$tahune=$explode[0];
				 echo"$tanggale-$bulane-$tahune";
				?>
			</td>
			<td align='center'>
				<?php 
				$pinjam=$tampil['tanggal_pinjam'];
				$ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
				$max_hari_pinjam=$ambil_pengaturan['max_hari_pinjam'];			
				$max_kembali=date('Y-m-d',strtotime($pinjam."+$max_hari_pinjam day"));
				$explode=explode("-",$max_kembali);
				$tanggale=$explode[2];
				$bulane=$explode[1];
				$tahune=$explode[0];
				echo"$tanggale-$bulane-$tahune";
				?>
			</td>
			<td align='center'>
			<?php
			$keterangan=$tampil['status_peminjaman'];
			if($keterangan=='1'){
				$return='-';
			}else if($keterangan=='0'){
				$explode=explode("-",$tampil['tanggal_kembali']);
				$tanggale=$explode[2];
				$bulane=$explode[1];
				$tahune=$explode[0];
				$return="$tanggale-$bulane-$tahune";
			}else{
				$return='kosong';
			}
			echo"$return";
			?>

			</td>
			<td align='center'><?php echo"$tampil[jumlah_hari_telat]";?></td>
			<td align='center'><?php echo"Rp.$tampil[denda]";?></td>
			<td align='center'>
	 			<a href='?hal=hapus_keterlambatan&id_denda=<?php echo"$tampil[id_denda]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
			</td>
</tr>		
<?php
$no++;
}


?>
</tbody>
</table>

</div>
</article>