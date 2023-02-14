<?php 

if( isset($_SESSION["login"]) ) {
  header("Location: ruanganC.php");
  exit;
}

require 'admin/function.php';

  $id_ruangan = $_GET['id_ruangan'];
  

      // insert into data komentar

      if( createKomen($_POST) > 0 ) {

        $cek = query("SELECT * FROM tb_ruangan WHERE status = 'terisi'");

        if( $cek > 0 ) {
          // update status setelah tekan submit
          mysqli_query($conn, "UPDATE tb_ruangan
                                SET
                                status = 'kosong', nama = ' '
                                WHERE 
                                id_ruangan= $id_ruangan
                                ");                  


          echo "<script>
                alert('Ruangan berhasil ditinggalkan')
                document.location.href = 'ruanganC.php';
                </script>";
      } else{ 
              echo "<script>
                    alert('Tidak bisa dibatalkan')
                    document.location.href = 'ruanganC.php';
                  </script>";
                  return false;
              }        
      }


