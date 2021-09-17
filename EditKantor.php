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
//echo $user[0] ."<br>" ;
if (isset($_POST['simpan'])) {
  
  //echo "<script>alert('Simpan berfungsi')</script>";
  $SQL = "UPDATE `kantor` SET 
  `NAMA` = '$_POST[sNAMA]',
  `ALAMAT` = '$_POST[sALAMAT]', 
  `TELEPON` = '$_POST[sTELEPON]',
  `EMAIL` = '$_POST[sEMAIL]',  
  `Pimpinan` = '$_POST[sPimpinan]', 
  `Sekretaris` = '$_POST[sSekretaris]'
   
  WHERE `kantorID` = '$_POST[skantorID]'"; 


  if(mysqli_query($koneksi, $SQL)) {
  } 
  //echo "<script>alert('Simpan berfungsi')</script>";
    
     $hasil = mysqli_query($koneksi, $SQL);
     header('Location:EditKantor.php');
     $_SESSION['kantorIDSESSION'] = $_POST['skantorID'];
    echo $SQL ."<br>" ;
  }

 // $kantorID=$_SESSION['kantorIDSESSION']  ;
  $SQL ="SELECT * FROM kantor WHERE kantorID='skantorID' " ;
  $result =mysqli_query($koneksi,$SQL);
  $kantor = mysqli_fetch_row($result);
//echo $SQL ."<br>" ;

$userID=$_SESSION['userIDSESSION'];
  $SQL ="SELECT * FROM pegawai WHERE userID='$userID'" ;
  $result =mysqli_query($koneksi,$SQL);
  $user = mysqli_fetch_row($result) ;

  

//echo $SQL ."<br>" ;

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit </title>
<style type="text/css">
<!--
.style1 {color: #FFFF66}
-->
</style>
</head>

</body>
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
	<a href="perintah.php"><input name="keluar" type="SUBMIT" value="KELUAR" /></a>&nbsp;&nbsp;
    </td>
    <td   bgcolor="#272C5F">&nbsp;</td>

  </tr>


  <tr>
    <td  colspan="2" >
	<table width="100%" border="0">


          <form action="" name="dipa" method="post" onSubmit="return valid()"  >
            <input type="number" name="" value="<?php echo $kantor[0] ?>" hidden >

           <tr>
              <td bgcolor="#c2c2a3"  >Nama Kantor </td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="sNAMA" value="<?php echo $kantor[1]?>"  size="40" >
              </td>
            </tr>
            
            <tr>
              <td bgcolor="#c2c2a3"  >Alamat</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input  type="text" name="sALAMAT" value="<?php echo $kantor[2]?>"   size="80" >
              </td>
            </tr>

            <tr>
              <td bgcolor="#c2c2a3"  >Telepon</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="sTELEPON" value="<?php echo $kantor[3]?>"    size="40" >
              </td>
            </tr>

            <tr>
              <td bgcolor="#c2c2a3"  >EMAIL</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input  type="text" name="sEMAIL" value="<?php echo $kantor[4]?>"    size="40" >
              </td>
            </tr>

            <tr>
              <td bgcolor="#c2c2a3"  >Pimpinan</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><select name="sPimpinan" >
               <?php 
              $SQL_21 = "select* from jabatan where jabatanID > '69'  ";
              $hasil21=mysqli_query($koneksi,$SQL_21);
              while($datum = mysqli_fetch_array($hasil21)){
                  if ($datum[0]== $kantor[5]) {
                    echo "<option selected='select' value='$datum[0]' > $datum[1]</option> " ;
                  } else {
                     echo "<option value='$datum[0]' > $datum[1]</option> " ;
                  }
            }
         ?>
              </select>
              </td>
            </tr>

            <tr>
              <td bgcolor="#c2c2a3"  >Sekretaris</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><select name="sSekretaris" >
               <?php 
               $SQL_21 = "select* from jabatan where jabatanID > '49'  AND '69'";
              $hasil21=mysqli_query($koneksi,$SQL_21);
              while($datum = mysqli_fetch_array($hasil21)){
                  if ($datum[0]== $kantor[6]) {
                    echo "<option selected='select' value='$datum[0]' > $datum[1]</option> " ;
                  } else {
                     echo "<option value='$datum[0]' > $datum[1]</option> " ;
                  }
            }
            ?>
              </select>
              </td>
            </tr>

            <tr>
              <td bgcolor="#DBDAC4"  align="center" colspan="3">  

                <input name="simpan" type="submit" value=" SIMPAN ">   </td>
            </tr>
          </form>

	
    </table></td>
    <td bgcolor="#272C5F">&nbsp;</td>
  </tr>
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

