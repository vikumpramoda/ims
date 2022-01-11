<?php
include '../db_connector.php';
// broken item list - vikum

$depot_id = $_SESSION['depot_id'];
$queryl = "SELECT *
                                    FROM main_stock r
                                    JOIN main_stock_item i ON r.id = i.id
                                    JOIN member m ON m.member_id = r.user
                                    WHERE r.depot = $depot_id AND r.approve = 'Broken' 
                                    GROUP BY r.id ";

$resultl = mysqli_query($con,$queryl);
$countl  = mysqli_num_rows($resultl);



if ($resultl->num_rows > 0) {
    echo " <table class=\"table table-hover\" id=\"req\"> 
    <tr> <th>Requisition ID</th>
    <th>Request Officer</th> 
    <th>Request Date</th> 
    <th>Remarks</th>
    </tr> ";
    // output data of each row
    while($row = $resultl->fetch_assoc()) {
        echo "<tr> 
        <td>" . $row["id"]. "</td> 
        <td>" . $row["first_name" ]. "</td>
        <td>" . $row["date"]. "</td><td>" . $row["remarks"]. "</td>
        <td><a href='Info_transfer_list.php?id=".$row['id']."' class=\"btn btn-small btn-info\" ><i class=\"icon-info-sign\"></i>Info</a></td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}
?>