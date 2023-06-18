<?php
require_once('function2.php');

 ?>

<?php session_start(); ?>
<?php
if (isset($_POST['submit'])){
  
 $username = $_POST['username'];
 $password = $_POST['password'];

 mysqli_real_escape_string($connection , $username);
 mysqli_real_escape_string($connection , $password);

 $query = "SELECT * FROM user WHERE username = '{$username}' ";
 $logquery = mysqli_query($connection , $query);
 while ($row = mysqli_fetch_array($logquery)){
     $lo_id = $row['id'];
     $lo_username = $row['username'];
     $lo_password = $row['password'];
     $lo_phone = $row['phone'];
     $lo_email = $row['email'];
 }
 if(password_verify( $password  , $lo_password) ){

   $_SESSION['username'] = $lo_username ;
   $_SESSION['lastname'] = $lo_lastname ;
   $_SESSION['phone'] = $lo_phone ;
   $_SESSION['email'] = $lo_email ;
    header("Location:index.php");    
 } 
  else{
    header("Location:register.php");
 }
}

?>