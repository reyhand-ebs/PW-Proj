<?php
//include('.inc.koneksi.php');
	class Buku extends Connection{
		private $idbuku ='';
		private $judul ='';
		private $halaman = 0;
		private $tahun=0;			
		private $penulis='';
		private $penerbit='';
		private $summary='';
		private $rating=0;
		private $idgenre='';
		private $cover='';
		private $namagenre ='';
		private $message='';

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

		public function AddBuku() {
			$sql = "INSERT INTO buku(idbuku, judul, halaman, tahun, penulis, penerbit, summary, rating, idgenre) 
		            VALUES ('', '$this->judul', '$this->halaman', '$this->tahun', '$this->penulis', '$this->penerbit', '$this->summary', '$this->rating', '$this->idgenre')";
			$this->hasil = $this->connection->exec($sql);
			
			if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}

		public function UpdateBuku(){
			$sql = "UPDATE buku SET judul = '$this->judul', penulis = '$this->penulis', penerbit = '$this->penerbit', rating = '$this->rating', halaman = '$this->halaman', tahun = '$this->tahun', summary = '$this->summary', idgenre = '$this->idgenre', cover = '$this->cover'
			WHERE idbuku = '$this->idbuku' AND idgenre IN(SELECT idgenre FROM genre WHERE namagenre = '$this->namagenre')";
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
			$sql = "SELECT b.*, g.namagenre FROM buku b, genre g WHERE b.idgenre = g.idgenre AND idbuku = '$this->idbuku'";
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
			$sql = "SELECT b.*, g.namagenre FROM buku b, genre g WHERE b.idgenre = g.idgenre ORDER BY judul";
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
					$objBuku->idgenre = $data->idgenre;
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