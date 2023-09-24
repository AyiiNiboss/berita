<?php 
     session_start();
     if (isset($_SESSION["ses_username"])==""){
         header("location: login.php");
     
     }else{
       $data_id = $_SESSION["ses_id"];
       $data_nama = $_SESSION["ses_nama"];
       $data_user = $_SESSION["ses_username"];
       $data_level = $_SESSION["ses_level"];
     }
     

 
    include "./koneksi/koneksi.php";

    $sql = $koneksi->query("SELECT count(id_pesanbuku) as pesanbuku from tb_pesanbuku where status = 'aktif'");
	 while ($data= $sql->fetch_assoc()) {
	
		$pesanbuku=$data['pesanbuku'];
	}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Pages - <?php echo $data_level ?> SMKN 4 PALEMBANG</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link href="./assets/img/favicon.png" rel="icon">
      <link href="./assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="./assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="./assets/css/boxicons.min.css" rel="stylesheet">
      <link href="./assets/css/quill.snow.css" rel="stylesheet">
      <link href="./assets/css/quill.bubble.css" rel="stylesheet">
      <link href="./assets/css/remixicon.css" rel="stylesheet">
      <link href="./assets/css/simple-datatables.css" rel="stylesheet">
      <link href="./assets/css/style.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   </head>
   <body>
      <header id="header" class="header fixed-top d-flex align-items-center">
         <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center"> <img src="./assets/img/logo_smk.png" alt=""> <span class="d-none d-lg-block" style="text-transform: capitalize;"><?php echo $data_level ?></span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
         <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
               <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
               <?php if($data_level == "Administrator"){ ?>
               <li class="nav-item dropdown">
                  <a class="nav-link nav-icon" href="index.php?hal=data_pinjam"> <i class="bi bi-bell"></i> 
                  <?php if($pesanbuku > 0 ){ ?>
                     <span class="badge bg-primary badge-number">
                        <?= $pesanbuku ?>
                     </span> 
                     <?php } ?>
                  </a>
               </li>
               <?php } ?>
               <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="./assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $data_nama ?></span> </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                        <h6><?php echo $data_nama ?></h6>
                        <span><?php echo $data_level ?></span>
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
      <aside id="sidebar" class="sidebar">
         <ul class="sidebar-nav" id="sidebar-nav">
            <?php if($data_level == "Administrator"){ ?>
            <li class="nav-item"> <a class="nav-link collapsed" href="index.php?hal=dashboard"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="index.php?hal=data_pinjam"> <i class="bi bi-grid"></i> <span>Pinjaman Buku</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="index.php?hal=data_buku"> <i class="bi bi-menu-button-wide"></i> <span>Data Buku</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="index.php?hal=data_transaksi"> <i class="bi bi-menu-button-wide"></i> <span>Transaksi Peminjaman</span> </a></li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-menu-button-wide"></i><span>Data Anggota</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li> <a href="index.php?hal=data_siswa"> <i class="bi bi-circle"></i><span>Siswa</span> </a></li>
                  <li> <a href="index.php?hal=data_guru"> <i class="bi bi-circle"></i><span>Guru</span> </a></li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>Rekapan</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li> <a href="index.php?hal=laporan_buku"> <i class="bi bi-circle"></i><span>Buku</span> </a></li>
                  <li> <a href="index.php?hal=laporan_peminjaman"> <i class="bi bi-circle"></i><span>Peminjaman</span> </a></li>
                  <li> <a href="index.php?hal=laporan_pengembalian"> <i class="bi bi-circle"></i><span>Pengembalian</span> </a></li>
               </ul>
            </li>
            <li class="nav-heading">Pengaturan</li>
            <li class="nav-item"> <a class="nav-link collapsed" href="index.php?hal=data_pengguna"> <i class="bi bi-person"></i> <span>Pengguna Sistem</span> </a></li>
            <?php }else if($data_level == "Kepala Sekolah") {?>
               <li class="nav-item"> <a class="nav-link collapsed" href="index.php?hal=dashboard"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
               <li class="nav-item">
               <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-layout-text-window-reverse"></i><span>Rekapan</span><i class="bi bi-chevron-down ms-auto"></i> </a>
               <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li> <a href="index.php?hal=laporan_buku"> <i class="bi bi-circle"></i><span>Buku</span> </a></li>
                  <li> <a href="index.php?hal=laporan_peminjaman"> <i class="bi bi-circle"></i><span>Peminjaman</span> </a></li>
                  <li> <a href="index.php?hal=laporan_pengembalian"> <i class="bi bi-circle"></i><span>Pengembalian</span> </a></li>
               </ul>
            </li>
            <?php } ?>
         </ul>
      </aside>
      <main id="main" class="main">
         <?php 
            $hal = @$_GET['hal'];
            if($hal == 'dashboard'){
                include "admin/dashboard/dashboard.php";

            //data buku    
            }elseif($hal == "data_buku"){
                include "admin/buku/data_buku.php";
            }elseif($hal == "tambah_buku"){
                include "admin/buku/tambah_buku.php";
            }elseif($hal == "edit_buku"){
               include "admin/buku/edit_buku.php";
            }elseif($hal == "hapus_buku"){
               include "admin/buku/hapus_buku.php";
            }elseif($hal == "lihat_buku"){
               include "admin/buku/lihat_buku.php";

            //data anggota siswa  
            }elseif($hal == "data_siswa"){
               include "admin/anggota/data_siswa.php";
            }elseif($hal == "edit_anggota"){
               include "admin/anggota/edit_anggota.php";
            }elseif($hal == "hapus_anggota"){
               include "admin/anggota/hapus_anggota.php";
            }elseif($hal == "tambah_siswa"){
               include "admin/anggota/tambah_siswa.php";

            //data anggota guru
            }elseif($hal == "data_guru"){
               include "admin/anggota/data_guru.php";
            }elseif($hal == "tambah_guru"){
               include "admin/anggota/tambah_guru.php";

            //data pengguna
            }elseif($hal == "data_pengguna"){
               include "admin/pengguna sistem/data_pengguna.php";   
            }elseif($hal == "tambah_pengguna"){
               include "admin/pengguna sistem/tambah_pengguna.php";   
            }elseif($hal == "edit_pengguna"){
               include "admin/pengguna sistem/edit_pengguna.php";   
            }elseif($hal == "hapus_pengguna"){
               include "admin/pengguna sistem/hapus_pengguna.php"; 
               
            //data pinjam
            }elseif($hal == "data_pinjam"){
               include "admin/pinjam buku/data_pinjam.php"; 
            }elseif($hal == "setuju_pinjam"){
               include "admin/pinjam buku/setuju_pinjam.php"; 
            }elseif($hal == "tolak_pinjam"){
               include "admin/pinjam buku/tolak_pinjam.php"; 

            //data transaksi    
            }elseif($hal == "data_transaksi"){
               include "admin/transaksi/data_transaksi.php"; 
            }elseif($hal == "perpanjang_transaksi"){
               include "admin/transaksi/perpanjang_transaksi.php"; 
            }elseif($hal == "kembali_transaksi"){
               include "admin/transaksi/kembali_transaksi.php"; 

            //laporan   
            }elseif($hal == "laporan_buku"){
               include "admin/laporan/laporan buku/laporan_buku.php"; 
            }elseif($hal == "laporan_peminjaman"){
               include "admin/laporan/laporan peminjaman/laporan_peminjaman.php"; 
            }elseif($hal == "laporan_pengembalian"){
               include "admin/laporan/laporan pengembalian/laporan_pengembalian.php"; 
            }elseif($hal == "lihat_laporanbuku"){
               include "admin/laporan/laporan buku/lihat_buku.php"; 
            }else{
                include "admin/dashboard/dashboard.php";
            }
         ?>
      </main>
      <footer id="footer" class="footer">
        <div class="copyright"> &copy; Copyright <strong><span>SMK N 4 PALEMBANG</span></strong>.
     </footer>
     <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>  
       <script src="./assets/js/apexcharts.min.js"></script>
       <script src="./assets/js/bootstrap.bundle.min.js"></script>
       <script src="./assets/js/chart.min.js"></script>
       <script src="./assets/js/echarts.min.js"></script>
       <script src="./assets/js/quill.min.js"></script>
       <script src="./assets/js/simple-datatables.js"></script>
       <script src="./assets/js/tinymce.min.js"></script>
       <script src="./assets/js/validate.js"></script>
       <script src="./assets/js/main.js"></script>        
  </body>
</html>