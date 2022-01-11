<?php
include('../db_connector.php');

$jsonOb = '[';
$seletSubCatos = "SELECT * FROM `unit` ";
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
        $jsonOb .= '"ID":'. '"'.$row['unit_id'].'"'  .', "Name" '. ':"'.$row['unit'].'"';
        $jsonOb .= '},';
    }
    $jsonOb = rtrim($jsonOb,',');
    $jsonOb .= ']';
    echo $jsonOb;
}


?>