<?php  
include 'db.php';
 $sql = "DELETE FROM other_data WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Data Deleted'; 
     
 }  
 ?>