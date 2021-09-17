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
// phpinfo();

 if (isset($_GET['spegawaiID'])) {
  $spegawaiID2=$_GET['spegawaiID'];
  $SQL ="SELECT * FROM pegawai WHERE pegawaiID='$spegawaiID2' " ;
  $result =mysqli_query($koneksi,$SQL);
  $user = mysqli_fetch_row($result); 
// echo $SQL ."<br>" ;
 }
//echo $user[0] ."<br>" ;
if (isset($_POST['simpan'])) {
  
  //echo "<script>alert('Simpan berfungsi')</script>";
  $SQL = "UPDATE `pegawai` SET 
  `kantorID` = '$_POST[skantor]', 
  `NAMA_LENGKAP` = '$_POST[sNAMA]',
  `userID` = '$_POST[suserID]', 
  `MAPPI` = '$_POST[sMAPPI]', 
  `EMAIL` = '$_POST[sEMAIL]', 
  `NPWP` = '$_POST[sNPNW]', 
  `TELEPON` = '$_POST[sTELEPON]', 
  `ALAMAT` = '$_POST[sALAMAT]', 
  `RMK` = '$_POST[sRMK]', 
  `Jenis_Kelamin` = '$_POST[sJenis_Kelamin]', 
  `TGL_mulai_bekerja` = '$_POST[sTGL_mulai_bekerja]',
  `pendidikanformal` = '$_POST[spendidikanformal]', 
  `pendidikanpenilaian` = '$_POST[spendidikanpenilaian]', 
  `Tahun_MASUK` = '$_POST[sTahun_Masuk]', 
  `password` = '$_POST[spassword]', 
  `jabatan` = '$_POST[sjabatan]', 
  `tingkat` = '$_POST[stingkat]', 
  `tahun` = '$_POST[stahun]' 
  WHERE `pegawaiID` = '$_POST[spetugasID]'"; 


  if(mysqli_query($koneksi, $SQL)) {
    //echo "<script>alert('Simpan berfungsi')</script>";
    }
     $hasil = mysqli_query($koneksi, $SQL);
    $SQL ="SELECT * FROM pegawai WHERE pegawaiID='$_POST[spetugasID]' " ;
    $result =mysqli_query($koneksi,$SQL);
    $user = mysqli_fetch_row($result);
//   echo $SQL ."<br>" ;
  }

  $userID=$_SESSION['userIDSESSION']  ;
  $SQL ="SELECT * FROM pegawai WHERE userID='$userID' " ;
  $result =mysqli_query($koneksi,$SQL);
  $userASLI = mysqli_fetch_row($result);

