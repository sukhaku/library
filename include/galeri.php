
<!-- Portfolio Gallery Content Part ==================================================
================================================== -->
<div class="blankSeparator"></div>
<div class="container portfolio4columns">
  <ul class="tabs">
    <li><a class="active" href="#beauty">Sekolah<span class="plus1">+</span></a></li>
    <li><a href="#woman">Perpustakaan<span class="plus1">+</span></a></li>
    <li><a href="#people">Dokumentasi<span class="plus1">+</span></a></li>
  </ul>
  
  <ul class="tabs-content clearfix">
    
    <li class="active clearfix" id="beauty">
      <?php
      include"koneksi.php";
      $data=mysql_query("select*from gallery where kategori='sekolah'");
      while($tampil=mysql_fetch_array($data)){
      ?>  

      <div class="one_fourth">
        <section class="boxfour"> <a href='images/Galeri/<?php echo"$tampil[name]";?>' class="prettyPhoto[gal]"> <img src='images/Galeri/<?php echo"$tampil[name]";?>' alt=""/></a> </section>
      </div>
      <!-- one_fourth ends here -->
      <!-- four columns ends here -->
        <?php
      }
        ?>  



      <div class="clear"></div>
    </li>

    <li id="woman" class="clearfix">
     <?php
    $data=mysql_query("select*from gallery where kategori='perpustakaan'");
    while($tampil=mysql_fetch_array($data)){
    ?>  

      <div class="one_fourth">
        <section class="boxfour"> <a href='images/Galeri/<?php echo"$tampil[name]";?>' class="prettyPhoto[gal]"> <img src='images/Galeri/<?php echo"$tampil[name]";?>' alt=""/></a> </section>
      </div>
      <!-- one_fourth ends here -->
      <!-- four columns ends here -->
    <?php
  }
    ?>  
      <!-- four columns ends here -->
      <div class="clear"></div>
    </li>
    <li id="people" class="clearfix">
      <?php
    include"koneksi.php";
    $data=mysql_query("select*from gallery where kategori='dokumentasi'");
    while($tampil=mysql_fetch_array($data)){
    ?>  
      <div class="one_fourth">
        <section class="boxfour"> <a href='images/Galeri/<?php echo"$tampil[name]";?>' class="prettyPhoto[gal]"> <img src='images/Galeri/<?php echo"$tampil[name]";?>' alt=""/></a> </section>
      </div>
      <!-- one_fourth ends here -->
      <!-- four columns ends here -->
    <?php
  }
    ?>  
      <!-- four columns ends here -->
      <div class="clear"></div>
    </li>
  </ul>
</div>
<div class="blankSeparator1"></div>
