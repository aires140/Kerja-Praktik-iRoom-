<?php 
  session_start();
  require 'function.php';

  $isi = mysqli_query($conn, "SELECT * FROM tb_admin");
  


  if( isset($_POST["register"])) {
    
    if( regAdmin($_POST) > 0 ) {
      echo "<script>
            alert( 'Berhasil registrasi' );
            document.location.href = 'DashboardAdmin.php';
            </script>";
      $_SESSION["register"] = true;
      
    
    } else {
      echo mysqli_error($conn);
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
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Ubuntu", sans-serif;
      }
      /* membuat navbar kiri */
      :root {
        --blue: #0d6efd;
        --blue2: #73a0e2;
        --white: #fff;
        --blue3: rgb(197, 215, 231);

      }
      body {
        overflow: auto;
      }
      .detailes {
        width: 100%;
        display: flex;
        padding: 19px;
        justify-content: center;
        align-items: center;
      }
      .detailes .detailesNy {
        width: 700px;
        border-radius: 17px;
        padding: 30px;
        box-shadow: 0 9px 23px rgb(228 227 227);
      }
      .cardHeaderr {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 20px;
        padding-bottom: 25px;
      }
      .cardHeaderr h3 {
        font-weight: 600;
        color: var(--blue);
      }
      .sub {
        font-size: 18px;
        color: #0d6efd;
        padding-top: 20px;
        padding-bottom: 20px;
      }
      input[type="email"],
      input[type="password"],
      input[type="name"],
      input[type="text"],
      input[type="date"],
      input[type="file"],
      select {
        background-color: var(--blue2);
        color: var(--white);
        border: 2px solid var(--white);
        border-radius: 10px;
        margin-bottom: 25px;
      }
      select.form-control {
        border-radius: 10px;
        background-color: var(--blue3);
        color: var(--blue);
      }
      .btn {
        position: relative;
        padding: 5px 20px;
        background: var(--blue);
        color: var(--white);
        text-decoration: none;
        border-radius: 7px;
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

    <title>Registrasi</title>
  </head>
  <body>
    <!-- form -->
    <div class="detailes">
      <div class="detailesNy">
        <div class="cardHeaderr">
          <h3 class="header">Registrasi</h3>
        </div>
        <form action="" onsubmit="return confirm('Data sudah benar?')" method="post" enctype="multipart/form-data">
          <div class="sub"><b>Account</b></div>
          <div>
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" required />
          </div>
          <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required/>
          </div>
          <div>
            <label for="password2" class="form-label">Konfirmasi password</label>
            <input type="password" class="form-control" name="password2" id="password2" required/>
          </div><br>

          <div class="sub"><b>Identity</b></div>

          <div>
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" required></input>
          </div>
          <div>
            <label for="no_induk" class="form-label">Nomor Induk</label>
            <input type="text" class="form-control" name="no_induk" id="no_induk" required></input>
          </div>
          <div>
            <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
            <select name="jenis_kelamin" class="form-control">
              <option value="">---</option>
              <option value="laki-laki">Laki-laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
          <div>
            <label for="tempat_lahir" class="form-label">Tempat lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required></input>
          </div>
          <div>
            <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required></input>
          </div>

          <div>
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control"></input>
          </div>
          <div>
          </div>
          <br />
          <div class="button" style="text-align: center">
            <button type="register" name="register" class="btn">register</button>
            <button type="reset" class="btn">cancel</button>
          </div>
        </form>
        <br />
      </div> 
    </div>
  </body>
</html>
