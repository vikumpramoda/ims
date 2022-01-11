
<?php

//insert.php

include '../db_connector.php';
$member_id  = $_SESSION['member_id'];
$depot_id  = $_SESSION['depot_id'];

$date =  $_POST["date"];
$user =  $_POST["bookCato"];

$remarks = $_POST["remarks"];

$stmt = $connect->prepare("INSERT INTO req (date, user,  depot, remarks, approve) 
    VALUES (:date, :user, :depot, :remarks, :approve)");
$stmt->bindParam(':date', $date);
$stmt->bindParam(':user', $user);

$stmt->bindParam(':depot', $depot_id);
$stmt->bindParam(':remarks', $remarks);
$stmt->bindParam(':approve', $user);

$stmt->execute();

$stmt = $connect->prepare("...");
$stmt->execute();
$id = $connect->lastInsertId();
$status = '1';

$query = " 
INSERT INTO req_items 
(req_number, item_name, qty, av) 
VALUES (:req_number, :first_name, :last_name, :direct)
";

for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
{
    $data = array(
        ':req_number' => $id,
        ':first_name'	=>	$_POST['hidden_first_name'][$count],
        ':last_name'	=>	$_POST['hidden_last_name'][$count],
        ':direct'	=>	$status
    );
    $statement = $connect->prepare($query);
    $statement->execute($data);
}

?>