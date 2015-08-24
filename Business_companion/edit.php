<form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
Input Serial ID you want to edit:<input type='text' name='id'><br><br>
<input type='submit' value='Enter'>
</form>
 <br><br><a href="welcome.inc.php">HOME</a><br>
<?php
require 'connect.inc.php';

if(isset($_POST['id']))
{echo 'ID to be edited given:'.$id=$_POST['id'];
 echo '<br><br><a href=edit2.php?id='.$id.'>EDIT</a>';}

?>


