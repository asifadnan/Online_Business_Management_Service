<?php
require 'connect.inc.php';
require 'core.inc.php';

if(loggedin()){
$firstname=strtoupper(getuserfield('first_name'));
$lastname=strtoupper(getuserfield('last_name'));
echo "<strong>You are Signed in $firstname $lastname </strong>";

echo '<br><a href="welcome.inc.php">HOME</a>';
}

else
include 'loginform.inc.php';
?>