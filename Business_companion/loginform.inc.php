

<form action="<?php echo $current_file; ?>" method="POST">
PLEASE SIGN IN FIRST.<br><br>
USER NAME:&nbsp&nbsp&nbsp<input type='text' name='username'><br><br>
PASSWORD :&nbsp&nbsp&nbsp<input type='password' name='password'><br><br>
<input type='submit' value='Sign in'>
</form>


<?php
require 'connect.inc.php';

if(isset($_POST['username']) && isset($_POST['password']))
{
$username=$_POST['username'];
$pass=$_POST['password'];
$password=md5($pass);

if(!empty($username) && !empty($password))

{
    $query="SELECT id FROM user WHERE username='$username' AND password='$password'" ;
    if($query_run=mysql_query($query))
     {
       $n=mysql_num_rows($query_run);

     if($n==0)
      echo 'Invalid Username or password.Please try again.';
     else if($n==1)
      {echo 'sign in';
      $user_id=mysql_result($query_run,0,'id');
      $_SESSION['user_id']=$user_id;
      header('Location: page.php');
      }

     }
}
else
echo 'You must supply a username & a password.';

}
?>