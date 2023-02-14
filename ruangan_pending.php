<?php 


if( !isset($_SESSION["login"]) ) {
  header("Location: DashboardCoor.php");
  exit;
}

require 'admin/function.php';

  $nama = $_SESSION["nama"]; 
  error_reporting(0);
  $row = query("SELECT * FROM tb_ruangan WHERE nama = '$nama' AND status= 'pending'")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ruangan terpilih</title>
</head>
<body>
  <div class="detailes">
    <div class="detailesNy">
      <?php 
      
        if ($row > 0 ) {
          echo '
          <div class="cardHeader">
            <h3>Ruangan Dalam Konfirmasi</h3>
            </div>
            <div id="container">
              <table cellspacing="10" border="0"> 
                <tr>
                  <div colspan="3">
                    <center>
                      <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                          <lord-icon
                              src="https://cdn.lordicon.com/ydcsgutd.json"
                              trigger="hover"
                              style="width:150px;height:150px;">
                          </lord-icon>
                    </center> <br>
                  </td>
                </tr>
                
                <tr>
                  <div colspan="3" style="text-align: center;"><h5>'.$row["kode_ruangan"].'</h5></div>
                </tr>
                <tr>
                  <td style="text-align:justify;">Gedung</td>
                  <td style="text-align:justify;">:</td>
                  <td style="text-align:justify;">'.$row["gedung"].'</td>
                </tr>
                <tr>
                  <td style="text-align:justify;">Lantai</td>
                  <td style="text-align:justify;">: </td>
                  <td style="text-align:justify;">'.$row["lantai"].'</td>
                </tr>
                <tr>
                  <td style="text-align:justify;">Fasilitas</td>
                  <td style="text-align:justify;">: </td>
                  <td style="text-align:justify;">'.$row["fasilitas"].'</td>
                </tr>
                <tr>
                <tr>
                  <td style="text-align:justify;">Status</td>
                  <td style="text-align:justify;">: </td>
                  <td style="text-align:justify; color: orange; font-weight: bold;">'.$row["status"].'</td>
                </tr>
            </table>
              <div style="padding-top: 40px;">
                <a class="btn" href="batal.php?id_ruangan='.$row["id_ruangan"].'">Batalkan</a>
            </div>
          </div>
        </div>
          ';
            
        } else {
          echo '
            <div class="alert alert-primary" role="alert">
              Tidak ada data saat ini
            </div>
          ';
        }
      ?>
      
