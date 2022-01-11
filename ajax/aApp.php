<?php
include('../db_connector.php');

//Collect incoming variables from index page


$member_id = $_POST["member_id"];
$id = $_POST["custID"];
$date = date('Y-m-d');
$query = "";


$query = "UPDATE `req` 
    SET `approve` = '$member_id' , `approve_date` = '$date'
    WHERE `req_number`=$id";
$result = mysqli_query($con, $query);

$queryl = "UPDATE `req_items` 
    SET `status` = 'approved' 
    WHERE `req_number`=$id";
$resultl = mysqli_query($con, $queryl);
echo "Approved Requisition !";


?>