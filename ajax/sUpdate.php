
<?php
/**
 * Created by PhpStorm.
 * User: Lahiru Mendis
 * Date: 28/06/2019
 * Time: 12:01 PM
 */


include('../db_connector.php');

$member_id  = $_SESSION['member_id'];

$seletSubCatos = "SELECT *
    FROM member
    WHERE member_id= $member_id";
$selectQRes = mysqli_query($con,$seletSubCatos);
$count = mysqli_num_rows($selectQRes);

if($count == 1) {
    while ($row = mysqli_fetch_array($selectQRes)) {

        $depot = $row['depot_id'];
        $region = $row['region_id'];

@$number = count($_POST["item_id"]);
@$number = count($_POST["item_qty"]);
@$number = count($_POST["extra_qty"]);
$date = date('Y-m-d');
$status = 'direct';


if(isset($date) && ($status) && ($number)) {


    $insertQ = "insert into `req`(`date`,`user`,`region`,`depot`,`approve`,`approve_date`) 
    values('$date','$member_id','$region','$depot','$member_id', '$date')";


    $insertRes = mysqli_query($con, $insertQ);


    $GET_last_ID = mysqli_insert_id($con);


    if ($number >= 0) {
        for ($i = 0; $i < $number; $i++) {
            if (trim($_POST['item_id'][$i] != '') && trim($_POST['item_qty'][$i] != '')|| trim($_POST['extra_qty'][$i] != '')) {



                $sql = "INSERT INTO `req_items`(`req_number`,`item_name`,`status`,`extra_qty`) VALUES('$GET_last_ID','" . mysqli_real_escape_string($con, $_POST['item_id'][$i]) . "','$status','" . mysqli_real_escape_string($con, $_POST['extra_qty'][$i]) . "')";
                mysqli_query($con, $sql);



                $query = "";
                $query = "UPDATE req_items r
                          SET r.status = 'direct'
                          WHERE r.item_name= '" . mysqli_real_escape_string($con, $_POST['item_id'][$i]) . "' and r.av = '1' ";

                $result = mysqli_query($con, $query);

            }

        }

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
