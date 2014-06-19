<?php
$nis=$_GET['id'];
include"include/riwayat.php";
include"include/class_paging.php";
 $nama=explode(" ",$_SESSION['nama']);
              $pecah0=$nama[0]; 
?>
<?php
$ambil_profil=mysql_fetch_array(mysql_query("SELECT*from siswa,kelas where siswa.id_kelas=kelas.id_kelas and nis='$nis'"));      
if(isset($_POST['ubah'])){
   $nis=$_POST['nis'];
   $nama=$_POST['nama'];
   $passwords=$_POST['password'];
   $kelas=$_POST['kelas'];
  $ambil_password=mysql_fetch_array(mysql_query("select password from siswa where nis='$nis'"));
  if($ambil_password['password']==$passwords){
  $update=mysql_query("UPDATE siswa set nama='$nama',id_kelas='$kelas' where nis='$nis'");
  }else{
  $password=md5($_POST['password']);  
  $update=mysql_query("UPDATE siswa set nama='$nama',id_kelas='$kelas',password='$password' where nis='$nis'");  
  }
        if($update){
        echo"<meta http-equiv='refresh' content='0; ?hal=profil_anggota'/>";
        }else{
        echo "<script>alert('Gagal diubah');javascript:history.go(-1)</script>";
        }
        
}
?>
<link rel="stylesheet" type="text/css" href="css/paging3.css">
<div class="blankSeparator"></div>
<div class="container singleblog"> 
  <!-- Blog Post ==================================================
================================================== -->
<style type="text/css">
#form{
  background: snow;
  padding:10px;
  color: black;
  height:300px;
}

#selek{
  border: none;
  padding: 5px;
  border-radius: 3px;
}
#tombol{
  border: none;
  background:black;
  color:white;
  cursor: pointer;
  border-radius: 4px;
  padding: 5px;
}

</style>

  <div class="two_third">
    <div id="contactForm">
      <h2>Ubah Profil</h2>
      <div class="sepContainer"></div>
      <form action="?hal=ubah_profil" method="post" id="form">
         <input type="hidden" name="nis" value='<?php echo"$nis";?>'>
        <div class="name">
          <label for="name">Nama</label>
          <input id="name" name="nama" type="text" value='<?php echo"$ambil_profil[nama]";?>'/>
        </div>
        <div class="name">
          <label for="email">Password</label>
          <input id="email" type="password" name="password" value='<?php echo"$ambil_profil[password]";?>'/>
        </div>
        <div class="name">
          <label for="message">Kelas</label>
          <select name="kelas" id="selek">
          <?php
          $ambil_kelas=mysql_query("select*from kelas");
          while($tampil_kelas=mysql_fetch_array($ambil_kelas)){
            if($ambil_profil['id_kelas']==$tampil_kelas['id_kelas']){
            echo"<option value='$tampil_kelas[id_kelas]' selected>$tampil_kelas[nama_kelas]</option>";
            }else{
            echo"<option value='$tampil_kelas[id_kelas]'>$tampil_kelas[nama_kelas]</option>"; 
            } 
          }
          ?>
          </select>

          <button type='submit' name='ubah' id="tombol">Ubah</button>
        
        </div>
        
      </form>
    </div>
  </div>

  <div class="one_third lastcolumn sidebar">
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
      </ul>
    </section>
    
  </div>
  <!-- one_third ends here --> 
</div>
<!-- container ends here -->
<div class="blankSeparator2"></div>  