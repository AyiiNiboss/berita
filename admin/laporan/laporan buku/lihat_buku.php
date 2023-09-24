<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku = '$id'");
    $row = mysqli_fetch_assoc($query);
?>
<div class="pagetitle">
            <h1>Data Buku</h1>
         </div>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                         <h5 class="card-title">Lihat Buku</h5>
                         <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class='lbl' style="width:110px;display:inline-block;" > Judul</span>: <?=$row['judul_buku']?></li>
                            <li class="list-group-item"><span class='lbl' style="width:110px;display:inline-block;" > Pengarang</span>: <?=$row['pengarang']?></li>
                            <li class="list-group-item"><span class='lbl' style="width:110px;display:inline-block;" > Penerbit</span>: <?=$row['penerbit']?></li>
                            <li class="list-group-item"><span class='lbl' style="width:110px;display:inline-block;" > Tahun Terbit</span>: <?=$row['th_terbit']?></li>
                            <li class="list-group-item"><span class='lbl' style="width:110px;display:inline-block;" > ISBN</span>: <?=$row['isbn']?></li>
                            <li class="list-group-item"><span class='lbl' style="width:110px;display:inline-block;" > Jumlah Buku</span>: <?=$row['jumlah_buku']?></li>
                            <li class="list-group-item"><span class='lbl' style="width:110px;display:inline-block;" > Tanggal Input</span>: <?=$row['tgl_input']?></li>
                        </ul>
                        <a href="index.php?hal=laporan_buku" class="btn btn-warning mt-3">Kembali</a>
                     </div>
                  </div>
               </div>
            </div>
          </section>

