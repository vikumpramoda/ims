<?php
//Artworks of Scanhead   HNU 2017
include '../db_connector.php';

$conn = $connect->prepare("...");


$results = $connect->prepare("SELECT p.pur_id , p.pur_date ,s.sup_name 
                                        FROM purchase p 
                                        JOIN stock_supplier s ON s.sup_id = p.supplier
                                        WHERE p.approved_user IS NULL AND p.status = 'processing'   ");



$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
    echo '<tr onclick="javascript:showRow(this);">' .
        '<td>' . $row['pur_id'] . '</td>' .
        '<td>' . $row['pur_date'] . '</td>' .
        '<td>' . $row['sup_name'] .'</td>' .



        '</tr>';
}


?>