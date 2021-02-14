<?php  
include 'includes/db.php';
 $sql = mysqli_query($con, "SELECT * FROM data WHERE invoice_number = '".$_POST["number"]."' AND user_id = '".$_POST["id"]."'");  
 $num = mysqli_num_rows($sql);
 if($num!=0)  
 {  
      echo 'Invoice number already exists';  
 } else {
    echo 'Invoice number available for use';  
 }
 ?>