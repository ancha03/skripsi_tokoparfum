<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];
$id=$_POST[id];

// Hapus YM
if ($module=='ym' AND $act=='hapus'){
  mysqli_query($con,"DELETE FROM mod_ym WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input YM
elseif ($module=='ym' AND $act=='input'){
  mysqli_query($con,"INSERT INTO mod_ym(nama,username) VALUES('$_POST[nama]','$_POST[username]')");
  header('location:../../media.php?module='.$module);
}

// Update YM
elseif ($module=='ym' AND $act=='update'){
  mysqli_query($con,"UPDATE mod_ym SET nama='$_POST[nama]',username='$_POST[username]' WHERE id = '$id'");
  header('location:../../media.php?module='.$module);
}
}
?>
