<?php
class Database{
	private $host = 'localhost';
	private $db = 'spo_db';
	private $username = 'root';
	private $pass = '';
	public $conn;

	public function connectToDb(){
		$this->conn = null;
		try{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->username,$this->pass);
			$this->conn->exec(' set names utf8');
		} catch(PDOException $error) {
			echo 'Connection error: '.$error->getMessage();
		}
		return $this->conn;
	}
}
?>