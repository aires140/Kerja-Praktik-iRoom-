<?php 
session_start();

  if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
  }
  
require 'function.php';
$id_ruangan = $_GET["id_ruangan"];

if( delete($id_ruangan) > 0 ) {
  echo "
    <script> 
      alert('Data berhasil dihapus');
      document.location.href = 'ruangan.php';
    </script>
  ";
} else {
  $pesan = '';
}

?> 