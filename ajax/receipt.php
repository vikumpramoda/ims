<?php
include('../db_connector.php');
$depot_id  = $_SESSION['depot_id'];
$member_id  = $_SESSION['member_id'];
//Collect incoming variables from index page
if(isset($_POST["employee_id"])) {

    $query = "UPDATE `req_items`
              SET `status` = 'done' 
              WHERE `reqID`= '".$_POST["employee_id"]."'";
    $insertRes = mysqli_query($con, $query);

    $r = "UPDATE `main_stock`
          SET `stock_level` = `stock_level` + (select `qty` 
                                              from `req_items`  
                                          where  `reqID`= '".$_POST["employee_id"]."' )   
          WHERE `depot_id`=$depot_id and `item_id`= (select `item_name`
                                                from `req_items` 
                                                where  `reqID`= '".$_POST["employee_id"]."' ) ";

    $l = mysqli_query($con, $r);


    $insertQ = "insert into `reciept`(`req_id`) 
    values('".$_POST["employee_id"]."')";

    $insertRes = mysqli_query($con, $insertQ);


}
?>