//echo $SQL ."<br>" ;

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Pegawai</title>
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
    <td width="800" height="40" background="/img/gambar5.jpeg" align="left" valign="middle"><?php echo $userASLI[9] ?></td>
   <td background="/img/gambar6.jpeg">&nbsp;</td>
  </tr>

  <tr>
    <td height="30" colspan="2" bordercolor="#FFFF00" bgcolor="#3366CC">
	<a href="daftarPEGAWAI.php"><input name="keluar" type="SUBMIT" value="KELUAR" /></a>&nbsp;&nbsp;
    </td>
    <td   bgcolor="#272C5F">&nbsp;</td>

  </tr>


  <tr>
    <td  colspan="2" >
	<table width="100%" border="0">


          <form action="" name="dipa" method="post" onSubmit="return valid()"  >
            <input type="number" name="spetugasID" value="<?php echo $user[6] ?>" hidden >

              <tr>
              <td bgcolor="#c2c2a3">Kantor </td>
              <td bgcolor="#c2c2a3"  >&nbsp;</td>
              <td bgcolor="#c2c2a3"  > <select name="skantor" >
               <?php 
              $SQL_21 = "select * from kantor ORDER BY kantorID  ";
              $hasil21=mysqli_query($koneksi,$SQL_21);
              while($datum = mysqli_fetch_array($hasil21)){
                  if ($datum[0]== $user[5]) {
                    echo "<option selected='select' value='$datum[0]' > $datum[1]</option> " ;
                  } else {
                     echo "<option value='$datum[0]' > $datum[1]</option> " ;
                  }
            }
         ?>
              </select>
            </tr>
          </td>
           <tr>
              <td bgcolor="#c2c2a3"  >Nama Lengkap</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="sNAMA" value="<?php echo $user[9] ?>" 
                size="80" >
              </td>
            </tr>

            <tr>
              <td bgcolor="#c2c2a3"  >UserID </td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="suserID" value="<?php echo $user[7] ?>"
               size="40" >
              </td>
            </tr>
             <tr>
              <td bgcolor="#c2c2a3"  >MAPPI</td>
              <td bgcolor="#c2c2a3"  >&nbsp;</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="sMAPPI" value="<?php echo $user[1]?>"  size="40" >
            </tr>
          </td>

            <tr>
              <td bgcolor="#c2c2a3"  >EMAIL</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input  type="text" name="sEMAIL" value="<?php echo $user[12]?>"    size="40" >
              </td>
            </tr>
             <tr>
              <td bgcolor="#c2c2a3"  >NPNW</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input  type="text" name="sNPNW" value="<?php echo $user[13]?>"    size="40" >
              </td>
            </tr>

            <tr>
              <td bgcolor="#c2c2a3"  >Telepon</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="sTELEPON" value="<?php echo $user[11]?>"    size="40" >
              </td>
            </tr>
       
           
            <tr>
              <td bgcolor="#c2c2a3"  >Alamat KTP</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input  type="text" name="sALAMAT" value="<?php echo $user[10]?>"    size="120" >
              </td>
            </tr>

           <tr>
              <td bgcolor="#c2c2a3"  >RMK</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="sRMK" value="<?php echo $user[2]?>"size="40">
              </td>
            </tr>
             <tr>
              <td bgcolor="#c2c2a3" width="115" valign="top"><font face="" size="3" bgcolor="#c2c2a3">Jenis Kelamin</font> </td>
              <td bgcolor="#c2c2a3" width="6" valign="top" align="center"><font face="Verdana, Arial" size="2" bgcolor="#c2c2a3">:</font> </td>
              <td bgcolor="#c2c2a3" width="377" valign="top">

                <select name="sJenis_Kelamin">                    
              <?php if ($user[3] == 1) {  ?>
                <option value="0" ><font face="verdana" size="1" color="white">Laki-Laki</font></option>
                <option selected='selected' value="1" ><font face="verdana" size="1" color="white">Perempuan</font></option>
              <?php } else { ?>
                <option selected='selected' value="0" ><font face="verdana" size="1" color="white">Laki-Laki</font></option>
                <option value="1" ><font face="verdana" size="1" color="white">Perempuan</font></option>
              <?php } ?>
                      </select> 
              </td>
            </tr>
             <tr>  
              <td bgcolor="#c2c2a3"  >Mulai Bekerja</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="date" name="sTGL_mulai_bekerja" value="<?php echo $user[4]?>"    size="40" >
              </td>
            </tr>

            <tr>
              <td bgcolor="#c2c2a3"  >Pendidikan Formal</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  > <select name="spendidikanformal" >
               <?php 
              $SQL_21 = "select * from pendidikanformal ORDER BY pfID  ";
              $hasil21=mysqli_query($koneksi,$SQL_21);
              while($datum = mysqli_fetch_array($hasil21)){
                  if ($datum[0]== $user[14]) {
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
              <td bgcolor="#c2c2a3"  >Pendidikan Penilaian</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  >
              <select name="spendidikanpenilaian" >
               <?php 
              $SQL_21 = "select * from pendidikanpenilaian ORDER BY ppID  ";
              $hasil21=mysqli_query($koneksi,$SQL_21);
              while($datum = mysqli_fetch_array($hasil21)){
                  if ($datum[0]== $user[0]) {
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
              <td bgcolor="#c2c2a3"  >Tahun Masuk</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="sTahun_Masuk" value="<?php echo $user[15]?>"  size="40" >
              </td>
            </tr>
             <tr>
              <td bgcolor="#c2c2a3"  >Password </td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="spassword" value="<?php echo $user[8] ?>"  size="40" >
              </td>
            </tr>

            <tr>
              <td bgcolor="#c2c2a3"  >Jabatan</td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  >

                <select name="sjabatan" >
                 <?php 
                $SQL_21 = "select * from jabatan ORDER BY jabatanID ";
                $hasil21=mysqli_query($koneksi,$SQL_21);
                while($datum = mysqli_fetch_array($hasil21)){

                   if ($datum[0]== $user[16]) {
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
              <td bgcolor="#c2c2a3"  >TINGKAT</td>
              <td bgcolor="#c2c2a3"  >&nbsp;</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="stingkat" value="<?php echo $user[17]?>"  size="40" >
            </tr></td>

            <tr>
              <td bgcolor="#c2c2a3"  >Tahun </td>
              <td bgcolor="#c2c2a3"  >:</td>
              <td bgcolor="#c2c2a3"  ><input type="text" name="stahun" value="<?php echo $user[18]?>"  size="40" >
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

