<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../config/database.php';
include_once '../model/product.php';

$database = new Database();
$db = $database->connectToDb();

$order = new Product($db);

$tableName = "customer_orders";
$orderCode = $_POST["orderData"]["orderCode"];
$dateTime = $_POST["orderData"]["dateTime"];

$stmt = $order->search($tableName,$orderCode,$dateTime);
$num = $stmt->rowCount();

if($num > 0){

	$orderArray = array();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $customerInfo=array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
        );
        array_push($orderArray, $customerInfo);
    }

    echo json_encode(array('message' => 'Order found!','customerInfo' => $orderArray));
} else {
	echo json_encode(array('message' => 'Order not found! Please recheck your order code'));
}

?>