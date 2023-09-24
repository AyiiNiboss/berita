<?php
include "../koneksi/koneksi.php";

	$content = '
	<html>

	<head>
		<title>SMK Negeri 4 Palembang - Laporan Perpustakaan</title>
	</head>
	

	<body>
	
	<h3 align="center">PEMERINTAH PROVINSI SUMATERA SELATAN<br>
								DINAS PENDIDIKAN<br>
		    			SEKOLAH MENENGAH KEJURUAN NEGERI 4 PALEMBANG</h3>
			<p align="center">Jl. Sersan Sani 1019 Palembang Provinsi Sumatera Selatan<br>
									Telp./ Fax (0711) 810364 Kode Pos 30127<br>
							email : <u>smkn4plg@yahoo.com</u> website : <u>www.smkn4plg.sch.id</u>
		<b>_______________________________________________________________________________________________________</b>
		<br>
			<br>
					<h2 align="center">LAPORAN DATA PEMINJAMAN</h2>
					<table border="1" cellpadding="10" cellspacing="0" align="center">
					
					    <tr>
							<th>No</th>
							<th>NIS/NIP</th>
							<th>Judul Buku</th>
							<th>Nama</th>
							<th>Peminjam</th>
							<th>Tanggal Pinjam</th>                            
                        </tr>';
			
			
				
                
						
						$no = 1;
						$query =mysqli_query($koneksi,"SELECT * from tb_peminjaman order by tgl_pinjam Asc");
						while($data =mysqli_fetch_assoc($query)) { 
						$id_pesanbuku = $data['id_pesanbuku'];

                                $data_pesanbuku =mysqli_query($koneksi,"SELECT * FROM tb_pesanbuku WHERE id_pesanbuku='$id_pesanbuku'");
									 $row0=mysqli_fetch_assoc($data_pesanbuku);
                                     $id_anggota = $row0['id_anggota'];
                                     $id_buku = $row0['id_buku'];

									 $data_anggota =mysqli_query($koneksi,"SELECT * FROM tb_anggota WHERE id_anggota='$id_anggota'");
									 $row1=mysqli_fetch_assoc($data_anggota);

                                     //data buku
                                    $data_buku =mysqli_query($koneksi,"SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
                                    $row2=mysqli_fetch_assoc($data_buku);
					
					$content .= '<tr>
								<td>'.$no++.'</td>
								<td>'.$row1['nomor_induk'].'</td>
								<td>'.$row2['judul_buku'].'</td>
								<td>'.$row1['nama'].'</td>								
								<td align="center">'.$row1['kategori'].'</td>								
								<td align="center">'.$tgl = $data['tgl_pinjam']; echo date("d/M/Y", strtotime($tgl)).'</td>
					
								</tr>';
				}
				$content .= '</table>
				
						</body>
						</html>';
				




	require_once "../mpdf_v8.0.3-master/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	$mpdf->WriteHTML($content);
	$mpdf->Output();
?>