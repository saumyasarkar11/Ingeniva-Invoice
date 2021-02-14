<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];

        $query_b = "SELECT * FROM permanent_details WHERE user_id='$user_id' ";
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
                <div>Company Details
                    <div class="page-title-subheading">View and Edit company details here
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
            <table><tr><td>
            <?php if (empty($row_b['company_name'])) { ?><button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcompany">
                                          <i class="fa fa-plus"></i>&nbsp;&nbsp;  Add Company Details
                                        </button> <?php } else { ?>
                                          <button style="font-size:14px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcompany" disabled>
                                          <i class="fa fa-plus"></i>&nbsp;&nbsp;  Add Company Details
                                          </button><?php } ?>    </td>
            <td><button id="gstbtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadmingstprofile">
            <i class="fa fa-plus"></i>&nbsp;&nbsp;  Add GST Rates
            </button></td></tr></table>                                            
              
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

        $query = "SELECT * FROM permanent_details WHERE user_id='$user_id' ";
        $query_run = mysqli_query($con, $query);

       
    
        if(mysqli_num_rows($query_run) > 0)        
        {
            while($row = mysqli_fetch_assoc($query_run))
            {
              $x=$row['statecode'];
              $query1 = mysqli_query($con, "SELECT * FROM statecode WHERE state_id='$x'"); 
              $row1 = mysqli_fetch_assoc($query1); 
              echo "<h3>" . $row["company_name"]. "</h3><br>Address: " . $row["address"]. "<br>Pincode: " . $row["pincode"]."<br>State Code: ".$row1['code']."<br>Email: " . $row["email"]. "<br>Website: " . $row["website"]. "<br>Phone: " . $row["ph_number"]. "<br>Whatsapp: " . $row["whatsapp"]. "<br>PAN Number: " .$row["pan_number"]. "<br>";

                if (empty($row["gst"])){
                  }else{
                    echo "GSTIN: ".$row['gst']."<br>";
                  }          

                if (empty($row["cin"])){
                  }else{
                    echo "CIN: ".$row['cin']."<br>";
                  }

                if (empty($row['user_name']  and $row['designation'])) {
                
                } else {
                  echo "Contact Person: ". $row["user_name"]. ", " . $row["designation"]."<br>";
                }           
              

        $query_1 = "SELECT * FROM gst WHERE user_id='$user_id' ";
        $query_run_1 = mysqli_query($con, $query_1);
        $row_1 = mysqli_fetch_assoc($query_run_1);

               
               ?>

               <table align="center" style="margin-top:20px;"><td><form action="company_details_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['company_id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form></td></table>
            
                
        
          <?php
      
            } 
        }
        else {
            echo "No Record Found";
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

<script>
$(document).ready(function() {
  $('#gstbtn').click(function(){
var user_id = document.getElementById('user_id').value;
$.ajax({
    url: "load_gst.php",
    method: "POST",
    data: {user_id:user_id},
    success:function(values){
      document.getElementById('gstdata').innerHTML=values;
    }
   
    });
  });
});
</script>

