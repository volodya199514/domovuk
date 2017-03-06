<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 29.07.15
 * Time: 18:49
 */
require_once '../db_connect.php';


$name = htmlspecialchars($_POST['name']);
$img = htmlspecialchars($_POST['img']);

    $query = "INSERT INTO `domovik`.`category` (`name`, `img`) VALUES ('$name', '$img');";
    mysql_query($query) or die(mysql_error());
