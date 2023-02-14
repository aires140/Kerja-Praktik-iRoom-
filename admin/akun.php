<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}
require 'function.php';

  $id_koordinator = $_GET['id_koordinator'];

  $cek = mysqli_query($conn, "SELECT * FROM tb_koordinator WHERE id_koordinator = '$id_koordinator'");
    if( $cek->num_rows > 0 ) {

      $isi            = $cek->fetch_assoc();
      $nama           = strtolower(stripslashes($isi['nama']));
      $password       = mysqli_real_escape_string($conn, $isi["password"]);
        
      // update status setelah tekan submit
        mysqli_query($conn, "UPDATE tb_koordinator
              SET
              status = 'aktif' 
              WHERE 
              id_koordinator= $id_koordinator
              ");

      // masukkan data koor yang sudah diaktifkan ke tb_akun
        mysqli_query($conn, "INSERT INTO tb_akun
                              VALUES
                              ('$nama', '$password')");

        echo "<script>
              alert('Data berhasil diaktifkan');
              </script>";
    
        } else{ 
              echo "<script>
                alert('gagal');
              </script>";
            return false;
        }



?>