<?php
if($_GET['hal']=='Import Anggota'){
?>
	<article class="module width_full">
		<header><h3>Import Anggota</h3></header>
				<div class="module_content">
	<?php
	if($_POST['upload']){
		include"excel_reader2.php";
		
		//membaca file excel yang diupload
		$data= new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

		//membaca jumlah baris dari data excel
		$baris=$data->rowcount($sheet_index=0);

		$sukses=0;
		$gagal=0;

		//import data excel mulai baris kedua karena baris pertama untuk nama kolom
		for($i=2; $i<=$baris; $i++){
			//membaca data nis pada kolom 1
			$nis=$data->val($i,1);
			//membaca data nama pada kolom 2
			$nama=$data->val($i,2);
			$password=$data->val($i,3);
			$password_masuk=md5($password);
			$status=$data->val($i,4);
			$id_kelas=$data->val($i,5);

			$input=mysql_query("insert into siswa(nis,nama,password,status,id_kelas) values('$nis','$nama','$password_masuk','$status','$id_kelas')");
			if($input) $sukses++;
			else $gagal++;
		}
		echo"Proses import selesai<br>";
		echo"Jumlah data yang sukses diimport : ".$sukses."<br>";
		echo"Jumlah data yang gagal diimport : ".$gagal."<br>";

	}else{
	?>
	<form action="?hal=Import Anggota" method="post" enctype="multipart/form-data">
		<input name="userfile" type="file">
		<input type="submit" name='upload' value="Import">
	</form>
	<br>
	<p>Berikut Contoh struktur file excel yang akan diimport</p>
	<ul>
		<li>Pastikan file ekstensi.xls</li>
		<li>Pada kolom <b>status</b> isikan 3 karena default anggota</li>
		<li>Untuk kolom <b>kelas</b> ==> Reguler = 12 dan Bilingual = 13</li>
	</ul>	
	<img src="images/anggota.png"/>

	<?php
	}
	?>
	</div>
	</article>

<?php
}else{
?>	
	<article class="module width_full">
		<header><h3>Import Buku</h3></header>
				<div class="module_content">
	<?php
	if($_POST['upload']){
		include"excel_reader2.php";
			//membaca file excel yang diupload
		$data= new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

		//membaca jumlah baris dari data excel
		$baris=$data->rowcount($sheet_index=0);

		$sukses=0;
		$gagal=0;

		//import data excel mulai baris kedua karena baris pertama untuk nama kolom
		for($i=2; $i<=$baris; $i++){
			//membaca data nis pada kolom 1
			$kode_buku=$data->val($i,1);
			$kode_klarifikasi=$data->val($i,2);
			//membaca data nama pada kolom 2
			$judul=$data->val($i,3);
			$penerbit=$data->val($i,4);
			$tahun_terbit=$data->val($i,5);
			$pengarang=$data->val($i,6);
			$kategori=$data->val($i,7);
			

			$input=mysql_query("insert into buku(id_buku,kode_klarifikasi,judul_buku,penerbit,tahun_terbit,pengarang,id_kategori,stok)values('$kode_buku','$kode_klarifikasi','$judul','$penerbit','$tahun_terbit','$pengarang','$kategori','1')");
			$tambah_buku_masuk=mysql_query("insert into buku_masuk(id_pemasukan,tanggal,jumlah,id_buku)values('NULL',CURRENT_TIMESTAMP,'1','$kode_buku')");	
			if($input) $sukses++;
			else $gagal++;
		}
		echo"Proses import selesai<br>";
		echo"Jumlah data yang sukses diimport : ".$sukses."<br>";
		echo"Jumlah data yang gagal diimport : ".$gagal."<br>";


	}else{
	?>
	<form action="?hal=Import Buku" method="post" enctype="multipart/form-data">
		<input name="userfile" type="file">
		<input type="submit" name='upload' value="Import">
	</form>
	<br>
	<p>Berikut Contoh struktur file excel yang akan diimport</p>
	<ul>
		<li>Pastikan file ekstensi.xls</li>
		<li>Pastikan kolom kode buku tidak ada yang sama</li>
		<li>Pada kolom <b>kategori</b> 
			<ul>
				<?php
					$ambil_kategori = mysql_query("select*from kategori_buku");
					while($tampil_kategori=mysql_fetch_array($ambil_kategori)){
						echo"<li>Isikan <b>$tampil_kategori[id_kategori]</b> jika termasuk <b>$tampil_kategori[nama_kategori]</b></li>";
					}	
				?>
			</ul>	
		</li>
		<li>Kode klarifikasi, isikan sesuai dengan klarifikasi buku</li>
	</ul>	
	<img src="images/import_buku.png" width='800px'/>


	<?php
	}
	?>
	</div>
	</article>

<?php
}
?>