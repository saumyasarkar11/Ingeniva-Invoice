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
                <div>Invoices
                    <div class="page-title-subheading">Create, Edit, Delete invoices here
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
                            <form action="save.php" method="POST">
<input type="hidden" name="user_id" id="imp" value="<?php echo $user_id; ?>">  

<div class="form-group">
                <label>Invoice Type</label>
                <select name="type" id="type" class="form-control"  required>
  <option value="" hidden>Choose here</option>
  <option value="Proforma Invoice">Proforma Invoice</option>
  <option value="Tax Invoice">Tax Invoice</option>
  </select>
 </div>
 <p class="text-danger" id="danger1" style="display:none;margin-top:-10px;"></p>
 <p class="text-success" id="success1" style="display:none; margin-top:-10px;"></p>

              <div class="form-group">
              <label>Invoice Number</label><br>
  <input type="text" id="invoice_number" name="invoice_number" class="form-control" placeholder="Invoice number" required>

</div>
<p class="text-danger" id="danger" style="display:none;margin-top:-10px;"></p>
<p class="text-success" id="success" style="display:none; margin-top:-10px;"></p>

                       
            <div class="form-group">
                <label>Client</label>
                <select name="client" class="form-control" required>
<?php

$list = mysqli_query($con,"SELECT * FROM `buyer_details` WHERE user_id='$user_id' ORDER BY `buyer_details`.`company_name` ASC");
while ($row_ah = mysqli_fetch_assoc($list)) {
?>
<option value="" hidden>Choose here</option>
<option value="<?php echo $row_ah['buyer_id']; ?>"><?php echo $row_ah['company_name']; ?></option>
<?php } ?>
</select>
                </div>
                
                
                <div class="form-group">
                <label> Date </label>
                <input type="date" name="date" id="datepicker" class="form-control" placeholder="Enter Date"></div>
           

<div class="form-group">
                <label> Subject </label>
                <input type="text" name="project" class="form-control" placeholder="Enter Subject Description"></div>
                
                <div class="form-group">
                <label> Work Order No. </label>
                <input type="text" name="workorder" class="form-control" placeholder="Enter Work Order No."></div>
                
                            <div class="form-group">
                <label>GST Rate</label><br>
                <select name="gstrate" required>
                <option value="" hidden>Choose here</option>
                <option value="0" >None</option>
<?php

$list = mysqli_query($con,"SELECT * FROM `gst` WHERE user_id='$user_id'");
while ($row_ah = mysqli_fetch_assoc($list)) {
?>

<option value="<?php echo $row_ah['gst']; ?>"><?php echo $row_ah['gst']; ?></option>
<?php } ?>
</select>
                </div>
                

                <div class="form-group">
                <label> Discount Rate </label>
                <input type="text" name="discount" class="form-control" placeholder="Enter Discount Rate"></div><hr>
     
<div class="form-group input-form">
<input id="input_1" hidden>
<label id=label style="font-weight:bolder;">Product 1:</label><br>

<select name="product[1]" id="product_1" onchange="fetch(1)">
    <option value=""  hidden>Choose here</option>
    <option value=""  >None</option>
<?php


$list = mysqli_query($con,"SELECT * FROM `product` WHERE user_id='$user_id'");
while ($row_ah = mysqli_fetch_assoc($list)) {
?>

<option value="<?php echo $row_ah['product_description']; ?>"><?php echo $row_ah['product_description']; ?></option>
<?php } ?>
</select><br><br>

<label>Quantity:</label><br>
<input type="text" class="form-control" name="qty[1]" id="qty_1" required><br>

<label>Additional Product Description:</label><br>
<textarea class="form-control" name="desc[1]" id="desc_1" ></textarea><br>

<label>Rate:</label><br>
<input type="text" name="rate[1]" id="rate_1" class="form-control">

<hr>
</div>


<div id="clicks" hidden>0</div>

