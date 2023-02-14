<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require 'function.php';

$id_komentar = $_GET["id_komentar"];

if( Komdelete($id_komentar) > 0 ) {
  echo "
    <script> 
      alert('Data berhasil dihapus');
      document.location.href = 'komentar.php';
    </script>
  ";
} else {
  echo "
    <script> 
      alert('Data gagal dihapus');
      document.location.href = 'komentar.php';
    </script>
  ";
}

?>