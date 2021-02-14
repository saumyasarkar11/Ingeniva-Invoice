<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];

        if(isset($_POST['invoice_edit_btn'])){


            $data_id=$_POST['invoice_edit_id'];
    
    }
    
    
    $sql_1="SELECT * FROM data WHERE data_id = '$data_id'";
     $sql_run_1 = mysqli_query($con, $sql_1);
            $row_1 = mysqli_fetch_assoc($sql_run_1);
        
?>
<input type="hidden" id="dummy" value="<?php echo $row_1['invoice_number']?>">
<div class="app-main__outer">
 <div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
           <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-global text-success">
                    </i>
                </div>
                <div>Edit Invoices
                    <div class="page-title-subheading">Edit invoices here
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                         
              
            </div>
         </div>
    </div>        
                            
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">

<form action="code.php" method="POST">
<input id="imp1" name="user_id" value="<?php echo $user_id; ?>" hidden>
<input id="imp" value="<?php echo $data_id; ?>" hidden>
<input id="imp2" value="<?php echo $row_1['type']; ?>" hidden>
 
<div class="form-group">
                <label>Invoice Type</label>
                <select name="type" id="type" class="form-control"  required>
  <option value="<?php echo $row_1['type'] ?>" hidden><?php echo $row_1['type'] ?></option>
  <option value="Proforma Invoice">Proforma Invoice</option>
  <option value="Tax Invoice">Tax Invoice</option>
  
</select>
               
            </div>
<p class="text-danger" id="danger1" style="display:none;margin-top:-10px;"></p>
<p class="text-success" id="success1" style="display:none; margin-top:-10px;"></p>
 
            	<div class="form-group">

                <input type="hidden" name="data_id" value="<?php echo $data_id; ?>">  

                <label> Invoice Number <span class="text-danger" id="lal" style="display:none;">(Modify Invoice Number)</span></label>
                <input type="text" id="invoice_number" name="invoice_number" class="form-control" placeholder="Enter Invoice Number" value="<?php echo $row_1['invoice_number']?>" required>
            </div>
            <p class="text-danger" id="danger" style="display:none;margin-top:-10px;"></p>
<p class="text-success" id="success" style="display:none; margin-top:-10px;"></p>
            
             
            <div class="form-group">
                <label>Client</label>
                <select name="client" class="form-control" required>
                    <?php
                    $list3 = mysqli_query($con,"SELECT * FROM `buyer_details` WHERE buyer_id = '".$row_1['client']."'");
                    $row_d = mysqli_fetch_assoc($list3)
                    ?>
                
                <option value="<?php echo $row_1['client']; ?>" selected hidden><?php echo $row_d['company_name'] ?></option>
<?php
$list = mysqli_query($con,"SELECT * FROM buyer_details");
while ($row_ah = mysqli_fetch_assoc($list)) {
?>
<option value="<?php echo $row_ah['buyer_id']; ?>"><?php echo $row_ah['company_name']; ?></option>
<?php } ?>
</select>
                </div>
                
                <div class="form-group">
                <label> Date </label>
                <input type="date" name="date" class="form-control" value="<?php echo $row_1['date']; ?>" placeholder="Enter Date"></div>
           

<div class="form-group">
                <label> Subject </label>
                <input type="text" name="project" class="form-control" value="<?php echo$row_1['project'] ?>" placeholder="Enter Subject Description"></div>

<div class="form-group">
                <label> Work Order </label>
                <input type="text" name="workorder" class="form-control" value="<?php echo$row_1['workorder'] ?>" placeholder="Enter Work Order No."></div>
                
            <div class="form-group">
                <label>GST Rate</label><br>
                <select name="gstrate" >
<?php
$list = mysqli_query($con,"SELECT * FROM `gst` WHERE user_id='$user_id'");
?>
                <option value="<?php echo $row_1['gst'] ?>" selected ><?php if($row_1['gst']==0){echo "None";} else {echo $row_1['gst'];} ?></option>
<?php
while ($row_ah = mysqli_fetch_assoc($list)) {
?>
<option value="<?php echo $row_ah['gst']; ?>"><?php echo $row_ah['gst']; ?></option>
<?php } ?>
</select>
                </div>


                <div class="form-group">
                <label> Discount Rate </label>
                <input type="text" name="discount" class="form-control" value="<?php echo$row_1['discount'] ?>" placeholder="Enter Discount Rate"></div>
     
                <div class="alert alert-success" id="success2" role="alert" style="display:none;"></div>
                <div class="alert alert-danger" id="danger2" role="alert" style="display:none;"></div>
<table id="example" class="table table-bordered table-striped">
  <thead>
    <tr>
      
      <th>Product</th>
      <th>Quantity</th>
      <th>Description</th>
      <th>Rate</th>
      <th>Function</th>
    </tr>
  </thead>
  <tbody id="product_data"></tbody>
