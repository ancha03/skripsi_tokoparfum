<?php
include "../config/koneksi.php";
function antiinjection($con,$data){
  $filter_sql = mysqli_real_escape_string($con,stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection($con,$_POST['username']);
$pass     = antiinjection($con,md5($_POST['password']));

$login=mysqli_query($con,"SELECT * FROM admins WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];
  
  header('location:media.php?module=home');
}
else{
  echo "<link href=../config/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>
