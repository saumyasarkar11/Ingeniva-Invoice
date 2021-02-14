<?php  
include 'includes/db.php';
 $id=$_POST["id"];
 $sql1 = mysqli_query($con, "DELETE FROM other_data WHERE data_id = '$id'"); 
 $sql = mysqli_query($con, "DELETE FROM data WHERE data_id = '$id'"); 
 if($sql)  
 {  
      echo 'Invoice Deleted Successfully';  
 }  
 ?>