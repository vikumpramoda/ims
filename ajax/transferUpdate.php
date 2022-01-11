<?php
include('../db_connector.php');

//Transfer to another dipo -- Update Table -- Vikum


$member_id = $_POST["member_id"];
$country = $_POST["country"];
$state = $_POST["state"];
$bookcato = $_POST["bookcato"]; 




$id = $_POST["custID"];
$date = date('Y-m-d');
$query = "";
//approve = sender person name
$query = "UPDATE `main_stock` 
    SET `approve` = '$member_id' , `approve_date` = '$date'
    , `user` = '$bookcato' ,`region` = '$country' ,`depot` = '$state' 
    WHERE `id`=$id";
$result = mysqli_query($con, $query);



/* $queryl = "UPDATE `main_stock_item` 
    SET `status` = 'Transfered' 
     , `country` = '$country' ,`state` = '$state' ,`bookcato` = '$bookcato'  
    WHERE `id`=$id";
$resultl = mysqli_query($con, $queryl); */




echo "Item sucessfully Transfer to another Dipartment  !";
?>