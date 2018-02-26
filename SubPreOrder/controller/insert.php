<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../config/database.php';
include_once '../model/product.php';

$database = new Database();
$db = $database->connectToDb();

$orderInfo = new Product($db);

$data = array(
	"name" => $_POST["postData"]["uName"],
	"email" => $_POST["postData"]["eMail"],
	"order_code" => $_POST["postData"]["orderCodeString"],
	"order_time" => date('Y-m-d H:i:s')
);

$dateTime =  str_replace(' ', 'T', $data["order_time"]);
$code = $data["order_code"]."D".$dateTime;

if($orderInfo->insert('customer_orders',$data)){
	echo json_encode(array('message' => 'Order was created. Please check your email. Thank you!','orderCode' => $code));
} else {
    echo json_encode(array('message' => 'Unable to process your order.'));
}

?>