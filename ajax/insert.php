
<?php

//insert.php 

include '../db_connector.php';

$date = date('Y-m-d');
$user =  $_POST["bookCato"];
$region = $_POST["bookCatol"];
$depot = $_POST["bookCatoll"];
$remarks = $_POST["remarks"];

$stmt = $connect->prepare("INSERT INTO req (date, user, region, depot, remarks) 
    VALUES (:date, :user, :region, :depot, :remarks)");
$stmt->bindParam(':date', $date);
$stmt->bindParam(':user', $user);
$stmt->bindParam(':region', $region);
$stmt->bindParam(':depot', $depot);
$stmt->bindParam(':remarks', $remarks);
$stmt->execute();

$stmt = $connect->prepare("...");
$stmt->execute();
$id = $connect->lastInsertId();

$query = "
INSERT INTO req_items 
(req_number, item_name, qty) 
VALUES (:req_number, :first_name, :last_name)
";

for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
{
    $data = array(
        ':req_number' => $id,
        ':first_name'	=>	$_POST['hidden_first_name'][$count],
        ':last_name'	=>	$_POST['hidden_last_name'][$count]
    );
    $statement = $connect->prepare($query);
    $statement->execute($data);
}

?>