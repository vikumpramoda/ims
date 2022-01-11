<?php
//Transfer Table 1 backend --  Vikum -- 2021-12-14
include '../db_connector.php';
$depot_id = $_SESSION['depot_id'];

$conn = $connect->prepare("...");

if(isset($_POST["query"]))
{

    $q = $_POST["query"];

    $results = $connect->prepare("SELECT * FROM main_stock p WHERE p.approve IS NULL AND p.depot = $depot_id 
 p.id LIKE '%".$q."%'

");


}
else
{

    $results = $connect->prepare("SELECT * 
                                            FROM main_stock p
                                            JOIN member m on m.member_id = p.user
                                            WHERE p.approve IS NULL and p.depot = $depot_id  ");

}

$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
    echo '<tr onclick="javascript:showRow(this);">' .
        '<td>' . $row['id'] . '</td>' .
        '<td>' . $row['date'] . '</td>' .
        '<td>' . $row['remarks'] . '</td>' .
        '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>' .
        '</tr>';
}


?>