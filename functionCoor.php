<?php 
  $conn = mysqli_connect("localhost", "root", "", "db_sirrulas");
  

  function query($query) {
    global $conn;
    $result = mysqli_query( $conn, $query );
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }



  function ubahProfilCoor($data) {
    global $conn;

    $id_koordinator= $data['id_koordinator'];
    $password      = mysqli_real_escape_string($conn, $data["password"]);
    $password2     = mysqli_real_escape_string($conn, $data["password2"]);
    $email         = htmlspecialchars($data['email']);
    $nim           = htmlspecialchars($data['nim']);
    $nama          = strtolower(stripslashes($data['nama']));
    $tempat_lahir  = htmlspecialchars($data['tempat_lahir']);
    $tgl_lahir     = htmlspecialchars($data['tgl_lahir']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $semester      = htmlspecialchars($data['semester']);
    $fakultas      = htmlspecialchars($data['fakultas']);
    $prodi         = htmlspecialchars($data['prodi']);

    $foto          = $_FILES['foto']['name'];
    $file_tmp      = $_FILES['foto']['tmp_name'];
    
    move_uploaded_file($file_tmp, 'foto/'.$foto);


    // cek konfirmasi password
    if( $password !== $password2 ) {
      echo "<script>
            alert('password tidak sama!');
            </script>";
      return false;
    }

    // enksipsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru ke database
    $query = "UPDATE tb_koordinator SET
                        email           ='$email', 
                        password        ='$password', 
                        nim             ='$nim', 
                        nama            ='$nama', 
                        tempat_lahir    ='$tempat_lahir', 
                        tgl_lahir       ='$tgl_lahir', 
                        jenis_kelamin   ='$jenis_kelamin', 
                        semester        ='$semester', 
                        prodi           ='$prodi', 
                        fakultas        ='$fakultas', 
                        foto            ='$foto'
                        WHERE id_koordinator = $id_koordinator
                        ";
                        mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

  }

  function registrasi($data) {
    global $conn;

    $password      = mysqli_real_escape_string($conn, $data["password"]);
    $password2     = mysqli_real_escape_string($conn, $data["password2"]);
    $email         = htmlspecialchars($data['email']);
    $nim           = htmlspecialchars($data['nim']);
    $nama          = strtolower(stripslashes($data['nama']));
    $tempat_lahir  = htmlspecialchars($data['tempat_lahir']);
    $tgl_lahir     = htmlspecialchars($data['tgl_lahir']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $semester      = htmlspecialchars($data['semester']);
    $fakultas      = htmlspecialchars($data['fakultas']);
    $prodi         = htmlspecialchars($data['prodi']);

    $foto = $_FILES['foto']['name'];

    $file_tmp = $_FILES['foto']['tmp_name'];
    
    move_uploaded_file($file_tmp, 'foto/'.$foto);

    // cek ketersediaan email dan nama pengguna
    $result = mysqli_query($conn, "SELECT * FROM tb_koordinator
                        WHERE 
                        nama = '$nama' AND password = '$password'");

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

    // enksipsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru ke database
    mysqli_query($conn, "INSERT INTO tb_koordinator 
                        VALUES
                        ('', '$email', '$password', '$nim', '$nama', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$semester', '$prodi', '$fakultas', '$foto', '')");
  

    return mysqli_affected_rows($conn);

  }


?>

