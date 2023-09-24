
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Halaman Login Pengguna</title>
      <link href="../../assets/img/favicon.png" rel="icon">
      <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="../../assets/css/style.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      <link href="../../assets/css/boxicons.min.css" rel="stylesheet">
   </head>
   <body>
      <main>
         <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="pt-4 pb-2">
                                 <!-- <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5> -->
                                 <p class="text-center"><b>MASUKAN NIS / NIP ANDA</b></p>
                              </div>
                              <form class="row g-3 needs-validation" novalidate action="" method="POST">
                                 <div class="col-12">
                                    <div class="input-group has-validation">
                                       <span class="input-group-text" id="inputGroupPrepend"><i class="bx bxs-key"></i></span> 
                                       <input type="text" name="nomor_induk" class="form-control" placeholder="NIS / NIP" required>
                                       <div class="invalid-feedback">Please enter your username.</div>
                                    </div>
                                 </div>
                                 <div class="col-12 "> <button class="btn btn-success w-100" name="login" type="submit">LOGIN</button></div>
                                 <!-- <div class="col-12">
                                    <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                                 </div> -->
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </main>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> 
      <script src="../../assets/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   </body>
</html>

<?php 
    include "../../koneksi/koneksi.php";

    if (isset($_POST['login'])) {  

    $username=mysqli_real_escape_string($koneksi,$_POST['nomor_induk']);


    $sql_login = "SELECT * FROM tb_anggota WHERE BINARY nomor_induk='$username'";
    $query_login = mysqli_query($koneksi, $sql_login);
    $data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
    $jumlah_login = mysqli_num_rows($query_login);
    

        if ($jumlah_login == 1 ){
          session_start();
              $_SESSION["ses_id"]=$data_login["id_anggota"];
              $_SESSION["ses_nomorinduk"]=$data_login["nomor_induk"];
              $_SESSION["ses_nama"]=$data_login["nama"];
              $_SESSION["ses_jk"]=$data_login["jk"];
              $_SESSION["ses_kategori"]=$data_login["kategori"];

          echo "<script>
                Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = '../halaman_pengguna.php';
                    }
                })</script>";
          }else{
          echo "<script>
                Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'login.php';
                    }
                })</script>";
            }
          }
?>