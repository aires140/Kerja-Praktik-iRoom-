<?php 
session_start();

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
              status = 'kosong', nama = ''
              WHERE 
              id_ruangan= $id_ruangan
              ");

        echo "<script>
              alert('berhasil dikosongkan');
              document.location.href = 'ruangan_aktivasi.php';
              </script>";
    
        } else{ 
              echo "<script>
                alert('gagal dikosongkan');
                document.location.href = 'ruangan_aktivasi.php';
              </script>";
            return false;
        }

?>