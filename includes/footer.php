<div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                               
                                <div class="app-footer-right">
                                    <ul class="nav">
                                        <li class="nav-item">
                                        Copyright &copy; Ingeniva 2021
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>    </div>
        </div>
    </div>
    <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Client Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        	    <div class="form-group">

                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">  

                <label> Company Name </label>
                <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control checking_email" placeholder="Enter Address" required>
                </div>
            <div class="form-group">
                <label>Contact Person</label>
                <input type="text" name="buyer_name" class="form-control" placeholder="Enter Contact Person" >
            </div>
            
            <div class="form-group">
            
                <label>State Code</label>
             <select name="code" class="form-control" required>
             <option value="" hidden>Choose here...</option>
             <?php
             $sql=mysqli_query($con, "SELECT * FROM statecode ORDER BY name ASC");
             while($row=mysqli_fetch_assoc($sql)){
             ?>
             <option value="<?php echo $row['state_id']; ?>"><?php echo ucfirst(strtolower($row['name'])); ?></option>
             <?php
             }
             ?>
             </select>
           </div>

            <div class="form-group">
                <label>GSTN</label>
                <input type="text" name="gst" class="form-control" placeholder="Enter GSTN" >
            </div>

            <div class="form-group">
                <label>PAN</label>
                <input type="text" name="pan" class="form-control" placeholder="Enter PAN" >
            </div>

            <div class="form-group">
                <label>CIN</label>
                <input type="text" name="cin" class="form-control" placeholder="Enter CIN" >
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="clientbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Service Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        	    <div class="form-group">

                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">  

                <label> Product/Service Description </label>
                <input type="text" name="product_description" class="form-control" placeholder="Enter Product/Service Description" required>
            </div>
            <div class="form-group">
                <label>HSN/SAC Code</label>
                <input type="text" name="sac" class="form-control" placeholder="Enter HSN/SAC Code" required>
                </div>
            <div class="form-group">
                <label>Rate per Unit</label>
                <input type="text" name="rate" class="form-control" placeholder="Enter Rate" required>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
        </form>

</div>
</div>
</div>

        <div class="modal fade" id="addbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Bank Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        	    <div class="form-group">

                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">  
 

                <label>Bank Name</label>
                <input type="text" name="bank_name" class="form-control"  placeholder="Enter Bank Name" required>
            </div>
            <div class="form-group">
                <label>Account Number</label>
                <input type="text" name="account_number" class="form-control checking_email" placeholder="Enter Account Number" required>
                </div>
            <div class="form-group">
                <label>Account Type</label>
                <select name="acc_type" class="form-control"  required>
  <option value="" selected hidden>Choose here...</option>
  <option value="savings">Savings</option>
  <option value="current">Current</option>
  
</select>
               
            </div>

            <div class="form-group">
                <label>Account Name</label>
                <input type="text" name="account_name" class="form-control" placeholder="Enter Account Name" required>
            </div>

            <div class="form-group">
                <label>IFSC Code</label>
                <input type="text" name="ifsc_code" class="form-control"  placeholder="Enter IFSC Code" required>
            </div>


            <div class="form-group">
                <label>MICR Code</label>
                <input type="text" name="micr_code" class="form-control"  placeholder="Enter MICR Code" >
            </div>

            <div class="form-group">
                <label>SWIFT Code</label>
                <input type="text" name="swift_code" class="form-control" placeholder="Enter SWIFT Code" >
            </div>

            <div class="form-group">
                <label>Online Payment URL</label>
                <input type="text" name="url" class="form-control" placeholder="Enter Online Payment URL" >
            </div>
            
        

   
            
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="bankregister" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="addcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        	    <div class="form-group">

                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">  

<label>Company Name</label>
                <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
                <label>Representative Name</label>
                <input type="text" name="user_name" class="form-control checking_email" placeholder="Enter Representative Name" >
                </div>
            <div class="form-group">
                <label>Designation</label>
                <input type="text" name="designation" class="form-control" placeholder="Enter Designation" >
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea type="text" name="address" class="form-control" placeholder="Enter Address" required></textarea>
            </div>

            <div class="form-group">
                <label>Pincode</label>
                <input type="text" name="pincode" class="form-control"  placeholder="Enter Pincode" maxlength="6" required>
            </div>

            <div class="form-group">
            
                <label>State Code</label>
             <select name="code" class="form-control" required>
             <option value="" hidden>Choose here...</option>
             <?php
             $sql=mysqli_query($con, "SELECT * FROM statecode ORDER BY name ASC");
             while($row=mysqli_fetch_assoc($sql)){
             ?>
             <option value="<?php echo $row['state_id']; ?>"><?php echo ucfirst(strtolower($row['name'])); ?></option>
             <?php
             }
             ?>
             </select>
           </div>

                     <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"  placeholder="Enter Email"  >
            </div>

                     <div class="form-group">
                <label>Website</label>
                <input type="text" name="website" class="form-control"  placeholder="Enter Website Name"  >
            </div>


                     <div class="form-group">
                <label>Whatsapp</label>
                <input type="text" name="whatsapp" class="form-control"  placeholder="Enter Whatsapp Number"  >
            </div>



            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="ph_number" class="form-control"  placeholder="Enter Phone Number"  required>
            </div>

            <div class="form-group">
                <label>PAN Number</label>
                <input type="text" name="pan_number" class="form-control"  placeholder="Enter PAN Number" required>
            </div>

            <div class="form-group">
                <label>GSTIN</label>
                <input type="text" name="gst" class="form-control"  placeholder="Enter GSTIN" >
            </div>


             <div class="form-group">
                <label>CIN</label>
                <input type="text" name="cin" class="form-control"  placeholder="Enter CIN" >
            </div>
            
                      
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="companyregister" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="addadmingstprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add GST Rates</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
          


        <div class="modal-body">

        	    <div class="form-group" id="input">

                <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">  

            </div>
            
            
            <div class="form-group">
                <label>GST Rate</label>
                <input type="text" name="gst" class="form-control" placeholder="Enter GST rate" >
                </div>
   
                <div class="card" style="width: 29rem;">
  <div class="card-body">
    <h5 class="card-title">Added GST Rates</h5><br>
    <p class="card-text" id="gstdata"></p>
  </div>
</div>

        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
            <button type="submit" name="gstregister" class="btn btn-primary">Save</button>
        </div>
       
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="addcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add State Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

        	    <div class="form-group">

                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">  

                <label> State Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter State Name" required>
            </div>
            <div class="form-group">
                <label>State Code</label>
                <input type="number" maxlength="2" name="code" class="form-control" placeholder="Enter State Code" required>
                </div>
                        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="codebtn" class="btn btn-primary">Save</button>
        </div>
        </form>

</div>
</div>
</div>

<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="./assets/scripts/dataTables.min.js"></script>
<script>
$(document).ready(function() {
	// get current URL path and assign 'active' class
  var pathname = window.location.pathname;
  var name = pathname.replace('/', '');

  $('#nav > li > a[href="'+name+'"]').addClass('mm-active');
 
});
</script>