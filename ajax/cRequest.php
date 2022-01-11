<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Mendis
 * Date: 28/06/2019
 * Time: 12:01 PM
 */


include('../db_connector.php');
$member_id  = $_SESSION['member_id'];
$depot  = $_SESSION['depot_id'];
@$number = count($_POST["item_id"]);
@$number = count($_POST["item_qty"]);
@$number = count($_POST["ex"]);
@$number = count($_POST["level"]);
@$number = count($_POST["reqID"]);



if(isset($number)) {


    if ($number >= 0) {
        for ($i = 0; $i < $number; $i++) {
            if (trim($_POST['item_id'][$i] != '') && trim($_POST['ex'][$i] != '')&& trim($_POST['reqID'][$i] != '')) {


                $sql = "INSERT INTO `issue_order`(`req_id`,`qty`,`depot_id`,`member_id`) VALUES('" . mysqli_real_escape_string($con, $_POST['reqID'][$i]) . "','" . mysqli_real_escape_string($con, $_POST['ex'][$i]) . "','$member_id','$depot')";
                mysqli_query($con, $sql);

                $query = "UPDATE req_items
                          SET av = '1'
                          WHERE reqID = ('" . mysqli_real_escape_string($con, $_POST['reqID'][$i]) . "')";
                $result = mysqli_query($con, $query);


                $r = "UPDATE main_stock
                        SET stock_level = stock_level - ('" . mysqli_real_escape_string($con, $_POST['ex'][$i]) . "')                
                        WHERE depot_id ='$depot'";
                $l = mysqli_query($con, $r);

            }

        }
        echo "Successfully Request!";



    }


}
else
{
    echo "Please Add at least one Item !!!";
}

?>