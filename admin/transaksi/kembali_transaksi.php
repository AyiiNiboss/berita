<?php
    $id=$_GET['kode'];
    $query=mysqli_query($koneksi, "Select * from tb_transaksi where id_transaksi='$id' ");
    $row=mysqli_fetch_assoc($query);
    $id_pesanbuku=$row['id_pesanbuku'];
    $tgl_k= date('Y-m-d');

    $data_pesanbuku =mysqli_query($koneksi,"SELECT * FROM tb_pesanbuku WHERE id_pesanbuku='$id_pesanbuku'");
									 $row0=mysqli_fetch_assoc($data_pesanbuku);
                                     $id_buku = $row0['id_buku'];

    if(isset($_GET['kode'])){
           
            $sql_simpan1 = "INSERT INTO tb_pengembalian (id_pengembalian,id_pesanbuku,tgl_kembali) VALUES (
               '',
               '".$id_pesanbuku."',
               '".$tgl_k."');";
               $query1 = mysqli_query($koneksi, $sql_simpan1);


               $sql_hapus = "DELETE FROM tb_transaksi WHERE id_transaksi='".$_GET['kode']."'";
               $query_hapus = mysqli_query($koneksi, $sql_hapus);

               $sqlstock = "UPDATE tb_buku SET jumlah_buku=(jumlah_buku+1) WHERE id_buku='$id_buku'";
               $querystock = mysqli_query($koneksi, $sqlstock);

            if ($query1 && $query_hapus) {
                if($querystock){

                    echo "<script>
                    Swal.fire({title: 'Kembalikan Buku Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'index.php?hal=data_transaksi';
                        }
                    })</script>";

                }
                }else{
                echo "<script>
                Swal.fire({title: 'Kembalikan Buku Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?hal=data_transaksi';
                    }
                })</script>";
            }
            }
