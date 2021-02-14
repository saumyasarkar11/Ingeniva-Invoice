<?php  
include 'includes/db.php';
 $id=$_POST["id"];
 $sql = mysqli_query($con, "DELETE FROM buyer_details WHERE buyer_id = '$id'"); 
 if($sql)  
 {  
      echo 'Client Deleted Successfully';  
 }  
 ?>