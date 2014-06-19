<?php
$id_peminjaman=mysql_real_escape_string($_GET['id_transaksi']);
$ambil_data=mysql_fetch_array(mysql_query("SELECT*FROM peminjaman,siswa,buku where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and id_peminjaman='$id_peminjaman' limit 1"));

$date_back=$ambil_data['tanggal_kembali'];
$date_borrow=$ambil_data['tanggal_pinjam'];

$explode1=explode("-", $date_back);
$tahun_back=$explode1[0];
$bulan_back=$explode1[1];
$tanggal_back=$explode1[2];
$jadi_back="$bulan_back/$tanggal_back/$tahun_back";


$explode2=explode("-", $date_borrow);
$tahun_borrow=$explode2[0];
$bulan_borrow=$explode2[1];
$tanggal_borrow=$explode2[2];
$jadi_borrow="$bulan_borrow/$tanggal_borrow/$tahun_borrow";

?>		
		<script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();	
		           $("#tanggal_pinjam").kendoDatePicker();	
		 			
		           $("#tanggal_kembali").kendoDatePicker();	
		 	
		        });
		</script>

		<article class="module width_full">
		<header><h3>Edit Transaksi</h3></header>
		<div class="module_content">
<?php
if(isset($_POST['simpan'])){
$id_peminjaman=$_POST['id_peminjaman'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];
$ubah_pinjam=explode("/", $tanggal_pinjam);
$tahun_pinjam=$ubah_pinjam[2];
$bulan_pinjam=$ubah_pinjam[0];
$tanggal_pinjam=$ubah_pinjam[1];
$jadi_pinjam="$tahun_pinjam-$bulan_pinjam-$tanggal_pinjam";

$tanggal_kembali=$_POST['tanggal_kembali'];
$ubah_kembali=explode("/", $tanggal_kembali);
$tahun_kembali=$ubah_kembali[2];
$bulan_kembali=$ubah_kembali[0];
$tanggal_kembali=$ubah_kembali[1];
$jadi_kembali="$tahun_kembali-$bulan_kembali-$tanggal_kembali";

	$ubah=mysql_query("UPDATE peminjaman set tanggal_kembali='$jadi_kembali',tanggal_pinjam='$jadi_pinjam' where id_peminjaman='$id_peminjaman' limit 1");
	if($ubah){
		$ambil_data=mysql_fetch_array(mysql_query("SELECT*FROM peminjaman,siswa,buku where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and id_peminjaman='$id_peminjaman' limit 1"));
		$tahun_peminjaman=$ambil_data['tahun_peminjaman'];
		$kode_buku=$ambil_data['id_buku'];
		$nis=$ambil_data['nis'];
		//echo"<script>alert('tahun=$tahun_peminjaman&nis=$nis&id_buku=$kode_buku')</script>";
		echo"<meta http-equiv='refresh' content='0; ?hal=Detail Peminjaman Anggota&tahun=$tahun_peminjaman&nis=$nis&id_buku=$kode_buku'/>";
	}else{
		echo"<script>alert('Gagal disimpan');javascript:history.go(-1)";
	}
}

?>
			<form action="?hal=simpan_peminjaman" method="post" id="validasiform">
			<table cellpadding="8" cellspacing="8">
								<input type='hidden' name='id_peminjaman' value='<?php echo"$id_peminjaman";?>'>
								<tr>
									<th align="left">Nis</th>
									<td><input type="text" disabled value='<?php echo"$ambil_data[nis]";?>' class="k-textbox" required validationMessage="Isikan id siswa" disabled>
								</tr>
								<tr>
									<th align="left">Nama</th>
									<td><input type="text" style="width:180px;" disabled value='<?php echo"$ambil_data[nama]";?>' name="nama" value='' class="k-textbox">
								</tr>
								
								<tr>
									<th align="left">Kode Buku</th>
									<td><input type="text" disabled value='<?php echo"$ambil_data[id_buku]";?>' class="k-textbox" required validationMessage="Isikan kode buku">
								</tr>
								<tr>
									<th align="left">Tanggal pinjam</th>
									<td><input type="text" id="tanggal_pinjam" readonly="readonly" name='tanggal_pinjam' value='<?php echo"$jadi_borrow";?>' class="k-textbox" required validationMessage="Isikan kode buku">
								</tr>
								<tr>
									<th align="left">Tanggal kembali</th>
									<td><input type="text" id="tanggal_kembali" readonly="readonly" name='tanggal_kembali' value='<?php echo"$jadi_back";?>' class="k-textbox" required validationMessage="Isikan kode buku">
								</tr>
								
								
								<tr>
									<td></td>
									<td><button type='submit'  class='k-button' value="pinjam" name='simpan'>Simpan</button></td>
								</tr>	
			</table>			

			</form>

		</div>
		</article>	