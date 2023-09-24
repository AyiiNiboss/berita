<?php
include "koneksi/koneksi.php";
if(isset($_POST['simpan']))
{
	$nama = $_POST['nama_pengguna'];
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $level = $_POST['level'];
	$query="INSERT INTO tb_pengguna values ('','$nama','$username','$pass','$level')";
	mysqli_query($koneksi, $query);
	
	if($query){
		echo "<script>
		Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?hal=data_pengguna';
			}
		})</script>";
		}else{
		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				window.location = 'index.php?hal=data_pengguna';
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
                         <h5 class="card-title">Tambah Pengguna Sistem</h5>
                        <form class="row g-3" method="POST">
                            <div class="col-12"> 
                                <label for="nis" class="form-label">NAMA</label>
                                <input type="text" name="nama_pengguna" placeholder="Masukan Nama Anda" class="form-control" id="nis">
                            </div>
                           <div class="col-12">
                                <label for="nama" class="form-label">USERNAME</label>
                                <input type="text" name="username" placeholder="Masukan Username Anda" class="form-control" id="nama">
                           </div>
                           <div class="col-12">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                           </div>
                           <div class="col-12">
                                <label for="level">LEVEL</label>
                                 <select name="level" id="level" class="form-control" required>
                                    <option>-- Pilih --</option>
                                    <option>Administrator</option>
                                    <option>Kepala Sekolah</option>
                                 </select>
                           </div>
                           <div class="text-start">
                                <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
                                <a href="index.php?hal=data_pengguna" class="btn btn-warning">BATAL</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
          </section>
