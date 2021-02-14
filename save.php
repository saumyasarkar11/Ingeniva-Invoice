<?php
include 'includes/db.php';
session_start();

if(!$_SESSION['username'])
{
  header('location: login.php');
}

$username=$_SESSION['username'];
$sql= "SELECT * FROM users WHERE email = '$username'";
        $sql_run = mysqli_query($con, $sql);
        $row_a = mysqli_fetch_assoc($sql_run);
        $user_id= $row_a['id'];


$user_id = $_POST['user_id'];
$invoice_number=$_POST['invoice_number'];        
$client=$_POST['client'];  
$project=$_POST['project'];
$workorder=$_POST['workorder'];
$discount=$_POST['discount'];
$gstrate=$_POST['gstrate'];
if (empty($_POST['date'])){
    $date=date("Y-m-d");
} else {
     $date=date("Y-m-d", strtotime($_POST['date']));
}

$dis='0';
$type=$_POST['type'];


$sqla="INSERT INTO data VALUES (NULL, '$user_id', '$invoice_number', '$type', '$client', '$project', '$workorder', '$gstrate', '$discount', '$date')";

$resulta = $con->query($sqla);

$sqlb="SELECT * FROM data WHERE invoice_number='$invoice_number'";

$result = mysqli_query($con, $sqlb);
$row=mysqli_fetch_assoc($result);
$data_id=$row['data_id'];

// $dbnm='vendex';
// $user='root';
// $pass='';

// try{
//     $dbh = new PDO('mysql:host=localhost;dbname='.$dbnm, $user, $pass);
// } catch (PDOExeption $e) {
//   print "Error".$e->getMessage()."<br>";  
//   die();
// }


$arr = $_POST;
for($i=1; $i <= count($arr['product']); $i++ ){
    $product=$arr['product'][$i];
    $qty=$arr['qty'][$i];
    $desc=$arr['desc'][$i];
    $rate=$arr['rate'][$i];
$sqli = mysqli_query($con, "INSERT INTO other_data VALUES (NULL, '$data_id', '$product', '$qty', '$desc', '$rate')");
}
header('location: invoice.php');
?>
