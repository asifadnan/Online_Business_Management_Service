<form action="<?php echo $current_file; ?>" method="POST">
Delete an entry:<br><br>
Entry ID:<br><input type='text' name='ref'><br><br>
<input type ="submit" value="View">
</form>
<?php
require 'connect.inc.php';
if(isset($_POST['ref']))
{
      $b=$_POST['ref'];
     $query="SELECT * FROM journal WHERE id='$b'";
      if($query_run=mysql_query($query))
       {$n=mysql_num_rows($query_run);
        if($n==0)
        echo 'Invalid ID.Please make sure you are entering a valid ID';
        else
        {
         $row=mysql_fetch_assoc($query_run);
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
        <td>'.$b.'</td>
        <td>'.$ref.'</td>
        <td>'.$cref.'</td>
        <td>'.$des.'</td>
        <td>'.$price.'</td>
        <td>'.$qprice.'</td>
        <td>'.$pay.'</td>
        <td>'.$name.'</td>
        </tr><br>';

        echo "<br><p />Image attached:<p /><img src=view.php?id=$b>";
       }
}
}
?>

<form action="<?php echo $current_file; ?>" method="POST">
Confirm Entry ID:<br><input type='text' name='ref2'><br><br>
<input type ="submit" value="DELETE">
</form>
<?php
require 'connect.inc.php';
if(isset($_POST['ref2']))
{
      $c=$_POST['ref2'];
      $query="DELETE FROM buisness_companion.journal WHERE journal.id ='$c'";
      if($query_run=mysql_query($query))
       echo '<br><br>Entry is Deleted Succesfully.';
        else
        echo 'SORRY.TRY AGAIN.';
}
echo '<br><br><a href="welcome.inc.php">HOME</a>';
?>