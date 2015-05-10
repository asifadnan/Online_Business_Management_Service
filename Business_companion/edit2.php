<?php
require 'connect.inc.php';
require 'edit.php';

$id=addslashes($_REQUEST['id']);

$query="SELECT * FROM journal WHERE id=$id";
 if($query_run=mysql_query($query))
 {$row=mysql_fetch_assoc($query_run);
 $ref=$row['ref_id'];
 $cref=$row['cus_ref_id'];
 $des=$row['description'];
 $price=$row['price'];
 $qprice=$row['q_price'];
 $pay=$row['payment'];
  }
?>
<form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
Reference ID:<br><input type='text' name='ref' value="<?php echo $ref; ?>"><br><br>
Customer Reference ID:<br><input type='text' name='cref' value="<?php echo $cref; ?>"><br><br>
Description:<br><textarea name='des' rows='5' cols='40'><?php echo $des; ?></textarea><br><br><br>
Actual Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Qouted Price:<br><input type='text' name='price' value="<?php echo $price; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name='qprice' value="<?php echo $qprice; ?>"><br><br>
Invoice number/Payment:<br><input type='text' name='pay' value="<?php echo $pay; ?>"><br><br>
Upload Image:<input type="file" name="image"><br><br>
<br><input type='submit' value='Edit'>
</form>


<?php
echo "<br><br>Image stored:<p /><img src=view.php?id=$id>";

$file=$_FILES['image']['tmp_name'];


if(isset($_POST['ref'])&&isset($_POST['des'])&&isset($_POST['cref'])&&isset($_POST['qprice'])&&isset($_POST['price'])&&isset($_POST['pay'])&&isset($file))
{
$ref=$_POST['ref'];
$cref=$_POST['cref'];
$des=$_POST['des'];
$price=$_POST['price'];
$qprice=$_POST['qprice'];
$pay=$_POST['pay'];
$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name=addslashes($_FILES['image']['name']);

if(!empty($ref)&&!empty($des)&&!empty($price)&&!empty($qprice)&&!empty($cref)&&!empty($pay))
  {
   $query="UPDATE buisness_companion.journal SET ref_id = '$ref',description = '$des',price = '$price',q_price = '$qprice',payment= '$pay',cus_ref_id = '$cref',name = '$image_name',image = '$image' WHERE journal.id =$id";
     if($query_run=mysql_query($query))
       echo '<br><br>Entry is edited Succesfully.';
        else
        echo 'SORRY.TRY AGAIN.';
   }

 }
else
echo '<br>Please fill up all the requirements.';
echo '<br><br><a href="welcome.inc.php">HOME</a>';


?>
