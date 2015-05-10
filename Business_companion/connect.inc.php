<?php
$host='localhost';
$user='root';
$p='';
$mysql_db='buisness_companion';
if(mysql_connect($host,$user,$p) && mysql_select_db($mysql_db))
 {}
else
 die('database connection error');
?>