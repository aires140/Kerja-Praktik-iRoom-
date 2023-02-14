<?php
// session
if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require 'function.php';
// pengaktifan status koordinator
$koordinator = query("SELECT * FROM tb_koordinator NATURAL JOIN tb_fakultas NATURAL JOIN tb_prodi WHERE tb_koordinator.id_fakultas = tb_prodi.id_fakultas AND status = ''");

$ruangan = query("SELECT * FROM tb_ruangan WHERE status = 'pending'");
    
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
  
  <title>Classroom</title>
</head>
<body>
  
        <!-- Data List -->
        <div class="detailes">
          <div class="detailesNy">
            <div class="cardHeader">
              <h3>Data Konfirmasi</h3>
            </div>
            <table>
              <thead>
                <h5 style="color: green;">Konfirmasi Akun Koordinator</h5>
                <tr>
                  <td>No</td>
                  <td>NIM</td>
                  <td>Nama</td>
                  <td>Semester</td>
                  <td>Prodi</td>
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
                  <td><?= $row["semester"]; ?></td>
                  <td><?= $row["prodi"]; ?></td>

                  <td class="button">
                    <button type="submit" name="submit" class="btn btn-outline-light" onclick="return confirm('Yakin data akan diaktifkan <?= $row['nama']; ?>?')">
                      <a href="akun.php?id_koordinator=<?= $row["id_koordinator"]; ?>" style="text-decoration: none; color: white ">Aktifkan</a>
                    </button>
                    <button type="delete" name="delete" class="btn delete">
                      <a href="koordinator_hapus.php?id_koordinator=<?= $row["id_koordinator"]; ?>" style="text-decoration: none; color: white ">Delete</a>
                    </button>
                  </td>
                </tr>
                
                <?php $i++; ?>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>

        <!-- konfirmasi ruangan -->
        <div class="detailes">
          <div class="detailesNy">
            <table>
              <thead>
                <h5 style="color: green;">Konfirmasi pemakaian ruangan</h5>
                <tr>
                  <td>No</td>
                  <td>Kode Ruangan</td>
                  <td>Gedung</td>
                  <td>Lantai</td>
                  <td>Fasilitas</td>
                  <td>Peminjam</td>
                  <td>Opsi</td>
                </tr>
              </thead>
              <tbody>

                <?php $i = 1; ?>
                <?php foreach($ruangan as $row) : ?>

                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row["kode_ruangan"]; ?></td>
                  <td><?= $row["gedung"]; ?></td>
                  <td><?= $row["lantai"]; ?></td>
                  <td><?= $row["fasilitas"]; ?></td>
                  <td><?= $row["nama"]; ?></td>

                  <td class="button">
                    <button type="submit" name="submit" class="btn btn-outline-light" onclick="return confirm('Yakin penggunaan ruangan <?= $row['nama']; ?> diizinkan?')">
                      <a href="ruangan_aktivasi.php?id_ruangan=<?= $row["id_ruangan"]; ?>" style="text-decoration: none; color: white ">Izinkan</a>
                    </button>
                    <button type="submit" name="submit" class="btn delete" onclick="return confirm('Yakin penggunaan ruangan <?= $row['nama']; ?> tidak diizinkan?')">
                      <a href="ruangan_tidak.php?id_ruangan=<?= $row["id_ruangan"]; ?>" style="text-decoration: none; color: white ">Tidak diizinkan</a>
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
</body>
</html>