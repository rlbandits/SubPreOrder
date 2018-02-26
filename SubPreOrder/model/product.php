<?php
class Product{
	private $conn;

	public $id;
	public $tableName;
	public $orderCode;
	public $dateTime;

	public function __construct($db){
		$this->conn = $db;
	}

	function read($tableName){
		$query = "SELECT * FROM ".$tableName;

		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}

	function insert($tableName,$data){
		$query = "INSERT INTO ".$tableName." VALUES ('','".$data['name']."','".$data['email']."','".$data['order_code']."','".$data['order_time']."')";

		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}

	function search($tableName,$orderCode,$dateTime){
		$query = "SELECT * FROM ".$tableName." WHERE order_code = '".$orderCode."' AND order_time = '".$dateTime."'";

		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}

	function delete(){
		$query = "DELETE FROM ".$this->tableName." WHERE order_code = '".$this->orderCode."' AND order_time = '".$this->dateTime."'";

		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt;
	}
}
?>