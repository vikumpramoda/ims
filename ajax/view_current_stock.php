<?php
include '../db_connector.php';
//view current stock  -  vikum

$depot_id = $_SESSION['depot_id'];


$queryl = "SELECT *
                                    FROM main_stock m
                                    JOIN main_stock_item i ON m.id = i.id
                                    JOIN member b ON b.member_id = m.user
                                    WHERE m.depot = $depot_id AND m.approve IS NULL 
                                    GROUP BY m.id ";

$resultl = mysqli_query($con,$queryl);
$countl  = mysqli_num_rows($resultl);


if ($resultl->num_rows > 0) {
    echo " <table class=\"table table-hover\" id=\"req\"> <tr> <th>Stock Item ID</th><th>Added Officer Name </th> <th>Added Date</th> <th>Remarks</th></tr> ";
    // output data of each row
    while($row = $resultl->fetch_assoc()) {
        echo "<tr> <td>" . $row["id"]. "</td> <td>" . $row["first_name" ]. "</td><td>" . $row["date"]. "</td><td>" . $row["remarks"]. "</td> <td><a href='Info_main_stock.php?id=".$row['id']."' class=\"btn btn-small btn-info\" ><i class=\"icon-info-sign\"></i>Info</a></td> </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}
?>