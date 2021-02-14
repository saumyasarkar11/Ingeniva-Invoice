<?php  
include 'includes/db.php';
$password=md5($_POST['password1']);
$pass=$_POST['password1'];
$user_id=$_POST['user_id'];
 $sql = "UPDATE users SET password='$password', pass='$pass' WHERE id='$user_id'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Password Updated!';  
 }  
 ?>