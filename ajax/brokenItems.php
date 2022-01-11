<?php
include('../db_connector.php');

//Broken Item List Create -- vikum
$member_id = $_POST["member_id"];
$id = $_POST["custID"];

$query = "UPDATE `main_stock` 
    SET `approve` = 'Broken' 
    WHERE `id`=$id";
$result = mysqli_query($con, $query);




echo "Add to Broken Item List !!!";

?>