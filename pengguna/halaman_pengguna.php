<?php 
     session_start();
     if (isset($_SESSION["ses_nomorinduk"])==""){
         header("location: login.php");
     
     }else{
       $data_id = $_SESSION["ses_id"];
       $data_nama = $_SESSION["ses_nama"];
       $data_jk = $_SESSION["ses_jk"];
       $data_kategori = $_SESSION["ses_kategori"];
     }
 
 
    include "../koneksi/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>PERPUSTAKAAN SMKN 4 PALEMBANG</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="../assets/img/favicon.png" rel="icon">
      <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="../assets/css/boxicons.min.css" rel="stylesheet">
      <link href="../assets/css/quill.snow.css" rel="stylesheet">
      <link href="../assets/css/quill.bubble.css" rel="stylesheet">
      <link href="../assets/css/remixicon.css" rel="stylesheet">
      <link href="../assets/css/simple-datatables.css" rel="stylesheet">
      <link href="../assets/css/style.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   </head>
   <body>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;1,500&display=swap');
         body{
            font-family: 'Montserrat', sans-serif;
         }
         #main, #footer {
         margin-left: 37px;
         margin-right: 37px;
         }
    </style>
      <header id="header" class="header fixed-top d-flex align-items-center">
         <!-- <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center"> <img src="../assets/img/logo.png" alt=""> <span class="d-none d-lg-block" style="text-transform: capitalize;"></span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div> -->
         <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">
               <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
               <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $data_nama ?> </span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                        <h6> <?php echo $data_nama ?> </h6>
                        <span> <?php echo $data_kategori ?> </span>
                     </li>
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <!-- <li> <a class="dropdown-item d-flex align-items-center" href="users-profile.html"> <i class="bi bi-person"></i> <span>My Profile</span> </a></li> -->
                     <li>
                        <hr class="dropdown-divider">
                     </li>
                     <li> <a class="dropdown-item d-flex align-items-center" href="./login/logout.php"> <i class="bi bi-box-arrow-right"></i> <span>Sign Out</span> </a></li>
                  </ul>
               </li>
            </ul>
         </nav>
      </header>
      <main id="main" class="main">
        <?php 
                $hal = @$_GET['hal'];
                if($hal == 'data_pesan'){
                    include "pesan buku/data_pesan.php";
                }elseif($hal == "pesan_buku"){
                    include "pesan buku/pesan_buku.php";
                }elseif($hal == "nomor_pesanan"){
                    include "pesan buku/nomor_pesanan.php";
                }else{
                    include "pesan buku/data_pesan.php";
                }
             ?>
      </main>
      <footer id="footer" class="footer">
        <div class="copyright"> &copy; Copyright <strong><span>SMK N 4 PALEMBANG</span></strong>.
     </footer>
     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
       <script src="../assets/js/apexcharts.min.js"></script>
       <script src="../assets/js/bootstrap.bundle.min.js"></script>
       <script src="../assets/js/chart.min.js"></script>
       <script src="../assets/js/echarts.min.js"></script>
       <script src="../assets/js/quill.min.js"></script>
       <script src="../assets/js/simple-datatables.js"></script>
       <script src="../assets/js/tinymce.min.js"></script>
       <script src="../assets/js/validate.js"></script>
       <script src="../assets/js/main.js"></script>        
  </body>
</html>