<?php

    if( !isset($_SESSION["login"]) ) {
      header("Location: DashboardCoor.php");
      exit;
    }

  require 'admin/function.php'; 

  $ruangan = query("SELECT * FROM tb_ruangan WHERE status = 'kosong'");

  // pencarian pada search
  if( isset($_POST["search"]) ) {
    $ruangan = CariRuangan($_POST["keyword"]);
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <!-- bootstap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <!-- css style -->
  <link rel="stylesheet" href="style.css">
  <title>Ruangan</title>
</head>
<body>
  
        <!-- Data List -->
        <div class="detailes">
          <div class="detailesNy">
            <div class="cardHeader">
              <h3>Data Classroom</h3>
              <!-- search -->
              <div class="search">
                <form action="" method="POST">
                  <label for="">
                    <input type="text" name="keyword" placeholder="Search here" autofocus autocomplete="off"/>
                    <button style="border: 0;" type="submit" name="search">
                      <i class="bi bi-search"></i>
                    </button>
                  </label>
                </form>
              </div>
              <!-- end search -->
            </div>          

              <!-- alert -->
              <div class="alert alert-primary" role="alert">
                Silahkan klik menu yang ada dibawah status, untuk memilih ruangan yang akan digunakan
              </div>
              <!-- end alert -->

            <div id="container">
              <table>
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Kode Ruangan</td>
                    <td>Lantai</td>
                    <td>Gedung</td>
                    <td>Fasilitas</td>
                    <td>Status</td>
                  </tr>
                </thead>
                <tbody>

                  <?php $i = 1; ?>
                  <?php foreach($ruangan as $row) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["kode_ruangan"]; ?></td>
                    <td><?= $row["lantai"]; ?></td>
                    <td><?= $row["gedung"]; ?></td>
                    <td><?= $row["fasilitas"]; ?></td>
                    <td class="button">
                      <button type="submit" name="submit" class="btn kosong" onclick="return confirm('Yakin anda akan memilih ruangan <?= $row['kode_ruangan']; ?>?')">
                        <a href="ruangan_conn.php?id_ruangan=<?= $row["id_ruangan"]; ?>" style="text-decoration: none; color: white ">Available</a>
                      </button>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>        
              <!-- footer -->
                <?php require 'footer.php'; ?>
              <!-- end footer -->
            </div>
          </div>
        </div>
</body>
</html>