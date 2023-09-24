
         <div class="pagetitle">
            <h1>Pinjaman Buku</h1>
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
                                    <th scope="col" class="text-center">NO PESAN</th>
                                    <th scope="col" class="text-center">STATUS</th>
                                    <th scope="col" class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php 
                                include "koneksi/koneksi.php";
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_pesanbuku WHERE status = 'aktif'");
                                while($row = mysqli_fetch_assoc($query)){
                                    $id_anggota = $row['id_anggota'];
                                    $id_buku = $row['id_buku'];

                                    //data anggota
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
                                 <td class="text-center"><?php  $tgl = $row['tgl_pesan']; echo date("d/M/Y", strtotime($tgl))?></td>
                                 <td class="text-center"><?= $row['no_pesan']?></td>
                                 <td class="text-center"><span class="badge bg-danger">Pesan Buku</span></td>
                                 <td class="text-center">
                                    <a href="index.php?hal=setuju_pinjam&kode=<?=$row['id_pesanbuku'];?>" onclick="return confirm('Setuju Pesan Buku Ini ?')"
                                    title="Setuju" class="btn btn-success">
                                       <i class="bx bx-check"></i></a>
                                    <a href="index.php?hal=tolak_pinjam&kode=<?=$row['id_pesanbuku'];?>" onclick="return confirm('Tolak Pesan Buku Ini ?')"
                                    title="Tolak" class="btn btn-danger">
                                       <i class="bx bx-x"></i>
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

