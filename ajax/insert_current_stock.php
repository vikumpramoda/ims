
<?php

//insert current stock - vikum

include '../db_connector.php';

$date = date('Y-m-d');
$user =  $_POST["bookCato"];
$region = $_POST["bookCatol"];
$depot = $_POST["bookCatoll"];
$remarks = $_POST["remarks"];

$stmt = $connect->prepare("INSERT INTO main_stock(date,user, region, depot, remarks) 
    VALUES (:date,:user, :region, :depot, :remarks)");

$stmt->bindParam(':date', $date);
$stmt->bindParam(':user', $user);
$stmt->bindParam(':region', $region);
$stmt->bindParam(':depot', $depot);
$stmt->bindParam(':remarks', $remarks);
$stmt->execute();

$stmt = $connect->prepare("...");
$stmt->execute();
$stockId = $connect->lastInsertId();

/* ALTER TABLE table_name AUTO_INCREMENT = start_value; */
$query = "
INSERT INTO main_stock_item
(id ,item_name, serial,date) 
VALUES (:id,:first_name,:serial,:Date )
";

for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
{
    $data = array(
        ':id' => $stockId,
        ':first_name'	=>	$_POST['hidden_first_name'][$count],
        ':serial'	=>	$_POST['hidden_serial'][$count],
        ':Date'	=>	$_POST['hidden_Date'][$count],
    );
    $statement = $connect->prepare($query);
    $statement->execute($data);
}

?>