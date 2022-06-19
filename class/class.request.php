<?php
class Request extends Connection {
	private $reqid ='';
	private $reqdate = '';
	private $iduser = '';
	private $idgenre = '';
	private $reqjudul = '';
	private $reqpenulis = '';
	private $reqpenerbit = '';
	private $reqhalaman = 0;
	private $reqtahun = 0;
	private $reqsummary = '';
	private $status='';

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

	public function AddRequest() {
		$sql = "INSERT INTO request('reqid', 'reqdate', 'reqjudul', 'reqpenulis', 'reqpenerbit', 'reqhalaman', 'reqtahun', 'reqsummary', 'iduser', 'idgenre') 
				VALUES ('$this->reqid', '$this->reqdate', '$this->reqjudul', '$this->reqpenulis', '$this->reqpenerbit', '$this->reqhalaman', '$this->reqtahun', '$this->summary','$this->iduser', ".$this->idgenre."')";
		$this->hasil = $this->connection->exec($sql);
		
		if($this->hasil)
		   $this->message ='Data berhasil ditambahkan!';					
		else
		   $this->message ='Data gagal ditambahkan!';	
	}
		
	public function UpdateSetujuRequest(){
		$this->connect();
		$sql = "UPDATE request
				SET status ='Approved'
				WHERE reqid = '$this->reqid'";
		$this->hasil = $this->connection->exec($sql);
		if($this->hasil)
			$this->message ='Data berhasil diubah!';
		else
			$this->message ='Data gagal diubah!';
	}

	public function DeleteRequest(){
		$sql = "DELETE FROM request WHERE reqid=$this->reqid";
		$this->hasil = $this->connection->exec($sql);
	
		if($this->hasil)
			$this->message ='Data berhasil dihapus!';								
		else
			$this->message ='Data gagal dihapus!';
	}
		
	public function SelectAllRequest(){
        $this->connect();
		$sql = "SELECT r.*, g.namagenre FROM request r, genre g WHERE r.idgenre=g.idgenre ORDER BY reqid";
		$result = $this->connection->query($sql);

		$arrResult = Array();
		$i=0;
		if($result->rowCount() > 0 ){
			while ($data= $result->fetch(PDO::FETCH_OBJ)) {
				$objRequest = new Request();
				$objRequest->reqid=$data->reqid;
				$objRequest->iduser=$data->iduser;
            	$objRequest->reqdate=$data->reqdate;
            	$objRequest->idgenre=$data->namagenre;
				$objRequest->reqjudul=$data->reqjudul;
            	$objRequest->reqpenulis=$data->reqpenulis;
            	$objRequest->reqpenerbit=$data->reqpenerbit;
	            $objRequest->reqhalaman=$data->reqhalaman;
            	$objRequest->reqtahun=$data->reqtahun;
            	$objRequest->reqsummary=$data->reqsummary;
				$arrResult[$i] = $objRequest;
				$i++;
			}
		}
		return $arrResult;
	}
		
	public function SelectOneRequest(){
        $this->connect();
		$sql = "SELECT * FROM request WHERE reqid='$this->reqid'";
		$result = $this->connection->query($sql);
			
		if($result->rowCount() == 1){
			while ($data= $result->fetch(PDO::FETCH_OBJ)) {
                $objRequest = new Request();
			    $objRequest->reqid=$data->reqid;
			    $objRequest->userid=$data->userid;
                $objRequest->reqdate=$data->reqdate;
                $objRequest->idgenre=$data->idgenre;
		        $objRequest->reqjudul=$data->reqjudul;
                $objRequest->reqpenulis=$data->reqpenulis;
                $objRequest->reqpenerbit=$data->reqpenerbit;
                $objRequest->reqhalaman=$data->reqhalaman;
                $objRequest->reqtahun=$data->reqtahun;
                $objRequest->reqsummary=$data->reqsummary;
                $objRequest->reqstatus=$data->reqstatus;
			}
		}
	}
}
?>