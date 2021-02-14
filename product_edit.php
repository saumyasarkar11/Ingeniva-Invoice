<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];
        $type = $row_a['type'];
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
                <div>Products/Services
                    <div class="page-title-subheading">Add, Edit, Delete products/services here
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
    
    $sql = "SELECT * FROM product WHERE product_id = '$id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

     
    
        ?>

          <form action="code.php" method="POST" style="padding:10px; padding-left: 20px;">

          
                
          <form action="code.php" method="POST">
                
                <input type="hidden" name="edit_id" value="<?php echo $row['product_id'] ?>" >
                
                <div class="form-group">
                    <label> Product/Service Description </label>
                    <input type="text" name="edit_product_description" value="<?php echo $row['product_description'];?>" class="form-control" placeholder="Enter Service Description">
                </div>
                <div class="form-group">
                    <label> HSN/SAC Code</label>
                    <input type="text" name="edit_sac" value="<?php echo $row['sac'] ?>" class="form-control" placeholder="Enter SAC Code">
                </div>
                <div class="form-group">
                    <label>Rate per unit</label>
                    <input type="text" name="edit_rate" value="<?php echo $row['rate'] ?>" class="form-control" placeholder="Enter Rate">
                </div>
  
                <a href="product_display.php" class="btn btn-danger" > Cancel  </a>
                <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
  
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