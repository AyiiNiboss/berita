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
					<h2 align="center">LAPORAN DATA BUKU</h2>
	<table border="1" cellpadding="10" cellspacing="0">
					
					<tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>ISBN</th>
                            <th>Jumlah Buku</th>
                            <th>Tanggal Input</th>                                   
                        </tr>';
						
			
				
                
				$no = 1;
				$query =mysqli_query($koneksi,"SELECT * from tb_buku");
				while($row =mysqli_fetch_assoc($query)) {  
						
						
					
					$content .= '<tr>
							<td>'.$no++.'</td>
							<td>'.$row['judul_buku'].'</td>
							<td>'.$row['pengarang'].'</td>
							<td>'.$row['penerbit'].'</td>
							<td align="center">'.$row['th_terbit'].'</td>
							<td>'.$row['isbn'].'</td>
							<td align="center">'.$row['jumlah_buku'].'</td>
							<td>'.$row['tgl_input'].'</td>
						

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