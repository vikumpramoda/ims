<?php
include('../db_connector.php');

$pur     = $_GET['cat1'];


$query = "select p.pur_id,p.qty,p.unit_price,p.Total,ROUND(p.Total,2) AS tota,p.discount,ROUND(p.discount * 100,0) AS dis,m.item_name,m.item_id
 from purchase_item p, items m, purchase r WHERE p.pur_id = $pur AND p.item_id = m.item_id and r.pur_id = p.pur_id ";


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
        <th>Unit Price</th>
        <th>Discount</th>
        <th>Total</th>

    </tr>
    </thead>
    <tbody>
    <?php
    @$count = mysqli_num_rows($result);
    $itemCount = 1;
    if($count > 0){
        while($row = mysqli_fetch_array($result)){

            $item = $row['item_name'];
            $qty = $row['qty'];
            $unit = $row['unit_price'];
            $tot = $row['tota'];
            $dis = $row['dis'];



            ?>

            <tr>
                <td><?php echo $itemCount;?></td>
                <td><?php echo $item;?></td>
                <td><?php echo $qty;?></td>
                <td><?php echo $unit;?></td>
                <td><?php echo $dis;?>%</td>
                <td><?php echo $tot;?></td>


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

