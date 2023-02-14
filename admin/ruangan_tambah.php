<?php 
session_start();

  if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
  }

// koneksi database
require 'function.php';
// cek apakah tombol create sudah pernah diklik atau belum
if( isset($_POST["submit"])) {

  // cek keberhasilan create data
  if( create($_POST) > 0 ) {
    echo "
      <script> 
        alert('Data berhasil ditambahkan');
        document.location.href = 'ruangan.php';
      </script>
    ";
  } else {
    echo "
      <script> 
        alert('Data gagal ditambahkan');
        document.location.href = 'ruangan.php';
      </script>
    ";
  }
  
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <!-- css style -->
    <link rel="stylesheet" href="style.css" />

    <style>
      body {
        overflow: hidden;
      }
      .detailes {
        width: 100%;
        display: flex;
        padding: 196px;
        justify-content: center;
        align-items: center;
      }
      .detailes .detailesNy {
        width: 600px;
      }
      .cardHeaderr {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 25px;
        padding-bottom: 25px;
      }
      .cardHeaderr h3 {
        font-weight: 600;
        color: #0d6efd;
      }

      @media (max-width: 1000px) {
        .detailes {
          padding-right: 10%;
          padding-left: 10%;
        }
      }
      @media (max-width: 500px) {
        .detailes {
          padding-right: 5%;
          padding-left: 5%;
        }
      }
    </style>

    <title>Tambah data ruangan</title>
  </head>
  <body>
    <!-- form -->
    <div class="detailes">
      <div class="detailesNy">
        <div class="cardHeaderr">
          <h3 style="color: #2f676e;">Tambah Data Ruangan</h3>
        </div>
        <form onsubmit="return confirm('Data sudah benar?')" method="post">
          <div>
            <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
            <input type="text" class="form-control" name="kode ruangan" required />
          </div>
          <div>
            <label for="lantai" class="form-label">Lantai</label>
            <input type="text" class="form-control" name="lantai" required/>
          </div>
          <div>
            <label for="gedung" class="form-label">Gedung</label>
            <input type="text" class="form-control" name="gedung" required/>
          </div>
          <div>
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <textarea class="form-control" name="fasilitas" required></textarea>
          </div>
          <div>
            <label for="status" class="form-label">Status Ruangan</label>
            <select name="status" class="form-control">
              <option value=""></option>
              <option value="kosong">Kosong</option>
              <option value="terisi">Terisi</option> 
              <option value="pending">Pending</option>
            </select>
          </div>
          <br />
          <div class="button" style="text-align: center">
            <button type="submit" name="submit" class="btn btn-outline-light">create</button>
            <button type="reset" class="btn btn-outline-light">cancel</button>
          </div>
        </form>
        <br />
      </div>
    </div>
  </body>
</html>
