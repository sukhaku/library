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
		<header><h3>Peminjaman Buku</h3></header>
		<div class="module_content">

		<?php
		if(isset($_POST['pinjam'])){
			$nis=$_POST['id_siswa'];
			$kode_buku=$_POST['kode_buku'];
			$cek_nis=mysql_num_rows(mysql_query("select nis from siswa where nis='$nis'"));
			$cek_kode_buku=mysql_num_rows(mysql_query("select id_buku from buku where id_buku='$kode_buku'"));
			if($cek_nis<1){
				echo"<script type='text/javascript'>alert('nis tidak ada')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Peminjaman'/>";
			}else if($cek_kode_buku<1){
				echo"<script type='text/javascript'>alert('kode buku tidak ada')</script>";
				echo"<meta http-equiv='refresh' content='0; ?hal=Peminjaman'/>";
			}else{
				//cek apakah buku ini pernah dipinjam dan sudah dikembalikan apa belum kalau belum tidak diizinkan pinjam
				$cek_peminjaman=mysql_num_rows(mysql_query("select*from peminjaman where nis='$nis' and id_buku='$kode_buku' and status_peminjaman='1'"));
				if($cek_peminjaman>0){
					echo"<script type='text/javascript'>alert('Buku masih dipinjam')</script>";
					echo"<meta http-equiv='refresh' content='0; ?hal=Peminjaman'/>";		
				}else{
					date_default_timezone_set("Asia/Jakarta");
					$pinjam=date('Y-m-d');
					$jumlah=1;
					$explode=explode('-',$pinjam);
					$bulan_peminjaman=$explode[1];
					$tahun_peminjaman=$explode[0];
					$ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
					$max_hari_pinjam=$ambil_pengaturan['max_hari_pinjam'];
					$kembali=date('Y-m-d',strtotime($pinjam."+$max_hari_pinjam day"));

					$cek=mysql_num_rows(mysql_query("select*from peminjaman where nis='$nis' and status_peminjaman='1'"));
					$max_buku_pinjam=$ambil_pengaturan['max_buku'];
					$aturan_denda=$ambil_pengaturan['denda_terlambat'];
					$max_denda=$ambil_pengaturan['denda_max'];

					//data untuk cek denda maksimalnya
					$ambil_denda=mysql_fetch_array(mysql_query("select datediff('$pinjam',tanggal_kembali) as selisih from peminjaman where nis='$nis' and status_peminjaman='1' limit 1"));
					$tampil_selisih=$ambil_denda['selisih'];
					$cek_denda=$tampil_selisih*$aturan_denda;

					
					//if($cek<$max_buku_pinjam){	
					if($cek>=$max_buku_pinjam){
							echo"<script type='text/javascript'>alert('Mencapai jumlah maksimal peminjaman')</script>";
							echo"<meta http-equiv='refresh' content='0; ?hal=Peminjaman'/>";					
					}else if($cek_denda>=$max_denda){
							echo"<script type='text/javascript'>alert('Peminjaman sebelumnya mencapai denda keterlambatan maksimal dan belum dikembalikan')</script>";
							echo"<meta http-equiv='refresh' content='0; ?hal=Peminjaman'/>";					
					
					}else{
							$ambil=mysql_query("select stok from buku where id_buku='$kode_buku'");
							$tampil=mysql_fetch_array($ambil);
							$stok=$tampil['stok'];
							if($stok>=$jumlah){
								$input_pinjam=mysql_query("insert into peminjaman values('NULL','$nis','$kode_buku','$pinjam','$kembali','$jumlah','1','$bulan_peminjaman','$tahun_peminjaman')");
								if($input_pinjam){
										$update_stok=$stok-$jumlah;
										$query=mysql_query("update buku set stok='$update_stok' where id_buku='$kode_buku'");
											echo"<meta http-equiv='refresh' content='0; ?hal=Peminjaman'/>";
								}else{
											echo"<script type='text/javascript'>alert('Gagal pinjam')</script>";
											echo"<meta http-equiv='refresh' content='0; ?hal=Peminjaman'/>";		
								}			
							}else{
							echo"<script type='text/javascript'>alert('Buku sedang dipinjam')</script>";
							echo"<meta http-equiv='refresh' content='0; ?hal=Peminjaman'/>";
							}					
					}

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
		<form action="?hal=Peminjaman" method="post" id="validasiform">
		<table cellpadding="8" cellspacing="8">
							<tr>
							<th align="left">ID Anggota</th>
							<td><input type="text" id="id_siswa" onkeyup="submitT(this,this.form)" name="id_siswa" class="k-textbox" required validationMessage="Isikan ID anggota">
							</tr>
							<tr>
								<th align="left">Kode Buku</th>
								<td><input type="text" id="kode_buku" name="kode_buku" class="k-textbox" required validationMessage="Isikan kode buku">
							</tr>
							
							<tr>
								<td></td>
								<td><button type='submit' class='k-button' value="pinjam" name='pinjam'>Pinjam</button></td>
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
		<th>Status</th>
	</tr>
</thead>
<tbody>	
<?php
$jupuk=gmdate('Y-m-d',time()+60*60*7);
$ambil=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and tanggal_pinjam='$jupuk' order by id_peminjaman desc");
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
	$tgl_pinjam=$tampil['tanggal_pinjam'];
	$ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
	$max_hari_pinjam=$ambil_pengaturan['max_hari_pinjam'];	

	$max_kembali=date('Y-m-d',strtotime($tgl_pinjam."+$max_hari_pinjam day"));
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
<a href="?hal=Lihat Peminjaman" class="k-button" style="text-decoration:none; color:black;">Lihat Semua</a>

		</div>
</article>