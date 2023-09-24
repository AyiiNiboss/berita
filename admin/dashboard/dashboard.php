<?php
	$sql = $koneksi->query("SELECT count(id_buku) as buku from tb_buku");
	while ($data= $sql->fetch_assoc()) {
	
		$buku=$data['buku'];
	}
?>



<?php
	$sql = $koneksi->query("SELECT count(id_peminjaman) as pin from tb_peminjaman ");
	while ($data= $sql->fetch_assoc()) {
	
		$pin=$data['pin'];
	}
?>

<?php
	$sql = $koneksi->query("SELECT count(id_pengembalian) as kem from tb_pengembalian ");
	while ($data= $sql->fetch_assoc()) {
	
		$kem=$data['kem'];
	}
?>
         
         <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
               </ol>
            </nav>
         </div>
         <section class="section dashboard">
            <div class="row">
               <div class="col-lg-12">
                  <div class="row">
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                           <div class="card-body">
                              <h5 class="card-title">TOTAL BUKU</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-book"></i></div>
                                 <div class="ps-3">
                                    <h6><?= $buku?></h6>
                                  <a href="index.php?hal=laporan_buku"><span class="text-success small pt-1 fw-bold">Cek Data Buku</span></a>  
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                           <div class="card-body">
                              <h5 class="card-title">TOTAL PEMINJAMAN</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-people"></i></div>
                                 <div class="ps-3">
                                    <h6><?php echo $pin ?></h6>
                                    <a href="index.php?hal=laporan_peminjaman"><span class="text-success small pt-1 fw-bold">Cek Data Peminjaman</span></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                           <div class="card-body">
                              <h5 class="card-title">TOTAL PENGEMBALIAN</h5>
                              <div class="d-flex align-items-center">
                                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-people"></i></div>
                                 <div class="ps-3">
                                    <h6><?php echo $kem ?></h6>
                                    <a href="index.php?hal=laporan_pengembalian"><span class="text-danger small pt-1 fw-bold">Cek Data Pengembalian</span></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>