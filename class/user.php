<?php
	require_once('../inc.koneksi.php');
	class user extends Connection{
		private $idUser		=0;
		private $email		='';
		private $password	='';	
		private $idRole		='';
		private $idBuku		='';
		private $username	='';	
		private $hasil		= false;
		private $message 	='';

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
	

		public function AddUser(){
		
		
		$sql = "INSERT INTO userr(email, password, idRole, idBuku, username)
				values ('$this->email', '$this->password', '$this->idRole', '$this->idBuku', '$this->username')";				
		$this->hasil = mysqli_query($this->connection, $sql);
		$this->idUser = $this->connection->insert_id;
				
		if($this->hasil)
			   $this->message ='Data berhasil ditambahkan!';					
		    else
			   $this->message ='Data gagal ditambahkan!';	
		}



		public function UpdateUser(){
			$this->connect();
			$sql = "UPDATE userr 
			        SET idUser='$this->idUser',
			        email='$this->email',
			        password='$this->password',
					idRole='$this->role',
					idBuku='$this->idBuku'
					WHERE userid = $this->idUser";					
			
			$this->hasil = mysqli_query($this->connection, $sql);			
			
			if($this->hasil)
				$this->message ='Data berhasil diubah!';								
			else
				$this->message ='Data gagal diubah!';								
		}



		public function DeleteUser(){
			$this->connect();
			$sql = "DELETE FROM userr WHERE idUser=$this->idUser";
			$this->hasil = mysqli_query($this->connection, $sql);
			if($this->hasil)
				$this->message ='Data berhasil dihapus!';								
			else
				$this->message ='Data gagal dihapus!';
		}


		public function SelectAllUser(){
		$this->connect();
		$sql = "SELECT u.*, r.role FROM userr u inner join role r on u.idRole = r.idRole ORDER BY idUser ASC";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		$arrResult = Array();
		$cnt=0;
		if(mysqli_num_rows($result)>0){
			while($data = mysqli_fetch_array($result))
			{
				$objUser = new User();
				$objUser->idUser=$data['idUser'];
				$objUser->emp->fname=$data['fname'];
				$objUser->emp->lname=$data['lname'];
				$objUser->email=$data['email'];
				$objUser->password=$data['password'];
				$objUser->role=$data['role'];
				$arrResult[$cnt] = $objUser;
				$cnt++;
				}
			}
			return $arrResult;
		}


		public function SelectOneUser(){
		$sql = "SELECT * FROM userr WHERE idUser = '$this->idUser'";
				
		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		if(mysqli_num_rows($resultOne) == 1){
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->idUser = $data['idUser'];				
			$this->emp->fname = $data['fname'];								
			$this->emp->lname = $data['lname'];
			$this->password = $data['password'];				
			$this->email=$data['email'];
			$this->role=$data['role'];
			}		
		}



		public function ValidateEmail($email){
		$this->connect();
		$sql = "SELECT u.*, r.role FROM userr u LEFT JOIN role r on u.idRole = c.idRole WHERE email ='$email'";
		$result = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		if (mysqli_num_rows($result) == 1){
			$this->hasil = true;			
			$data = mysqli_fetch_assoc($result);
			$this->idUser = $data['idUser'];				
			$this->password = $data['password'];								
			$this->email=$data['email'];
			$this->role=$data['role'];
			}
		}
	}
?>