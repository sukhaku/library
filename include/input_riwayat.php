<?php
  $status=$_SESSION['status'];
  $ip      = $_SERVER['REMOTE_ADDR'];
    if($status==1){
    $statuse="Admin";
    }else if($status==2){
    $statuse="Petugas";
    }else{
        $statuse="Anggota"; 
    }
    $input_riwayat=mysql_query("insert into riwayat_login values('','$ip','$_SESSION[user]','$_SESSION[nama]','$statuse','$_SESSION[password]',CURRENT_TIMESTAMP)");

?>