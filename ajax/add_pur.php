<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Mendis
 * Date: 28/06/2019
 * Time: 12:01 PM
 */


include('../db_connector.php');
$member_id  = $_SESSION['member_id'];
@$number = count($_POST["item_id"]);
@$number = count($_POST["item_qty"]);
$date = date('Y-m-d');
$status = 'incomplete';


if(isset($date) && ($status) && ($number)) {


    $insertQ = "insert into `purchase`(`pur_date`,`status`,`user`) 
    values('$date','$status','$member_id')";


    $insertRes = mysqli_query($con, $insertQ);


    $GET_last_ID = mysqli_insert_id($con);


    if ($number >= 0) {
        for ($i = 0; $i < $number; $i++) {
            if (trim($_POST['item_id'][$i] != '') && trim($_POST['item_qty'][$i] != '')) {



                $sql = "INSERT INTO `purchase_item`(`pur_id`,`item_id`,`qty`) VALUES('$GET_last_ID','" . mysqli_real_escape_string($con, $_POST['item_id'][$i]) . "','" . mysqli_real_escape_string($con, $_POST['item_qty'][$i]) . "')";
                mysqli_query($con, $sql);



                $query = "";
                $query = "UPDATE req_items r
                          SET status = 'pending'
                          WHERE r.item_name= '" . mysqli_real_escape_string($con, $_POST['item_id'][$i]) . "' AND status is null ";

                $result = mysqli_query($con, $query);

            }
 
        }
        echo "Successfully Added a New Purchase Order!";



    }


}
else
{
    echo "Please Add at least one Item !!!";
}

    ?>