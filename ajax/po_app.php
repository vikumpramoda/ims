<?php
include('../db_connector.php');

//Collect incoming variables from index page


$member_id = $_POST["member_id"];
$id = $_POST["custID"];
$date = date('Y-m-d');
$query = "";


$query = "UPDATE `purchase` 
    SET `approved_user` = '$member_id' , `approved_date` = '$date'
    WHERE `pur_id`=$id";
$result = mysqli_query($con, $query);

$queryl = "UPDATE `purchase_item` 
    SET `status` = 'approved' 
    WHERE `pur_id`=$id";
$resultl = mysqli_query($con, $queryl);
echo "Approved Purchase Order !";


?>