
<!-- Features Content Part ==================================================
================================================== -->
<style type="text/css">
#isinya{
	color: black;
}

</style>
<div class="blankSeparator"></div>
<div class="container resume">
  <h2>Download</h2>
 <p>
 	<ul class="arrowed">
					<?php
					$no=1;
					$ambil_artikel=mysql_query("SELECT*FROM artikel");
					while($tampil_artikel=mysql_fetch_array($ambil_artikel)){	
					?>
						<?php echo"<li><a href='admin/artikel/$tampil_artikel[name]'>$tampil_artikel[judul]</a></li>";?>	
					<?php
					$no++;
					}
					?>	
					</ul>	
 </p>
  </div>
</div>
<div class="blankSeparator1"></div>
<!--Footer ==================================================
================================================== -->
