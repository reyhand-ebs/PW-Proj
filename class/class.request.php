<?php 
    include ('../inc.koneksi.php');
	class Request extends Connection
	{
		private $reqid='';
		private $iduser = '';
		private $reqdate = '';
		private $idgenre = '';
		private $reqjudul = '';
		private $reqpenulis = '';
		private $reqpenerbit = '';
		private $reqhalaman = 0;
		private $reqtahun = 0;
		private $reqsummary = '';
		private $status=0;
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
		
			public function UpdateRequest(){
                $this->connect();
				$sql = "UPDATE employee
						SET status ='$this->status'
						WHERE reqid = '$this->reqid'";
				$this->hasil = $this->connection->exec($sql);
					if($this->hasil)
						$this->message ='Data berhasil diubah!';
					else
						$this->message ='Data gagal diubah!';
				}
		
		public function SelectAllRequest(){
            $this->connect();
			$sql = "SELECT * FROM request";
			$result = $this->connection->query($sql);

			$arrResult = Array();
			$cnt=0;
			if($result->rowCount() > 0 ){
			while ($data= $result->fetch(PDO::FETCH_OBJ))
			{
			$objRequest = new Request();
			$this->reqid=$data->reqid;
			$this->iduser=$data->iduser;
            $this->reqdate=$data->reqdate;
            $this->idgenre=$data->idgenre;
			$this->reqjudul=$data->reqjudul;
            $this->reqpenulis=$data->reqpenulis;
            $this->reqpenerbit=$data->reqpenerbit;
            $this->reqhalaman=$data->reqhalaman;
            $this->reqtahun=$data->reqtahun;
            $this->reqsummary=$data->reqsummary;

			$arrResult[$cnt] = $objRequest;
			$cnt++;
			}
			}
				return $arrResult;
		}
		
		public function SelectOneRequest(){
            $this->connect();
				$sql = "SELECT * FROM request WHERE reqid='$this->reqid'";
				$result = $this->connection->query($sql);
			
				$arrResult = Array();
				if($result->rowCount() == 1){
				while ($data= $result->fetch(PDO::FETCH_OBJ)) {
                    $objRequest = new Request();
			        $this->reqid=$data->reqid;
			        $this->iduser=$data->iduser;
                    $this->reqdate=$data->reqdate;
                    $this->idgenre=$data->idgenre;
			        $this->reqjudul=$data->reqjudul;
                    $this->reqpenulis=$data->reqpenulis;
                    $this->reqpenerbit=$data->reqpenerbit;
                    $this->reqhalaman=$data->reqhalaman;
                    $this->reqtahun=$data->reqtahun;
                    $this->reqsummary=$data->reqsummary;
                    $this->reqstatus=$data->reqstatus;
				}
				}
			}
	}	 
?>
