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

$userID=$_SESSION['userIDSESSION']  ;
$SQL ="SELECT * FROM pegawai WHERE userID='$userID' " ;
$result =mysqli_query($koneksi,$SQL);
$user = mysqli_fetch_row($result) ;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>PETA</title>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<style type="text/css">
<!--

           
            #map {
                position: absolute;
                right: 1; left:0; bottom:0; top:0;
            }
 .style1 {color: #FFFF66}
-->
</style>
</head>

<body>
    <div id="map"></div>
    <script type="text/javascript">
            var map = L.map('map').setView([-1.8093741,102.2752978,3050238], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

    </script>

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td width="200" height="130" ><img src="/img/gambar1.jpeg" width="200" height="130" /></td>
    <td width="800" height="130"><img src="/img/gambar2.jpeg" width="802" height="130" /></td>
    <td bgcolor="#272C5F">&nbsp;</td>
  </tr>
  <tr>
    <td width="200" height="40"  background="/img/gambar6.jpeg" align="center" valign="middle"></td>
    <td width="800" height="40" background="/img/gambar5.jpeg" align="left" valign="middle"><?php echo $user[9] ?></td>
   <td background="/img/gambar6.jpeg">&nbsp;</td>
  </tr>

  <tr>
    <td height="30" colspan="2" bordercolor="#FFFF00" bgcolor="#3366CC">
	<a href="perintah.php"><input name="SUBMIT" type="SUBMIT" value="KELUAR" /></a>&nbsp;&nbsp;
    <a href="peta.php"><input name="SUBMIT" type="SUBMIT" value="SET PETA" /></a>&nbsp;&nbsp;
    </td>
    <td   bgcolor="#272C5F">&nbsp;</td>
  </tr>
  <tr>     
    <form action=""><td height="30" colspan="2" bordercolor="#FFFF00" bgcolor="#B9B888"> 
    <label for="PROVINSI">BERDASARKAN PROVINSI</label>
    <select id="PROVINSI" name="PROVINSI">
        <option value=""></option>
    </select>
    <input name="SUBMIT" type="SUBMIT" value="Pilih" /></a>&nbsp;&nbsp;
    <td   bgcolor="#272C5F">&nbsp;</td>
    </tr>

  <tr>
<form action=""><td height="30" colspan="2" bordercolor="#FFFF00" bgcolor="#B9B888"> 
  <label for="">KATA KUNCI</label>
  <input type="text" id="lname" name="Pilih" value=""/> <input name="SUBMIT" type="SUBMIT" value="Pilih" /></a>&nbsp;&nbsp;<br>
  
</form>

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
	<font face="Verdana, Arial" color="white" size="2">	</font></td>
    <td background="/img/gambar5.jpeg"align="left" valign="middle">  
    </td>
    <td background="/img/gambar6.jpeg">&nbsp;</td>
  </tr>
</table>
</body>
</html>

