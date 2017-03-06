<?php

mysql_connect("127.0.0.1","root","") or die("No connect to server");
mysql_select_db("domovik") or die ("No connect to DB");
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');

