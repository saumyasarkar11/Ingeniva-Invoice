<?php
include 'includes/db.php';
$user_id=$_POST['user_id'];
$query = "SELECT * FROM gst WHERE user_id='$user_id' ";
$query_run = mysqli_query($con, $query);
$i = 0;

while ($row = mysqli_fetch_assoc($query_run)){
    echo "<h6>".++$i.". ".$row['gst']."</h6>";
}

?>