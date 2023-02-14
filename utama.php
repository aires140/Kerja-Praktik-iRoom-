<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css" />
  <title>Menu Utama</title>
</head>
<body>
<div class="detailes" >
    <div class="detailesNy"style="background-color: #0d6efd;">
      <div class="cardHeader">
        <h3 style="color: white;">Selamat Datang <?= $_SESSION["nama"] ?></h3>
      </div>
    </div>
  </div>
  <div class="detailes">
    <div class="detailesNy">
      <div class="cardHeader">
        <h3>Visi dan Misi Teknik Informatika</h3>
      </div>
      <table>
        <thead>
          <tr>
            <td>Visi</td>
            <td>Misi</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Menjadi Program Studi Teknik Informatika yang mampu menghasilkan lulusan yang unggul dan mandiri bidang rekayasa perangkat lunak di Jawa Barat pada tahun 2028.</td></td>
            <td>
              <ul style="text-align: justify;">
                <li>Mengembangkan sistem dan proses belajar bidang rekayasa perangkat lunak serta mampu mengembangkan Pendidikan untuk menghasilkan lulusan yang unggul dan mandiri.</li>
                <li>Mengembangkan penelitian bidang rekayasa perangkat lunak yang inovatif dan bermanfaat untuk perkembangan teknologi rekayasa perangkat lunak dan masyarakat.</li>
                <li>Mengembangkan pengabdian kepada masyarakat dalam bentuk pengembangan teori, sistem dan aplikasi serta pemecahan berbagai permasalahan bidang rekayasa perangkat lunak yang sesuai dengan kebutuhan masyarakat.</li>
                <li>Meningkatkan Kerjasama yang berkelanjutan dengan Lembaga institusi lain, pemerintah industry, asosiasi bidang keilmuan, dan masyarakat dalam rangka meningkatkan terselenggaranya kualitas Pendidikan, penelitian dan pengabdian kepada masyarakat.</li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php require 'footer.php'; ?>
  </div>

</div>
</body>
</html>