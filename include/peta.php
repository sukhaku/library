        <?php
        $nama_kategori=$_POST['nama_kategori'];

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
        ?>   