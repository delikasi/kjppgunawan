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

if (isset($_POST['tambah'])) {
//memasukkan data ke array
$kantorID = $_POST['skantorID']; 
$NAMA_LENGKAP = $_POST['sNAMA_LENGKAP'];
$userID = $_POST['suserID'];
$MAPPI = $_POST['sMAPPI'];
$EMAIL = $_POST['sEMAIL']; 
$NPWP = $_POST['sNPNW'];
$TELEPON = $_POST['sTELEPON'];
$ALAMAT = $_POST['sALAMAT'];
$RMK = $_POST['sRMK']; 
$Jenis_Kelamin = $_POST['sJenis_Kelamin']; 
$TGL_mulai_bekerja = $_POST['sTGL_mulai_bekerja'];
$pendidikanformal = $_POST['spendidikanformal']; 
$pendidikanpenilaian = $_POST['spendidikanpenilaian']; 
$Tahun_MASUK= $_POST['sTahun_Masuk'];
$password= $_POST['spassword'];
$jabatan= $_POST['sjabatan'];
$tingkat= $_POST['stingkat']; 
$tahun = $_POST['stahun']; 

      $SQL= "INSERT INTO 'pegawai' VALUES `$kantorID`, `$NAMA_LENGKAP` , `$userID`, `$MAPPI`, `$EMAIL`, 
      `$NPWP`, `$TELEPON`, `$ALAMAT`, `$RMK`, `$Jenis_Kelamin`,  `$TGL_mulai_bekerja`, `$pendidikanformal`, `$pendidikanpenilaian`,
       `$Tahun_MASUK`, `$password`, `$jabatan`, `$tingkat`, `$tahun";

  $tambahdata=mysqli_query($koneksi, $SQL);

  echo $SQL ."<br>" ;
   echo "<script>alert('Tambah berhasil')</script>";
             
  
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tambah Pegawai</title>
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
    <td width="800" height="40" background="/img/gambar5.jpeg" align="left" valign="middle"></td>
   <td background="/img/gambar6.jpeg">&nbsp;</td>
  </tr>

  <tr>
    <td height="30" colspan="2" bordercolor="#FFFF00" bgcolor="#3366CC">
	<a href="perintah.php"><input name="SUBMIT" type="SUBMIT" value="KELUAR" /></a>&nbsp;&nbsp;
    </td>
    <td   bgcolor="#272C5F">&nbsp;</td>
  </tr>
                    <form method="post" action="tambahPegawai.php">
                  <table width="500" border="0" cellspacing="1" cellpadding="2">
                  <tr>
                  <td width="100">Kantor</td>
                  <td><input name="skantorID" type="text" id="kantorID"></td>
                  </tr>
                  <tr>
                  <td width="110">Nama</td>
                  <td><input name="sNAMA_LENGKAP" type="text" id="NAMA_LENGKAP"></td>
                  </tr>
                  <tr>
                  <td width="110">UserID</td>
                  <td><input name="suserID" type="text" id="userID"></td>
                  </tr>
                  <tr>
                  <td width="110">MAPPI</td>
                  <td><input name="sMAPPI" type="text" id="MAPPI"></td>
                  </tr>
                  <tr>
                  <td width="110">EMAIL</td>
                  <td><input name="sEMAIL" type="text" id="EMAIL"></td>
                  </tr>
                  <tr>
                  <td width="110">NPWP</td>
                  <td><input name="sNPNW" type="text" id="NPNW"></td>
                  </tr>
                  <tr>
                  <td width="110">TELEPON</td>
                  <td><input name="sTELEPON" type="text" id="TELEPON"></td>
                  </tr>
                  <tr>
                  <td width="110">ALAMAT</td>
                  <td><input name="sALAMAT" type="text" id="ALAMAT"></td>
                  </tr>
                  <tr>
                  <td width="110">RMK</td>
                  <td><input name="sRMK" type="text" id="RMK"></td>
                  </tr>
                  <tr>
                  <td width="110">Jenis_Kelamin</td>
                  <td><input name="sJenis_Kelamin" type="text" id="Jenis_Kelamin"></td>
                  </tr>
                  <tr>
                  <td width="110">TGL_mulai_bekerja</td>
                  <td><input name="sTGL_mulai_bekerja" type="date" id="TGL_mulai_bekerja"></td>
                  </tr>
                  <tr>
                  <td width="110">pendidikanformal</td>
                  <td><input name="spendidikanformal" type="text" id="pendidikanformal"></td>
                  </tr>
                  <tr>
                  <td width="110">pendidikanpenilaian</td>
                  <td><input name="spendidikanpenilaian" type="text" id="pendidikanpenilaian"></td>
                  </tr>
                  <tr>
                  <td width="110">sTahun_Masuk</td>
                  <td><input name="sTahun_Masuk" type="text" id="Tahun_MASUK"></td>
                  </tr>
                  <tr>
                  <td width="110">Password</td>
                  <td><input name="spassword" type="text" id="Password"></td>
                  </tr>
                  <tr>
                  <td width="110">Jabatan</td>
                  <td><input name="sjabatan" type="text" id="jabatan"></td>
                  </tr>
                  <tr>
                  <td width="110">Tingkat</td>
                  <td><input name="stingkat" type="text" id="tingkat"></td>
                  </tr>
                  <tr>
                  <td width="110">Tahun</td>
                  <td><input name="stahun" type="text" id="tahun"></td>
                  </tr>
                  <tr>
                  <td width="110"> </td>
                  <td> </td>
                  </tr>
                  <tr>
                  <td width="110"> </td>
                  <td>
                  <input name="tambah" type="submit" id="tambah" value="Tambah Karyawan">
                  </td>
                  </tr>
             
    </table></td>
    <td >&nbsp;</td>
    <td bgcolor="#272C5F">&nbsp;</td>
  </tr>
  <tr>
    <td height="40"  background="/img/gambar6.jpeg" align="center" valign="middle">
	<font face="Verdana, Arial" color="white" size="2">	</font></td>
    <td background="/img/gambar5.jpeg"align="left" valign="middle">  
    </td>
    <td background="/img/gambar6.jpeg">&nbsp;</td>
  </tr>
</table>
</body>
</html>