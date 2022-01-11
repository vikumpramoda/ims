<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Mendis
 * Date: 28/06/2019
 * Time: 12:01 PM
 */

include('../db_connector.php');

$member_id  = $_SESSION['member_id'];
$depot_id  = $_SESSION['depot_id'];

@$number = count($_POST["item_id"]);
@$number = count($_POST["item_qty"]);
@$number = count($_POST["tot"]);
@$number = count($_POST["id"]);

$invo = $_POST["invo"];
$pur_id = $_POST["country"];
$remarks = $_POST["remarks"];
$q = array_sum($_POST["tot"]);
$date = date('Y-m-d');


if(isset($date) && ($invo) && ($number)) {


    $insertQ = "insert into `grn`(`grn_date`,`pur_id`,`invoice`,`depot_id`,`member_id`,`remarks`,`total`) 
    values('$date','$pur_id','$invo','$depot_id','$member_id','$remarks','$q')";


    $insertRes = mysqli_query($con, $insertQ);

    $GET_last_ID = mysqli_insert_id($con);


    if ($number >= 0) {
        for ($i = 0; $i < $number; $i++) {
            if (trim($_POST['item_id'][$i] != '') && trim($_POST['item_qty'][$i] != '') && trim($_POST['tot'][$i] != '') && trim($_POST['id'][$i] != '')) {



                $sql = "INSERT INTO `grn_item`(`grn_id`,`item_id`,`qty`,`total`,`purchase_id`) VALUES('$GET_last_ID','" . mysqli_real_escape_string($con, $_POST['item_id'][$i]) . "','" . mysqli_real_escape_string($con, $_POST['item_qty'][$i]) . "','" . mysqli_real_escape_string($con, $_POST['tot'][$i]) . "','" . mysqli_real_escape_string($con, $_POST['id'][$i]) . "')";
                mysqli_query($con, $sql);

                $GET_last_IDi = mysqli_insert_id($con);

                $r = "UPDATE `main_stock`
                      SET `stock_level` = `stock_level` +(select `qty` 
                                                          from `grn_item`  
                                                          where  `grnItem_id`= $GET_last_IDi )   
                      WHERE `depot_id`=('" . mysqli_real_escape_string($con, $_SESSION['depot_id'][$i]) . "')  and `item_id`= (select `item_id`
                                                             from `grn_item`  
                                                            where  `grnItem_id`= $GET_last_IDi ) ";

                    $l = mysqli_query($con, $r);

                $up = "UPDATE `purchase_item`
                      SET `status` = 'complete' 
                      WHERE `id` = '" . mysqli_real_escape_string($con, $_POST['id'][$i]) . "'  ";

                $u = mysqli_query($con, $up);


            }

        }

        echo "Successfully Added a New GRN!";

    }

}
else
{
    echo "Please Add at least one Item !!!";
}

?>