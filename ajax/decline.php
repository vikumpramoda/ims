<?php
include '../db_connector.php';


$depot_id = $_SESSION['depot_id'];


$queryl = "SELECT *
                                    FROM req r
                                    JOIN req_items i ON r.req_number = i.req_number
                                    JOIN member m ON m.member_id = r.user
                                    WHERE r.depot = $depot_id AND r.approve = 'Fail' 
                                    GROUP BY r.req_number ";

$resultl = mysqli_query($con,$queryl);
$countl  = mysqli_num_rows($resultl);



if ($resultl->num_rows > 0) {
    echo " <table class=\"table table-hover\" id=\"req\"> <tr> <th>Requisition ID</th><th>Request Officer</th> <th>Request Date</th> <th>Remarks</th></tr> ";
    // output data of each row
    while($row = $resultl->fetch_assoc()) {
        echo "<tr> <td>" . $row["req_number"]. "</td> <td>" . $row["first_name" ]. "</td><td>" . $row["date"]. "</td><td>" . $row["remarks"]. "</td><td><a href='Info_req.php?req_number=".$row['req_number']."' class=\"btn btn-small btn-info\" ><i class=\"icon-info-sign\"></i>Info</a></td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}
?>