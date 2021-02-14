<?php
include 'includes/db.php';
session_start();
$invoice_id = $_POST['invoice_id'];
$sqlf = "SELECT * FROM `data` WHERE data_id = '$invoice_id'";
$resultf = mysqli_query($con,$sqlf);
$rowf = mysqli_fetch_assoc($resultf);

$user_id=$rowf["user_id"];


$invoice_number=$rowf['invoice_number'];        
$client=$rowf['client'];  
$project=$rowf['project'];
$workorder=$rowf['workorder'];
$discount=$rowf['discount'];
$gst=$rowf['gst'];
if (empty($rowf['date'])){
    $date=date("jS F, Y ");
} else {
     $date=$rowf['date'];
}

$dis='0';
$type=$rowf['type'];




$total_1='0';
$total_2='0';
$total_3='0';
$total_4='0';
$total_5='0';
$total_6='0';
$total_7='0';
$total_8='0';
$total_9='0';
$total_10='0';

$rate_1_a='';
$rate_2_a='';
$rate_3_a='';
$rate_4_a='';
$rate_5_a='';
$rate_6_a='';
$rate_7_a='';
$rate_8_a='';
$rate_9_a='';
$rate_10_a='';

?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Invoice Preview</title>

  <!-- Custom fonts for this template-->
  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link rel="icon" href="assets/images/favicon.png" type="image/png">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style type="text/css">

    .container-fluid{
    margin-top:25px;
    
    }

.table2{
    outline: 0px;
    margin-left: 300px;
}


        table{

            border: 0.5px solid grey;
    border-spacing: 0;
    padding: 10px;
    outline: 0.5px solid grey;
    margin-left: 0px;
    border-collapse: collapse;
    min-width: 100%;
    max-width: 100%;
    text-align: left;
    
    

       }

.table1 {
    
    border: 0.5px solid grey;
    border-spacing: 0;
    padding: 10px;
    outline: 0.5px solid grey;
    margin-left: 2px;
    border-collapse: collapse;
    text-align: left;




}




        td, th{

            border: 0.5px solid grey;
    border-spacing: 0;
    padding: 10px;
    outline: 0.5px solid grey;
    margin-left: 2px;
    border-collapse: collapse;
    
      

        }

.logo1{
    
}
       
      

        .logo{
            float: right;
        }


        @page {
  size: A4;
  margin: 0;
}

@media print {
  .page {
    
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
  }
}

.company{
font-size: 13px;
}

h2{
    margin-bottom: -10px;
}

h5{
    font-wight:bolder;
}

.note{
    font-size: 13px;
    margin-top: 15px;
}

       

        </style>


</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper" style="margin:50px 30px 20px 40px;">

<div class="container-fluid" >

 <div class="logo">
 <?php

 $sqlx = "SELECT * from logo where user_id = '$user_id'";
 $resultx = mysqli_query($con,$sqlx);
 $rowx = mysqli_fetch_array($resultx);

 $image = $rowx['image'];
 
?>
<img src='<?php echo "upload/".$image.""; ?>' >
</div>

<div class="company">

  	<?php

$sql = "SELECT * FROM permanent_details WHERE user_id='$user_id'";
$result = $con->query($sql);

  
    // output data of each row
$row = mysqli_fetch_assoc($result);

$x1=$row['statecode'];
$query_2 = mysqli_query($con, "SELECT * FROM statecode WHERE state_id='$x1'"); 
$row_2 = mysqli_fetch_assoc($query_2);
$str=$row['gst'];



       echo "<h2>" . $row["company_name"]. "</h2><br>" . $row["address"]."<br>";
       
       if (empty($row['cin'])) {
 
} else {
  echo "CIN: ". $row["cin"]. "<br>";
  
  
}

       
       echo "Phone: " . $row["ph_number"]. "<br>Email: " . $row["email"]. "<br>";

 if (empty($row['whatsapp'])) {
 echo "Website: ". $row["website"]. "";
} else {
  echo "Whatsapp: ". $row["whatsapp"]. "<br>";
  echo "Website: ". $row["website"]. "";
  
}


             


if (empty($row['user_name']  and $row['designation'])) {
 
} else {
  echo "<br>Contact Person: ". $row["user_name"]. ", " . $row["designation"]."";
}
		
		?>

    </div>
    <?php
$type_1= strtoupper($type);
    ?>
		
		
		<hr align="center"><br>

	<h3 style="margin-top: -20px;" align="center"><?php echo $type_1; ?></h3>	
	<br>
	<table width="90%" height="92" border="1"  cellpadding="10px" cellspacing="0" class="data-table table" align="center" style="margin-top: -20px;">
      <tr>
        <td width="57%"><?php
     
