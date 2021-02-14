<?php  
include 'includes/db.php';
 $id=$_POST["id"];
 $sql = mysqli_query($con, "DELETE FROM statecode WHERE state_id = '$id'"); 
 if($sql)  
 {  
      echo 'State Deleted Successfully';  
 }  
 ?>