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

//$kantorID=$_SESSION['kantorIDSESSION'];
$SQL ="SELECT * FROM kantor WHERE kantorID='kantorID'" ;
$result =mysqli_query($koneksi,$SQL);
$kantor = mysqli_fetch_row($result) ;



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Daftar Kantor</title>
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
    <td width="800" height="40" background="/img/gambar5.jpeg" align="left" valign="middle"><?php echo $kantor[1] ?></td>
   <td background="/img/gambar6.jpeg">&nbsp;</td>
  </tr>

  <tr>
    <td height="30" colspan="2" bordercolor="#FFFF00" bgcolor="#3366CC">
	<a href="perintah.php"><input name="SUBMIT" type="SUBMIT" value="KELUAR"></a>&nbsp;&nbsp;
    </td>
    <td bgcolor="#272C5F">&nbsp;</td>
  </tr>

  <tr>
    <td  colspan="2"> 
  <table width="100%" border="0" cellpadding="5" cellspacing="1"  height="400"  >
     <tbody>
     <tr>
<td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>No</b></font></td>
          <td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>Nama</b></font></td>
          <td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>Kantor</b></font></td>
          <td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>Alamat</b></font></td>
          <td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>Telepon</b></font></td>
          <td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>Email</b></font></td>
          <td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>Pimpinan</b></font></td>
          <td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>Sekretaris</b></font></td>
          <td bgcolor="silver" valign="top" height="8"><font face="Verdana, Arial" size="1" color="#000000"><b>KETERANGAN</b></font></td></tr>


    <?php 


// menampilkan seluruh isi database
$query ="select *, kantor.NAMA as namakantor from kantor";
$result = mysqli_query($koneksi, $query);
 $nomer=0;
 $keterangan="";
while($kantor = mysqli_fetch_array($result))
{
   $NAMA    = $kantor['NAMA'];
   $kantorID = $kantor['namakantor'];
   $ALAMAT  = $kantor['ALAMAT'];
   $TELEPON  =$kantor['TELEPON'];
   $EMAIL  =$kantor['EMAIL'];
   $Pimpinan  =$kantor['Pimpinan'];
   $Sekretaris  =$kantor['Sekretaris'];
            {
    $nomer++;
     $keterangan; 
?>
   
    <tr align="left" bgcolor="#DFE6EF">
        <td height="32"><?=$nomer?></td>
        <td><?=$NAMA?></td>
        <td><?=$kantorID?></td>
        <td><?=$ALAMAT?></td>
        <td><?=$TELEPON ?></td>
        <td><?=$EMAIL?></td>
        <td><?=$Pimpinan?></td>
        <td><?=$Sekretaris?></td>

        <td><?=$keterangan?><a class="edit" href="EditKANTOR2.php?skantorID=<?php echo $kantor['kantorID'] ?>"><input name="ss" type="button" value="EDIT"></a>
        <a class="hapus" href="hapus.php?skantorID=<?php echo $kantor['kantorID'] ?>"><input name="ss" type="button" value="HAPUS"></a>
<font face="Verdana, Arial" size="1" color="#000000"></td>
       
        </font>
    </tr>
   
<?php  
        }
    }
   

?> 
  
        </table></td>
<td bgcolor="#272C5F">&nbsp;</td>
       
  <tr>
    <td height="40"  background="/img/gambar6.jpeg" align="center" valign="middle">
	<font face="Verdana, Arial" color="white" size="2">	</font></td>
    <td background="/img/gambar5.jpeg"align="center" valign="middle"><font face="verdana" size="1" color="red"><b> Delikasi/682018218 </b></font> 
    </td>
    <td background="/img/gambar6.jpeg">&nbsp;</td>
  </tr>
</table>
</body>
</html>

