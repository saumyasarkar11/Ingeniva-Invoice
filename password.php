<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include 'includes/db.php'; 


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = $_POST['email'];

	
		$query= "SELECT * FROM users";
		$query_run= mysqli_query($con, $query);
	$row= mysqli_fetch_assoc($query_run);
	$num=mysqli_num_rows($query_run);

if ($row['email']!=$email){
    $b="Email id is'nt registered";
    echo $b;
} else {
    $query1= "SELECT * FROM mail";
		$query_run1= mysqli_query($con, $query1);
	$row1= mysqli_fetch_assoc($query_run1);

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = $row1['hostname'];                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $row1['username'];                     // SMTP username
    $mail->Password   = $row1['password'];                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $row1['smtp'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($row1['username'], $row1['message_from']);
    $mail->addAddress($email, 'Administrator');     // Add a recipient
   

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $row1['subject'];
    $main="The password for your account is ".$row['pass']."";
    
    $mail->Body    = '<pre style="font-size:12px; display: inline-block; word-wrap: break-word;">'.wordwrap($main, 175, "<br>").'</pre>';
   
    $result=$mail->send();
    
    if ($result['code']=="400"){
        $output .= html_entity_decode($result['full_error']);
    }

     $_SESSION['status']="Check your inbox for the password";
    echo $_SESSION['status'];

	}
	
	
	

?>


