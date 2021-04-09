<?php

session_start();
include 'includes/db.php'; 

if(isset($_POST['loginbtn'])) {
	$email=$_POST['email'];
	$password=md5($_POST['password']);

	$query= "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$query_run= mysqli_query($con, $query);

	if (mysqli_fetch_array($query_run)) {
		$_SESSION['username'] = $email;
		header('location: index.php');
	} else {

        $_SESSION['status'] = 'Invalid Email or Password';
		header('location: login.php');      

	}
}

if(isset($_POST['logout_btn'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

if(isset($_POST['clientbtn'])){
	$user_id = $_POST['user_id'];
	$company_name = $_POST['company_name'];
	$address = $_POST['address'];
	$buyer_name = $_POST['buyer_name'];
	$code = $_POST['code'];
	$gst = $_POST['gst'];
	$pan = $_POST['pan'];
	$cin = $_POST['cin'];


	$query = "INSERT INTO buyer_details VALUES (NULL, '$user_id', '$company_name', '$address', '$gst', '$code', '$buyer_name', '$pan', '$cin')";
	$query_run = mysqli_query($con, $query);


	if ($query_run){

		$_SESSION['SUCCESS'] = "Client Added";
		header('location: client_display.php');

	} else {

		$_SESSION['Failure'] = "Client Not Added";
		header('location: client_display.php');
	
	}
}



if(isset($_POST['clientupdatebtn'])){
	$id = $_POST['edit_id'];
	$company_name = $_POST['company_name'];
	$address = $_POST['address'];
	$buyer_name = $_POST['buyer_name'];
	$code = $_POST['code'];
	$gst = $_POST['gst'];
	$pan = $_POST['pan'];
	$cin = $_POST['cin'];

	$query = "UPDATE buyer_details SET company_name = '$company_name', address = '$address', gst = '$gst', code = '$code', buyer_name = '$buyer_name', pan = '$pan', cin = '$cin' WHERE buyer_id ='$id'";
	$query_run = mysqli_query($con, $query);

		if ($query_run){

		$_SESSION['SUCCESS'] = "Client Details Updated";
		header('location: client_display.php');

	} else {

		$_SESSION['Failure'] = "Client Details Not Updated";
		header('location: client_display.php');
	
	}

}


if(isset($_POST['client_delete_btn'])){

	$id = $_POST['delete_id'];

	$query = "DELETE FROM buyer_details WHERE buyer_id ='$id'";
	$query_run = mysqli_query($con, $query);


	if ($query_run){

		$_SESSION['SUCCESS'] = "Client Deleted";
		header('location: client_display.php');

	} else {

		$_SESSION['Failure'] = "Client Not Deleted";
		header('location: client_display.php');
	
	}
}

if(isset($_POST['registerbtn'])){
	$user_id = $_POST['user_id'];
	$product_description = $_POST['product_description'];
	$sac = $_POST['sac'];
	$rate = $_POST['rate'];

	$query = "INSERT INTO product VALUES (NULL, '$user_id', '$product_description', '$sac', '$rate')";
	$query_run = mysqli_query($con, $query);


	if ($query_run){

		$_SESSION['SUCCESS'] = "Product/Service Added";
		header('location: product_display.php');

	} else {

		$_SESSION['Failure'] = "Product/Service Not Added";
		header('location: product_display.php');
	
	}
}


if(isset($_POST['updatebtn'])){
	$id = $_POST['edit_id'];
	$edit_product_description = $_POST['edit_product_description'];
	$edit_sac = $_POST['edit_sac'];
	$edit_rate = $_POST['edit_rate'];

	$query = "UPDATE product SET product_description = '$edit_product_description', sac = '$edit_sac', rate = '$edit_rate' WHERE product_id ='$id'";
	$query_run = mysqli_query($con, $query);
	

	if ($query_run){

		$_SESSION['SUCCESS'] = "Product/Service Data Updated";
		header('location: product_display.php');

	} else {

		$_SESSION['Failure'] = "Product/Service Data Not Updated";
		header('location: product_display.php');
	
	}
}

if(isset($_POST['delete_btn'])){

	$id = $_POST['delete_id'];

	$query = "DELETE FROM product WHERE product_id ='$id'";
	$query_run = mysqli_query($con, $query);


	if ($query_run){

		$_SESSION['SUCCESS'] = "Product Deleted";
		header('location: product_display.php');

	} else {

		$_SESSION['Failure'] = "Product Not Deleted";
		header('location: product_display.php');
	
	}
}

if(isset($_POST['updatecompanybtn'])){

	$id = $_POST['edit_id'];
	$edit_company_name = $_POST['company_name'];
	$edit_user_name = $_POST['user_name'];
	$edit_designation = $_POST['designation'];
	$edit_address = $_POST['address'];
	$edit_pincode = $_POST['pincode'];
	$edit_email = $_POST['email'];
	$edit_website = $_POST['website'];
	$edit_whatsapp = $_POST['whatsapp'];
	$edit_ph_number = $_POST['ph_number'];
	$edit_gst = $_POST['gst'];
	$edit_pan_number = $_POST['pan_number'];
	$edit_cin = $_POST['cin'];
	$edit_code = $_POST['code'];
	

	$query = "UPDATE permanent_details SET company_name = '$edit_company_name', user_name = '$edit_user_name', designation = '$edit_designation', address = '$edit_address', pincode = '$edit_pincode', ph_number = '$edit_ph_number', email = '$edit_email', website = '$edit_website', whatsapp = '$edit_whatsapp', pan_number = '$edit_pan_number', gst='$edit_gst', cin = '$edit_cin', statecode='$edit_code' WHERE company_id ='$id'";
	$query_run = mysqli_query($con, $query);
	

	if ($query_run){

		$_SESSION['SUCCESS'] = "Company Details Updated";
		header('location: company_details_display.php');

	} else {

		$_SESSION['Failure'] = "Company Details Not Updated";
		header('location: company_details_display.php');
	
	}

}

if(isset($_POST['companyregister'])){

	$id = $_POST['user_id'];
	$company_name = $_POST['company_name'];
	$user_name = $_POST['user_name'];
	$designation = $_POST['designation'];
	$address = $_POST['address'];
	$pincode = $_POST['pincode'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$whatsapp = $_POST['whatsapp'];
	$ph_number = $_POST['ph_number'];
	$gst = $_POST['gst'];
	$pan_number = $_POST['pan_number'];
	$cin = $_POST['cin'];
	$code = $_POST['code'];

	$query = "INSERT INTO permanent_details VALUES (NULL, '$id', '$company_name', '$user_name', '$designation', '$address', '$pincode', '$ph_number', '$email', '$website', '$whatsapp', '$gst', '$pan_number', '$cin', '$code')";
	$query_run = mysqli_query($con, $query);
	

	if ($query_run){

		$_SESSION['SUCCESS'] = "Company Details Added";
		header('location: company_details_display.php');

	} else {

		$_SESSION['Failure'] = "Company Details Not Added";
		header('location: company_details_display.php');
	
	}

}

if(isset($_POST['logoupload'])){

	$id = $_POST['user_id'];
	$name = $_FILES['file']['name'];
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
  
	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
	// Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif");
  
	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){

		$sql=mysqli_query($con, "SELECT * FROM logo WHERE user_id='$id'");
		$row=mysqli_fetch_assoc($sql);
		$num=mysqli_num_rows($sql);
	   
	   $query_1 = "DELETE FROM logo WHERE user_id='$id'";
	 $query_run_1 = mysqli_query($con,$query_1);
	
	
	 $query = "INSERT into logo values(NULL, '$id', '".$name."')";
	 $query_run = mysqli_query($con,$query);
	
	  // Upload file
	  if($num>0){
		unlink($row['image']);
	  }
	  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
  
	  if ($query_run){
  
		  $_SESSION['SUCCESS'] = "Image Uploaded";
		  header('location: logo.php');
  
	  } else {
  
		  $_SESSION['Failure'] = "Image Not Uploaded";
		  header('location: logo.php');
	  
	  }
  
	} 
   
  }
  
  if(isset($_POST["signupload"])) {

	$id = $_POST['user_id'];
 $name = $_FILES['file']['name'];
 $target_dir = "upload/";
 $target_file = $target_dir . basename($_FILES["file"]["name"]);
 
 $sqlx=mysqli_query($con, "SELECT * FROM sign WHERE image='$name'");
 $rowx=mysqli_fetch_assoc($sqlx);
 $numx=mysqli_num_rows($sqlx);
 if($numx){
     $name=$name."_";
 }

 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){
	
	


	$query_1 = "DELETE FROM sign WHERE user_id='$id'";
  $query_run_1 = mysqli_query($con,$query_1);
 
 
  $query = "INSERT into sign values(NULL, '$id', '".$name."')";
  $query_run = mysqli_query($con,$query);
 
  if($num>0){
	unlink($row['image']);
  }
	  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
	
   if ($query_run){

	   $_SESSION['SUCCESS'] = "Image Uploaded";
	   header('location: signature.php');

   } else {

	   $_SESSION['Failure'] = "Image Not Uploaded";
	   header('location: signature.php');
   
   }

 } 

}

if(isset($_POST['updatebankbtn'])){

	$id = $_POST['edit_id'];
	$edit_bank_name = $_POST['bank_name'];
	$edit_account_number = $_POST['account_number'];
	$edit_acc_type = $_POST['acc_type'];
	$edit_account_name = $_POST['account_name'];
	$edit_ifsc_code = $_POST['ifsc_code'];
	$edit_micr_code = $_POST['micr_code'];
	$edit_swift_code = $_POST['swift_code'];
	$edit_url = $_POST['url'];
	

	$query = "UPDATE bank_details SET bank_name = '$edit_bank_name', account_number = '$edit_account_number', acc_type = '$edit_acc_type', account_name = '$edit_account_name', ifsc_code = '$edit_ifsc_code', micr_code = '$edit_micr_code', swift_code = '$edit_swift_code', url = '$edit_url' WHERE bank_id ='$id'";
	$query_run = mysqli_query($con, $query);
	

	if ($query_run){

		$_SESSION['SUCCESS'] = "Bank Details Updated";
		header('location: bank_details_display.php');

	} else {

		$_SESSION['Failure'] = "Bank Details Not Updated";
		header('location: bank_details_display.php');
	
	}

}

if(isset($_POST['bankregister'])){

	$id = $_POST['user_id'];
	$bank_name = $_POST['bank_name'];
	$account_number = $_POST['account_number'];
	$acc_type = $_POST['acc_type'];
	$account_name = $_POST['account_name'];
	$ifsc_code = $_POST['ifsc_code'];
	$micr_code = $_POST['micr_code'];
	$swift_code = $_POST['swift_code'];
	$url = $_POST['url'];


	$query = "INSERT INTO bank_details VALUES(NULL, '$id', '$bank_name', '$account_number', '$acc_type', '$account_name', '$ifsc_code', '$micr_code', '$swift_code', '$url')";
	$query_run = mysqli_query($con, $query);
	

	if ($query_run){

		$_SESSION['SUCCESS'] = "Bank Details Added";
		header('location: bank_details_display.php');

	} else {

		$_SESSION['Failure'] = "Bank Details Not Added";
		header('location: bank_details_display.php');
	
	}

}



if(isset($_POST['submit'])){

	$id = $_POST['data_id'];
	$invoice_number = $_POST['invoice_number'];
	$type = $_POST['type'];
	$client = $_POST['client'];
	$date = date("Y-m-d", strtotime($_POST['date']));
	$project = $_POST['project'];
	$workorder = $_POST['workorder'];
	$gstrate = $_POST['gstrate'];
	$discount = $_POST['discount'];
	

	$query = "UPDATE `data` SET `invoice_number` = '$invoice_number', `type` = '$type', `client` = '$client', `date` = '$date', `project` = '$project', `workorder` = '$workorder', `gst` = '$gstrate', `discount` = '$discount' WHERE data_id ='$id'";
	$query_run = mysqli_query($con, $query);
	

	if ($query_run){

		$_SESSION['SUCCESS'] = "Invoice Details Updated";
		header('location: invoice.php');

	} else {

		$_SESSION['Failure'] = "Invoice Details Not Updated";
		header('location: invoice.php');
	
	}

}

if(isset($_POST['reg'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$company_name = $_POST['company_name'];
	$type = $_POST['type'];
    $code = $_POST['code'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$password_2 = $_POST['password_2'];
  
	 $query_a = "SELECT * FROM permanent_details WHERE company_id='1'";
	$query_run_a = mysqli_query($con, $query_a);
	$row=mysqli_fetch_assoc($query_run_a);
	$result=$row['code'];
  
	if($result!=$code) {
		
			 $_SESSION['status'] = "Invalid Product Code";
	  header('location: register.php');
  
  
	} else {
		   $query = "INSERT INTO users VALUES(NULL, '$firstname', '$lastname', '$company_name', '$type', '$email', '$password')";
	$query_run = mysqli_query($con, $query);
  
  if($query_run) {
	  $_SESSION['SUCCESS'] = "User Registered";
	  header('location: login.php');
  } else{
	  $_SESSION['Failure'] = "User Not Registered";
	  header('location: register.php');
  }
  }
  }
  
  	if(isset($_POST['changepassword'])){
		$id = $_POST['edit_id'];
		$password = md5($_POST['password']);
		$confirmpassword = md5($_POST['confirmpassword']);
	if ($password==$confirmpassword){
		$query = "UPDATE users SET password = '$password' WHERE id ='$id'";
		$query_run = mysqli_query($con, $query);
		
	}	
	
			if ($query_run){
	
$_SESSION['SUCCESS'] = "User Password Updated";
			header('location: index.php');
		} else {
	
			$_SESSION['Failure'] = "Passwords Do Not Match";
			header('location: user_password_edit.php');
		
		}
    }

if(isset($_POST['gstregister'])){
	$user_id = $_POST['user_id'];

	$rate = $_POST['gst'];

	$query = "INSERT INTO gst VALUES (NULL, '$user_id', '$rate')";
	$query_run = mysqli_query($con, $query);


	if ($query_run){

		$_SESSION['SUCCESS'] = "GST Rate Added";
		header('location: company_details_display.php');

	} else {

		$_SESSION['Failure'] = "GST Rate Not Added";
		header('location: company_details_display.php');
	
	}
}

if(isset($_POST['codebtn'])){
	$user_id = $_POST['user_id'];

	$name = strtoupper($_POST['name']);
	$code = $_POST['code'];

	$query = "INSERT INTO statecode VALUES (NULL, '$user_id', '$name', '$code')";
	$query_run = mysqli_query($con, $query);


	if ($query_run){

		$_SESSION['SUCCESS'] = "State added successfully";
		header('location: statecode.php');

	} else {

		$_SESSION['Failure'] = "State not added";
		header('location: statecode.php');
	
	}
}

if(isset($_POST['codeupdatebtn'])){

	$edit_id = $_POST['edit_id'];

	$name = strtoupper($_POST['name']);
	$code = $_POST['code'];

	$query = "UPDATE statecode SET name='$name', code='$code' WHERE state_id='$edit_id'";
	$query_run = mysqli_query($con, $query);


	if ($query_run){

		$_SESSION['SUCCESS'] = "State updated successfully";
		header('location: statecode.php');

	} else {

		$_SESSION['Failure'] = "State not updated";
		header('location: statecode.php');
	
	}
}

?>
