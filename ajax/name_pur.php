<?php
include('../db_connector.php');


$number = count($_POST["qty"]);
$number = count($_POST["unit"]);
$number = count($_POST["total"]);
$number = count($_POST["item_code"]);
$req_id =  $_POST["req_id"];
$sup_id =  $_POST["sup_id"];
$bookCatol =  $_POST["bookCatol"];
$bookCatoll =  $_POST["bookCatoll"];
$member_id = $_POST["member_id"];
$pur_date =  $_POST["pur_date"];
$remarks =   $_POST["remarks"];



/*
echo "$name1 && $number1";*/
if(isset($req_id) && ($sup_id) && ($pur_date) ) {


    $insertQ = "insert into `pur`(`req_id`,`sup_id`, `region_id`,`depot_id`, `member_id`,`pur_date`, `remarks`) 
    values('$req_id','$sup_id','$bookCatol','$bookCatoll','$member_id','$pur_date','$remarks')";
    $insertRes = mysqli_query($con, $insertQ);

    $query = "";
    $query = "UPDATE `req` 
    SET `complete` = 'complete'
    WHERE `req_number`= $req_id";
    $result = mysqli_query($con, $query);






    $GET_last_ID = mysqli_insert_id($con);


    if ($number >= 0) {
        for ($i = 0; $i < $number; $i++) {
            if (trim($_POST['item_code'][$i] != '') && trim($_POST['qty'][$i] != '') && trim($_POST['unit'][$i] != '') && trim($_POST['total'][$i] != '')) {


                $sql = "INSERT INTO `pur_item`(`pur_id`,`item_id`,`qty`,`unit_price`,`total_price`) VALUES('$GET_last_ID','" . mysqli_real_escape_string($con, $_POST['item_code'][$i]) . "','" . mysqli_real_escape_string($con, $_POST['qty'][$i]) . "','" . mysqli_real_escape_string($con, $_POST['unit'][$i]) . "','" . mysqli_real_escape_string($con, $_POST['total'][$i]) . "')";
                mysqli_query($con, $sql);



            }

        }
        echo "Successfully Added a New Purchase Order!";



    }


}
else
{
    echo "Please Fill Fields !!!";
}


?>