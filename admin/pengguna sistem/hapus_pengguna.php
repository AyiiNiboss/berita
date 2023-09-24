<?php 
    if(isset($_GET['id'])){
        $sql_hapus = "DELETE FROM tb_pengguna WHERE id_pengguna = '".$_GET['id']."'";
        mysqli_query($koneksi, $sql_hapus);

        if($sql_hapus){
            echo "<script>
            Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?hal=data_pengguna';
                }
            })</script>";
            }else{
            echo "<script>
            Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?hal=data_pengguna';
                }
            })</script>";
        }
    }

?>