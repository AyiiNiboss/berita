<?php
include "koneksi/koneksi.php";
if(isset($_POST['simpan']))
{
	$ni=$_POST['nomor_induk'];
	$nama=$_POST['nama'];
	$jk=$_POST['jk'];
	$query="INSERT INTO tb_anggota values ('','$ni','$nama','$jk','siswa')";
	mysqli_query($koneksi, $query);
	
	if($query){
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?hal=data_siswa';
			}
		})</script>";
		}else{
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?hal=data_siswa';
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
                         <h5 class="card-title">Tambah Anggota</h5>
                        <form class="row g-3" method="POST">
                            <div class="col-12"> 
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" name="nomor_induk" placeholder="Masukan NIS Anda" class="form-control" id="nis">
                            </div>
                           <div class="col-12">
                                <label for="nama" class="form-label">NAMA</label>
                                <input type="text" name="nama" placeholder="Masukan Nama Anda" class="form-control" id="nama">
                           </div>
                           <div class="col-12">
                                <label>Jenis Kelamin</label>
							<select name="jk" id="jk" class="form-control" required>
								<option>-- Pilih --</option>
								<option>Laki-laki</option>
								<option>Perempuan</option>
						  </select>
                           </div>
                           <div class="text-start">
                                <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
                                <a href="index.php?hal=data_siswa" class="btn btn-warning">BATAL</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
          </section>

