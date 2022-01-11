<?php
include('../db_connector.php');


$number = count($_POST["qty"]);
$number = count($_POST["unit"]);
$number = count($_POST["item_code"]);
$req_id =  $_POST["req_id"];
$sup_id =  $_POST["sup_id"];
$remarks =   $_POST["remarks"];
$disc   = $_POST["disc"];
$vat    = $_POST["vat"];
$nbt    = $_POST["nbt"];
$file   = $_POST["file"];
$sq     = $_POST["sq"];
$no     = $_POST["no"];
$st1    = $_POST["st1"];
$st2    = $_POST["st2"];
$st3    = $_POST["st3"];




/*
echo "$name1 && $number1";*/
if(isset($req_id) && ($sup_id) ) {


    $query = "";
    $query = "UPDATE `purchase` 
    SET `status` = 'processing', `supplier` = '$sup_id', `file_no` = '$file', `sq_no` = '$sq', `del_address` = '$no', `2nd_ad` = '$st1', `3rd_ad` = '$st2', `4th_ad` = '$st3', `remarks` = '$remarks' 
    WHERE `pur_id`= $req_id";
    $result = mysqli_query($con, $query);



    if ($number >= 0) {
        for ($i = 0; $i < $number; $i++) {


            if (trim($_POST['item_code'][$i] != '') && trim($_POST['qty'][$i] != '') && trim($_POST['unit'][$i] != '') && trim($_POST['disc'][$i] != '')){


                $total =
                $sql = "UPDATE `purchase_item` 
                SET `unit_price` = '" . mysqli_real_escape_string($con, $_POST['unit'][$i]) . "',`discount` = ('" . mysqli_real_escape_string($con, $_POST['disc'][$i]) . "' / 100),
                `disc_unit_price` = ('" . mysqli_real_escape_string($con, $_POST['unit'][$i]) . "')-('" . mysqli_real_escape_string($con, $_POST['unit'][$i]) . "' * '" . mysqli_real_escape_string($con, $_POST['disc'][$i]) . "') / 100,
                `Total` = (('" . mysqli_real_escape_string($con, $_POST['unit'][$i]) . "')-('" . mysqli_real_escape_string($con, $_POST['unit'][$i]) . "' * '" . mysqli_real_escape_string($con, $_POST['disc'][$i]) . "') / 100) * '" . mysqli_real_escape_string($con, $_POST['qty'][$i]) . "'
                WHERE `pur_id`= $req_id 
                AND `item_id` = '" . mysqli_real_escape_string($con, $_POST['item_code'][$i]) . "' ";
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

                $query = "";
                $query = "select sum(`Total`) as ans from `purchase_item` where `pur_id`='$req_id'";
                $result = mysqli_query($con, $query);


                $row = mysqli_fetch_array($result);

                $ans = $row['ans'];

                $v = $ans * ($vat / 100);
                $n = $ans * ($nbt / 100);

                $tot = $ans + $v + $n;

                $query = "";
                $query = "UPDATE `purchase` 
                    SET `fin_tot` = '$ans', `vat` = '$v', `nbt` = '$n', `sum_tot` = '$tot'
                    WHERE `pur_id`= $req_id";
                $result = mysqli_query($con, $query);


?>