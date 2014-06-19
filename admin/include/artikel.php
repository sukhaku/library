<style type="text/css">
@import "css/demo_table_jui.css";
@import "include/themes/smoothness/jquery-ui-1.8.4.custom.css";
</style>

		      <script type="text/javascript">
		        $(document).ready(function() {	 
		          $("#validasiform").kendoValidator();	
		 	
		        });
		        </script>
        <script src="js/jquery.dataTables.js"></script>
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
<script type="text/javascript">
$(document).ready(function(){
    //untuk fokus ke nip ketika dijalankan login
    $("#judul").focus();



   
});
</script>        
<article class="module width_full">
	<header><h3>Artikel</h3></header>
	<div class="module_content">

<?php
if(isset($_POST['upload'])){
	$judul = $_POST['judul'];
	$F1 = $_FILES['F1']['tmp_name'];
	$F1_name = $_FILES['F1']['name'];
	$F1_type = $_FILES['F1']['type'];
	$F1_size = $_FILES['F1']['size'];

	if($F1_size<=20000000){	
		$simpan=mysql_query("insert into artikel(id_artikel,judul,name,type,size)values('','$judul','$F1_name','$F1_type','$F1_size')");
		if($simpan){
			$pindah=move_uploaded_file($F1,'artikel/'.$F1_name);
			echo"<meta http-equiv='refresh' content='0; ?hal=Artikel'/>";
			
		}else{
			echo"<script type='text/javascript'>alert('gagal');javascript:history.go(-1)</script>";
		}	
	}else{
			echo"<script type='text/javascript'>alert('ukuran file terlalu besar');javascript:history.go(-1)</script>";
	}
}else{
?>
<form action="?hal=Artikel" method="post" class="form_upload" enctype="multipart/form-data" id="validasiform">
<table width="500px" height="160px">
	<tr>
		<td align='left'>Judul</td>
		<td>
			<input type="text" id="judul" name="judul" placeholder="Judul" class="k-textbox" required validationMessage="Isikan Judul Artikel">	
		</td>
	</tr>
	<tr>
		<td align='left'>File</td>
		<td>
		<input type="file" name='F1' required validationMessage="Pilih file yang diupload"><br>	
		</td>		
	</tr>
	<tr>
		<td></td>
		<td>
			<button type="submit" name="upload" class="k-button">Upload</button>
		</td>	
	</tr>	
</table>

</form>
<br>
<table class='display' id='tabeldata'>
<thead>	
	<tr>
		<th width="20px">No</th>
		<th>Judul</th>
		<th>Nama File</th>
		<th>Tipe</th>
		<th>Ukuran</th>
		<th>Kontrol</th>
	</tr>
</thead>
<tbody>	
<?php
$ambil=mysql_query("select*from artikel order by size asc");
$no=1;
while($tampil=mysql_fetch_array($ambil)){
?>

<tr>
<td align=center><?php echo"$no";?></td><td><?php echo"$tampil[judul]";?></td><td><?php echo"$tampil[name]";?></td><td><?php echo"$tampil[type]";?></td><td><?php echo"$tampil[size]";?></td>
<td align="center"><a href='artikel/<?php echo"$tampil[name]";?>'><img src="images/icn_edit_article.png" width="15" height="15"/></a>  <a href='?hal=hapus_artikel&id_artikel=<?php echo"$tampil[id_artikel]";?>&name=<?php echo "$tampil[name]";?>'><img src="images/icn_trash.png" width="15" height="15"/></a> 
</td>
</tr>
<?php
$no++;
}


?>
</tbody>
</table>

<?php
}
?>
</div>
</article>