<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require 'function.php';

$id_koordinator = $_GET["id_koordinator"];
$query = mysqli_query($conn,"SELECT * FROM tb_koordinator WHERE id_koordinator ='$id_koordinator'");
  if( $query->num_rows == 0 ) {
    $pesan = '';

  }else{
    $row = $query->fetch_assoc();
    $nama = $row['nama'];
  
      mysqli_query($conn,"DELETE FROM tb_akun WHERE nama ='$nama'");
      $delete = mysqli_query($conn,"DELETE FROM tb_koordinator WHERE id_koordinator ='$id_koordinator'");

      if($delete){
        echo "
              <script> 
                alert('Data berhasil dihapus');
                document.location.href = 'koordinator.php';
              </script>
            ";
        } else {
          echo "
                <script> 
                  alert('Data gagal dihapus');
                  document.location.href = 'koordinator.php';
                </script>
              ";
          }
  }

?>