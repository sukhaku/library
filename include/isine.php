
            <table class='display' id='tabeldata'>
      <thead> 
        <tr>
          <th>Kode Klarifikasi</th>
          <th>Judul</th>
          <th>Kategori</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Tersedia</th>
        </tr>
      </thead>

      <tbody>
        <?php
        include"koneksi.php";
        if($_GET['aksi']=='tampil'){  
          $no=1;
          $data=mysql_query("select kode_klarifikasi,judul_buku,nama_kategori,pengarang,penerbit,tahun_terbit,SUM(stok)as stok_buku from buku,kategori_buku where buku.id_kategori=kategori_buku.id_kategori group by judul_buku");
          $cek=mysql_num_rows($data);
          while($ambil=mysql_fetch_array($data)){
          ?>
          <tr class='info'>
            <td align="center"><?php echo"$ambil[kode_klarifikasi]";?></td>
            <td align="left">
            <a href='#' class='kategorine' id='<?php echo"$ambil[nama_kategori]";?>' style='text-decoration:none;color:black;'><?php echo"$ambil[judul_buku]";?></a>
            </td>
            <td align="left"><?php echo"$ambil[nama_kategori]";?></td>
            <td><?php echo"$ambil[pengarang]";?></td>
            <td align="left"><?php echo"$ambil[penerbit]";?></td>
            <td align="center"><?php echo"$ambil[tahun_terbit]";?></td>
            <td align="center"><?php echo"$ambil[stok_buku]";?></td>     
          </tr>
          <?php
          $no++;  
          }
        }  
        ?>
      </tbody>
    </table>