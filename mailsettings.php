<?php
include('includes/db.php');
include('includes/header.php');
include('includes/navbar.php');
$sql=mysqli_query($con, "SELECT * FROM mail");
$row=mysqli_fetch_assoc($sql);
$mail_id=$row['mail_id'];
?>     

<div class="app-main__outer">
  <div class="app-main__inner">
     <div class="tab-content">
         <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
             <div class="main-card mb-3 card col-6">
                 <div class="card-body"><h4>Mail Settings</h4><hr>
                     <form action="#">
                     <input type="text" id="mail_id" value="<?php echo $mail_id; ?>" hidden>
                        <div class="form-group">
                            <label>SMTP Port</label>
                            <input type="number" class="form-control" name="smtp" id="smtp" value="<?php echo $row['smtp']; ?>">
                        </div>
                        <div class="form-group">
                            <label>SMTP Hostname</label>
                            <input type="text" class="form-control" name="hostname" id="hostname" value="<?php echo $row['hostname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label>SMTP Password</label>
                            <input type="text" class="form-control" name="password" id="password" value="<?php echo $row['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Message From</label>
                            <input type="text" class="form-control" name="message_from" id="message_from" value="<?php echo $row['message_from']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $row['subject']; ?>">
                        </div>
                        <button type="button" id="mail" class="btn btn-primary">Update</button>
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
    $(document).on('click', '#mail', function(){  
        var smtp=document.getElementById('smtp').value;
        var hostname=document.getElementById('hostname').value;
        var username=document.getElementById('username').value;
        var password=document.getElementById('password').value;
        var message_from=document.getElementById('message_from').value;
        var subject=document.getElementById('subject').value;
        var mail_id=document.getElementById('mail_id').value;
            if(confirm("Are you sure you want to change your mail settings?"))  
            {   
                $.ajax({  
                    url:"mail.php",  
                    method:"POST",  
                    data:{smtp:smtp, mail_id:mail_id, hostname:hostname, username:username, password:password, message_from:message_from, subject:subject},  
                    dataType:"text",  
                    success:function(data){  
                      alert(data);
                      location.reload();  
                    }  
                });  
           } 
         
      }); 
</script>