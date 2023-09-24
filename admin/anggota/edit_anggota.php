<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_anggota= '$id'");
    $row = mysqli_fetch_assoc($query);
    $kategori = $row['kategori'];

    if(isset($_POST['ubah'])){
        $nomor_induk=$_POST['nomor_induk'];
        $nama=$_POST['nama'];
        $jk=$_POST['jk'];
        $query_ubah="UPDATE tb_anggota SET nomor_induk='$nomor_induk',nama='$nama',jk='$jk' WHERE id_anggota='$id' ";            
        mysqli_query($koneksi, $query_ubah);
        

        if($kategori == "siswa"){
            if ($query_ubah) {
                echo "<script>
                Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_siswa';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_siswa';
                    }
                })</script>";
            }
        }elseif($kategori == "guru"){
            if ($query_ubah) {
                echo "<script>
                Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_guru';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_guru';
                    }
                })</script>";
            }
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
                            <?php if($kategori == "guru"){ ?>
                            <div class="col-12"> 
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" name="nomor_induk" value="<?=$row['nomor_induk'];?>" class="form-control" id="nip">
                            </div>
                            <?php }else if($kategori == "siswa"){ ?>
                           <div class="col-12">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" name="nomor_induk" value="<?=$row['nomor_induk']?>" class="form-control" id="nis">
                           </div>
                           <?php } ?>
                           <div class="col-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" value="<?=$row['nama']?>"class="form-control" id="nama">
                           </div>
                           <div class="col-12">
                                <label>Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                        <option value="<?=$row['jk'];?>"><?=$row['jk'];?></option>
                                        <option>Laki-laki</option>
                                        <option>Perempuan</option>
                                </select>
                           </div>
                           
                           <div class="text-start">
                                <button type="submit" name="ubah" class="btn btn-primary">UBAH</button>
                                <?php if($kategori == "siswa"){?> 
                                    <a href="index.php?hal=data_siswa" class="btn btn-warning">BATAL</a>
                                <?php } elseif($kategori == "guru"){ ?>
                                    <a href="index.php?hal=data_guru" class="btn btn-warning">BATAL</a>
                                <?php } ?>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
          </section>

