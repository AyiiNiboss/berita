<?php
    $id=$_GET['kode'];
    $query=mysqli_query($koneksi, "Select * from tb_pesanbuku where id_pesanbuku='$id' ");
    $row=mysqli_fetch_assoc($query);
    $id_pesanbuku=$row['id_pesanbuku'];
    $x=$row['id_anggota'];
    $tgl=date('Y-m-d');

    echo $x;
    if(isset($_GET['kode'])){

       
		//membuat tgl kembali
		$tgl_k=date('Y-m-d', strtotime('+7 days', strtotime($tgl)));
    
        $sql_simpan1 = "INSERT INTO tb_transaksi (id_transaksi,id_pesanbuku,tgl_pinjam,tgl_kembali) VALUES (
			'',
           '".$id_pesanbuku."',
		   '".$tgl."',
		   '".$tgl_k."');";
		   $query1 = mysqli_query($koneksi, $sql_simpan1);

        $sql_simpan2 = "INSERT INTO tb_peminjaman (id_peminjaman,id_pesanbuku,tgl_pinjam) VALUES (
			'',
           '".$id_pesanbuku."',
		   '".$tgl."');";
		   $query_peminjamaan = mysqli_query($koneksi, $sql_simpan2);

           $sql_ubah = "UPDATE tb_pesanbuku SET status='nonaktif' WHERE id_pesanbuku='".$_GET['kode']."'";
           $query_ubah = mysqli_query($koneksi, $sql_ubah);
    
           if ($query1 && $query_ubah) {
            echo "<script>
            Swal.fire({title: 'Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?hal=data_pinjam';
                }
            })</script>";
            }if ($query_peminjamaan) {
                echo "<script>
                Swal.fire({title: 'Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_pinjam';
                    }
                })</script>";
                
            }else{
            echo "<script>
            Swal.fire({title: 'Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?hal=data_pinjam';
                }
            })</script>";
        }
        }