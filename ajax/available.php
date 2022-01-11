<?php
include '../db_connector.php';
//transfer list -- available list(1st Table) Backend_   vikum

$depot_id = $_SESSION['depot_id'];

$queryl = "SELECT *
                                    from main_stock r
                                    JOIN main_stock_item i on r.id = i.id
                                    JOIN member m on m.member_id = r.user
                                    where r.depot = $depot_id and r.approve is NULL OR r.approve = 'confirm'
                                    GROUP BY r.id ";

$resultl = mysqli_query($con,$queryl);
$countl  = mysqli_num_rows($resultl);



if ($resultl->num_rows > 0) {
    echo " <table class=\"table table-hover\" id=\"main_stock\"> 
                <tr> 
                <th>Item ID</th>
                <th>Item Owner</th> 
                <th>Added Date</th> 
                <th>Remarks</th>
                </tr> ";
    // output data of each row
    while($row = $resultl->fetch_assoc()) {
        echo "<tr> 
                <td>" . $row["id"]. "</td> 
                <td>" . $row["first_name" ]. "</td>
                <td>" . $row["date"]. "</td>
                <td>" . $row["remarks"]. "</td>
                <td><a href='Info_transfer_list.php?id=".$row['id']."' class=\"btn btn-small btn-info\" ><i class=\"icon-info-sign\"></i>Info</a></td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}
?>