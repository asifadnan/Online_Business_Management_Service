<form action="<?php echo $current_file; ?>" method="GET">
Search entry by:<br><br>
<input type="radio" name="type" value="1">Refference ID<br>
<input type="radio" name="type" value="3">Customer Refference ID<br>
<input type="radio" name="type" value="2">Entry ID<br>
Reference ID/Customer Reference ID/Entry ID:<br><input type='text' name='ref'><br><br>
<input type ="submit" value="View">
</form>
<?php
require 'connect.inc.php';

if(isset($_GET['type'])&&!empty($_GET['type'])&&isset($_GET['ref']))
{
$a=$_GET['type'];
$b=$_GET['ref'];
  switch($a)
  {
  case '1':

  {
      $query="SELECT * FROM journal WHERE ref_id='$b'";
      if($query_run=mysql_query($query))
       {$n=mysql_num_rows($query_run);
        if($n==0)
        echo 'Invalid ID.Please make sure you are entering a valid ID';
        else
        {echo '
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
         while($row=mysql_fetch_assoc($query_run))
          {
         $id=$row['id'];
         $des=$row['description'];
         $price=$row['price'];
         $qprice=$row['q_price'];
         $cref=$row['cus_ref_id'];
         $pay=$row['payment'];
         $name=$row['name'];
            echo'<tr>
        <td>'.$id.'</td>
        <td>'.$b.'</td>
        <td>'.$cref.'</td>
        <td>'.$des.'</td>
        <td>'.$price.'</td>
        <td>'.$qprice.'</td>
        <td>'.$pay.'</td>
        <td>'.$name.'</td>
            </tr><br>';

         } ?>
 <form action="<?php echo $current_file; ?>" method="POST">
 To view image enter ID:<br><input type='text' name='id'><br>
<input type ="submit" value="View"><br><br>
</form>
         <?php
           if(isset($_POST['id'])&&!empty($_POST['id']))
           {$c=$_POST[id];
            echo "<br><br><p />Image stored in ID: $c<p /><img src=view.php?id=$c>";

           }

         }

       }

  }
  break;
  case '2':
     {$query="SELECT * FROM journal WHERE id=$b";
      if($query_run=mysql_query($query))
      {$n=mysql_num_rows($query_run);
       if($n==0)
        echo 'Invalid ID.Please make sure you are entering a valid ID';
       else{
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
  break;

  case '3':

  {
      $query="SELECT * FROM journal WHERE cus_ref_id='$b'";
      if($query_run=mysql_query($query))
       {$n=mysql_num_rows($query_run);
        if($n==0)
        echo 'Invalid ID.Please make sure you are entering a valid ID';
        else
        {echo '
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
         while($row=mysql_fetch_assoc($query_run))
          {
         $id=$row['id'];
         $des=$row['description'];
         $price=$row['price'];
         $qprice=$row['q_price'];
         $ref=$row['ref_id'];
         $pay=$row['payment'];
         $name=$row['name'];
            echo'<tr>
        <td>'.$id.'</td>
        <td>'.$ref.'</td>
        <td>'.$b.'</td>
        <td>'.$des.'</td>
        <td>'.$price.'</td>
        <td>'.$qprice.'</td>
        <td>'.$pay.'</td>
        <td>'.$name.'</td>
            </tr><br>';

         } ?>
 <form action="<?php echo $current_file; ?>" method="POST">
 To view image enter ID:<br><input type='text' name='id'><br>
<input type ="submit" value="View"><br><br>
</form>
         <?php
           if(isset($_POST['id'])&&!empty($_POST['id']))
           {$c=$_POST[id];
            echo "<br><br><p />Image stored in ID: $c<p /><img src=view.php?id=$c>";

           }

         }

       }

  }
  break;




  }
}
else
echo 'Please make sure you have selected Entry ID/Reference ID first,then enter an id.';
echo '<br><br><a href="welcome.inc.php">HOME</a>';
?>