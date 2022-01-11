<?php
include('../db_connector.php');
include('../validateSession.php');

$member_id  = $_SESSION['member_id'];
$depot  = $_SESSION['depot_id'];

$jsonOb = '[';
$seletSubCatos = "SELECT m.region_id,m.region_name
        FROM region m
        INNER JOIN depot d ON d.depot_id=$depot
        WHERE m.region_id = d.region_id  ";

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
        $jsonOb .= '"ID":'. '"'.$row['region_id'].'"'  .', "Name" '. ':"'.$row['region_name'].'"';
        $jsonOb .= '},';
    }
    $jsonOb = rtrim($jsonOb,',');
    $jsonOb .= ']';
    echo $jsonOb;
}


?>