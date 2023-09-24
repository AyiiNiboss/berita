<?php

            $id=$_GET['kode'];
            $query=mysqli_query($koneksi, "Select * from tb_pesanbuku where id_pesanbuku='$id' ");
            $row=mysqli_fetch_assoc($query);
            $id_buku = $row['id_buku'];

        if(isset($_GET['kode'])){
    
            $sql_hapus = "DELETE FROM tb_pesanbuku WHERE id_pesanbuku='".$_GET['kode']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);


            $sqlstock = "UPDATE tb_buku SET jumlah_buku=(jumlah_buku+1) WHERE id_buku='$id_buku'";
            $querystock = mysqli_query($koneksi, $sqlstock);

            if ($query_hapus && $querystock) {
                echo "<script>
                Swal.fire({title: 'Berhasil Ditolak',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_pinjam';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Gagal Ditolak',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_pinjam';
                    }
                })</script>";
            }
        }

