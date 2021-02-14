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
                <div>Edit State Code
                    <div class="page-title-subheading">Edit state codes here
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
    
    $sql = "SELECT * FROM statecode WHERE state_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

     
    
        ?>

          <form action="code.php" method="POST" style="padding:10px; padding-left: 20px;">

          
                
              <input type="hidden" name="edit_id" value="<?php echo $row['state_id'] ?>" >
              
              <div class="form-group">
                  <label> State Name </label>
                  <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" placeholder="Enter Company Name">
              </div>
              <div class="form-group">
                  <label>State Code</label>
                  <input type="number" name="code" value="<?php echo $row['code'] ?>" class="form-control" placeholder="Enter Address">
              </div>
              
              <a href="statecode.php" class="btn btn-danger" > Cancel  </a>
              <button type="submit" name="codeupdatebtn" class="btn btn-primary"> Update </button>

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