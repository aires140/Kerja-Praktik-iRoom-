<?php 


if( !isset($_SESSION["login"]) ) {
  header("Location: DashboardCoor.php");
  exit;
}

require 'admin/function.php';

  $nama = $_SESSION["nama"]; 
  error_reporting(0);
  $row = query("SELECT * FROM tb_ruangan WHERE nama = '$nama' AND status= 'terisi'")[0]; 
  $id_ruangan = $row["id_ruangan"];

  if( isset($_POST ["submit"]) ) {



              $cek = query("SELECT * FROM tb_ruangan WHERE status = 'terisi'");

              if( $cek > 0 ) {
                // update status setelah tekan submit
                mysqli_query($conn, "UPDATE tb_ruangan
                                      SET
                                      status = 'kosong', nama = ' '
                                      WHERE 
                                      id_ruangan= $id_ruangan
                                      ");                  
        
                echo "<script>
                        alert('Ruangan berhasil ditinggalkan')
                        document.location.href = 'ruanganC.php';
                      </script>";
    } else{ 
            echo "<script>
                  alert('Tidak bisa dibatalkan')
                  document.location.href = 'ruanganC.php';
                </script>";
                return false;
            }        
    }
  
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
            <h3>Ruangan terpilih</h3>
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
                  <form action = "" method = "POST">
                      <input type="hidden" name="nama" value="'.$row["nama"].'">
                      <input type="hidden" name="id_ruangan" value="'.$row["id_ruangan"].'">
                      <td style="text-align:justify;">
                        <label for="komentar" class="form-label">Komentar</label>
                      </td>
                      <td style="text-align:justify;" colspan = 2>
                        <textarea class="form-control" name="komentar" placeholder="Masukkan komentar atau saran mengenai ruangan dan fasilitasnya"></textarea>
                        
                        <input type="hidden" name="tanggal" value="'. date('Y-m-d').'">
                        </td>
                        <td>
                          <button type="submit" name="submit" class="btn btn-outline-light">Tinggalkan</button>
                        </td>
                        
                  </form>
                </tr>
            </table>

          </div>
        </div>
          ';
            
        } else {
          echo '
            <div class="alert alert-primary" role="alert">
              Tidak ada ruangan yang dipakai
            </div>
          ';
        }

      ?>
    