<button type="button" class="btn btn-danger" id="remove">Remove</button>
<button type="button" class="btn btn-primary" onclick="clickFunc()" id="clone"> Add Product 2</button>
<input type="submit" class="btn btn-success" id="save" name="submit" value="Save">

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

  $(document).ready(function(){
 
 $('#clone').click(function(){

  // Selecting last id 
  var lastname_id = $( ".input-form:last" ).find( ":nth-child(1)" ).attr( "id" );

  var split_id = lastname_id.split('_');

  // New index
  var index = Number(split_id[1]) + 1;
  var index_1 = Number(split_id[1]) + 2;

   // Create clone
  var newel = $('.input-form:last').clone(true);
  
  // Set id of new element
  $(newel).find('input:nth-of-type(1)').attr("id","input_"+index).val("");
  $(newel).find('select:nth-child(4)').attr("id","product_"+index).val("");
  $(newel).find('input:nth-child(9)').attr("id","qty_"+index).val("");
  $(newel).find('input:nth-child(13)').attr("id","desc_"+index).val("");
  $(newel).find('input:nth-child(17)').attr("id","rate_"+index).val("");
  // Set name
  $(newel).find('input:nth-of-type(1)').attr("name","input["+index+"]");
  $(newel).find('select:nth-child(4)').attr("name","product["+index+"]");
  $(newel).find('input:nth-child(9)').attr("name","qty["+index+"]");
  $(newel).find('input:nth-child(13)').attr("name","desc["+index+"]");
  $(newel).find('input:nth-child(17)').attr("name","rate["+index+"]");
  // Set onchange
  $(newel).find('select:nth-child(4)').attr("onchange","fetch("+index+")");
  // Set text
  $(newel).find('label:nth-child(2)').text("Product "+index+":");

  var $this = $(this);
  $this.text('Add Product '+index_1);	
	
  
  // Insert element
  $(newel).insertAfter(".input-form:last");



 });

});


$(document).ready(function(){
  $('#remove').click(function(){
  $(".input-form:last").remove();

});
});


var count = 0;
function clickFunc() {
  count += 1;
  var click = document.getElementById('clicks').innerHTML = count;
  var btn = document.querySelector('#clone');
  if(count >= 9) { // placed inside the click function
    btn.disabled = true;
  }
}

$(document).on('change', '#invoice_number', function(){  
        var number= document.getElementById('invoice_number').value;
        var id= document.getElementById('imp').value;
       
            $.ajax({  
                     url:"check.php",  
                     method:"POST",  
                     data:{number:number, id:id},  
                     dataType:"text",  
                     success:function(data){  
                       if (data=="Invoice number already exists") {
                      document.getElementById("danger").style.display='block';
          document.getElementById("danger").innerHTML=data;
          $(function() {
setTimeout(function() { $("#danger").fadeOut(1000); }, 1500)
})
document.getElementById("save").disabled=true;          
                       } else {
                        document.getElementById("success").style.display='block';
          document.getElementById("success").innerHTML=data;
          $(function() {
setTimeout(function() { $("#success").fadeOut(1000); }, 1500)
})
document.getElementById("save").disabled=false;       
                       }            
                     }  
                });  
       
      });  
      
      
      $(document).on('change', '#type', function(){  
        var type= document.getElementById('type').value;
        var id= document.getElementById('imp').value;
       
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
                       }            
                     }  
                });    
      });  

    function fetch(x){
        var doc= document.getElementById('product_'+x).value;  
        var id= document.getElementById('imp').value;
        if (doc==""){
          document.getElementById('rate_'+x).value="";
        } else {        
            $.ajax({  
                     url:"check2.php",  
                     method:"POST",  
                     data:{doc:doc, id:id},  
                     dataType:"text",  
                     success:function(data){  
                      document.getElementById("rate_"+x).value=data;            
                     }  
                });
        }    
      }

  </script>


  
