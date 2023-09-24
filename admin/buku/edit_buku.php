<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku = '$id'");
    $row = mysqli_fetch_assoc($query);

    if(isset($_POST['ubah'])){
        $judul=$_POST['judul_buku'];
        $pengarang=$_POST['pengarang'];
        $penerbit=$_POST['penerbit'];
        $tt=$_POST['th_terbit'];
        $isbn=$_POST['isbn'];
        $jb=$_POST['jumlah_buku'];
        $tgl=$_POST['tgl_input'];
        $query_ubah="Update tb_buku set judul_buku='$judul',pengarang='$pengarang',penerbit='$penerbit',th_terbit='$tt',isbn='$isbn',jumlah_buku='$jb',tgl_input='$tgl' where id_buku='$id' ";            
        mysqli_query($koneksi, $query_ubah);
    
        if ($query_ubah) {
            echo "<script>
            Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?hal=data_buku';
                }
            })</script>";
            }else{
            echo "<script>
            Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?hal=data_buku';
                }
            })</script>";
        }
    }
?>
<div class="pagetitle">
            <h1>Data Buku</h1>
         </div>
         <section class="section">
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                         <h5 class="card-title">Edit Buku</h5>
                        <form class="row g-3" method="POST" enctype="multipart/form-data">
                            <div class="col-12"> 
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input type="text" name="judul_buku" value="<?=$row['judul_buku'];?>" placeholder="Masukan Judul Buku" class="form-control" id="judul">
                            </div>
                           <div class="col-12">
                                <label for="pengarang" class="form-label">Pengarang</label>
                                <input type="text" name="pengarang" value="<?=$row['pengarang']?>" placeholder="Masukan Nama Pengarang" class="form-control" id="pengarang">
                           </div>
                           <div class="col-12">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" value="<?=$row['penerbit']?>" placeholder="Masukan Nama Penerbit" class="form-control" id="penerbit">
                           </div>
                           <div class="col-12">
                                <label for="tahun" class="form-label">Tahun Terbit</label>
                                <input type="number" name="th_terbit" value="<?=$row['th_terbit']?>" placeholder="Masukan Tahun Terbit" class="form-control" id="tahun">
                           </div>
                           <div class="col-12">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" name="isbn" value="<?=$row['isbn']?>" placeholder="Masukan ISBN Buku" class="form-control" id="isbn">
                           </div>
                           <div class="col-12">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah_buku" value="<?=$row['jumlah_buku']?>" placeholder="Masukan Jumlah Buku" class="form-control" id="jumlah">
                           </div>
                           <div class="col-12">
                                <label for="tgl" class="form-label">Tanggal Input</label>
                                <input type="date" name="tgl_input" value="<?=$row['tgl_input']?>" placeholder="Masukan Tanggal Input" class="form-control" id="tgl">
                           </div>
                           <div class="text-start">
                                <button type="submit" name="ubah" class="btn btn-primary">UBAH</button>
                                <a href="index.php?hal=data_buku" class="btn btn-warning">BATAL</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
          </section>

