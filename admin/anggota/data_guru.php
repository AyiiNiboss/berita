
         <div class="pagetitle">
            <h1>Data Anggota Guru</h1>
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
                        <h5 class="card-title">Daftar Data Anggota SMK N 4 PALEMBANG</h5>
                        <a href="index.php?hal=tambah_guru" type="button" class="btn btn-info"><i class="bx bx-plus"></i> Tambah </a>
                        <table class="table datatable">
                           <thead>
                              <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col" class="text-center">Jenis Kelamin</th>
                                    <th scope="col" class="text-center">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                            <?php 
                                include "koneksi/koneksi.php";
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE kategori = 'guru'");
                                while($row = mysqli_fetch_assoc($query)){
                            ?>
                              <tr>
                                 <th scope="row"><?=$no++;?></th>
                                 <td><?=$row['nomor_induk'];?></td>
                                 <td><?=$row['nama'];?></td>
                                 <td class="text-center"><?=$row['jk'];?></td>
                                 <td class="text-center">
                                    <a href="index.php?hal=edit_anggota&id=<?=$row['id_anggota']?>" class="btn btn-primary btn-sm" title="Edit Data"><i class="bi bi-pencil-square"></i></a>
                                    <a href="index.php?hal=hapus_anggota&id=<?=$row['id_anggota']?>" class="btn btn-danger btn-sm" title="Hapus Data" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="bi bi-trash-fill"></i></a>
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

