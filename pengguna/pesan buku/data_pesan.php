
<section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title text-center">SILAHKAN PILIH BUKU YANG INGIN ANDA PINJAM </h5>
                        
                        <table class="table datatable">
                           <thead class="bg-success text-white">
                              <tr>
                                    <th scope="col">JUDUL BUKU</th>
                                    <th scope="col">PENGARANG</th>
                                    <th scope="col" class="text-center">PENERBIT</th>
                                    <th scope="col" class="text-center">ISBN</th>
                                    <th scope="col" class="text-center">JUMLAH BUKU</th>
                                    <th scope="col" class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php 
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_buku ORDER BY id_buku DESC ");
                                while($row = mysqli_fetch_assoc($query)){
                            ?>
                              <tr>
                                 <td><?=$row['judul_buku'];?></td>
                                 <td><?=$row['pengarang'];?></td>
                                 <td class="text-center"><?=$row['penerbit'];?></td>
                                 <td class="text-center"><?=$row['isbn'];?></td>
                                 <td class="text-center"><?=$row['jumlah_buku'];?></td>
                                 <td class="text-center">
                                    <a href="halaman_pengguna.php?hal=pesan_buku&id=<?=$row['id_buku']?>" onclick="confirm('Yakin Untuk Pesan Buku Ini ?')" class="btn btn-warning btn-sm" title="Pesan BUku"><i class="bx bx-check-double"></i></a>
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