</table>

<div id="data"></div>

<button type="button" onclick="reload()" class="btn btn-warning">Reload&nbsp;<i class="feather icon-refresh-cw"></i></button>

<input type="submit" formaction="save.php" id="newrec" class="btn btn-info" name="submit1" value="Create New Record" disabled>

<input type="submit" formaction="code.php" id="updrec" class="btn btn-primary" name="submit" value="Update Existing Record" >
</form>

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

    function fetch_data(){
      var data_id = document.getElementById('imp').value;
      var user_id = document.getElementById('imp1').value;
     
      $.ajax({
        url: 'process.php',
        method: 'POST',
        data:{data_id:data_id, user_id:user_id},
       
        success:function(data){
          $('#product_data').html(data);
        }
      });
    }
fetch_data();
  });

  function edit_data(id, text, columnname){
    var data_id = document.getElementById('imp').value;
    $.ajax({
        url: 'edit.php',
        method: 'POST',
        data:{id:id, text:text, columnname:columnname, data_id:data_id},
        dataType:"text",

        success:function(data){
          document.getElementById("success2").style.display='block';
          document.getElementById("success2").innerHTML=data;
          $(function() {
setTimeout(function() { $("#success2").fadeOut(1500); }, 5000)

})
          
          
        }
    });
   
  }

  $(document).on('change', '.product', function(){
    var id = $(this).data("id1");
    var product = $(this).text();
    edit_data(id, product, "product");
  });

  $(document).on('blur', '.qty', function(){
    var id = $(this).data("id2");
    var qty = $(this).text();
    edit_data(id, qty, "qty");
  });

  $(document).on('blur', '.desc', function(){
    var id = $(this).data("id3");
    var desc = $(this).text();
    edit_data(id, desc, "desc");
  });

  $(document).on('blur', '.rate', function(){
    var id = $(this).data("id4");
    var rate = $(this).text();
    edit_data(id, rate, "rate");
  });

  $(document).on('click', '#btn_delete', function(){  
           var id=$(this).data("id5");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();
                     }  
                });  
           }  
      }); 

      $(document).on('keyup', '#invoice_number', function(){  
        var number= document.getElementById('invoice_number').value;
        var id= document.getElementById('imp1').value;
        var type= document.getElementById('type').value;
        var type1= document.getElementById('imp2').value;
        var number1= document.getElementById('dummy').value;
            $.ajax({  
                     url:"check.php",  
                     method:"POST",  
                     data:{number:number, id:id},  
                     dataType:"text",  
                     success:function(data){  
                       if (data=="Invoice number already exists") {
                      document.getElementById("danger").style.display='block';
                      document.getElementById("success").style.display='none';
          document.getElementById("danger").innerHTML=data;
          $(function() {
setTimeout(function() { $("#danger").fadeOut(1000); }, 1500)

})          
                       } else {
                        document.getElementById("success").style.display='block';
                        document.getElementById("danger").style.display='none';
          document.getElementById("success").innerHTML=data;
          $(function() {
setTimeout(function() { $("#success").fadeOut(1000); }, 1500)

})  
                       }
                       if((data=="Invoice number already exists" && type!=type1) ){
                           document.getElementById('newrec').disabled=true;
                           document.getElementById('updrec').disabled=true;
                       } else {
                           document.getElementById('newrec').disabled=false;
                           document.getElementById('updrec').disabled=false;
                       }
                     }  
                });  
       
      });  
      
      function reload(){
          location.reload();
      }

      $(document).on('change', '#type', function(){  
        var type= document.getElementById('type').value;
        var id= document.getElementById('imp1').value;
        var type1= document.getElementById('imp2').value;
        var number= document.getElementById('invoice_number').value;
        var dummy= document.getElementById('dummy').value;
     
        if ((type!=type1 && number!=dummy)){
            document.getElementById('newrec').disabled=false;document.getElementById('updrec').disabled=false;
        }

            $.ajax({  
                     url:"check1.php",  
                     method:"POST",  
                     data:{type:type, id:id},  
                     dataType:"json",  
                     success:function(data){  
                       if (data.message1=="No previous data") {
                          document.getElementById("danger1").style.display='block';
                          document.getElementById("success1").style.display='none';
                          document.getElementById("danger1").innerHTML=data.message1;            
                       } else {
                          document.getElementById("success1").style.display='block';
                          document.getElementById("danger1").style.display='none';
                          document.getElementById("success1").innerHTML=data.message2;
                          document.getElementById("invoice_number").value=data.message3;
                          document.getElementById("lal").style.display='block';
                          document.getElementById("dummy").value=data.message3;
                       }            
                     }  
                });    
      }); 

 </script>

 