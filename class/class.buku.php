<?php
	require_once('./inc.koneksi.php');
	class buku extends Connection{
		private $idbuku ='';
		private $judul ='';
		private $halaman = 0;
		private $tahun=0;			
		private $penulis='';
		private $penerbit='';
		private $summary='';
		private $rating=0;
		private $idgenre='';

		public function __get($atribute) {
			if (property_exists($this, $atribute)) {
				return $this->$atribute;
			}
		}
	
		public function __set($atribut, $value){
			if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
			}
		}

		public function AddBuku(){
			$sql = "INSERT INTO buku(idbuku, judul, halaman, tahun, penulis, penerbit, summary, rating, idgenre) 
		            values ('$this->idbuku', '$this->judul', '$this->halaman', '$this->tahun', '$this->penulis', '$this->penerbit', '$this->summary', '$this->rating', '$this->idgenre');
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}

		public function UpdateBuku(){
			$sql = "UPDATE buku SET judul = '$this->judul'",
					penulis = '$this->penulis',
					penerbit = '$this->penerbit',
					rating = '$this->rating',
					halaman = '$this->halaman',
					tahun = '$this->tahun',
					summary = '$this->summary',
					idgenre = '$this->idgenre'
					WHERE idbuku = $this->idbuku";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}

		public function DeleteBuku(){
			$sql = "DELETE FROM Buku WHERE idbuku =$this->idbuku";
			$this->hasil = mysqli_query($this->connection, $sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}

		public function SelectOneBuku($onebuku){
			$sql = "SELECT * FROM buku WHERE idBuku = $onebuku";
			$resultOne = mysqli_query($this->connection, $sql);
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->judul = $data['judul'];				
				$this->pengarang = $data['penerbit'];	
				$this->penulis=$data['penulis'];			
				$this->rating = $data['rating'];	
				$this->halaman = $data['halaman'];	
				$this->tahun = $data['tahun'];
				$this->summary = $data['summary'];
				$this->idgenre = $data['idgenre'];	
			}							
		}

		public function SelectAllBuku($cari_idbuku, $cari_judul){
			$sql = "SELECT * FROM buku ";
			if($cari_idcategory != '')
			{
				$sql .= " AND idbuku = $cari_idcategory";
			}
			if($cari_deskripsi != '')
			{
				$sql .= " AND judul like '%$cari_deskripsi%'";
			}
			
			$sql .= " ORDER BY idbuku ASC";
						
			$result = mysqli_query($this->connection, $sql);
			$arrResult = Array();
			$cnt=0;
			while ($data = mysqli_fetch_array($result))
			{
				$objBuku = new Buku(); 
				$objBuku->idbuku=$data['idbuku'];
				$objBuku->judul=$data['judul'];
				$objBuku->penulis=$data['penulis'];
				$objBuku->penerbit=$data['penerbit'];
				$objBuku->rating=$data['rating'];
				$objBuku->halaman=$data['halaman'];
				$objBuku->summary=$data['summary'];
				$objBuku->tahun=$data['tahun'];
				$objBuku->idgenre=$data['idgenre'];
				$arrResult[$cnt] = $objMenu;
				$cnt++;
			}
			return $arrResult;			
		}
	}
?>