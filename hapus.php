<?php
set_time_limit(1180);
date_default_timezone_set('Asia/Jakarta');
session_start();
setcookie (session_id(), "", time() + (86400 * 30));
$host = "localhost"; 
$user = "root";
$pass = "";  // PASSWORD XAMP MYSQL root sesuaikan dengan SETTING 
$nama_db = "kjppgunawan"; //nama database di XAMP

$koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutannya seperti ini, jangan tertukar

  mysqli_query($koneksi, "UPDATE pegawai set `jabatan` = 0 WHERE  `pegawaiID` = '$_GET[spegawaiID]'");
  header("location:daftarPEGAWAI.php");

