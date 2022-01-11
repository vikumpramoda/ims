<?php
include('../db_connector.php');

$jsonOb = '[';
$seletSubCatos = "SELECT * FROM `main_cato` ";
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
        $jsonOb .= '"ID":'. '"'.$row['cat_id'].'"'  .', "Name" '. ':"'.$row['cat_name'].'"';
        $jsonOb .= '},';
    }
    $jsonOb = rtrim($jsonOb,',');
    $jsonOb .= ']';
    echo $jsonOb;
}


?>
