<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

include_once '../config/database.php';
include_once '../model/product.php';

$database = new Database();
$db = $database->connectToDb();

$product = new Product($db);

$breadQuery = $product->read('bread_tbl');
$breadRowNum = $breadQuery->rowCount();

$sauceQuery = $product->read('sauce_tbl');
$sauceRowNum = $sauceQuery->rowCount();

$sandwichQuery = $product->read('sandwich_tbl');
$sandwichRowNum = $sandwichQuery->rowCount();

$cheeseQuery = $product->read('cheese_tbl');
$cheeseRowNum = $cheeseQuery->rowCount();

$veggyQuery = $product->read('veggies_tbl');
$veggyRowNum = $veggyQuery->rowCount();

$products_arr = array();

/*** BREADS ***/
if($breadRowNum > 0){
	
	$products_arr['bread_types'] = array();
	
	while($row = $breadQuery->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$product_item = array(
			'id' => $id,
			'bread_type' => $bread_type
		);

		array_push($products_arr['bread_types'],$product_item);
	}
} else {
	echo json_encode(array('message' => 'No bread found'));
}

/*** SAUCES ***/
if($sauceRowNum > 0){
	
	$products_arr['sauce_names'] = array();
	
	while($row = $sauceQuery->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$product_item = array(
			'id' => $id,
			'sauce_name' => $sauce_name
		);

		array_push($products_arr['sauce_names'],$product_item);
	}
} else {
	echo json_encode(array('message' => 'No sauce found'));
}

/*** SANDWICHES ***/
if($sandwichRowNum > 0){
	
	$products_arr['sandwich_types'] = array();
	
	while($row = $sandwichQuery->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$product_item = array(
			'id' => $id,
			'sandwich_type' => $sandwich_type
		);

		array_push($products_arr['sandwich_types'],$product_item);
	}
} else {
	echo json_encode(array('message' => 'No sandwich found'));
}

/*** CHEESES ***/
if($cheeseRowNum > 0){
	
	$products_arr['cheese_types'] = array();
	
	while($row = $cheeseQuery->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$product_item = array(
			'id' => $id,
			'cheese_type' => $cheese_type
		);

		array_push($products_arr['cheese_types'],$product_item);
	}
} else {
	echo json_encode(array('message' => 'No cheese found'));
}

/*** VEGGIES ***/
if($veggyRowNum > 0){
	
	$products_arr['veggies'] = array();
	
	while($row = $veggyQuery->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$product_item = array(
			'id' => $id,
			'veggy' => $veggy
		);

		array_push($products_arr['veggies'],$product_item);
	}
} else {
	echo json_encode(array('message' => 'No veggy found'));
}

print_r(json_encode($products_arr));
?>