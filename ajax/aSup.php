<?php
include('../db_connector.php');
include('../validateSession.php');

$member_id  = $_SESSION['member_id'];

$jsonOb = '[';
$seletSubCatos = "SELECT *
        FROM stock_supplier";
$selectQRes = mysqli_query($con,$seletSubCatos);

if(mysqli_num_rows($selectQRes) == 0)
{
    //no recores.
    echo('[{"ID":"0", "Name" :"No Items Found"}]');
}

else
{
    while($row = mysqli_fetch_array($selectQRes)){
        $jsonOb .= '{';
        $jsonOb .= '"ID":'. '"'.$row['sup_id'].'"'  .', "Name" '. ':"'.$row['sup_name'].'"';
        $jsonOb .= '},';
    }
    $jsonOb = rtrim($jsonOb,',');
    $jsonOb .= ']';
    echo $jsonOb;
}


?>