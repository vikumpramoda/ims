<?php
include('../db_connector.php');

//confirm received -- vikum

$id = $_POST["id"];

$query = "UPDATE `main_stock` 
    SET `approve` = 'confirm' 
    WHERE `id`=$id";
$result = mysqli_query($con, $query);


echo "Confirm to Received Item !!!";

?>