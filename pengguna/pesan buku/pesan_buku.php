<?php
    $id=$_GET['id'];
    $query=mysqli_query($koneksi, "Select * from tb_buku where id_buku='$id' ");
    $row=mysqli_fetch_assoc($query);
    $tgl=date('Y-m-d');
    $no_pesan = rand(100, 500);
    $npesanan = 'NP-'.$no_pesan.'';
    $stock_buku = $row['jumlah_buku'];

    if(isset($_GET['id'])){
           
          if($stock_buku >= 1){
            $sql_simpan1 = "INSERT INTO tb_pesanbuku (id_pesanbuku, id_anggota, id_buku, no_pesan, tgl_pesan, jumlah_buku) VALUES (
               '',
               '".$data_id."',
               '".$id."',
               '".$npesanan."',
               '".$tgl."',
                    '1');";
               $query1 = mysqli_query($koneksi, $sql_simpan1);

               $sqlstock = "UPDATE tb_buku SET jumlah_buku=(jumlah_buku-1) WHERE id_buku='$id'";
               $querystock = mysqli_query($koneksi, $sqlstock);

            if ($query1 && $querystock) {
                echo "<script>
				Swal.fire({title: 'Pesan Buku Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'halaman_pengguna.php?hal=nomor_pesanan';
					}
				})</script>";		
				}else{
				echo "<script>
				Swal.fire({title: 'Pesan Buku Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {
					if (result.value) {
						window.location = 'halaman_pengguna.php?hal=nomor_pesanan';
					}
				})</script>";
            }
            }else{
			echo "<script>
			Swal.fire({title: 'Stock Buku Kosong',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'halaman_pengguna.php?hal=data_pesan';
				}
			})</script>";
            } 
            }

            ?>
    <script>
         var count= <?php echo json_encode($npesanan); ?>;
         sessionStorage.setItem("testing", count);


    </script>