$sql_b = "SELECT * FROM buyer_details WHERE buyer_id='$client'";
$result_b = $con->query($sql_b);

$row_b = mysqli_fetch_assoc($result_b);
$x=$row_b['code'];
$query_1 = mysqli_query($con, "SELECT * FROM statecode WHERE state_id='$x'"); 
$row_1 = mysqli_fetch_assoc($query_1); 
$str_1=$row_1["code"];


        echo "To, <br><strong>" .$row_b["company_name"]. "</strong><br>Address: " . $row_b["address"]. "<br>";
        if (empty($row_b["gst"])) {
            
        } else {
            
        echo "<strong>GSTN: </strong>" . $row_b["gst"]. "<br>";
        
        }
        
        if(empty($row_b["buyer_name"])){} else {
   echo "<strong>Attention: </strong>" . $row_b["buyer_name"]. "";
}
        

if(empty($project)){} else {
    echo"<br><strong>Subject: </strong>" .$project. "";
}
if(empty($workorder)){} else {
    echo"<br><strong>Work Order No.: </strong>" .$workorder. "";
}

        ?></td>
        <td width="33%"><p style="text-decoration: underline;">Original For Recipient</p><?php
        echo "<strong>INVOICE NUMBER: </strong>" .$invoice_number. "<br>" ;
        if (empty($str)){

        } else {
            echo "<strong>GSTN: </strong>" . $str. "<br>" ;
        }
        echo "<strong>PAN: </strong>" . $row["pan_number"]. "<br>" ;
    

            echo "<strong>Date: </strong>" . date("d-m-y", strtotime($date)) . "<br>" ;
        
        
        ?></td>
      </tr>
</table><br>


<table class="table "><tr><th style="width: 5%;">Sl#</th><th style="width:45%;">Description</th><th>SAC/HSN</th><th>Quantity</th><th>Rate ( <i class="fa fa-inr" aria-hidden="true"></i> )</th><th>Total ( <i class="fa fa-inr" aria-hidden="true"></i> )</th></tr>

	

<?php

$sql_h = "SELECT * FROM other_data WHERE data_id='$invoice_id'";
$result_h = $con->query($sql_h);
$num=mysqli_num_rows($result_h);
$i=0;
$gtotal = '0';
while ($row_h=mysqli_fetch_assoc($result_h)){
$product = $row_h['product'];
$sql_i = "SELECT * FROM product WHERE product_description='$product'";
$result_i = $con->query($sql_i);
$row_i = mysqli_fetch_assoc($result_i);
    echo "<tr><td>".++$i."</td><td><strong>".$row_h['product']."</strong><br>".$row_h['desc']."</td><td>".$row_i['sac']."</td><td>".$row_h['qty']."</td><td>".$row_h['rate']."</td><td>".$row_h['qty']*$row_h['rate']."</tr>";
$gtotal += ($row_h['qty']*$row_h['rate']);

}

