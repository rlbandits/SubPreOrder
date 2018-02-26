<?php
/*** FOR MAILER ***/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once '../phpmailer/src/PHPMailer.php';
include_once '../phpmailer/src/SMTP.php';
include_once '../phpmailer/src/Exception.php';

$data = array(
	"name" => $_POST["postData"]["uName"],
	"email" => $_POST["postData"]["eMail"],
	"order_code" => $_POST["postData"]["orderCodeString"],
	"order_time" => date('Y-m-d H:i:s')
);

$dateTime =  str_replace(' ', 'T', $data["order_time"]);
$code = $data["order_code"]."D".$dateTime;

$sauces = explode(",", $_POST["postData"]["sauceNames"]);
$veggies = explode(",", $_POST["postData"]["veggies"]);

$body = "<b>Hi ".$_POST["postData"]["uName"]."! "; 
$body .= "<b>Here is your order summary: </b><br><br>";
$body .= "<b>Bread: </b>".$_POST["postData"]["breadType"]."<br><br>";

if(sizeof($sauces) == 1){
	$body .= "<b>Sauce: </b>".$_POST["postData"]["sauceNames"]."<br>";
} else {
	$body .= "<b>Sauces: </b>
					<ul>";
	for($i=0;$i<sizeof($sauces);$i++){
		$body .= "<li>".$sauces[$i]."</li>";
	}
	$body .= "</ul>";
}
$body .= "<br>";

$body .= "<b>Sandwich: </b>".$_POST["postData"]["sandwichType"]."<br><br>";
$body .= "<b>Cheese: </b>".$_POST["postData"]["cheeseType"]."<br><br>";

if(sizeof($veggies) == 1){
	$body .= "<b>Veggie: </b>".$_POST["postData"]["veggies"]."<br>";
} else {
	$body .= "<b>Veggies: </b>
					<ul>";
	for($i=0;$i<sizeof($veggies);$i++){
		$body .= "<li>".$veggies[$i]."</li>";
	}
	$body .= "</ul>";
}
$body .= "Your confirmation code is: ".$code;


$mail = new PHPMailer(true);

$mail->SMTPDebug = 2;                                 
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;                               
$mail->Username = "subpreorder@gmail.com";
$mail->Password = "subpreorder123";                           
$mail->SMTPSecure = 'tls';                            
$mail->Port = 587;                                    

$mail->setFrom("subpreorder@gmail.com", "SubPreOrder");
$mail->addAddress($data["email"], $data["name"]);

$mail->isHTML(true);                                  
$mail->Subject = 'Order Summary';
$mail->Body    = $body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
?>