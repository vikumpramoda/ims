<?php
include('../db_connector.php');

$jsonOb = '[';
$seletSubCatos = "SELECT `member_category_id`, `member_category_text` FROM `member_category`";
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
        $jsonOb .= '"ID":'. '"'.$row['member_category_id'].'"'  .', "Name" '. ':"'.$row['member_category_text'].'"';
        $jsonOb .= '},';
    }
    $jsonOb = rtrim($jsonOb,',');
    $jsonOb .= ']';
    echo $jsonOb;
}


?>