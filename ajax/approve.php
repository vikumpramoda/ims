<?php
include('../db_connector.php');
//approve nd table backend
$pur     = $_GET['cat1'];


//select all borrow books which stiill not returned.
$query = "SELECT * 
          FROM req_items r, items i, req rq 
          WHERE rq.req_number = $pur AND r.item_name = i.item_id AND r.req_number = rq.req_number AND r.status IS NULL ";


//echo $query;

$result = mysqli_query($con,$query);
//Adding table data
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Item Name</th>
        <th>Quantity</th>

    </tr>
    </thead>
    <tbody>
    <?php
    @$count = mysqli_num_rows($result);
    $itemCount = 1;
    if($count > 0){
        while($row = mysqli_fetch_array($result)){

            $borid = $row['item_name'];
            $book_id = $row['qty'];


            ?>

            <tr>
                <td><?php echo $itemCount;?></td>
                <td><?php echo $borid;?></td>
                <td><?php echo $book_id;?></td>


            </tr>
            <?php
            $itemCount++;
        }
    }
    else{
        echo 'No records found';
    }


    ?>
    </tbody>
</table>

