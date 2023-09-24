
         <div class="pagetitle">
            <h1>Rekap Peminjaman Buku</h1>
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
                        <h5 class="card-title">Rekap Data Peminjaman SMK N 4 PALEMBANG</h5>
                        <a href="./export/pdf_peminjaman.php" type="button" class="btn btn-info text-white"> PDF </a>
                        <table class="table datatable">
                           <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIS/NIP</th>
                                    <th scope="col">JUDUL BUKU</th>
                                    <th scope="col" class="text-center">NAMA</th>
                                    <th scope="col" class="text-center">PEMINJAM</th>
                                    <th scope="col" class="text-center">TGL PINJAM</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php 
                                include "koneksi/koneksi.php";
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_peminjaman ORDER BY id_peminjaman DESC");
                                while($row = mysqli_fetch_assoc($query)){
                                    $id_pesanbuku = $row['id_pesanbuku'];
                                    $tgl_pinjam = $row['tgl_pinjam'];

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
                              </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
          </section>

