<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];

        $query = "SELECT * FROM data WHERE user_id='$user_id' ORDER BY `invoice_number` DESC ";
        $query_run = mysqli_query($con, $query);

        $sql1= mysqli_query($con, "SELECT * FROM permanent_details WHERE user_id = '$user_id'");
        $num1=mysqli_num_rows($sql1);

        $sql2= mysqli_query($con, "SELECT * FROM bank_details WHERE user_id = '$user_id'");
        $num2=mysqli_num_rows($sql2);

        $sql3= mysqli_query($con, "SELECT * FROM buyer_details WHERE user_id = '$user_id'");
        $num3=mysqli_num_rows($sql3);

        $sql4= mysqli_query($con, "SELECT * FROM product WHERE user_id = '$user_id'");
        $num4=mysqli_num_rows($sql4);

        $sql5= mysqli_query($con, "SELECT * FROM logo WHERE user_id = '$user_id'");
        $num5=mysqli_num_rows($sql5);

        $sql6= mysqli_query($con, "SELECT * FROM sign WHERE user_id = '$user_id'");
        $num6=mysqli_num_rows($sql6);
    
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
                <div>Invoices
                    <div class="page-title-subheading">Create, Edit, Delete invoices here
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
            <?php
            if(($num1==0) OR ($num2==0) OR ($num3==0) OR ($num4==0) OR ($num5==0) OR ($num6==0)){
               echo '<p class="text-danger">Enter all details to start creating invoices</p>';
            } else {
            ?>
            <a class="btn mr-3 mb-3 btn-primary" href="form.php" style="font-size:14px;"><i class="fa fa-plus"></i>&nbsp;
                                        Create Invoice
                                    </a>
            <?php } ?>  
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

<table class="table table-striped table-bordered" id="table" >
        <thead align="center">
          <tr>
              
              <th>Invoice Number</th>
              <th>Date</th>
              <th>Type</th>
              <th>To </th>
              <th>Operations</th>
                            
              </tr>
        </thead>
        <tbody align="center">
        <?php
       
            while($row = mysqli_fetch_assoc($query_run))
            {
               ?>
          <tr>
          <td><?php  echo $row['invoice_number']; ?></td>
            <td><?php  echo $row['date']; ?></td>
            <td><?php  echo $row['type']; ?></td>
            <td>
            <?php
            $sqla=mysqli_query($con, "SELECT * FROM buyer_details WHERE buyer_id='".$row['client']."'");
            $rowa=mysqli_fetch_assoc($sqla);
            echo $rowa['company_name']; 
            ?>
            </td>
            <td style="width:30px;"><div class="row"><form action="preview.php" target="_blank" method="post">
                    <input type="hidden" name="invoice_id" value="<?php echo $row['data_id']; ?>">
                    <button style="background-color:transparent; border:0;" type="submit" name="pdf_btn" class="btn btn-link btn-warning"><i class="fa fa-eye"></i></button>
                </form>
                        <form action="invoice_edit.php" method="post">
                    <input type="hidden" name="invoice_edit_id" value="<?php echo $row['data_id']; ?>">
                    <button style="background-color:transparent; border:0;" type="submit" name="invoice_edit_btn" class="btn btn-link btn-success"><i class="fa fa-pen"></i></button>
                </form>

                  <button style="background-color:transparent; border:0;" type="button" data-id1="<?php echo $row['data_id']; ?>" id="deleteinvoice" class="btn btn-link btn-danger"><i class="fa fa-trash"></i></button>
                  </div></td>
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
        
    });
});


$(document).on('click', '#deleteinvoice', function(){  
        var id=$(this).data("id1"); 
        if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"deleteinvoice.php",  
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

