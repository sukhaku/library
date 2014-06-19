<link rel="shortcut icon" href="../images/katalog.ico">
<?php
session_start();
if(!isset($_SESSION['user'])){

    if(isset($_POST['login']))
    {
        include"koneksi.php";
        $id_user=mysql_real_escape_string($_POST["id_user"]);
        $password=mysql_real_escape_string(md5($_POST["password"]));

        $data_siswa=mysql_query("select*from siswa where nis='$id_user' and password='$password' limit 1");
        $cek_siswa=mysql_num_rows($data_siswa);

        $data_petugas=mysql_query("select*from petugas where nip='$id_user' and password='$password' limit 1");
        $cek_petugas=mysql_num_rows($data_petugas);

            if($cek_petugas>=1)
            {
                $ambil_petugas=mysql_fetch_array($data_petugas);
                $_SESSION['user']=$ambil_petugas['nip'];
                $_SESSION['nama']=$ambil_petugas['nama_petugas'];
                $_SESSION['status']=$ambil_petugas['kategori_petugas'];
                $_SESSION['password']=$ambil_petugas['password'];
                 include"input_riwayat.php";
                 echo"<meta http-equiv='refresh' content='0; ../admin/'/>";
               
            }else if($cek_siswa>=1){
                $ambil_siswa=mysql_fetch_array($data_siswa);
                $_SESSION['user']=$ambil_siswa['nis'];
                $_SESSION['nama']=$ambil_siswa['nama'];
                $_SESSION['status']=$ambil_siswa['status'];
                $_SESSION['password']=$ambil_siswa['password'];
                include"input_riwayat.php";
                echo"<meta http-equiv='refresh' content='0; ../'/>";
            
            
            }else{
                echo"<script>alert('user belum terdaftar');javascript:history.go(-1)</script>";
            }
            
            
        

    }else{

?>
<html>
<head>
    <title>Digital Library</title>
    <script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/jquery.showpassword.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    //untuk fokus ke nip ketika dijalankan login
    $("#username").focus();



   
});
</script>

<link rel="stylesheet" type="text/css" href="../css/login.css">

</head>
<body>
<div class="container">
    <section id="content">
        <form action="login.php" method="post">
            <h1>Halaman Masuk</h1>
            <div>
                <input type="text" placeholder="NIS / NIP" required="" id="username" name="id_user"/>
            </div>
            <div>
                <input type="password" placeholder="Password" required="" id="password" name="password" />
            </div>
            <div>
                <input type="submit" value="Masuk" name="login"/>
             
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="../">Digilib SMP N 1 Pedan Klaten</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>
<?php
    }
}else{
    if($_SESSION['status']==3){
        header("location:../index.php");
    }else{
    header("location:../admin");
    }
}
?>