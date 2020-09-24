<?php

$recived_mail = "andres@100m3.com";
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$manssage = $_POST["message"];

$content = "First Name: " . $first_name . "\nLast Name: " . $last_name . "\nEmail: " . $email . "\nPhone: " . $phone . "\nMessage: " . $message;
mail($recived_mail, "Contact", $content);


 
 
?>
