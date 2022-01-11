<?php
include('../db_connector.php');
include('../validateSession.php');

$member_id  = $_SESSION['member_id'];


$jsonOb = '[';
$seletSubCatos = "SELECT member_id , first_name
    FROM member
    WHERE member_id= $member_id";

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
        $jsonOb .= '"ID":'. '"'.$row['member_id'].'"'  .', "Name" '. ':"'.$row['first_name'].'"';
        $jsonOb .= '},';
    }
    $jsonOb = rtrim($jsonOb,',');
    $jsonOb .= ']';
    echo $jsonOb;
}


?>

