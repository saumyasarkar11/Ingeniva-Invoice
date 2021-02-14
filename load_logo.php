<?php

$id = $_POST['user_id'];
  $name = $_FILES['logo']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["logo"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
     
     $query_1 = "DELETE FROM logo WHERE user_id='$id'";
   $query_run_1 = mysqli_query($con,$query_1);
  
  
   $query = "INSERT into logo values(NULL, '$id', '".$name."')";
   $query_run = mysqli_query($con,$query);
  
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  }
 
  $sql = "SELECT * from logo where user_id = '$user_id'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
 $number=mysqli_num_rows($result);
 if ($number>0) {
    $image_src2 = $row['image'];
 ?>
 <img src='<?php echo "upload/".$image_src2.""; ?>'>
 <?php
 } else {
 echo "No Record Found";
 }


?>