<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../config/database.php';
include_once '../model/product.php';

$database = new Database();
$db = $database->connectToDb();

$orderInfo = new Product($db);

$orderInfo->tableName = "customer_orders";
$orderInfo->orderCode = $_POST["orderData"]["orderCode"];
$orderInfo->dateTime = $_POST["orderData"]["dateTime"];

if($orderInfo->delete()){
    echo json_encode(array('message' => 'Order cancelled'));
} else {
    echo json_encode(array('message' => 'Cannot cancel your order. Please try again in a few minute.'));
}

?>