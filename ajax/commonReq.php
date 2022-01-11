<?php
//Artworks of Scanhead   HNU 2017
include '../db_connector.php';


$conn = $connect->prepare("...");


    $results = $connect->prepare("SELECT r.req_number ,d.depot_name ,e.date 
                                            FROM req_items r ,items i  ,req e , depot d 
                                            WHERE e.req_number = r.req_number and r.item_name = i.item_id AND  d.depot_id = e.depot   AND i.status = 'common' and r.status = 'approved' 
                                            group by r.req_number");



$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
    echo '<tr onclick="javascript:showRow(this);">' .
        '<td >' . $row['req_number'] . '</td>' .
        '<td>' . $row['depot_name'] . '</td>' .
        '<td>' . $row['date'] . '</td>' .

        '</tr>';
}


?>