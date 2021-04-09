<?php

include 'includes/db.php';

$output="";

$data_id = $_POST['data_id'];

$query = "SELECT * FROM other_data WHERE data_id='$data_id'";

$result = mysqli_query($con, $query);

$i=1;

if (mysqli_num_rows($result)>0){

    while ($row = mysqli_fetch_assoc($result)) {

        //$output[] = $row;

        $output .= '<tr>

        <input type="hidden" value="'.$row['product'].'" name="product['.$i.']">

        <input type="hidden" value="'.$row['qty'].'" name="qty['.$i.']">

        <input type="hidden" value="'.$row['desc'].'" name="desc['.$i.']">

        <input type="hidden" value="'.$row['rate'].'" name="rate['.$i.']">

       <td class="product" data-id1="'.$row['id'].'" >'.$row['product'].'</td>

       <td class="qty" data-id2="'.$row['id'].'" contenteditable>'.$row['qty'].'</td> 

       <td class="desc" data-id3="'.$row['id'].'" contenteditable>'.$row['desc'].'</td> 

       <td class="rate" data-id4="'.$row['id'].'" contenteditable>'.$row['rate'].'</td> 

       <td><button type="button" name="btn_delete" id="btn_delete" class="btn btn-outline-danger" data-id5="'.$row['id'].'"><i class="fa fa-trash"></i></button></td></tr>';

       $i++;

           }

           echo $output; 

} else {

    $output .= '<tr><td>Data Not Found</td></tr>';

    echo $output;

}





?>
