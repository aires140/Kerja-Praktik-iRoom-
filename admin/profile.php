<?php 

if( !isset($_SESSION["login"]) ) {
  header("Location: DashboardAdmin.php");
  exit;
}

  require 'function.php';
  $id_admin = $_SESSION["id_admin"]; //isi variabel $id_admin dengan id_admin yang sedang digunakan
  $isi = query("SELECT * FROM tb_admin WHERE id_admin = $id_admin")[0]; //isi variabel $isi dengan mengambil data yang id_admin = $id_admin, dimulai dari index 0
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
<table cellspacing="10" border="0">

          <tr>
            <td><center><img src="../img/<?= $isi["foto"]; ?>" width="110px" height="110px" style="border-radius: 50%"></center> <br></td>
          </tr>
          <tr>
            <td><h5 class="username"><?= $isi["nama"]; ?></h5></td>
          </tr>
          <tr>
            <td>E-mail</td>
            <td>:</td>
            <td><?= $isi["email"]; ?></td>
          </tr>
          <tr>
            <td>Nomor Induk</td>
            <td>: </td>
            <td><?= $isi["no_induk"]; ?></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>: </td>
            <td><?= $isi["jenis_kelamin"]; ?></td>
          </tr>
          <tr>
            <td>TTL</td>
            <td>: </td>
            <td><?= $isi["tempat_lahir"]?>, <?= $isi["tgl_lahir"] ?> </td>
          </tr>
      </table>
      <div style="padding-top: 40px;">
        <a class="btn" href="profile_edit.php?id_admin=<?= $isi["id_admin"]; ?>">Ubah</a>
      </div>
      
</body>
</html>