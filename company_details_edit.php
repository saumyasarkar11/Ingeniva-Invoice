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
                <div>Edit Company Details
                    <div class="page-title-subheading">Edit company details here
                    </div>
                </div>
            </div>
            
         </div>
    </div>        
                            
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">

<?php

if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $sql = "SELECT * FROM permanent_details WHERE company_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

     
    
        ?>

         <form action="code.php" method="POST" style="padding:10px; padding-left: 20px;">    
      

<div class="form-group">

<input type="hidden" name="edit_id" value="<?php echo $row['company_id'] ?>">  

<label>Company Name</label>
<input type="text" name="company_name" class="form-control" value="<?php echo $row['company_name'] ?>" placeholder="Enter Company Name" required>
</div>
<div class="form-group">
<label>Representative Name</label>
<input type="text" name="user_name" class="form-control checking_email" value="<?php echo $row['user_name']?>" placeholder="Enter Representative Name" >
</div>
<div class="form-group">
<label>Designation</label>
<input type="text" name="designation" class="form-control" value="<?php echo $row['designation']?>" placeholder="Enter Designation" >
</div>

<div class="form-group">
<label>Address</label>
<textarea type="text" name="address" class="form-control" placeholder="Enter Address" required><?php echo $row['address']?></textarea>
</div>

<div class="form-group">
<label>Pincode</label>
<input type="text" name="pincode" class="form-control" value="<?php echo $row['pincode']?>" placeholder="Enter Pincode" maxlength="6" required>
</div>

<div class="form-group">
<?php
$x=$row['statecode'];
$sql2=mysqli_query($con, "SELECT * FROM statecode WHERE state_id='$x'");
$row2=mysqli_fetch_assoc($sql2);
?>
                <label>State Code</label>
             <select name="code" class="form-control" required>
            <option value="<?php echo $row['statecode']; ?>" selected hidden><?php echo ucfirst(strtolower($row2['name'])); ?></option>
             <?php
             $sql1=mysqli_query($con, "SELECT * FROM statecode ORDER BY name ASC");            
             while( $row1=mysqli_fetch_assoc($sql1)){
             ?>
             <option value="<?php echo $row1['state_id']; ?>"><?php echo ucfirst(strtolower($row1['name'])); ?></option>
             <?php
             }
             ?>
             </select>
           </div>

     <div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" value="<?php echo $row['email']?>" placeholder="Enter Email"  >
</div>

     <div class="form-group">
<label>Website</label>
<input type="text" name="website" class="form-control" value="<?php echo $row['website']?>" placeholder="Enter Website Name"  >
</div>


     <div class="form-group">
<label>Whatsapp</label>
<input type="text" name="whatsapp" class="form-control" value="<?php echo $row['whatsapp']?>" placeholder="Enter Whatsapp Number"  >
</div>



<div class="form-group">
<label>Phone Number</label>
<input type="text" name="ph_number" class="form-control" value="<?php echo $row['ph_number']?>" placeholder="Enter Phone Number"  required>
</div>

<div class="form-group">
<label>PAN Number</label>
<input type="text" name="pan_number" class="form-control" value="<?php echo $row['pan_number']?>" placeholder="Enter PAN Number" required>
</div>

<div class="form-group">
<label>GSTIN</label>
<input type="text" name="gst" class="form-control" value="<?php echo $row['gst']?>" placeholder="Enter GSTIN" >
</div>


<div class="form-group">
<label>CIN</label>
<input type="text" name="cin" class="form-control" value="<?php echo $row['cin']?>" placeholder="Enter CIN" >
</div>



<a href="company_details_display.php" class="btn btn-danger" > Cancel  </a>
<button type="submit" name="updatecompanybtn" class="btn btn-primary"> Update </button>

</form>

<?php

}
?>
</div>
             </div>
         </div>
     </div>   
</div>  



<?php
include 'includes/footer.php';
?>