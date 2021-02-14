<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];
?>


<div class="app-main__outer">
 <div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
           <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-global text-success">
                    </i>
                </div>
                <div>Signature
                    <div class="page-title-subheading">Upload your signature here
                    </div>
                </div>
            </div>
            
         </div>
    </div>        
                            
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <?php            
        if(isset($_SESSION['SUCCESS']) && $_SESSION['SUCCESS'] !=''){
            echo '<div class="alert alert-success" role="alert"> '.$_SESSION['SUCCESS']. '</div>';
            unset($_SESSION['SUCCESS']);
        }
        if(isset($_SESSION['Failure']) && $_SESSION['Failure'] !=''){
            echo '<div class="alert alert-danger" role="alert"> '.$_SESSION['Failure']. '</div>';
            unset($_SESSION['Failure']);
        }
        ?>
            <div class="main-card mb-3 card">
  
<div class="card-header">
<h5>File Upload</h5>
</div>
<div class="card-body">
<form action="code.php" method="POST" enctype="multipart/form-data" >
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

<div class="dropzone">
<input name="file" type="file" required>
</div>

</div>
<div class="text-center m-t-20">
<button type="submit" name="signupload" class="btn btn-primary">Upload Now</button>
</div><br>
</form>

</div>
</div>


<div class="card">
<div class="card-header">
<h5>Signature</h5>
</div>
<div class="card-body" id="signdiv">
    <?php
$sql = "SELECT * from sign where user_id = '$user_id'";
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



</div>
         </div>
     </div>   
</div>  



<?php
include 'includes/footer.php';
?>


