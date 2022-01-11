
<?php

//insert.php

include '../db_connector.php';

$member_id  = $_SESSION['member_id'];
$depot  = $_SESSION['depot_id'];
$date =  $_POST["date"];
$invoice =  $_POST["invoice"];
$remarks = $_POST["remarks"];

$stmt = $connect->prepare("INSERT INTO grn (grn_date, invoice, depot_id, member_id, remarks) 
    VALUES (:date, :invoice, :depot, :user, :remarks)");
$stmt->bindParam(':date', $date);
$stmt->bindParam(':invoice', $invoice);
$stmt->bindParam(':depot', $depot);
$stmt->bindParam(':user', $member_id);
$stmt->bindParam(':remarks', $remarks);
$stmt->execute();

$stmt = $connect->prepare("...");
$stmt->execute();
$id = $connect->lastInsertId();

$qt = 0;

for($count = 0; $count < count($_POST['hidden_first_name']); $count++)
{
    $tot =  $_POST['hidden_unit_name'][$count] *  $_POST['hidden_last_name'][$count];
    $qt  += $tot;
    $q = "INSERT INTO grn_item 
              ( grn_id,item_id, qty,total) 
              VALUES (:id,:first_name,:last_name,:tot)";

    $data =   array(
        ':id' => $id,
        ':first_name'  => $_POST['hidden_first_name'][$count],
        ':last_name' => $_POST['hidden_last_name'][$count],
        ':tot' => $tot


    );
    $statement = $connect->prepare($q);
    $statement->execute($data);



}

for($count = 0; $count < count($_POST['hidden_first_name']); $count++){
    if (trim($_POST['hidden_first_name'][$count] != '') && trim($_POST['hidden_last_name'][$count] != '') && trim($_SESSION['depot_id'][$count] != '') ) {


        $th = "UPDATE main_stock
          SET stock_level = stock_level + ('" . mysqli_real_escape_string($con, $_POST['hidden_last_name'][$count]) . "' )
          WHERE depot_id =('" . mysqli_real_escape_string($con, $_SESSION['depot_id'][$count]) . "' ) AND item_id= ('" . mysqli_real_escape_string($con, $_POST['hidden_first_name'][$count]) . "') ";

        $l = mysqli_query($con, $th);

    }

}

$t = "update grn set `total` = $qt
          where `grn_id` = $id ";

$e= mysqli_query($con, $t);




?>