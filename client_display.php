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
                <div>Clients
                    <div class="page-title-subheading">Add, Edit, Delete client data here
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
             <button style="font-size:14px;" type="button" class="btn mr-3 mb-3 btn-primary" data-toggle="modal" data-target="#addclient">
                                          <i class="fa fa-plus"></i>&nbsp;&nbsp;  Add Client
                                        </button> 
              
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
                <div class="card-body">


<?php
        
              

        $query = "SELECT * FROM buyer_details  WHERE user_id='$user_id' ORDER BY `buyer_details`.`buyer_id` DESC ";
        $query_run = mysqli_query($con, $query);
   
    ?>
      <table class="table table-striped table-bordered" id="table" >
        <thead align="center">
          <tr>
              <th> ID </th>
              <th>Company Name</th>
              
              <th>Contact</th>
              <th>State Code</th>
              <th>Edit</th>
              <th>Delete</th>
              <th>GSTIN</th>
              <th>PAN</th>
              <th>CIN</th>
          </tr>
        </thead>
        <tbody align="center">
        <?php
        
            while($row = mysqli_fetch_assoc($query_run))
            {
                     
        $x=$row['code'];
        $query1 = mysqli_query($con, "SELECT * FROM statecode WHERE state_id='$x'"); 
        $row1 = mysqli_fetch_assoc($query1); 
               ?>
          <tr>
            <td><?php  echo $row['buyer_id'] ?></td>
            <td data-toggle="tooltip" title="Address: <?php  echo $row['address']; ?>"><?php  echo $row['company_name']; ?></td>
            
            <td><?php  echo $row['buyer_name']; ?></td>
            <td><?php  echo $row1['code']; ?></td>
            <td>
                <form action="client_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['buyer_id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"><i class="fa fa-pen"></i></button>
                </form>
            </td>
            <td>
            <button type="button" data-id1="<?php echo $row['buyer_id']; ?>" id="deleteclient" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </td>
            <td><?php if (empty($row['gst'])){ echo"-"; } else { echo $row['gst']; } ?></td>
            <td><?php if (empty($row['pan'])){ echo"-"; } else { echo $row['pan']; } ?></td>
            <td><?php if (empty($row['cin'])){ echo"-"; } else { echo $row['cin']; } ?></td>
          </tr>
          <?php
      
            } 
        
        ?>
        </tbody>
      </table>



      </div>
             </div>
         </div>
     </div>   
</div>  


<?php
include('includes/footer.php');
?> 

<script>
     $(document).ready(function() {
    $('#table').DataTable({
        "lengthMenu": [[25, 200, 300, -1], [25, 200, 300, "All"]],
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
        ]
    });
});

$(document).on('click', '#deleteclient', function(){  
        var id=$(this).data("id1"); 
        if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"deleteclient.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          location.reload();  
                     }  
                });  
           }  
      });
</script>
