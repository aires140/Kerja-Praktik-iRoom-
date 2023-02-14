<?php 
session_start();

error_reporting(0);
if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}
require 'function.php';

  $id_ruangan = $_GET['id_ruangan'];

  $cek = mysqli_query($conn, "SELECT * FROM tb_ruangan WHERE id_ruangan = '$id_ruangan'");
    if( $cek->num_rows > 0 ) {

      // update status setelah tekan submit
        mysqli_query($conn, "UPDATE tb_ruangan
              SET
              status = 'terisi' 
              WHERE 
              id_ruangan= $id_ruangan
              ");

        echo "<script>
              alert('Penggunaan ruangan disetujui')
              document.location.href = 'ruangan.php';
              </script>";
    
        } else{ 
              echo "<script>
                alert('gagal');
              </script>";
            return false;
        }

?>