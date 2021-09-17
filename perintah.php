<?php
set_time_limit(1180);
date_default_timezone_set('Asia/Jakarta');
session_start();
setcookie (session_id(), "", time() + (86400 * 30));

$host = "localhost"; 
$user = "root";
$pass = "";  // PASSWORD XAMP MYSQL root sesuaikan dengan SETTING 
$nama_db = "kjppgunawan"; //nama database di XAMP

$koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

if(!$koneksi){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".'mysql_connect_error()');
} else {
//  echo "KONEKSI BERHASIL" ;
}



if (isset($_POST["userFORM"]) ) {
  $userID=$_REQUEST["userFORM"];
  $password= $_REQUEST["passwFORM"];
  $SQL ="SELECT * FROM pegawai WHERE userID='$userID' AND password = '$password'" ;
  $result =mysqli_query($koneksi,$SQL);
  if ($result) {
    if ( $user = mysqli_fetch_row($result)) {

      $_SESSION['userIDSESSION'] = $userID ;

    } else {
      header('Location:index.php');
    }
  } else {
      header('Location:index.php');
  }
} 
  $userID=$_SESSION['userIDSESSION'];
  $SQL ="SELECT * FROM pegawai WHERE userID='$userID'" ;
  $result =mysqli_query($koneksi,$SQL);
  $user = mysqli_fetch_row($result) ;


//  echo "PRINTAH " . $SQL . "  =  " . $_SESSION['userIDSESSION']  ; // ini untuk lihat


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Perintah</title>
<style type="text/css">
<!--
.style1 {color: #FFFF66}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td width="200" height="130" ><img src="/img/gambar1.jpeg" width="200" height="130" /></td>
    <td width="800" height="130"><img src="/img/gambar2.jpeg" width="802" height="130" /></td>
    <td bgcolor="#272C5F">&nbsp;</td>
  </tr>
  <tr>
    <td width="200" height="40"  background="/img/gambar6.jpeg" align="center" valign="middle"></td>
    <td width="800" height="40" background="/img/gambar5.jpeg" align="left" valign="middle"><?php echo $user[9]?></td>
   <td background="/img/gambar6.jpeg">&nbsp;</td>

  </tr>

  <tr>
    <td height="30" colspan="2" bordercolor="#FFFF00" bgcolor="#3366CC">
    <a href="index.php"><input name="SUBMIT" type="SUBMIT" value="KELUAR" /></a>&nbsp;&nbsp;
    <a href="EditPegawai.php?spegawaiID=1"><input name="SUBMIT" type="SUBMIT" value="Edit Pegawai" /></a>&nbsp;&nbsp;
    <a href="EditKantor.php"><input name="SUBMIT" type="SUBMIT" value="Edit Kantor" /></a>&nbsp;&nbsp;
    <a href="daftarPEGAWAI.php"><input name="SUBMIT" type="SUBMIT" value="Daftar Pegawai" /></a>&nbsp;&nbsp;
    <a href="daftarKantor.php"><input name="SUBMIT" type="SUBMIT" value="Daftar Kantor" /></a>&nbsp;&nbsp;
    <a href="tambahPegawai.php"><input name="SUBMIT" type="SUBMIT" value="Tambah Pegawai" /></a>&nbsp;&nbsp;
    <a href="tambahKantor.php"><input name="SUBMIT" type="SUBMIT" value="Tambah Kantor" /></a>&nbsp;&nbsp;
    <a href="peta.php"><input name="SUBMIT" type="SUBMIT" value="Peta" /></a>&nbsp;&nbsp;

    </td>
    <td   bgcolor="#272C5F">&nbsp;</td>
  </tr>


  <tr>
    <td height="600">
  <table width="100%" border="0">
    
  
    </table></td>
    <td >&nbsp;</td>
    <td bgcolor="#272C5F">&nbsp;</td>
  </tr>
  <tr>
    <td height="40"  background="/img/gambar6.jpeg" align="center" valign="middle">
  <font face="Verdana, Arial" color="white" size="2"> </font></td>
    <td background="/img/gambar5.jpeg"align="center" valign="middle"><font face="verdana" size="1" color="red"><b> Delikasi/682018218 </b></font>   
    </td>
    <td background="/img/gambar6.jpeg">&nbsp;</td>
  </tr>
</table>
</body>
</html>

