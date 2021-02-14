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
                <div>Edit Bank Details
                    <div class="page-title-subheading">Edit bank account details here
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

    
    
    $sql = "SELECT * FROM bank_details WHERE bank_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

$acc_type=$row['acc_type'];

     
    
        ?>

<form action="code.php" method="POST" style="padding:10px; padding-left: 20px;">    

        

        	    <div class="form-group">

                <input type="hidden" name="edit_id" value="<?php echo $row['bank_id'] ?>">  

                <label>Bank Name</label>
                <input type="text" name="bank_name" class="form-control" value="<?php echo $row['bank_name'] ?>" placeholder="Enter Bank Name" required>
            </div>
            <div class="form-group">
                <label>Account Number</label>
                <input type="text" name="account_number" class="form-control checking_email" value="<?php echo $row['account_number']?>" placeholder="Enter Account Number" required>
                </div>
            <div class="form-group">
                <label>Account Type</label>
                <select name="acc_type" class="form-control"  required>
  <option value="<?php echo$row['acc_type'] ?>" selected hidden><?php echo$row['acc_type'] ?></option>
  <option value="savings">Savings</option>
  <option value="current">Current</option>
  
</select>
               
            </div>

            <div class="form-group">
                <label>Account Name</label>
                <input type="text" name="account_name" class="form-control" placeholder="Enter Address" value="<?php echo $row['account_name']?>" required>
            </div>

            <div class="form-group">
                <label>IFSC Code</label>
                <input type="text" name="ifsc_code" class="form-control" value="<?php echo $row['ifsc_code']?>" placeholder="Enter IFSC Code" required>
            </div>


            <div class="form-group">
                <label>MICR Code</label>
                <input type="text" name="micr_code" class="form-control" value="<?php echo $row['micr_code']?>" placeholder="Enter MICR Code" >
            </div>

            <div class="form-group">
                <label>SWIFT Code</label>
                <input type="text" name="swift_code" class="form-control" value="<?php echo $row['swift_code']?>" placeholder="Enter SWIFT Code" >
            </div>

            <div class="form-group">
                <label>Online Payment URL</label>
                <input type="text" name="url" class="form-control" value="<?php echo $row['url']?>" placeholder="Enter Online Payment URL" >
            </div>
            
        

        <a href="bank_details_display.php" class="btn btn-danger" > Cancel  </a>
              <button type="submit" name="updatebankbtn" class="btn btn-primary"> Update </button>
      
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