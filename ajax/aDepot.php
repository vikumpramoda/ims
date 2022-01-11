<?php
include('../db_connector.php');
include('../validateSession.php');

$member_id  = $_SESSION['member_id'];


    $jsonOb = '[';
    $seletSubCatos = "SELECT d.depot_id,d.depot_name
    FROM depot d
    INNER JOIN member m ON d.depot_id = m.depot_id WHERE m.member_id= $member_id";
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
        $jsonOb .= '"ID":'. '"'.$row['depot_id'].'"'  .', "Name" '. ':"'.$row['depot_name'].'"';
        $jsonOb .= '},';
    }
    $jsonOb = rtrim($jsonOb,',');
    $jsonOb .= ']';
    echo $jsonOb;
}


?>

