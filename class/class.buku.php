<?php

	class Buku extends Connection{
		private $idbuku ='';
		private $judul ='';
		private $halaman ='';
		private $tahun='';			
		private $penulis='';
		private $penerbit='';
		private $summary='';
		private $idgenre='';
		private $cover='';
		private $namagenre ='';
		
		private $hasil = false;
		private $message ='';

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

		function __construct() {
			parent::__construct();
			$this->genre = new Genre();
		}

		public function AddBuku() {
			$sql = "INSERT INTO buku(cover, judul, halaman, tahun, penulis, penerbit, summary, genrebuku) 
		            VALUES ('$this->cover', '$this->judul', '$this->halaman', '$this->tahun', '$this->penulis', '$this->penerbit', '$this->summary', '1')";
			$this->hasil = $this->connection->exec($sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}

		public function UpdateBuku(){
			$sql = "UPDATE buku SET 
					judul = '$this->judul', 
					penulis = '$this->penulis', 
					penerbit = '$this->penerbit', 
					halaman = '$this->halaman', 
					tahun = '$this->tahun', 
					summary = '$this->summary', 
					cover = '$this->cover'
					genrebuku = '$this->genrebuku'
					WHERE idbuku = $this->idbuku";
			$this->hasil = $this->connection->exec($sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil diubah!';					
		    else
			   $this->message ='Data gagal diubah!';	
		}

		public function DeleteBuku(){
			$sql = "DELETE FROM buku WHERE idbuku = '$this->idbuku'";
			$this->hasil = $this->connection->exec($sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil dihapus!';					
		    else
			   $this->message ='Data gagal dihapus!';	
		}

		public function SelectOneBuku(){
			$sql = "SELECT b.*, g.namagenre FROM buku b, genre g WHERE b.genrebuku = g.idgenre AND idbuku = '$this->idbuku'";
			$result = $this->connection->query($sql);

			$arrResult = Array();
			if($result->rowCount() == 1){
				while ($data = $result->fetch(PDO::FETCH_OBJ))
				{
					$this->idbuku = $data->idbuku;
					$this->judul = $data->judul;
					$this->penulis = $data->penulis;
					$this->penerbit = $data->penerbit;
					$this->halaman = $data->halaman;
					$this->tahun = $data->tahun;
					$this->summary = $data->summary;
					$this->namagenre = $data->namagenre;
					$this->cover = $data->cover;
				}
			}
		}

		public function SelectAllBuku(){
			$sql = "SELECT b.*, g.namagenre FROM buku b, genre g WHERE b.genrebuku = g.idgenre ORDER BY judul";
			$result = $this->connection->query($sql);
		
			$arrResult = Array();
			$i=0;
			if($result->rowCount() > 0){
				while($data = $result->fetch(PDO::FETCH_OBJ))
				{
					$objBuku = new Buku();
					$objBuku->idbuku = $data->idbuku;
					$objBuku->judul = $data->judul;
					$objBuku->penulis = $data->penulis;
					$objBuku->penerbit = $data->penerbit;
					$objBuku->halaman = $data->halaman;
					$objBuku->tahun = $data->tahun;
					$objBuku->summary = $data->summary;
					$objBuku->cover = $data->cover;
					$objBuku->genrebuku = $data->genrebuku;
					$objBuku->namagenre = $data->namagenre;
					$arrResult[$i] = $objBuku;
					$i++;
				}
			}
			return $arrResult;
		}

		public function SelectAllBukuByGenre($selectgenre){
			$sql = "SELECT * FROM buku WHERE idgenre =(SELECT idgenre FROM genre WHERE genre=$selectgenre)";				
			$result = $this->connection->query($sql);
				
			$arrResult = Array();
			$cnt=0;
			if($result->rowCount() > 0){				
				while ($data= $result->fetch(PDO::FETCH_OBJ))
				{
					$objBuku = new Buku();
					$objBuku->judul = $data->judul;
					$objBuku->penulis = $data->penulis;
					$objBuku->penerbit = $data->penerbit;
					$objBuku->rating = $data->rating;
					$objBuku->halaman = $data->halaman;
					$objBuku->tahun = $data->tahun;
					$objBuku->summary = $data->summary;
					$objBuku->idgenre = $data->idgenre;
					$objBuku->cover = $data->cover;
					$objBuku->namagenre = $data->namagenre;
					$arrResult[$cnt] = $objBuku;
					$cnt++;
				}
			}
			return $arrResult;
		} 
	}
?>