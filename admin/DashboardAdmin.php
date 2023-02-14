<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

    <!-- bootstap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <!--MyCSS -->
    <link rel="stylesheet" href="style.css" />
    <title>Dashboard</title>
  </head>
  <body>
    <div>
      <div class="container">
      <div class="navbar">
        <ul>
          <li class="pt-2">
            <a href="#">
              <span class="icon"><img src="../img/ftiunibba.png" width="40px" /></span><br>
              <span class="title"><b>iRoom Informatika</b> </span>
            </a>
          </li>
          <li>
            <a href="?page=home">
              <span class="icon"><i class="bi bi-house-door"></i></span>
              <span class="title">Home</span>
            </a>
          </li>
          <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#contact">
              <span class="icon"><i class="bi bi-globe"></i></span>
              <span class="title">Sosial Media</span>
            </a>
          </li>
          <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#help">
              <span class="icon"><i class="bi bi-question-circle"></i></span>
              <span class="title">Bantuan</span>
            </a>
          </li>

          <li>
            <a href="#" data-bs-toggle="modal" data-bs-target="#about">
              <span class="icon"><i class="bi bi-exclamation-circle"></i></span>
              <span class="title">Tentang</span>
            </a>
          </li>
          <li>
            <a href="logout_admin.php">
              <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
              <span class="title">Keluar</span>
            </a>
          </li>   
          
        </div>         

        </ul>            

      </div>

      <!-- main -->
      <div class="main">
        <div class="topbar sticky-top">
          <div class="toggle">
            <i class="bi bi-list"></i>
          </div>


          <!-- user user -->
          <div class="userImage">
            <h5 class="username"><a data-bs-toggle="offcanvas" href="#profile" role="button" aria-controls="profile" style="text-decoration: none; color:#2f676e">
              <?= $_SESSION["nama"]; ?>
            </a></h5>
            <a data-bs-toggle="offcanvas" href="#profile" role="button" aria-controls="profile" style="text-decoration: none;">
              <img src="../img/me (2).png" width="40px" />
            </a>
          </div>
        </div>

        <!-- cards -->
        <div class="cardBox">
          <a href="?page=ruangan" class="card" style="text-decoration: none;" onclick="">
            <div class="iconic">
              <i class="bi bi-door-open"></i>
            </div>
            <div>
              <div class="CardName">Ruangan</div>
            </div>
          </a>

          <a href="?page=koordinator_aktivasi" class="card" style="text-decoration: none;">
          <div class="iconic">
              <i class="bi bi-check-circle"></i>
            </div>
            <div>
              <div class="CardName">Konfirmasi</div>
            </div>
          </a>

          <a href="?page=koordinator" class="card" style="text-decoration: none;">
            <div class="iconic">
              <i class="bi bi-people"></i>
            </div>
            <div>
              <div class="CardName">User</div>
            </div>
          </a>

          <a href="?page=komentar" class="card" style="text-decoration: none;">
            <div class="iconic">
              <i class="bi bi-chat"></i>
            </div>
            <div>
              <div class="CardName">Komentar</div>
            </div>
          </a>
        </div>

        <!-- content -->
        <div class="page-content">
          <div class="content">

          <?php 

            if( isset( $_GET['page'] ) ) {
              $page = $_GET['page'];
              switch ($page) {
                case 'home':
                  require "utama.php";
                  break;

                case 'ruangan':
                  require "ruangan.php";
                  break;

                case 'konfirmasi':
                  require "konfirmasi.php";
                  break;

                case 'koordinator':
                  require "koordinator.php";
                  break;

                  case 'koordinator_aktivasi':
                    require "koordinator_aktivasi.php";
                    break;
                  
                case 'komentar':
                  require "komentar.php";
                  break;

                default:
                  require "utama.php";
                  break;
              }
            }else {
              require "utama.php";
            }

          ?>
          </div>
        </div>
          </div>


      <!-- Modal contact -->
      <div class="modal fade" id="contact" tabindex="-1" aria-labelledby="contact" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="contact">Sosial Media</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="text-align: center;">
              <button type="button" class="btn btn-secondary" style="padding: 10px 15px 10px 15px;">
                <a href="https://instagram.com/ftiunibba?igshid=YmMyMTA2M2Y=" target="_blank"><i class="bi bi-instagram" width="20" height="20" style="color: white;"></i></a>
              </button> 
              <button type="button" class="btn btn-secondary" style="padding: 10px 15px 10px 15px;">
                <a href="https://youtube.com/@ftiunibba" target="_blank"><i class="bi bi-youtube" width="20" height="20" style="color: white;"></i></a>
              </button> 
              <button type="button" class="btn btn-secondary" style="padding: 10px 15px 10px 15px;">
                <a href="https://fti.unibba.ac.id/" target="_blank"><i class="bi bi-globe2" width="20" height="20" style="color: white;"></i></a>
              </button> 
              <button type="button" class="btn btn-secondary" style="padding: 10px 15px 10px 15px;">
                <a href="fti@unibba.ac.id" target="_blank"><i class="bi bi-envelope-paper" width="20" height="20" style="color: white;"></i></a>
              </button> 
              <button type="button" class="btn btn-secondary" style="padding: 10px 15px 10px 15px;">
                <a href="https://m.facebook.com/profile.php?id=100065933089695" target="_blank"><i class="bi bi-facebook" width="20" height="20" style="color: white;"></i></a>
              </button> 
              <button type="button" class="btn btn-secondary" style="padding: 10px 15px 10px 15px;">
                <a href="tel:0225943106"><i class="bi bi-telephone" width="20" height="20" style="color: white;"></i></a>
              </button> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->

    <!-- Modal about -->
    <div class="modal fade" id="about" tabindex="-1" aria-labelledby="about" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="about">Tentang</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>
              Aplikasi ini adalah aplikasi yang berguna untuk mempermudah dosen atau mahasiswa dalam mengakses informasi ketersediaan ruang kelas untuk dipakai aktivitas perkuliahan. <br><br>
              Terbatasnya ketersediaan ruang kelas dengan jumlah kelas yang cukup banyak menjadi pemicu kurang efisiennya waktu yang digunakan oleh dosen ataupun mahasiswa disebabkan terpotong untuk mencari ruang kelas yang kosong. <br><br>
              Aplikasi ini juga dibuat oleh mahasiswa tingkat 7 dalam rangka untuk memenuhi salah satu mata kuliah Kerja Praktek.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal about -->

            
    <!-- Modal Help -->
    <div class="modal fade" id="help" tabindex="-1" aria-labelledby="help" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="help">Help</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah anda butuh bantuan?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              <a href="https://wa.me/6281382209822?text=Saya%20butuh%20bantuan%20mengenai%20iRoom" style="color: white; text-decoration: none" target="_blank">Yes</a> 
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal help -->

    <!-- profile -->
    <div class="offcanvas offcanvas-end" id="profile" data-bs-scroll="true" data-bs-backdrop="false" tabindex="1" id="profile" aria-labelledby="profile">
      <div class="offcanvas-header">
        <h4 class="offcanvas-title" id="profile">Profil Admin</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <?php require 'profile.php' ?>
      </div>
    </div>
    <!-- end profile -->

    <script>
      // Menu toggle
      let toggle = document.querySelector(".toggle");
      let navbar = document.querySelector(".navbar");
      let main = document.querySelector(".main");

      toggle.onclick = function () {
        navbar.classList.toggle("active");
        main.classList.toggle("active");
      };

      // hovered list item
      let list = document.querySelectorAll(".navbar li");
      function activelink() {
        list.forEach((item) => item.classList.remove(""));
        this.classList.add("hovered");
      }
      list.forEach((item) => item.addEventListener("mouseover", activelink));
    </script>

    <script>
        function openPage(namaPage) {
            var i;
            var x = document.getElementsByClassName("card");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none"; 
            }
            document.getElementById(namaPage).style.display = "block"; 
        }
    </script>
    <!-- popup bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


  </body>
</html>
