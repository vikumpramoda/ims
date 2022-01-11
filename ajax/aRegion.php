<?php
include('../db_connector.php');
include('../validateSession.php');

$member_id  = $_SESSION['member_id'];

    $jsonOb = '[';
    $seletSubCatos = "SELECT r.region_id,r.region_name
        FROM region r
        INNER JOIN member m ON r.region_id = m.region_id WHERE m.member_id= $member_id";
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


