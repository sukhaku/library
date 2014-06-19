
<!-- About Content Part - Box One ==================================================
================================================== -->
<div class="blankSeparator"></div>
<div class="container">
  <div class="one_third">
    <section class="aboutoneleft">
      <h2>SMP N 1 Pedan Klaten</h2>
          <img src="images/home/reuni.jpg" alt=""/> </section>   
    </section>
  </div>
  <!-- end one-third column ends here -->
  <div class="one_third">
    <section class="aboutonecenter">
      <h2>Perpustakaan</h2>
      <img src="images/home/library.jpg" alt=""/> </section> 
      </section>
  </div>
  <!-- end one-third column ends here -->
  <div class="one_third lastcolumn">
    <section class="aboutoneright">
      <h2>Guru</h2>
      <img src="images/home/guru.jpg" alt=""/> </section>
  </div>
  <!-- end one-third column ends here --> 
</div>
<!-- econtainer ends here --> 
<!-- About Content Part - Box Two ==================================================
================================================== -->
  <div class="container">
  <div class="sepContainer1"></div>
  <!-- Toggle -->
  <h2>Profil</h2>

  <div class="toggle-trigger">Latar Belakang</div>
  <div class="toggle-container">
    <p align='justify'>Pada era digital ini banyak orang menggunakan teknologi untuk memenuhi kebutuhannya. Memang tidak bisa dipungkiri lagi, kebutuhan akan teknologi sangat tinggi juga dalam lingkungan sekolah. Berbagai jenis aplikasi website telah mengalami perkembangan secara cepat dan dapat menunjang penyimpanan serta pengolahan data yang lebih baik. SMP N 1 Pedan merupakan merupakan salah satu sekolah menengah pertama berstandar nasional di Klaten, yang mana juga termasuk salah satu sekolah terbaik. Itu semua dikarenakan fasilitas belajar yang memadai mulai dari pengajar yang berkualitas, perlengkapan sekolah yang memadai juga fasilitas perpustakaan. Namun dalam manajemen buku terkait pendataan, peminjaman dan pengembalian buku masih secara manual serta pengecekan buku yang tersedia oleh siswa di perpusatakaan dirasa masih kurang efisien karena harus datang langsung ke perpustakaan, padahal buku yang tersedia belum tentu ada. Disisi lain idcard siswa dan kumpulan buku perpustakaan SMP N 1 Pedan sudah terintegrasi dengan label barcode.</p>
      <p align='justify'>Untuk mengatasi masalah tersebut, pada proyek akhir ini dibuat aplikasi website perpustakaan digital SMP N 1 Pedan Klaten dengan sistem barcode. Yang mana dapat menangani proses pendataan, peminjaman dan pengembalian buku menggunakan idcard siswa yang sudah terintegrasi dengan label barcode. Selanjutnya siswa dapat melakukan pengecekan ketersediaan buku dan riwayat peminjaman secara online. Aplikasi ini juga dilengkapi fasilitas pencetakan langsung pembuatan laporan data peminjam, data siswa dan data buku.</p>
  </div>


  
  <div class="toggle-trigger">Visi Sekolah</div>
  <div class="toggle-container">
  <p>"Unggul dalam prestasi, berbudi luhur dan beriman serta menguasai Iptek"</p>
  <!--<p><b>Indikator :</b></p> -->
  <ul type="1">
  <?php
  include"include/koneksi.php";
  $ambil=mysql_query("select*from profil,kategori_profil where profil.id_kategori=kategori_profil.id_kategori and nama_kategori='Visi'");
  $no=1;
  while($tampil=mysql_fetch_array($ambil)){
  ?>
    <li><p><?php //echo"$no. $tampil[isi]";?></p></li>

  <?php
  $no++;
  }
  ?>
  </ul>
  </div>
  
  <div class="toggle-trigger">Misi Sekolah</div>
  <div class="toggle-container">
    <ul type="1">
  <?php
  $ambil=mysql_query("select*from profil,kategori_profil where profil.id_kategori=kategori_profil.id_kategori and nama_kategori='Misi'");
  $no=1;
  while($tampil=mysql_fetch_array($ambil)){
  ?>
    <li><p><?php echo"$no. $tampil[isi]";?></p></li>

  <?php
  $no++;
  }
  ?>
  </ul>
  </div>
  
  <!-- ENDS Toggle --> 
</div>
<div class="blankSeparator1"></div>

<!--Footer ==================================================
================================================== -->
