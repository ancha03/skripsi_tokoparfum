<?php
$server = "http://192.168.8.102";
$username = "admin";
$password = "123456789";
$database = "dbtoko";

// Koneksi dan memilih database di server
$con=mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
?>
