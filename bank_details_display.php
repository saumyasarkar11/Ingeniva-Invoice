<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id']; 

        $query_b = "SELECT * FROM bank_details WHERE user_id='$user_id' ";
        $query_run_b = mysqli_query($con, $query_b);
        $row_b = mysqli_fetch_assoc($query_run_b)
        
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
                <div>Bank Details
                    <div class="page-title-subheading">View and Edit bank account details here
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
            <?php if (empty($row_b['bank_name'])) { ?><button style="font-size:14px;" type="button" class="btn mr-3 mb-3 btn-primary" data-toggle="modal" data-target="#addbank">
                                          <i class="fa fa-plus"></i>&nbsp;&nbsp;  Add Bank Details
                                        </button> <?php } else { ?>
                                          <button style="font-size:14px;" type="button" class="btn mr-3 mb-3 btn-primary" data-toggle="modal" data-target="#addbank" disabled>
                                          <i class="fa fa-plus"></i>&nbsp;&nbsp;  Add Bank Details
                                          </button><?php } ?>                  
              
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
                <div class="card-body" style="font-size:15px;">
                
<?php
            

        $query = "SELECT * FROM bank_details WHERE user_id='$user_id' ";
        $query_run = mysqli_query($con, $query);
        
        
    ?>
      
        <?php
            while($row_a = mysqli_fetch_assoc($query_run))
            {
              echo "Bank Name: " . $row_a["bank_name"]. "<br>A/C Number: " . $row_a["account_number"]. "<br>A/C Type: " . $row_a["acc_type"]. "<br>A/C Name: " . $row_a["account_name"]. "<br>IFSC Code: " . $row_a["ifsc_code"]. "<br>MICR Code: " . $row_a["micr_code"]. "<br>SWIFT Code: " .$row_a["swift_code"]. "<br>Online Payment URL: " .$row_a["url"]. "";
               
         ?>

               <table align="center" style="margin-top:20px;"><td>
                    <form action="bank_details_edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row_a['bank_id']; ?>">
                      <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                    </form></td>
                </table>
            
                
        
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

