<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 30.07.15
 * Time: 16:53
 */

require_once '../db_connect.php';

$id = $_POST['id'];

$query = "DELETE FROM  `domovik`.`category` WHERE  `category`.`id` ='$id' LIMIT 1 ;";
mysql_query($query) or die(mysql_error());