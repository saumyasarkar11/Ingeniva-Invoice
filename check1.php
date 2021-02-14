<?php
include 'includes/db.php';
$type=$_POST['type'];
$user_id=$_POST['id'];
$sql_1= "SELECT * FROM data WHERE user_id = '$user_id' AND type='$type' ORDER BY `data_id` DESC LIMIT 1";
$sql_run_1 = mysqli_query($con, $sql_1);
$n1=mysqli_num_rows($sql_run_1);
$row_b = mysqli_fetch_assoc($sql_run_1);     
if ($n1!=0){
    echo json_encode(array("message1" => $type, 
      "message2" => "Last ".$type." : ".$row_b['invoice_number']."",
      "message3" => $row_b['invoice_number']));
      
} else {
    echo json_encode(array("message1" => "No previous data"));
}
?>