if (empty($discount)){
    $dis="0";
$code = $row_2['code'];
$code_1 = $str_1;
$inc=($gtotal*$gst/100);
$inc_1=($inc/2);   
$grand= round(2*$inc_1+$gtotal);
$gst_rate_1=$gst/2;

$gr=(round($gtotal-$dis));
$mega=(round(2*$inc_1+$gtotal-$dis));

} else {

    $code = $row_2['code'];
$code_1 = $str_1;
$inc=($gtotal*$gst/100);
$inc_1=($inc/2);   
$grand= (round($inc+$gtotal));
$gst_rate_1=$gst/2;
$dis=(round($gtotal*$discount/100));
$gr=(round($gtotal-$dis));
$mega=(round(2*$inc_1+$gtotal-$dis));
}
if (empty($discount)){


if (empty($str)) {
    
    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Grand Total ( &#x20b9 ): </strong></td><td><strong><span>&#8377;</span> ".$gtotal."</strong></td></tr></table>";

} else if ($code == $code_1) {

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Total ( ";
   ?>
   <i class="fa fa-inr" aria-hidden="true"></i>
   <?php
    echo "): </strong></td><td><strong>".$gtotal."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>CGST (".$gst_rate_1."%): </strong></td><td><strong>".($inc_1)."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>SGST (".$gst_rate_1."%): </strong></td><td><strong>".($inc_1)."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Grand Total ( ";
    ?>
    <i class="fa fa-inr" aria-hidden="true"></i>
    <?php
    echo " ): </strong></td><td><strong>".$grand."</strong></td></tr></table>";

} else {

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Total ( ";
    ?>
    <i class="fa fa-inr" aria-hidden="true"></i>
    <?php
    echo" ): </strong></td><td><strong>".$gtotal."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>IGST (".$gst."%): </strong></td><td><strong>".($inc)."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Grand Total ( ";
    ?>
    <i class="fa fa-inr" aria-hidden="true"></i>
    <?php
    echo " ): </strong></td><td><strong>".$grand."</strong></td></tr></table>";
}

}
 else {
    if (empty($str)) {
    
    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Total ( ";
    ?>
    <i class="fa fa-inr" aria-hidden="true"></i>
    <?php
    echo " ): </strong></td><td><strong>".$gtotal."</strong></td></tr>";

     echo "<tr><td></td><td></td><td></td><td></td><td><strong>Discount (".$discount."%): </strong></td><td><strong>".($dis)."</strong></td></tr>";

     echo "<tr><td></td><td></td><td></td><td></td><td><strong>Grand Total ( ";
     ?>
     <i class="fa fa-inr" aria-hidden="true"></i>
     <?php
     echo " ): </strong></td><td><strong>".($gr)."</strong></td></tr></table>";

} elseif ($code == $code_1){

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Total ( ";
    ?>
    <i class="fa fa-inr" aria-hidden="true"></i>
    <?php
    echo" ): </strong></td><td><strong>".$gtotal."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Discount (".$discount."%): </strong></td><td><strong>".($dis)."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>CGST (".$gst_rate_1."%): </strong></td><td><strong>".($inc_1)."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>SGST (".$gst_rate_1."%): </strong></td><td><strong>".($inc_1)."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Grand Total ( ";
    ?>
    <i class="fa fa-inr" aria-hidden="true"></i>
    <?php
    echo" ): </strong></td><td><strong>".($mega)."</strong></td></tr></table>";

} else {

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Total ( "; 
    ?>
    <i class="fa fa-inr" aria-hidden="true"></i>
    <?php
    echo" ): </strong></td><td><strong>".$gtotal."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Discount (".$discount."%): </strong></td><td><strong>".($dis)."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>IGST (".$gst_rate."%): </strong></td><td><strong>".($inc)."</strong></td></tr>";

    echo "<tr><td></td><td></td><td></td><td></td><td><strong>Grand Total ( ";
    ?>
    <i class="fa fa-inr" aria-hidden="true"></i>
    <?php
    echo " ): </strong></td><td><strong>".($mega)."</strong></td></tr></table>";
}

}






?><br>

<?php
function convert_number_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = '  ';
    $separator   = ' ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }
 
    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}


 if (empty($str)) {
    echo '<b>Amount In Words: Rupees '.convert_number_to_words((round($gr))).' Only</b>';

 } else if (empty($dis)){
echo '<b>Amount In Words: Rupees '.convert_number_to_words((round($mega))).' Only</b>';

}
 else{
    echo '<b>Amount In Words: Rupees '.convert_number_to_words((round($mega))).' Only</b>';
}

 
?>

<br><br>




<?php

$sql_a = "SELECT * FROM bank_details WHERE user_id='$user_id'";
$result_a = $con->query($sql_a);


$row_a = mysqli_fetch_assoc($result_a);
echo "<h5>Bank Account Details</h5>";

echo "Bank: " . $row_a["bank_name"]. ", A/C Name: " . $row_a["account_name"]. "<br> A/C No.: " . $row_a["account_number"]." (".$row_a["acc_type"].")".", IFSC: " . $row_a["ifsc_code"]. "<br>";

if (empty($row_a["micr_code"]) and empty($row_a["swift_code"])){
      if(empty($row_a["url"])){} else {
   echo "Online Payment URL: ".$row_a["url"]."";
}
  
} else {
    echo "MICR: " . $row_a["micr_code"].""; if(empty($row_a["swift_code"])){} else {echo ", SWIFT: " .$row_a["swift_code"]. "<br>";}
  if(empty($row_a["url"])){} else {
   echo "Online Payment URL: ".$row_a["url"]."";
}
  
}







?><br>

<p class="note">Note: Any dispute shall be carried under Kolkata Jurisdiction Only</p>

 <div class="logo1" align="right" style="margin-top: -160px;">
 <?php

 $sqlz = "SELECT * from sign where user_id = '$user_id'";
 $resultz = mysqli_query($con,$sqlz);
 $rowz = mysqli_fetch_array($resultz);

 $imagez = $rowz['image'];

 
?>
<img src='<?php echo "upload/".$imagez.""; ?>' ><br>


<h6>Authorized Signatory</h6>
</div>




        </div>
 
</div>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

