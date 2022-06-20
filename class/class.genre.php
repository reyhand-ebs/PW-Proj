<?php
//include('./inc.koneksi.php');

	class Genre extends Connection {
		private $idgenre = 0;
		private $namagenre = '';

		public function __get($atribute) {
			if (property_exists($this, $atribute)) {
				return $this->$atribute;
				}
		}
	
		public function __set($atribut, $value) {
			if (property_exists($this, $atribut)) {
					$this->$atribut = $value;
			}
		}

		public function SelectAllGenre() {
			$sql = "SELECT * FROM genre ORDER BY namagenre ASC";
			$result = $this->connection->query($sql);
		
			$arrResult = Array();
			$i=0;
			if($result->rowCount() > 0){
				while($data= $result->fetch(PDO::FETCH_OBJ))
				{
					$objGenre = new Genre();
					$objGenre->idgenre = $data->idgenre;
					$objGenre->namagenre = $data->namagenre;
					$arrResult[$i] = $objGenre;
					$i++;
				}
			}
			return $arrResult;
		}
		
		public function SelectOneGenre() {
            $sql = "SELECT * FROM genre WHERE idgenre = $this->idgenre";
			$result = $this->connection->query($sql);

			if($result->rowCount() == 1){
				while ($data = $result->fetch(PDO::FETCH_OBJ))
				{
					$objGenre = new Genre();
					$objGenre->idgenre = $data->idgenre;
					$objGenre->namagenre = $data->namagenre;
				}
			}
		}
 	}	 
?>
