<?php 


    if( !isset($_SESSION["login"]) ) {
      header("Location: index.php");
      exit;
    }

  require 'function.php';  

  $ruangan = query("SELECT * FROM tb_ruangan");

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
              <h3>Data Ruangan</h3>
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
              
              <!-- cetak -->
              <a href="ruangan_cetak.php"> 
                <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
                <lord-icon
                  src="https://cdn.lordicon.com/iiixgoqp.json"
                  trigger="hover"
                  colors="primary:#222222"
                  style="width:35px;height:35px">
                </lord-icon><br>
              </a>

              <!-- add -->
              <a href="ruangan_tambah.php" class="btn">+</a>
            </div>
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
                    <td>Opsi</td>
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
                    <td>
                      <?php 
                        if ($row['status'] == 'pending') {
                          echo '<span style="color: orange; font-weight: bold;">'.$row['status'].'</span>
                          ';
                        } else if ($row['status'] == 'kosong'){
                          echo '<span class="btn kosong" font-weight: bold;">Available</span>
                          ';
                        } else {
                          echo '<span class="btn btn-primary" font-weight: bold;">
                                  <a style="text-decoration: none; color: white;" href="ruangan_tidak.php?id_ruangan='.$row['id_ruangan'].' ">Not Available</a>
                                </span>
                          ';
                        }
                      ?>
                    </td>
                    <td><a class="btn edit" href="ruangan_edit.php?id_ruangan=<?= $row["id_ruangan"]; ?>">Ubah</a> | 
                        <a class="btn delete" href="ruangan_hapus.php?id_ruangan=<?= $row["id_ruangan"]; ?>" onclick="return confirm('Yakin data akan dihapus?')">Hapus</a></td>
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
        <script src="/js/jquery-3.6.1.min.js"></script>
        <script src="js/script.js"></script>
</body>
</html>