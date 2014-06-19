<?php
if(empty($_SESSION['user'])){
  echo"<meta http-equiv='refresh' content='0; include/login.php'/>";
}else{
include"include/riwayat.php";
include"include/class_paging.php";
 $nama=explode(" ",$_SESSION['nama']);
              $pecah0=$nama[0]; 
?>
<link rel="stylesheet" type="text/css" href="css/paging3.css">
<div class="blankSeparator"></div>
<div class="container singleblog"> 
  <!-- Blog Post ==================================================
================================================== -->
  <div class="two_third">
<?php
if($_GET['hal']=='riwayat_transaksi'){
$cek_peminjaman=mysql_num_rows(mysql_query("SELECT peminjaman.tahun_peminjaman,peminjaman.nis,siswa.nama,buku.judul_buku,kategori_buku.nama_kategori,peminjaman.id_buku, COUNT( peminjaman.id_buku ) AS jumlah_pinjam
FROM peminjaman,siswa,buku,kategori_buku
WHERE peminjaman.nis =  '$nis' and peminjaman.nis=siswa.nis and peminjaman.id_buku=buku.id_buku and buku.id_kategori=kategori_buku.id_kategori
GROUP BY id_buku"));
  
?>
    <section class="postone">
      <h2>Riwayat Transaksi</h2>
      <p class="meta"> <span class="left">Total: <strong><?php echo"$hitung_transaksi";?> transaksi</strong></span> <span class="left">peminjaman oleh <strong><?php echo"$pecah0";?></strong></span>
      	<span class="left tags">Keterlambatan: <strong><?php echo"$hitung_terlambat";?> kali</strong></span>
      	<span class="left comment"> <a href="#" title="">Digilib SMP N 1 Pedan</a></span>
      </p>	
     <?php
      if($cek_peminjaman<=0){
        echo"<h4>Tak ada peminjaman</h4>";
      }
     ?> 
    </section>

  
<?php
$a = new Paging;
$limit =3;
$posisi = $a->cariPosisi($limit);
$no = $posisi + 1;
$ambil_peminjaman=mysql_query("SELECT peminjaman.tahun_peminjaman,peminjaman.nis,siswa.nama,buku.judul_buku,kategori_buku.nama_kategori,peminjaman.id_buku, COUNT( peminjaman.id_buku ) AS jumlah_pinjam
FROM peminjaman,siswa,buku,kategori_buku
WHERE peminjaman.nis =  '$nis' and peminjaman.nis=siswa.nis and peminjaman.id_buku=buku.id_buku and buku.id_kategori=kategori_buku.id_kategori
GROUP BY id_buku limit $posisi,$limit");

$cek_peminjaman=mysql_num_rows(mysql_query("SELECT peminjaman.tahun_peminjaman,peminjaman.nis,siswa.nama,buku.judul_buku,kategori_buku.nama_kategori,peminjaman.id_buku, COUNT( peminjaman.id_buku ) AS jumlah_pinjam
FROM peminjaman,siswa,buku,kategori_buku
WHERE peminjaman.nis =  '$nis' and peminjaman.nis=siswa.nis and peminjaman.id_buku=buku.id_buku and buku.id_kategori=kategori_buku.id_kategori
GROUP BY id_buku limit $posisi,$limit"));

while($tampil_peminjaman=mysql_fetch_array($ambil_peminjaman)){
?>    
    <section class="comments">     
      <div class="blankSeparator"></div>
      <div class="boxtwosep"></div>
      <div id="comments">
        <ul id="articleCommentList">
          <li>
            <div class="commentMeta">
              <img class="user" src="images/blog/buku.png" alt="Default user icon" /> </div>
            <!-- end commentMeta -->
            <div class="commentBody">
              <h3><a href="#"><?php echo"$tampil_peminjaman[nama] / $tampil_peminjaman[nis]";?></a></h3>
              <p>Kode Buku          : <?php echo"$tampil_peminjaman[id_buku]";?><br><br>
                 Judul              : <?php echo"$tampil_peminjaman[judul_buku]";?><br><br> 
                 Kategori              : <?php echo"$tampil_peminjaman[nama_kategori]";?><br><br> 
              	 Peminjaman             : <?php echo"<a href='?hal=detail_peminjaman&nis=$tampil_peminjaman[nis]&id_buku=$tampil_peminjaman[id_buku]'>$tampil_peminjaman[jumlah_pinjam]";?> Kali</a><br><br>
              	 
              	</p>	
              </div>
            <!-- end commentBody --> 
          </li>
        </ul>
      </div>
      <!-- end Comments --> 
    </section>

<?php
}
$jmldata=mysql_num_rows(mysql_query("SELECT peminjaman.tahun_peminjaman,peminjaman.nis,siswa.nama,buku.judul_buku,kategori_buku.nama_kategori,peminjaman.id_buku, COUNT( peminjaman.id_buku ) AS jumlah_pinjam
FROM peminjaman,siswa,buku,kategori_buku
WHERE peminjaman.nis =  '$nis' and peminjaman.nis=siswa.nis and peminjaman.id_buku=buku.id_buku and buku.id_kategori=kategori_buku.id_kategori
GROUP BY id_buku"));
$jmlhalaman  = $a->jumlahHalaman($jmldata, $limit);
$linkHalaman = $a->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div class=paging>Hal: $linkHalaman</div><br>";
?>


<?php
}else if($_GET['hal']=='keterlambatan'){
$cek_terlambat=mysql_num_rows(mysql_query("select*from peminjaman,denda_terlambat where peminjaman.id_peminjaman=denda_terlambat.id_peminjaman and peminjaman.nis='$nis'"));
?>    
	<section class="postone">
      <h2>Riwayat Keterlambatan</h2>
      <p class="meta"> <span class="left">Total: <strong><?php echo"$hitung_transaksi";?> transaksi</strong></span> <span class="left">peminjaman oleh <strong><?php echo"$pecah0";?></strong></span>
      	<span class="left tags">Keterlambatan: <strong><?php echo"$hitung_terlambat";?> kali</strong></span>
      	<span class="left comment"> <a href="#" title="">Digilib SMP N 1 Pedan</a></span>
      </p>	
      <h4 class="tags">
        <?php
          if($cek_terlambat<=0){
          echo "<h4>Tidak ada riwayat keterlambatan</h4>";
          }
        ?>
      </h4>

    </section>

  
<?php
$a = new Paging;
$limit =1;
$posisi = $a->cariPosisi($limit);
$ambil_peminjaman=mysql_query("select*from peminjaman,denda_terlambat where peminjaman.id_peminjaman=denda_terlambat.id_peminjaman and peminjaman.nis='$nis' limit $posisi,$limit");
$no = $posisi + 1;
while($tampil_peminjaman=mysql_fetch_array($ambil_peminjaman)){
$id_peminjaman=$tampil_peminjaman['id_peminjaman'];
$ambil_judul=mysql_fetch_array(mysql_query("select*from peminjaman,buku where peminjaman.id_buku=buku.id_buku and peminjaman.nis='$nis'"));
?>    
    <section class="comments">     
      <div class="blankSeparator"></div>
      <div class="boxtwosep"></div>
      <div id="comments">
        <ul id="articleCommentList">
          <li>
            <div class="commentMeta">
              <p>
                <?php
                $explode=explode("-",$tampil_peminjaman['tanggal_pinjam']);
                $tanggale=$explode[2];
                $bulane=$explode[1];
                $tahune=$explode[0];
                 echo"$tanggale-$bulane-$tahune";
               ?>
              </p>
              <img class="user" src="images/blog/buku.png" alt="Default user icon" /> </div>
            <!-- end commentMeta -->
            <div class="commentBody">
              <h3><a href="#"><?php echo"$ambil_judul[judul_buku]";?></a></h3>
              <p>Kode Buku          : <?php echo"$ambil_judul[id_buku]";?><br><br>
              	 Jumlah             : <?php echo"$tampil_peminjaman[jumlah]";?> buah<br><br>
              	 Tanggal pinjam     : 
                 <?php 
                      $explode=explode("-",$tampil_peminjaman['tanggal_pinjam']);
                      $tanggale=$explode[2];
                      $bulane=$explode[1];
                      $tahune=$explode[0];
                      echo"$tanggale-$bulane-$tahune";
                 ?>
                 <br><br>
              	 Tanggal max kembali: 
                <?php 
                  $pinjam=$tampil_peminjaman['tanggal_pinjam'];
                  $ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
                  $max_hari_pinjam=$ambil_pengaturan['max_hari_pinjam'];      
                  $max_kembali=date('Y-m-d',strtotime($pinjam."+$max_hari_pinjam day"));
                  
                  $explode=explode("-",$max_kembali);
                  $tanggale=$explode[2];
                  $bulane=$explode[1];
                  $tahune=$explode[0];
                 echo"$tanggale-$bulane-$tahune";
               
                ?>   
                 <br><br>
              	 Tanggal kembali: 
              	 	<?php
            $tgle = $tampil_peminjaman['tanggal_kembali'];      
						$keterangan=$tampil_peminjaman['status_peminjaman'];
						if($keterangan=='1'){
							$return='-';
						}else if($keterangan=='0'){
              $explode=explode("-",$tgle);
                  $tanggale=$explode[2];
                  $bulane=$explode[1];
                  $tahune=$explode[0];
                 $return="$tanggale-$bulane-$tahune";
						}else{
							$return='kosong';
						}

						echo"$return";
					?>
              	 <br><br>
              	 Status:
              	 <?php
              	 $keterangan=$tampil_peminjaman['status_peminjaman'];
if($keterangan=='1'){
	echo"<u>Pinjam</u>";
}else{
	$id_peminjaman=$tampil_peminjaman['id_peminjaman'];
	$ambil_terlambat=mysql_query("select*from denda_terlambat where id_peminjaman='$id_peminjaman'");
	$cek=mysql_num_rows($ambil_terlambat);
	if($cek>=1){
	echo"<u style='color:red;' class='poshytip' title='Terlambat mengembalikan'>Kembali</u>";
	}else{
	echo"<u>Kembali</u>";
	}
}
              	 ?>
              	 <br><br>
              	</p>	
              </div>
            <!-- end commentBody --> 
          </li>
        </ul>
      </div>
      <!-- end Comments -->
    </section>

<?php
}
$jmldata = mysql_num_rows(mysql_query("select*from peminjaman,denda_terlambat where peminjaman.id_peminjaman=denda_terlambat.id_peminjaman and peminjaman.nis='$nis'"));
$jmlhalaman  = $a->jumlahHalaman($jmldata, $limit);
$linkHalaman = $a->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div class=paging>Hal: $linkHalaman</div><br>";
?>
	
<?php
}else if($_GET['hal']=='profil_anggota'){  
?>

    <!-- Blog riwayat transaksi==================================================
================================================== -->
    <section class="comments">
      <div class="blankSeparator"></div>
      <div class="sepContainer2"></div>
      <h2>Profil</h2>
      <div class="sepContainer2"></div>
      <div class="blankSeparator"></div>
      <div class="boxtwosep"></div>
      <div id="comments">
        <ul id="articleCommentList">
          <li>
            <div class="commentMeta">
              <p align='center'>Anggota</p>
              <img class="user" src="images/blog/user.png" alt="Default user icon" /> </div>
            <!-- end commentMeta -->
            <div class="commentBody">
              <?php 
              $nis=$_SESSION['user'];
              $ambil_profil=mysql_fetch_array(mysql_query("SELECT*from siswa,kelas where siswa.id_kelas=kelas.id_kelas and nis='$nis'"));
      
              ?>
              <h4>Nis : <?php echo"$nis";?></h4><br>
              <h4>Nama : <?php echo"$ambil_profil[nama]";?></h4><br>
              <h4>Kelas : <?php echo"$ambil_profil[nama_kelas]";?></h4><br>
              <p>


              </p>  
              <a href='?hal=ubah_profil&id=<?php echo"$nis";?>' class="buttonhome fl">Edit<span>+</span></a> </div>
            <!-- end commentBody --> 
          </li>
        </ul>
      </div>

      <!-- end Comments --> 
    </section>
<?php
}else if($_GET['hal']=='artikel'){
$hitung_artikel=mysql_num_rows(mysql_query("SELECT*FROM artikel"));
?>
<section class="postone">
      <h2>Download</h2>
      <p class="meta"> <span class="left">Total: <strong><?php echo"$hitung_artikel";?> artikel</strong></span> <span class="left">User : <strong><?php echo"$pecah0";?></strong></span>
        <span class="left comment"> <a href="#" title="">Kumpulan artikel Digilib SMP N 1 Pedan</a></span>
      </p>  
      <?php
          $no=1;
          $ambil_artikel=mysql_query("SELECT*FROM artikel");
          while($tampil_artikel=mysql_fetch_array($ambil_artikel)){ 
          ?>
            <?php echo"<h4><a href='admin/artikel/$tampil_artikel[name]'>$tampil_artikel[judul]</a></h4>";?>  
          <?php
          $no++;
          }
          ?>  
    </section>



<?php
}else if($_GET['hal']=='detail_peminjaman'){

//untuk detail peminjaman
?>
 <section class="postone">
      <h2>Riwayat Transaksi</h2>
      <p class="meta"> <span class="left">Total: <strong><?php echo"$hitung_transaksi";?> transaksi</strong></span> <span class="left">peminjaman oleh <strong><?php echo"$pecah0";?></strong></span>
        <span class="left tags">Keterlambatan: <strong><?php echo"$hitung_terlambat";?> kali</strong></span>
        <span class="left comment"> <a href="#" title="">Digilib SMP N 1 Pedan</a></span>
      </p>  
      <h4 class="tags">Aksi: <a href="#">Cetak</a> &loz;</h4>
    </section>

  
<?php
$nis=$_GET['nis'];
$kode_buku=$_GET['id_buku'];
$a = new Paging;
$limit =3;
$posisi = $a->cariPosisi($limit);
$no = $posisi + 1;
$ambil_peminjaman=mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and siswa.nis='$nis' and peminjaman.id_buku='$kode_buku' limit $posisi,$limit");
while($tampil_peminjaman=mysql_fetch_array($ambil_peminjaman)){
?>    
    <section class="comments">     
      <div class="blankSeparator"></div>
      <div class="boxtwosep"></div>
      <div id="comments">
        <ul id="articleCommentList">
          <li>
            <div class="commentMeta">
              <p><?php echo"$tampil_peminjaman[tanggal_pinjam]";?></p>
              <img class="user" src="images/blog/buku.png" alt="Default user icon" /> </div>
            <!-- end commentMeta -->
            <div class="commentBody">
              <h3><a href="#"><?php echo"$tampil_peminjaman[judul_buku]";?></a></h3>
              <p>Kode Buku          : <?php echo"$tampil_peminjaman[id_buku]";?><br><br>
                 Jumlah             : <?php echo"$tampil_peminjaman[jumlah]";?> buah<br><br>
                 Tanggal pinjam     : 
                 <?php 
                      $explode=explode("-",$tampil_peminjaman['tanggal_pinjam']);
                      $tanggale=$explode[2];
                      $bulane=$explode[1];
                      $tahune=$explode[0];
                      echo"$tanggale-$bulane-$tahune";
                 ?>
                 <br><br>
                 Tanggal max kembali: 
                 <?php 
                    $pinjam=$tampil_peminjaman['tanggal_pinjam'];
                    $ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
                  $max_hari_pinjam=$ambil_pengaturan['max_hari_pinjam'];      
                  $max_kembali=date('Y-m-d',strtotime($pinjam."+$max_hari_pinjam day"));
                  
                  $pinjam=$tampil_peminjaman['tanggal_pinjam'];
                  $ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
                  $max_hari_pinjam=$ambil_pengaturan['max_hari_pinjam'];      
                  $max_kembali=date('Y-m-d',strtotime($pinjam."+$max_hari_pinjam day"));
                  
                  $explode=explode("-",$max_kembali);
                  $tanggale=$explode[2];
                  $bulane=$explode[1];
                  $tahune=$explode[0];
                 echo"$tanggale-$bulane-$tahune";
              
                  ?>   
                 <br><br>
                 Tanggal kembali: 
                  <?php
            $tgle = $tampil_peminjaman['tanggal_kembali'];      
            $keterangan=$tampil_peminjaman['status_peminjaman'];
            if($keterangan=='1'){
              $return='-';
            }else if($keterangan=='0'){
                  $explode=explode("-",$tgle);
                  $tanggale=$explode[2];
                  $bulane=$explode[1];
                  $tahune=$explode[0];
                 $return="$tanggale-$bulane-$tahune";
            }else{
              $return='kosong';
            }
            echo"$return";
          ?>
                 <br><br>
                 Status:
                 <?php
                 $keterangan=$tampil_peminjaman['status_peminjaman'];
if($keterangan=='1'){
  echo"<u style='color:orange;'>Pinjam</u>";
}else{
  $id_peminjaman=$tampil_peminjaman['id_peminjaman'];
  $ambil_terlambat=mysql_query("select*from denda_terlambat where id_peminjaman='$id_peminjaman'");
  $cek=mysql_num_rows($ambil_terlambat);
  if($cek>=1){
  echo"<u style='color:red;' class='poshytip' title='Terlambat mengembalikan'>Kembali</u>";
  }else{
  echo"<u style='color:green;'>Kembali</u>";
  }
}
                 ?>
                 <br><br>
                </p>  
              </div>
            <!-- end commentBody --> 
          </li>
        </ul>
      </div>
      <!-- end Comments --> 
    </section>

<?php
}
$jmldata = mysql_num_rows(mysql_query("select*from peminjaman,buku,siswa where peminjaman.id_buku=buku.id_buku and peminjaman.nis=siswa.nis and siswa.nis='$nis' and peminjaman.id_buku='$kode_buku'"));
$jmlhalaman  = $a->jumlahHalaman($jmldata, $limit);
$linkHalaman = $a->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div class=paging>Hal: $linkHalaman</div><br>";
?>

















<?php
}else if($_GET['hal']=='riwayat_kasus'){
?>
 <section class="postone">
      <h2>Riwayat Kasus</h2>
      <p class="meta"> <span class="left">Total: <strong><?php echo"$hitung_transaksi";?> transaksi</strong></span> <span class="left">peminjaman oleh <strong><?php echo"$pecah0";?></strong></span>
        <span class="left tags">Keterlambatan: <strong><?php echo"$hitung_terlambat";?> kali</strong></span>
        <span class="left comment"> <a href="#" title="">Digilib SMP N 1 Pedan</a></span>
      </p>  
      <h4 class="tags">Aksi: <a href="#">Cetak</a> &loz;</h4>
    </section>

  
<?php
$nis=$_SESSION['user'];
$a = new Paging;
$limit =3;
$posisi = $a->cariPosisi($limit);
$no = $posisi + 1;
$ambil_kasus=mysql_query("select*from kasus,siswa,buku where siswa.nis=kasus.id_anggota and buku.id_buku=kasus.id_buku and id_anggota='$nis' limit $posisi,$limit");
while($tampil_kasus=mysql_fetch_array($ambil_kasus)){
?>    
    <section class="comments">     
      <div class="blankSeparator"></div>
      <div class="boxtwosep"></div>
      <div id="comments">
        <ul id="articleCommentList">
          <li>
            <div class="commentMeta">
              <p>
                <?php 
                $explode=explode("-",$tampil_kasus['tgl_kasus']);
                  $tanggale=$explode[2];
                  $bulane=$explode[1];
                  $tahune=$explode[0];
                 echo"$tanggale-$bulane-$tahune";
                ?>
              </p>
              <img class="user" src="images/blog/buku.png" alt="Default user icon" /> </div>
            <!-- end commentMeta -->
            <div class="commentBody">
              <h3><a href="#"><?php echo"$tampil_kasus[judul_buku]";?></a></h3>
              <p>Kode Buku          : <?php echo"$tampil_kasus[id_buku]";?><br><br>
                Judul Buku          : <?php echo"$tampil_kasus[judul_buku]";?><br><br>
                Tanggal Kasus          : <?php echo"$tanggale-$bulane-$tahune";?><br><br>
                Catatan Kasus             : <?php echo"$tampil_kasus[jenis_kasus]";?> 
    
              </div>
            <!-- end commentBody --> 
          </li>
        </ul>
      </div>
      <!-- end Comments --> 
    </section>

<?php
}
$jmldata = mysql_num_rows(mysql_query("select*from kasus,siswa,buku where kasus.id_anggota=siswa.nis and kasus.id_buku=buku.id_buku and id_anggota='$nis'"));
$jmlhalaman  = $a->jumlahHalaman($jmldata, $limit);
$linkHalaman = $a->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div class=paging>Hal: $linkHalaman</div><br>";
}
?>














  </div>

  <div class="one_third lastcolumn sidebar">
    <?php
    if($_SESSION['status']==3){
    ?>
    <section class="first">
      <h3>User</h3>
      <div class="boxtwosep"></div>
      <ul class="blogList">
        <li><a class="about" href="?hal=profil_anggota" title="">Profil</a></li>
      </ul>
    </section>
    <section class="second">
      <h3>Transaksi</h3>
      <div class="boxtwosep"></div>
      <ul class="blogList">
        <li><a class="about" href="?hal=riwayat_transaksi" title="">Riwayat Peminjaman</a></li>
        <li><a class="about" href="?hal=keterlambatan" title="">Riwayat Keterlambatan</a></li>
        <li><a class="about" href="?hal=riwayat_kasus" title="">Riwayat Kasus</a></li>
      </ul>
    </section>
    <?php
  }
  ?>
    <section class="second">
      <h3>Download</h3>
      <div class="boxtwosep"></div>
      <ul class="blogList">
        <li><a class="about" href="?hal=artikel" title="">Artikel</a></li>
      </ul>
    </section>
    <section class="third">
      <h3>Attention</h3>
      <div class="boxtwosep"></div>
      <h5><span class="color">
        <?php   
        $ambil_pengaturan=mysql_fetch_array(mysql_query("SELECT*FROM pengaturan where status_pengaturan='1' limit 1"));
                  echo"Rp.$ambil_pengaturan[denda_terlambat]"; ?></span> Denda &rsaquo;&rsaquo; Keterlambatan per hari</h5>
      <p>Simpan dan gunakan dengan baik buku yang sudah dipinjam, dan pastikan kembali dalam kondisi seperti sebelumnya.
    </section>
    
  </div>
  <!-- one_third ends here --> 
</div>
<!-- container ends here -->
<div class="blankSeparator2"></div>  

<?php
}
?>