<?php 

if( !isset($_SESSION["login"]) ) {
  header("Location: DashboardCoor.php");
  exit;
}

  require 'functionCoor.php';


  $nama = $_SESSION["nama"]; //isi variabel $id_admin dengan id_admin yang sedang digunakan
  $isi = query("SELECT * FROM tb_koordinator NATURAL JOIN tb_fakultas NATURAL JOIN tb_prodi WHERE tb_koordinator.id_fakultas = tb_prodi.id_fakultas AND  nama = '$nama'")[0]; //isi variabel $isi dengan mengambil data yang id_admin = $id_admin, dimulai dari index 0


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>isi profile</title>
</head>
<body>
  <div class="detailes">
    <div class="detailesNy">
      <div class="cardHeader">
        <h3>Profil</h3>
      </div>
        <div id="container">
          <table cellspacing="10" border="0"> 
            <tr>
              <td colspan="3"><center><img src="img/4.jpg" width="110px" height="110px" style="border-radius: 50%"></center> <br></td>
            </tr>
            <tr>
              <td colspan="3"><h5><?= $_SESSION["nama"]; ?></h5></td>
            </tr>
            <tr>
              <td style="text-align:justify;">E-mail</td>
              <td style="text-align:justify;">:</td>
              <td style="text-align:justify;"><?= $isi["email"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">NIM</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $isi["nim"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">Jurusan</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $isi["prodi"]; ?></td>
            </tr>
            <tr>
            <tr>
              <td style="text-align:justify;">Jenis Kelamin</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $isi["jenis_kelamin"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">TTL</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $isi["tempat_lahir"]?>, <?= $isi["tgl_lahir"] ?> </td>
            </tr>
        </table>
          <div style="padding-top: 40px;">
            <a class="btn btn-primary" href="profil_editc.php?id_koordinator=<?= $isi["id_koordinator"]; ?>">Ubah</a>
        </div>
      </div>
    </div>
  </div>

      
</body>
</html>