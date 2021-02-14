<?php  
include 'includes/db.php';
 $sql = mysqli_query($con, "SELECT * FROM product WHERE product_description = '".$_POST["doc"]."' AND user_id = '".$_POST["id"]."'");  
 $row = mysqli_fetch_assoc($sql);
 echo $row['rate'];  
?>