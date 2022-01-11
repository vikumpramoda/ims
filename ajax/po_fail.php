<?php
include('../db_connector.php');

//Collect incoming variables from index page


$member_id = $_POST["member_id"];
$id = $_POST["custID"];

$query = "UPDATE `purchase` 
    SET `status` = 'Fail' 
    WHERE `pur_id`=$id";
$result = mysqli_query($con, $query);

$queryl = "UPDATE `purchase_item` 
    SET `status` = 'Fail' 
    WHERE `pur_id`=$id";
$resultl = mysqli_query($con, $queryl);
echo "Failed Requisition !";


?>