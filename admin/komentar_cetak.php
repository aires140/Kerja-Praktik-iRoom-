<?php 
  require 'function.php';
  $ruangan = query("SELECT*FROM tb_ruangan");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cetak laporan ruangan</title>
    <style>
      thead td{
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <table cellspacing="9" style="margin-left:auto;margin-right:auto">

          <td><img src="../img/ftiunibba.png" alt="ftiunibba" width="70px" /></td>
          <td></td>
          <td>
            <h2>
              Universitas Bale Bandung <br />
              Fakultas Teknologi Informasi <br />
              Program Studi Teknik Informatika
            </h2>
          </td>
      </table><hr>
    </div><br>
    <p><center>DAFTAR RUANGAN TEKNIK INFORMATIKA</center></p><br><br>
    <table border="1" cellspacing="0" cellpadding="4" style="margin-left:auto;margin-right:auto" border="1">
      <thead>
        <tr>
          <td>No</td>
          <td>Kode Ruangan</td>
          <td>Lantai</td>
          <td>Gedung</td>
          <td>Fasilitas</td>
        </tr>
      </thead>
      <tbody>
              <td>1</td>
              <td>2023-01-14</td>
              <td>1</td>
              <td>Ruang A</td>
              <td>Ruangan nyaman, hanya saja tidak ada AC dan proyektor</td>
        </tr>
      </tbody>
    </table>

</html>
