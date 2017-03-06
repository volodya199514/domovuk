<?php

require_once 'db_connect.php';

$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);


$date = date("d.m.Y");
$query = "INSERT INTO `domovik`.`question` (`name`, `number`, `email`, `question`, `date`) VALUES ('$name' , '$phone', '$email', '$message', '$date');";
mysql_query($query) or die(mysql_error());

$subject = 'Зворотній звязок';


mail('domovuk5@gmail.com',$subject,
'Ім\'я: '.$name.
    '
Email:'.$email.
    '
Питання:'.$message.'');




?>
