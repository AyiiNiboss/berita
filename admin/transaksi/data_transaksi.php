
         <div class="pagetitle">
            <h1>Transaksi Peminjaman Buku</h1>
            <!-- <nav>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item">Tables</li>
                  <li class="breadcrumb-item active">Data</li>
               </ol>
            </nav> -->
         </div>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <br><br>
                        <!-- <h5 class="card-title">Pesanan Buku</h5>
                        <a href="index.php?hal=tambah_pengguna" type="button" class="btn btn-info"><i class="bx bx-plus"></i> Tambah </a> -->
                        <table class="table datatable">
                           <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIS/NIP</th>
                                    <th scope="col">JUDUL BUKU</th>
                                    <th scope="col" class="text-center">NAMA</th>
                                    <th scope="col" class="text-center">PEMINJAM</th>
                                    <th scope="col" class="text-center">TGL PINJAM</th>
                                    <th scope="col" class="text-center">TGL KEMBALI</th>
                                    <th scope="col" class="text-center">DENDA</th>
                                    <th scope="col" class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php 
                                include "koneksi/koneksi.php";
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC");
                                while($row = mysqli_fetch_assoc($query)){
                                    $id_pesanbuku = $row['id_pesanbuku'];
                                    $tgl_pinjam = $row['tgl_pinjam'];
                                    $tgl_kembali = $row['tgl_kembali'];

                                    //data anggota
									 $data_pesanbuku =mysqli_query($koneksi,"SELECT * FROM tb_pesanbuku WHERE id_pesanbuku='$id_pesanbuku'");
									 $row0=mysqli_fetch_assoc($data_pesanbuku);
                                     $id_anggota = $row0['id_anggota'];
                                     $id_buku = $row0['id_buku'];

									 $data_anggota =mysqli_query($koneksi,"SELECT * FROM tb_anggota WHERE id_anggota='$id_anggota'");
									 $row1=mysqli_fetch_assoc($data_anggota);

                                     //data buku
                                    $data_buku =mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
                                    $row2=mysqli_fetch_assoc($data_buku);
                            ?>

                              <tr>
                                 <th scope="row"><?=$no++;?></th>
                                 <td><?= $row1['nomor_induk']?></td>
                                 <td><?= $row2['judul_buku']?></td>
                                 <td class="text-center"><?=$row1['nama']?></td>
                                 <td class="text-center"><?=$row1['kategori']?></td>
                                 <td class="text-center"><?php  $tgl = $row['tgl_pinjam']; echo date("d/M/Y", strtotime($tgl))?></td>
                                 <td class="text-center"><?php  $tgl = $row['tgl_kembali']; echo date("d/M/Y", strtotime($tgl))?></td>
                                 <?php

                                 $u_denda = 1000;

                                 $tgl1 = date("Y-m-d");
                                 $tgl2 = $row['tgl_kembali'];

                                 $pecah1 = explode("-", $tgl1);
                                 $date1 = $pecah1[2];
                                 $month1 = $pecah1[1];
                                 $year1 = $pecah1[0];

                                 $pecah2 = explode("-", $tgl2);
                                 $date2 = $pecah2[2];
                                 $month2 = $pecah2[1];
                                 $year2 =  $pecah2[0];

                                 $jd1 = GregorianToJD($month1, $date1, $year1);
                                 $jd2 = GregorianToJD($month2, $date2, $year2);

                                 $selisih = $jd1 - $jd2;
                                 $denda = $selisih * $u_denda;
                                 ?>
                                       <td>
                                       <?php if($row1['kategori']=="siswa"){?>
                                          
                                             <?php if ($selisih <= 0) { ?>
                                                         <span class="badge bg-primary">Masa Peminjaman</span>
                                                         <?php }  elseif ($selisih > 0) { ?>
                                                         <span class="badge bg-danger">
                                                            Rp.
                                                            <?=$denda?>
                                                         </span>
                                          <br> Terlambat :
                                          <?=$selisih?>
                                          Hari
                                       
                                 <?php }}else{ ?>
                                          <?php if ($selisih <= 0) { ?>
                                                   <span class="badge bg-warning">Masa Peminjaman</span>
                                                   <?php }?>
                                                   <?php }?>
                                 </td>
                                 <td class="text-center">
                                    <a href="index.php?hal=perpanjang_transaksi&kode=<?=$row['id_transaksi'];?>" onclick="return confirm('Perpanjang Transaksi Ini ?')"
                                    title="Perpanjang" class="btn btn-danger">
                                    <i class="bx bxs-up-arrow-circle"></i></a>
                                    <a href="index.php?hal=kembali_transaksi&kode=<?=$row['id_transaksi'];?>" onclick="return confirm('Kembalikan Buku Ini ?')"
                                    title="Kembalikan" class="btn btn-danger">
                                    <i class="bx bxs-down-arrow-circle"></i></a>
                                 </td>
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
          </section>

