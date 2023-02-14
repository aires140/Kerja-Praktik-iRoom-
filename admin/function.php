<?php 
  $conn = mysqli_connect("localhost", "root", "", "db_sirrulas");
  

  // fungsi lemari
  function query($query) {
    global $conn;
    $result = mysqli_query( $conn, $query );
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
      $rows[] = $row;
    }
    return $rows;
  }

  // fungsi menambah ruangan
  function create($ruangan) {
    global $conn;

    $kode_ruangan   = htmlspecialchars($ruangan['kode_ruangan']);
    $lantai         = htmlspecialchars($ruangan['lantai']);
    $gedung         = htmlspecialchars($ruangan['gedung']);
    $fasilitas      = htmlspecialchars($ruangan['fasilitas']);
    $status         = htmlspecialchars($ruangan['status']);

    $query = "INSERT INTO tb_ruangan
              VALUES
              ('', '$kode_ruangan', '$lantai', '$gedung', '$fasilitas', '$status', '')";
              mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  // update status raungan
  function status($ruangan){
    global $conn;
    $id_ruangan     = $ruangan['id_ruangan'];
    $status         = htmlspecialchars($ruangan['status']);

    $query = "UPDATE tb_ruangan SET
              status = $status
              
              WHERE id_ruangan = $id_ruangan
              ";
              mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  // fungsi hapus ruangan
  function delete($id_ruangan) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_ruangan WHERE id_ruangan = $id_ruangan");

    return mysqli_affected_rows($conn);
  }

  // fungsi hapus akun
  function Kdelete($id_koordinator, $id_akun) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tb_koordinator WHERE id_koordinator = '$id_koordinator'");
    return mysqli_affected_rows($conn);

    mysqli_query($conn, "DELETE FROM tb_akun WHERE id_akun = '$id_akun'");
    return mysqli_affected_rows($conn);
  }

  // fungsi hapus koemntar
  function Komdelete($id_komentar) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_komentar WHERE id_komentar = $id_komentar");

    return mysqli_affected_rows($conn);
  }

  function createKomen($komentar) {
    global $conn;

    $nama           = $komentar['nama'];
    $id_ruangan     = $komentar['id_ruangan'];
    $komentar       = htmlspecialchars($komentar['komentar']);
    $tanggal        = date('Y-m-d');
    
    $query = "INSERT INTO tb_komentar
              VALUES
              ('', '$nama', '$id_ruangan', '$komentar', '$tanggal')";
              mysqli_query($conn, $query);

  }

  
  // fungsi hapus konfirmasi
  function comDel($id_koordinator) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_koordinator WHERE id_koordiantor = $id_koordinator");

    return mysqli_affected_rows($conn);
  }



  // fungsi edit ruangan
  function edit($ruangan) {
    global $conn;

    $id_ruangan     = $ruangan['id_ruangan'];
    $kode_ruangan   = htmlspecialchars($ruangan['kode_ruangan']);
    $lantai         = htmlspecialchars($ruangan['lantai']);
    $gedung         = htmlspecialchars($ruangan['gedung']);
    $fasilitas      = htmlspecialchars($ruangan['fasilitas']);
    $status         = htmlspecialchars($ruangan['status']);

    $query = "UPDATE tb_ruangan SET
                kode_ruangan = '$kode_ruangan',
                lantai     = '$lantai',
                gedung     = '$gedung',
                fasilitas  = '$fasilitas',
                status     = '$status'
                WHERE id_ruangan = $id_ruangan
              ";
              mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  // fungsi edit profil admin
  function editProfil($isi) {
    global $conn;
    $id_admin      = $isi['id_admin'];
    $password      = mysqli_real_escape_string($conn, $isi["password"]);
    $password2     = mysqli_real_escape_string($conn, $isi["password2"]);
    $email         = htmlspecialchars($isi['email']);
    $nama          = strtolower(stripslashes($isi['nama']));
    $no_induk      = htmlspecialchars($isi['no_induk']);
    $tempat_lahir  = htmlspecialchars($isi['tempat_lahir']);
    $tgl_lahir     = htmlspecialchars($isi['tgl_lahir']);

    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    
    move_uploaded_file($file_tmp, '../img/'.$foto);

    // cek konfirmasi password
    if( $password !== $password2 ) {
      echo "<script>
            alert('password tidak sama!');
            </script>";
      return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // masukkan data
    $query =  "UPDATE tb_admin SET
                          email          ='$email', 
                          password       ='$password', 
                          nama           ='$nama', 
                          no_induk       ='$no_induk',
                          tempat_lahir   ='$tempat_lahir', 
                          tgl_lahir      ='$tgl_lahir', 
                          foto           ='$foto'
                          WHERE id_admin = $id_admin
                          ";
                          mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

  
  }

  
  // fungsi mencari ruangan
  function CariRuangan($keyword) {
    
    $query = "SELECT * FROM tb_ruangan 
                WHERE
              kode_ruangan LIKE '%$keyword%' OR
              lantai LIKE '%$keyword%' OR
              gedung LIKE '%$keyword%' OR
              status LIKE '%$keyword%'
              ";
    return query($query);
  }


  // funngsi mencari koordinator
  function searchKoordinator($keyword) {
    
    $query = "SELECT * FROM tb_koordinator NATURAL JOIN tb_fakultas NATURAL JOIN tb_prodi
                WHERE
              nim LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              jenis_kelamin LIKE '%$keyword%' OR
              semester LIKE '%$keyword%' OR
              prodi LIKE '%$keyword%'
              ORDER BY nama
              ";
    return query($query);
  }

  // fungsi mencari komentar
  function searchKomentar($keyword) {
    
    $query = "SELECT * FROM tb_komentar NATURAL JOIN tb_ruangan
                WHERE
              tanggal LIKE '%$keyword%' OR
              kode_ruangan LIKE '%$keyword%' OR
              komentar LIKE '%$keyword%'
              ORDER BY tanggal
              ";
    return query($query);
  }


  // fungsi registrasi
  function regAdmin($isi) {
    global $conn;

    $password      = mysqli_real_escape_string($conn, $isi["password"]);
    $password2     = mysqli_real_escape_string($conn, $isi["password2"]);
    $email         = htmlspecialchars($isi['email']);
    $nama          = strtolower(stripslashes($isi['nama']));
    $no_induk      = htmlspecialchars($isi['no_induk']);
    $jenis_kelamin = htmlspecialchars($isi['jenis_kelamin']);
    $tempat_lahir  = htmlspecialchars($isi['tempat_lahir']);
    $tgl_lahir     = htmlspecialchars($isi['tgl_lahir']);

    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    
    move_uploaded_file($file_tmp, '../img/'.$foto);
    

    // cek ketersediaan nama pengguna
    $result = mysqli_query($conn, "SELECT * FROM tb_admin 
                                  WHERE nama = '$nama'");

    if( mysqli_fetch_assoc($result) ) {
      echo "<script>
            alert('akun sudah terdaftar')
          </script>";
      return false;
    }

    // cek konfirmasi password
    if( $password !== $password2 ) {
      echo "<script>
            alert('password tidak sama!');
            </script>";
      return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // masukkan data
    mysqli_query($conn,  "INSERT INTO tb_admin
                          VALUES
                          ('', '$email', '$password', '$nama', '$no_induk', '$jenis_kelamin', '$tempat_lahir', '$tgl_lahir', '$foto')");

    return mysqli_affected_rows($conn);

  }

  function kondisiRuangan($id_ruangan){
    global $conn;
    $nama = $_SESSION["nama"];

    mysqli_query($conn, "UPDATE tb_ruangan SET
                                status = 'pending',
                                nama   = '$nama'
                                WHERE id_ruangan = $id_ruangan");

    return mysqli_affected_rows($conn);
  }

?>

