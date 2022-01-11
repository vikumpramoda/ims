<?php
include('../db_connector.php');



for($count = 0; $count < count($_POST["item_name"]); $count++)
{
    $tot =  $_POST["unit_price"][$count] *  $_POST["item_quantity"][$count];
    $q = "INSERT INTO grn_item 
              ( grn_id,item_id, qty,total) 
              VALUES (:id,:item_name,:item_quantity,:tot)";


    $data=   array(

        ':item_name'  => $_POST["item_name"][$count],
        ':item_quantity' => $_POST["item_quantity"][$count],
        ':tot' => $tot




    );
    $statement = $connect->prepare($q);
    $statement->execute($data);
}

?>