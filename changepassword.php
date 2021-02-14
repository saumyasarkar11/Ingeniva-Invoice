<?php
include('includes/db.php');
include('includes/header.php');
include('includes/navbar.php');
$sql=mysqli_query($con, "SELECT * FROM users WHERE email='$username'");
$row=mysqli_fetch_assoc($sql);
$user_id=$row['id'];
?>     

<div class="app-main__outer">
  <div class="app-main__inner">
     <div class="tab-content">
         <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
             <div class="main-card mb-3 card col-6">
                 <div class="card-body"><h4>Change Password</h4><hr>
                     <form action="#">
                     <input type="text" id="user_id" value="<?php echo $user_id; ?>" hidden>
                        <div class="form-group">
                            <label>Enter Password here</label>
                            <input type="text" class="form-control" name="password1" id="password1">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password2" id="password2" onpaste="return false;">
                        </div>
                        <button type="button" id="change" class="btn btn-primary">Update</button>
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
    $(document).on('click', '#change', function(){  
        var password1=document.getElementById('password1').value;
        var password2=document.getElementById('password2').value;
        var user_id=document.getElementById('user_id').value;
        if (password1==password2){
            if(confirm("Are you sure you want to change your password?"))  
            {   
                $.ajax({  
                    url:"change.php",  
                    method:"POST",  
                    data:{password1:password1, user_id:user_id},  
                    dataType:"text",  
                    success:function(data){  
                      alert(data);
                      location.reload();  
                    }  
                });  
           } 
        } else {
            alert("Passwords donot match!");
        } 
      }); 
</script>