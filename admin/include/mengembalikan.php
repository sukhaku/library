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
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();	
		          $("#nomor").kendoNumericTextBox();	
		        });
</script>


<article class="module width_full">
		<header><h3>Pengembalian Buku</h3></header>
		<div class="module_content">

		<?php
		if(isset($_POST['kembali'])){
			$nis=$_POST['id_siswa'];
			$kode_buku=$_POST['kode_buku'];
			$cek_nis=mysql_num_rows(mysql_query("select nis from siswa where nis='$nis'"));
			$cek_kode_buku=mysql_num_rows(mysql_query("select id_buku from buku where id_buku='$kode_buku'"));
			if($cek_nis<1){
				echo"<script type='text/javascript'>alert('nis tidak ada')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Pengembalian Buku'/>";
			}else if($cek_kode_buku<1){
				echo"<script type='text/javascript'>alert('kode buku tidak ada')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Pengembalian Buku'/>";
			}else{
				//untuk mengambil jumlah yang dipinjam
				$ambil_pinjam=mysql_query("select id_peminjaman,id_buku,jumlah,tanggal_kembali from peminjaman where nis='$nis' and id_buku='$kode_buku' and status_peminjaman='1'");
				
				//cek apakah yang dipinjam ada
				if(mysql_num_rows($ambil_pinjam)>0){
					$tampil_pinjam=mysql_fetch_array($ambil_pinjam);
					$id_peminjaman=$tampil_pinjam['id_peminjaman'];

					//mengambil selisih antara tanggal kembali buku dan tanggal seharusnya kembali
					$tanggal_sekarang=gmdate('Y-m-d',time()+60*60*7); 
					$tanggal_harus_kembali=$tampil_pinjam['tanggal_kembali']; 
					$selisih_tanggal_pinjam=(strtotime($tanggal_harus_kembali)-strtotime($tanggal_sekarang))/(60*60*24);

					//jumlah buku yang dipinjam
					$jumlah_kembali=$tampil_pinjam['jumlah'];

					//untuk update stok buku setelah pengembalian
					$id_buku=$tampil_pinjam['id_buku'];
					$ambil_stok=mysql_query("select stok from buku where id_buku='$id_buku'");
					$tampil_stok=mysql_fetch_array($ambil_stok);
					$stok=$tampil_stok['stok'];

					$stok_buku_now=$stok + $jumlah_kembali;
					$update_stok=mysql_query("update buku set stok='$stok_buku_now' where id_buku='$id_buku'");


					if($selisih_tanggal_pinjam<0){
						//untuk menghitung jumlah hari minggu /*
						$hari_ini=date("Y-m-d");
						$hari_selanjutnya=$tanggal_harus_kembali;
						$explode=explode("-",$hari_selanjutnya);
						$bulan=$explode[1];
						$tahun=$explode[0];
						$tanggal=$explode[2];

						$selisih=mysql_fetch_array(mysql_query("select datediff('$hari_ini','$hari_selanjutnya') as selisih"));
						$selisihe=$selisih['selisih'];

						for($i=0; $i<$selisihe; $i++){

							$minggu= date("Y-m-d", mktime(0, 0, 0, $bulan, $tanggal+$i, $tahun ));

							if(date("w", mktime(0, 0, 0, $bulan, $tanggal+$i, $tahun))==0){
								$hitung[]=$minggu;
							}
						}
							$sudo = count($hitung);
							$konvert = $selisih_tanggal_pinjam*-1;
						//akhir hitung jumlah hari minggu */ 
						$jumlah_terlambat=$konvert-$sudo;	

						if($jumlah_terlambat>0){
							$update_data=mysql_query("update peminjaman set status_peminjaman='0',tanggal_kembali='$tanggal_sekarang' where id_peminjaman='$id_peminjaman'");
							$ambil_peraturan_denda=mysql_fetch_array(mysql_query("select*from pengaturan where status_pengaturan='1'"));
							$bayar=$ambil_peraturan_denda['denda_terlambat'];
							$denda=$bayar*$jumlah_terlambat*$jumlah_kembali;
							$input_terlambat=mysql_query("insert into denda_terlambat values('NULL','$id_peminjaman','$jumlah_terlambat','$denda')");
							echo"<script>alert('Terlambat mengembalikan !!')</script>";
							echo"<meta http-equiv='refresh' content='0; ?hal=Pengembalian Buku'/>";}
					}else{
						$update_data=mysql_query("update peminjaman set status_peminjaman='0',tanggal_kembali='$tanggal_sekarang' where id_peminjaman='$id_peminjaman'");
						echo"<meta http-equiv='refresh' content='0; ?hal=Pengembalian Buku'/>";
					}	
				   
				}else{
						echo"<script>alert('Peminjaman tidak ada')</script>";
						echo"<meta http-equiv='refresh' content='0; ?hal=Pengembalian Buku'/>";	
				}
					
			}	
			
		}else{
		?>
<script type="text/javascript">
$(document).ready(function(){
    //untuk fokus ke nip ketika dijalankan login
    $("#id_siswa").focus();

   
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

		<form action="?hal=Pengembalian Buku" method="post" id="validasiform">
		<table cellpadding="8" cellspacing="8">
							<tr>
							<th align="left">ID Anggota</th>
							<td><input type="text" id="id_siswa" onkeyup="submitT(this,this.form)" name="id_siswa" class="k-textbox" required validationMessage="Isikan id siswa">
							</tr>
							<tr>
								<th align="left">Kode Buku</th>
								<td><input type="text" id="kode_buku" name="kode_buku" class="k-textbox" required validationMessage="Isikan kode buku">
							</tr>
							<tr>
								<td></td>
								<td><button type='submit'  class='k-button' value="pinjam" name='kembali'>Kembali</button></td>
							</tr>	
		</table>			

		</form>
		<?php
		}
?>
<br>

<br>
<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th>ID Anggota</th>
		<th>Nama</th>
		<th>Kode Buku</th>
		<th align='center'>Tanggal Pinjam</th>
		<th align='center'>Tanggal Max Kembali</th>
		<th align='center'>Tanggal Kembali</th>
		<th align='left'>Terlambat</th>
		<th align='left'>Denda</th>
		<th>Status</th>

		
	</tr>
</thead>
<tbody>	
<?php
$jupuk=gmdate('Y-m-d',time()+60*60*7);
$ambil=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and tanggal_kembali='$jupuk' and peminjaman.status_peminjaman='0'");
$no=1;
while($tampil=mysql_fetch_array($ambil)){
?>

<tr>
<td><?php echo"$tampil[nis]";?></td>
<td><?php echo"$tampil[nama]";?></td>
<td align='center'><?php echo"$tampil[id_buku]";?></td>
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
<td>
<?php
$id_pinjame=$tampil['id_peminjaman'];
$id_bukune=$tampil['id_buku'];
$nise=$tampil['nis'];
$jupuk=mysql_query("select*from denda_terlambat,peminjaman,buku,siswa where denda_terlambat.id_peminjaman=peminjaman.id_peminjaman and peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and peminjaman.nis='$nise' and peminjaman.id_buku='$id_bukune' and denda_terlambat.id_peminjaman='$id_pinjame'");
$jupuke=mysql_fetch_array($jupuk);
$cek=mysql_num_rows($jupuk);
if($cek>0){
echo "$jupuke[jumlah_hari_telat] Hari";
}else{
	echo"-";
}
?>
</td>
<td>
<?php
if($cek>0){ 
echo "Rp.$jupuke[denda]";
}else{
echo"-";	
}
?>
</td>
<td>
<?php
$keterangan=$tampil['status_peminjaman'];
if($keterangan=='1'){
	echo"<a href='?hal=Pengembalian&id_peminjaman=$tampil[id_peminjaman]'><u style='color:blue;'>Pinjam</u></a>";
}else{
	$id_peminjaman=$tampil['id_peminjaman'];
	$ambil_terlambat=mysql_query("select*from denda_terlambat where id_peminjaman='$id_peminjaman'");
	$cek=mysql_num_rows($ambil_terlambat);
	if($cek>=1){
	echo"<u style='color:red;'>Kembali</u>";
	}else{
	echo"<u>Kembali</u>";
	}
}
?>

</td>


</tr>
<?php
$no++;
}


?>
</tbody>
</table>
<br>
<a href="?hal=Lihat Pengembalian" class="k-button" style="text-decoration:none; color:black;">Lihat Semua</a>


		</div>
</article>