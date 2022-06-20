<head>
    <title>Download Tubirit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<?php

        require_once ('./class/class.buku.php');
		require_once dirname(__FILE__).'/../vendor/autoload.php';
	
		use Spipu\Html2Pdf\Html2Pdf;

		
		$judul = 'LAPORAN DATA REKOMENDASI BUKU';
		$content ='<b>'.$judul.'</b>';

		$objBuku = new Buku(); 
		$arrayResult = $objBuku->SelectAllBuku();
		$content.= '<table class="table-bordered me-ml-3" border=1>';
		$content.='<tr>	
					<th>ID</th>
					<th>Judul</th>
					<th>Genre</th>
					<th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Halaman</th>
                    <th>Tahun</th>	
                    <th>Summary</th>
					</tr>';	

		if(count($arrayResult) == 0){
			$content.= '<tr><td colspan="4">Tidak ada data!</td></tr>';			
		}else{	
			foreach ($arrayResult as $dataBuku) {
				$content.= '<tr>';				
					$content.= '<td>'.$dataBuku->idbuku.'</td>';	
					$content.= '<td>'.$dataBuku->judul.'</td>';
                    $content.= '<td>'.$dataBuku->namagenre.'</td>';
					$content.= '<td>'.$dataBuku->penulis.'</td>';
					$content.= '<td>'.$dataBuku->penerbit.'</td>';
                    $content.= '<td>'.$dataBuku->halaman.'</td>';
                    $content.= '<td>'.$dataBuku->tahun.'</td>';
                    $content.= '<td>'.$dataBuku->summary.'</td>';	
				    $content.= '</tr>';				
			}
		}
		$content.= '</table>';

		$html2pdf = new HTML2PDF('L', 'A4', 'fr');
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		if (ob_get_contents()) 
		   ob_end_clean();
		//$html2pdf->output();
		$html2pdf->output('Laporan Data Tubirit.pdf');		
?>
