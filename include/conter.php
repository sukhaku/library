<?php
$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = gmdate("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = time(); //
 
// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
$s = mysql_query("SELECT * FROM konter WHERE ip='$ip' AND tanggal='$tanggal'");
// Kalau belum ada, simpan data user tersebut ke database
if(mysql_num_rows($s) < 1){
    mysql_query("INSERT INTO konter(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
    
}
// Jika sudah ada, update
else{
    mysql_query("UPDATE konter SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
}


