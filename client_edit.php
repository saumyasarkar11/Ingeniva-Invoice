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
                <div>Edit Client
                    <div class="page-title-subheading">Edit client data here
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
    
    $sql = "SELECT * FROM buyer_details WHERE buyer_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

     
    
        ?>

          <form action="code.php" method="POST" style="padding:10px; padding-left: 20px;">

          
                
              <input type="hidden" name="edit_id" value="<?php echo $row['buyer_id'] ?>" >
              
              <div class="form-group">
                  <label> Company Name </label>
                  <input type="text" name="company_name" value="<?php echo $row['company_name'];?>" class="form-control" placeholder="Enter Company Name">
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Enter Address">
              </div>
                            
              <div class="form-group">
                <?php
                $x=$row['code'];
                $sql2=mysqli_query($con, "SELECT * FROM statecode WHERE state_id='$x'");
                $row2=mysqli_fetch_assoc($sql2);
                ?>
                <label>State Code</label>
             <select name="code" class="form-control" required>
            <option value="<?php echo $row['code']; ?>" selected hidden><?php echo ucfirst(strtolower($row2['name'])); ?></option>
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
                  <label>Contact Person</label>
                  <input type="text" name="buyer_name" value="<?php echo $row['buyer_name'] ?>" class="form-control" placeholder="Enter Contact Person">
              </div>

                <div class="form-group">
                  <label>GSTN</label>
                  <input type="text" name="gst" value="<?php echo $row['gst'] ?>" class="form-control" placeholder="Enter GSTN">
              </div>

               <div class="form-group">
                  <label>PAN</label>
                  <input type="text" name="pan" value="<?php echo $row['pan'] ?>" class="form-control" placeholder="Enter PAN">
              </div>

               <div class="form-group">
                  <label>CIN</label>
                  <input type="text" name="cin" value="<?php echo $row['cin'] ?>" class="form-control" placeholder="Enter CIN">
              </div>

              <a href="client_display.php" class="btn btn-danger" > Cancel  </a>
              <button type="submit" name="clientupdatebtn" class="btn btn-primary"> Update </button>

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