<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 30.07.15
 * Time: 0:53
 */

require_once '../db_connect.php';

$id = $_POST['img'];
$name = htmlspecialchars($_POST['name']);
$new_name = htmlspecialchars($_POST['new_name']);
$img = htmlspecialchars($_POST['img']);
$new_img=htmlspecialchars($_POST['new_img']);



$query = "UPDATE  `domovik`.`category` SET  `name` =  '$new_name',`img` =  '$new_img' WHERE  `category`.`name` ='$id';";
mysql_query($query) or die(mysql_error());

