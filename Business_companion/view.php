<?php
require 'connect.inc.php';

$id=addslashes($_REQUEST['id']);

$image1=mysql_query("SELECT * FROM journal WHERE id='$id'");
$image2=mysql_fetch_assoc($image1);
$image=$image2['image'];

header("Content-type: image/jpeg");

echo $image;


?>