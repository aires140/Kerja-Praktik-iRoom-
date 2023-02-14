<?php 

    if( !isset($_SESSION["login"]) ) {
      header("Location: index.php");
      exit;
    }
    
  require 'function.php';
  // ambil data dari tb_koordinator dan tb_prodi(prodi)
  $koordinator = query("SELECT * FROM tb_koordinator NATURAL JOIN tb_fakultas NATURAL JOIN tb_prodi WHERE tb_koordinator.id_fakultas = tb_prodi.id_fakultas");
  
  // search
  if( isset($_POST["search"]) ) {
    $koordinator = searchKoordinator($_POST["keyword"]);
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
  
  <title>Data User</title>
</head>
<body>
  
        <!-- Data List -->
        <div class="detailes">
          <div class="detailesNy">
            <div class="cardHeader">
              <h3>Data User</h3>
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
              <!-- notiv -->
              <div class="notiv">
                  <?php
                    $con = mysqli_query($conn, "SELECT * FROM tb_koordinator WHERE status = ''");
                        if($con->fetch_row() == 0){
                          echo '
                              <a href="?page=koordinator_aktivasi">
                                <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                                <lord-icon
                                  src="https://cdn.lordicon.com/psnhyobz.json"
                                  trigger="hover"
                                  style="width: 35px; height:35px">
                                </lord-icon>
                              </a> 
                          ';
                        }else {
                          echo '
                              <a href="?page=koordinator_aktivasi">
                                <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/psnhyobz.json"
                                    trigger="hover"
                                    colors="primary:#e83a30"
                                    style="width: 35px; height: 35px">
                                </lord-icon>
                              </a> 
                          ';
                        }
                  ?>
              </div>
              <!-- end notiv -->
            </div>


            <table>
              <thead>
                <tr>
                  <td>No</td>
                  <td>NIM</td>
                  <td>Nama</td>
                  <td>Jenis Kelamin</td>
                  <td>Semester</td>
                  <td>Prodi</td>
                  <td>Status</td>
                  <td>Opsi</td>
                </tr>
              </thead>
              <tbody>

                <?php $i = 1; ?>
                <?php foreach($koordinator as $row) : ?>

                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["nim"]; ?></td>
                  <td><?= $row["nama"]; ?></td>
                  <td><?= $row["jenis_kelamin"]; ?></td>
                  <td><?= $row["semester"]; ?></td>
                  <td><?= $row["prodi"]; ?></td>
                  <td  style="color: green;"><?= $row["status"]; ?></td>
                  <td><a class="btn delete" href="koordinator_hapus.php?id_koordinator=<?= $row["id_koordinator"]; ?>" onclick="return confirm('Yakin data akan anda hapus?')">hapus</a></td>
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
</body>
</html>