<?php  
    include 'includes/db.php';
    $mail_id=$_POST['mail_id'];
    $smtp=$_POST['smtp'];
    $hostname=$_POST['hostname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $message_from=$_POST['message_from'];
    $subject=$_POST['subject'];
    $sql = mysqli_query($con, "UPDATE mail SET smtp='$smtp', hostname='$hostname', username='$username', password='$password', message_from='$message_from', subject='$subject' WHERE mail_id='$mail_id'");
    echo "Data Updated Successfully";
?>