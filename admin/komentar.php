<?php 

if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require 'function.php';
// koneksi tabel tb_komentar
$komentar = query("SELECT * FROM tb_komentar, tb_ruangan WHERE tb_komentar.id_ruangan = tb_ruangan.id_ruangan");

  if( isset($_POST["search"]) ) {
    $koordinator = searchKomentar($_POST["keyword"]);
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
      @media print {
        .opsi, .btn {
          display: none;
        }
      }
    </style>

    <title>Komentar</title>
  </head>
  <body>
    <!-- Data List -->
    <div class="detailes">
      <div class="detailesNy">
        <div class="cardHeader">
          <h3>Data Comment</h3>
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
            <!-- CETAK -->
            <a href="komentar_cetak.php"> 
              <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
              <lord-icon
                src="https://cdn.lordicon.com/iiixgoqp.json"
                trigger="hover"
                colors="primary:#222222"
                style="width:35px;height:35px">
              </lord-icon><br>
            </a>
        </div>
        <table>
          <thead>
            <tr>
              <td>No</td>
              <td>Tanggal</td>
              <td>Kode Ruangan</td>
              <td>Komentar</td>
              <td>Peminjam</td>
              <td class="opsi">Opsi</td>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach($komentar as $row) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $row["tanggal"]; ?></td>
              <td><?= $row["kode_ruangan"]; ?></td>
              <td><?= $row["komentar"]; ?></td>
              <td><?= $row["nama"]; ?></td>
              <td><a class="btn delete" href="komentar_hapus.php?id_komentar=<?= $row["id_komentar"]; ?>" onclick="return confirm('Yakin data akan dihapus?')">delete</a></td>
            </tr>
            <?php $i++ ?>
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
