<?php 
session_start();

require 'admin/function.php';

$id_ruangan  = $_GET['id_ruangan'];
$nama        = $_SESSION['nama'];

$result = mysqli_query($conn, "SELECT * FROM tb_ruangan WHERE nama='$nama'");
error_reporting(0);
if( mysqli_num_rows($result) === 0 ){

  query("UPDATE tb_ruangan SET
        status = 'pending', nama = '$nama'
        WHERE 
        id_ruangan = '$id_ruangan'
        ");

    echo '<script>
            alert("Data berhasil dipilih")
            document.location.href = "ruangan_pending.php";
          </script>';
}else{
  echo '<script>
          alert("anda sudah memilih ruangan")
          document.location.href = "ruanganC.php";
        </script>';
  return false;
}

?>