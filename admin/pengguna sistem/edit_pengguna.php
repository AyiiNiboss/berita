<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna= '$id'");
    $data_cek = mysqli_fetch_assoc($query);

    if(isset($_POST['ubah'])){
        $nama=$_POST['nama_pengguna'];
        $username=$_POST['username'];
        $pass=$_POST['password'];
        $level=$_POST['level'];
        $query_ubah="UPDATE tb_pengguna SET nama_pengguna='$nama', username='$username', password='$pass' WHERE id_pengguna='$id' ";            
        mysqli_query($koneksi, $query_ubah);

            if ($query_ubah) {
                echo "<script>
                Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_pengguna';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
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
                         <h5 class="card-title">Edit Pengguna Sistem</h5>
                         <form class="row g-3" method="POST">
                            <div class="col-12"> 
                                <label for="nis" class="form-label">NAMA</label>
                                <input type="text" name="nama_pengguna" value="<?= $data_cek['nama_pengguna']?>" class="form-control" id="nis">
                            </div>
                           <div class="col-12">
                                <label for="nama" class="form-label">USERNAME</label>
                                <input type="text" name="username" value="<?= $data_cek['username']?>" class="form-control" id="nama">
                           </div>
                           <div class="col-12">
                           <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="pass" value="<?php echo $data_cek['password']; ?>"/>
                                <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
                           </div>
                           <div class="col-12">
                                <label>Level</label>
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="">-- Pilih Level --</option>
                                        <?php
                                        // data yg dipilih sebelumnya
                                        if ($data_cek['level'] == "Administrator") echo "<option value='Administrator' selected>Administrator</option>";
                                        else echo "<option value='Administrator'>Administrator</option>";

                                        if ($data_cek['level'] == "Kepala Sekolah") echo "<option value='Kepala Sekolah' selected>Kepala Sekolah</option>";
                                        else echo "<option value='Kepala Sekolah'>Kepala Sekolah</option>";
                                        ?>
                                    </select>
                           </div>
                           <div class="text-start">
                                <button type="submit" name="ubah" class="btn btn-primary">UBAH</button>
                                <a href="index.php?hal=data_pengguna" class="btn btn-warning">BATAL</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
          </section>
<script>
    function change(){
        let x = document.querySelector('#pass').type;
        if(x == "password"){
            document.getElementById('pass').type = 'text';
            document.getElementById('mybutton').innerHTML;
        }
        else
        {
            document.getElementById('pass').type = 'password';
            document.getElementById('mybutton').innerHTML;
        }
        }
</script>
