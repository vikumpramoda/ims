<?php
//insert.php
include('../db_connector.php');

$member_id  = $_SESSION['member_id'];
$depot_id  = $_SESSION['depot_id'];



    $name = $_POST["name"];
    $address = $_POST["remarks"];

    $date = date('Y-m-d');

    $stmt = $connect->prepare("INSERT INTO grn (invoice, grn_date, remarks,member_id,depot_id,pur_id) 
    VALUES (:name, :date, :address,:mem,:dep,:pur)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':mem', $member_id);
    $stmt->bindParam(':dep', $depot_id);
    $stmt->bindParam(':pur', $no);


    $stmt->execute();

    $stmt = $connect->prepare("...");
    $stmt->execute();
    $id = $connect->lastInsertId();

$qt = 0;

    for($count = 0; $count < count($_POST["item_name"]); $count++)
    {
        $tot =  $_POST["unit_price"][$count] *  $_POST["item_quantity"][$count];
        $qt  += $tot;
        $q = "INSERT INTO grn_item 
              ( grn_id,item_id, qty,total) 
              VALUES (:id,:item_name,:item_quantity,:tot)";



         $data =   array(
                ':id' => $id,
                ':item_name'  => $_POST["item_name"][$count],
                ':item_quantity' => $_POST["item_quantity"][$count],
                ':tot' => $tot




        );
        $statement = $connect->prepare($q);
        $statement->execute($data);


    }

    $t = "update grn set `total` = $qt
          where `grn_id` = $id ";

    $e= mysqli_query($con, $t);


?>