<?php
include"koneksi.php";

?>
<!doctype html>
<html>
<head>
  <link rel="shortcut icon" href="../images/katalog.ico">
  <title>Katalog Buku</title>
<style type="text/css">
@import "../css/demo_table_jui.css";
@import "../include/smoothness/jquery-ui-1.8.4.custom.css";
</style>
        <script src="../js/jquery-1.8.0.min.js" type="text/javascript"></script>
        <script src="../js/jquery.dataTables.js"></script>
</style>
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
<style type="text/css">
body{
  background:#DCDDDF url(http://cssdeck.com/uploads/media/items/7/7AF2Qzt.png);
}
#container{
  margin: 0 auto;
  width: 1200px; 
  height:auto; 

}
#container h2{
color: #000;

}
.peta{
  margin-top: 10px;
  text-align: center;
}
</style>

</head>
<body>


<div id="container">
  <h2>Katalog Buku Perpustakaan SMP N 1 Pedan Klaten</h2>
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
        $no=1;
        $data=mysql_query("select kode_klarifikasi,judul_buku,nama_kategori,pengarang,penerbit,tahun_terbit,SUM(stok)as stok_buku from buku,kategori_buku where buku.id_kategori=kategori_buku.id_kategori group by judul_buku");
        $cek=mysql_num_rows($data);
        while($ambil=mysql_fetch_array($data)){
        ?>
        <tr class='info'>
          <td align="center"><?php echo"$ambil[kode_klarifikasi]";?></td>
          <td align="left"><?php echo"<a href='katalog.php?&nama_kategori=$ambil[nama_kategori]&judul=$ambil[judul_buku]&kod=$ambil[kode_klarifikasi]' class='kategorine' style='text-decoration:none;color:black;'>$ambil[judul_buku]</a>";?></td>
          <td align="left"><?php echo"$ambil[nama_kategori]";?></td>
          <td><?php echo"$ambil[pengarang]";?></td>
          <td align="left"><?php echo"$ambil[penerbit]";?></td>
          <td align="center"><?php echo"$ambil[tahun_terbit]";?></td>
          <td align="center"><?php echo"$ambil[stok_buku]";?></td>     
        </tr>
        <?php
        $no++;  
        }
        ?>
      </tbody>
    </table>

    <div class='peta'>
      <?php
        if(isset($_GET['nama_kategori'])){
          echo "<b>$_GET[judul]</b> ($_GET[nama_kategori]) / <b>Kode Klarifikasi:</b> $_GET[kod]";
        }
      ?>  
    </div>  
    <div class="peta">    
        <?php
        if(isset($_GET['nama_kategori'])){
              $nama_kategori=$_GET['nama_kategori'];   
              switch ($nama_kategori) {
                case "Agama"; 
                include "gif/agama.php";
                break;

                case "Fiksi"; 
                include "gif/ilmusosial.php";
                break;
                case "Non Fiksi"; 
                include "gif/karyaumum.php";
                break;
                case "Ilmu Pasti"; 
                include "gif/kesenian.php";
                break;
                case "Sejarah Geografi"; 
                include "gif/korankliping.php";
                break;
                case "Bahasa Jawa"; 
                include "gif/majalah.php";
                break;
                case "Reference"; 
                include "gif/referensi.php";
                break;
                case "Bahasa"; 
                include "gif/sejarah.php";
                break;
                case "Ilmu Pengetahuan"; 
                include "gif/sains.php";
                break;
                case "Bahasa"; 
                include "gif/sastra.php";
                break;
                case "Teknologi"; 
                include "gif/tekno.php";
                break;   
              }
        }      
        ?>    
 
    </div>   
<br>
<br>
<a href="../" style="color:black;text-decoration:bold;">Beranda</a>  

</div>


</body>
</html>  