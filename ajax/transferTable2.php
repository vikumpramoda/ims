<?php
include('../db_connector.php');
//Create 2nd table Table 
$pur     = $_GET['cat2'];


//select all borrow books which stiill not returned.
$query = "SELECT * 
          FROM main_stock_item r, items i, main_stock rq 
          WHERE rq.id = $pur AND r.item_name = i.item_id AND r.id = rq.id";

$result = mysqli_query($con,$query);
//Adding table data
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>stockID</th>
        <th>Item Name</th>
        <th>Serial Number</th>
        <th>available qty</th>

    </tr>
    </thead>
    <tbody>
    <?php
    @$count = mysqli_num_rows($result);
    $itemCount = 1;
    if($count > 0){
        while($row = mysqli_fetch_array($result)){

            $row1 = $row['stockId'];
            $row2 = $row['item_name'];
            $row3 = $row['serial'];


            ?>

            <tr>
                <td><?php echo $itemCount;?></td>
                <td><?php echo $row1;?></td>
                <td><?php echo $row2;?></td>
                <td><?php echo $row3;?></td>


            </tr>
            <?php
            $itemCount++;
        }
    }
    else{
        echo 'No stock item SELECTED';
    }


    ?>
    </tbody>
</table>

