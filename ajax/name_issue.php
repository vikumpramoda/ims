<?php
include('../db_connector.php');


$number = count($_POST['item_id']);
$number = count($_POST['qty']);
$req_id =  $_POST['req_id'];
$bookCatol =  $_POST['bookCatol'];
$bookCatoll =  $_POST['bookCatoll'];
$item_id =  $_POST['item_id'];
$qty =  $_POST['qty'];
$member_id = $_POST['bookCato'];
$date =  $_POST['date'];
$remarks =   $_POST['remarks'];
/*
echo "$name1 && $number1";*/

if(isset($req_id) && ($date)  ) {

$insertQ = "insert into `issue_order`(`req_id`, `region_id`,`depot_id`, `member_id`,`date`, `remarks`) 
values('$req_id','$bookCatol','$bookCatoll','$member_id','$date','$remarks')";
$insertRes = mysqli_query($con, $insertQ);


$GET_last_ID = mysqli_insert_id($con);



if($number >= 1)
{
    for($i=0; $i<$number; $i++)
    {
        if(trim($_POST['item_id'][$i] != '') && trim($_POST['qty'][$i] != ''))
        {
            $sql = "INSERT INTO `issue_item`(`issue_id`,`item_id`,`qty`) VALUES('$GET_last_ID','".mysqli_real_escape_string($con, $_POST['item_id'][$i])."','".mysqli_real_escape_string($con, $_POST['qty'][$i])."')";
            mysqli_query($con, $sql);

        }

    }

    echo "Data Inserted";
}
}
else
{
    echo "Please Fill Fields !!!";
}

?>