
<!-- About Content Part - Box One ==================================================
================================================== -->
<div class="blankSeparator"></div>
<!-- econtainer ends here --> 
<!-- About Content Part - Box Two ==================================================
================================================== -->
  <div class="container">
  <div class="one_third">
    
  </div>
  <!-- end one-third column ends here -->
  <div class="one_third">
    <section class="aboutonecenter">
      <h2><center>Ilustrasi Pengguna</center></h2>
      <img src="images/skema.png" alt=""/> </section> 
      </section>
  </div>
  <!-- end one-third column ends here -->
  <div class="one_third lastcolumn">
   
  </div>
  <!-- end one-third column ends here --> 
</div>

  <div class="container">
  <div class="sepContainer1"></div>
  <!-- Toggle -->
  <h2>Petunjuk Peminjaman</h2>

  <div class="toggle-trigger">Keterangan Gambar</div>
  <div class="toggle-container">
    <p align="justify">
    Proses dimulai ketika anggota/siswa melakukan registrasi ke petugas perpustakaan dan mendapatkan ID card siswa. Kemudian siswa melakukan pengecekan ketersediaan buku baik secara online diluar atau di perpustakaan langsung. Setelah anggota menemukan buku yang dicari dan stok masih ada kemudian mencari buku yang diiginkan dirak. Setelah buku yang dicari ada, siswa kemudian menyerahkan ID card siswa dan buku kepada petugas perpustakaan. 
    </p>
    <p align="justify">
    Setelah itu petugas akan melayani transaksi peminjaman buku menggunakan ID card siswa tersebut. Dan akhirnya data peminjaman masuk ke database server online, kemudian buku dan ID card diserahkan kembali kepada siswa. Demikian pula saat melakukan pengembalian buku, anggota menyerahkan buku yang akan dikembalikan beserta ID card siswa, kemudian petugas akan melayani transaksi pengembalian dan merubah data peminjam bahwa sudah dilakukan pengembalian buku yang dipinjam. Apabila peminjam melewati batas waktu meminjam yang ditentukan maka akan terkena denda keterlambatan yang harus dibayar.
    </p>
  </div>

  <div class="toggle-trigger">Petunjuk Umum</div>
  <div class="toggle-container">
  <ul type="1">
  <?php
  $ambil=mysql_query("select*from petunjuk where id_kategori='1'");
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
  
  <div class="toggle-trigger">Petunjuk Khusus</div>
  <div class="toggle-container">
    <ul type="1">
  <?php
  $ambil=mysql_query("select*from petunjuk where id_kategori='2'" );
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
