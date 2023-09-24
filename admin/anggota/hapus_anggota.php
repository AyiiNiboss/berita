<?php

    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE id_anggota= '$id'");
    $row = mysqli_fetch_assoc($query);
    $kategori = $row['kategori'];

        if(isset($_GET['id'])){
            $sql_hapus = "DELETE FROM tb_anggota WHERE id_anggota='".$_GET['id']."'";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            if($kategori == "siswa"){
                if ($query_hapus) {
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
                if ($query_hapus) {
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

