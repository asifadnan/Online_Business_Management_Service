<form action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
Reference ID:<br><input type='text' name='ref'><br><br>
Customer Reference ID:<br><input type='text' name='cref'><br><br>
Description:<br><textarea name='des' rows='5' cols='40'></textarea><br><br><br>
Actual Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Qouted Price:<br><input type='text' name='price'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='text' name='qprice'><br><br>
Invoice number/Payment:<br><input type='text' name='pay'><br><br>
Upload Image:<input type="file" name="image"><br><br>
<br><input type='submit' value='Register'>
</form>

<?php
require 'connect.inc.php';

$file=$_FILES['image']['tmp_name'];


if(isset($_POST['ref'])&&isset($_POST['cref'])&&isset($_POST['des'])&&isset($_POST['price'])&&isset($_POST['qprice'])&&isset($_POST['pay'])&&isset($file))
{
$ref=$_POST['ref'];
$cref=$_POST['cref'];
$des=$_POST['des'];
$price=$_POST['price'];
$qprice=$_POST['qprice'];
$pay=$_POST['pay'];
$image=addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name=addslashes($_FILES['image']['name']);

if(!empty($ref)&&!empty($cref)&&!empty($des)&&!empty($price)&&!empty($pay)&&!empty($qprice))
  {
   $query="INSERT INTO journal VALUES('','".$ref."','".$cref."','".$des."','".$price."','".$qprice."','".$pay."','$image_name','$image')";
     if($query_run=mysql_query($query))
       {echo 'Entry is registered Succesfully.';
        echo '<br><br>Your entry serial id :'.$last_id=mysql_insert_id();

        $query="SELECT * FROM journal WHERE id=$last_id";
      if($query_run=mysql_query($query))
        {$row=mysql_fetch_assoc($query_run);
         $ref=$row['ref_id'];
         $des=$row['description'];
         $price=$row['price'];
         $qprice=$row['q_price'];
         $cref=$row['cus_ref_id'];
         $pay=$row['payment'];
         $name=$row['name'];
        echo '
        <table border="1">
        <tr>
        <th>ID</th>
        <th>Reference ID</th>
        <th>Customer Reference ID</th>
        <th>Description</th>
        <th>Actual Price</th>
        <th>Quoted Price</th>
        <th>Invoice No./Payment</th>
        <th>Image_name</th>
        </tr>';
        echo '<tr>
        <td>'.$last_id.'</td>
        <td>'.$ref.'</td>
        <td>'.$cref.'</td>
        <td>'.$des.'</td>
        <td>'.$price.'</td>
        <td>'.$qprice.'</td>
        <td>'.$pay.'</td>
        <td>'.$name.'</td>
        </tr><br>';

        echo "<br><br>Image uploaded.<p />Image stored:<p /><img src=view.php?id=$last_id>";
        echo '<br><br><a href="register_entry.php">New Entry</a>';
        }
        else
        echo 'SORRY.TRY AGAIN.';
   }

 }
 }
else
echo 'Please fill up all the requirements.';

echo '<br><br><a href="welcome.inc.php">HOME</a>';

?>