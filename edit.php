<?php
include 'includes/db.php';
$id = $_POST['id'];
$text = $_POST['text'];
$columnname = $_POST['columnname'];
$data_id = $_POST['data_id'];
$sql = "UPDATE `other_data` SET `".$columnname."`='".$text."' WHERE `other_data`.id=".$id."";  
$result = mysqli_query($con, $sql);
$error = mysqli_error($con);
if($result)  
{  
     echo 'Data Updated';  
}  else  {
     echo 'Something Went Wrong';  
     echo $error;
}
?>