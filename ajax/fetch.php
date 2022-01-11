<?php
//Artworks of Scanhead   HNU 2017
include '../db_connector.php';
$depot_id = $_SESSION['depot_id'];

$conn = $connect->prepare("...");

if(isset($_POST["query"]))
{

    $q = $_POST["query"];

    $results = $connect->prepare("SELECT * FROM req p WHERE p.approve IS NULL and p.depot = $depot_id 
 p.req_number LIKE '%".$q."%'

");


}
else
{

    $results = $connect->prepare("SELECT * 
                                            FROM req p
                                            JOIN member m on m.member_id = p.user
                                            WHERE p.approve IS NULL and p.depot = $depot_id  ");

}

$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
    echo '<tr onclick="javascript:showRow(this);">' .
        '<td>' . $row['req_number'] . '</td>' .
        '<td>' . $row['date'] . '</td>' .
        '<td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td>' .
        '</tr>';
}


?>