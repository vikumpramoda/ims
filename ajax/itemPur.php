<?php
/**
 * Created by PhpStorm.
 * User: Sasini Hathurusinghe
 * Date: 31/05/2019
 * Time: 12:20 PM
 */

include('../db_connector.php');

$member_id  = $_SESSION['member_id'];
$depot  = $_SESSION['depot_id'];
if(isset($_POST["req_number"]) && !empty($_POST["req_number"])) {

$req = $_POST["req_number"];
//Get all state data
$query = "select i.item_name ,r.qty, i.item_id , r.reqID, r.av , m.stock_level from items i
          JOIN req_items r on r.item_name = i.item_id
          JOIN req rq on r.req_number = rq.req_number
          JOIN main_stock m on m.item_id = r.item_name
          WHERE i.status = 'common' AND rq.req_number = $req and r.status = 'approved' and r.qty >= m.stock_level  and m.depot_id ='$depot' and r.av is NULL 
          GROUP BY i.item_name
          ";
$result = mysqli_query($con,$query);


?>


<table id="po" class="table table-hover">
    <thead>
    <tr>
        <th>#</th>

        <th>Item Name</th>
        <th>Quantity</th>
        <th>Stock Available</th>
        <th>Issue Quantity</th>

    </tr>
    </thead>
    <tbody>




    <?php
    $count = mysqli_num_rows($result);
    $itemCount = 1;
    if ($count > 0) {
        while ($row = mysqli_fetch_array($result)) {

            $id = $row['item_name'];
            $qty = $row['qty'];
            $level = $row['stock_level'];
            $av = $row['av'];
            $reqID = $row['reqID'];
            $item = $row['item_id'];


            ?>
            <tr>
                <td><?php echo $itemCount; ?></td>
                <td hidden><input class="form-control" name="reqID[]" type="text" id="reqID[]" readonly value="<?php echo $reqID; ?>" ></td>
                <td hidden><input class="form-control" name="item_id[]" type="text" id="item_id[]" readonly value="<?php echo $item; ?>" > </td>
                <td><textarea class="form-control" name="item_name[]" type="text" id="item_name[]" readonly ><?php echo $id; ?></textarea> </td>
                <td><input class="form-control" name="item_qty[]" type="text" id="item_qty[]" readonly value="<?php echo $qty; ?>" ></td>
                <td hidden><input class="form-control" name="av[]" type="text" id="av[]" readonly value="<?php echo $av; ?>" ></td>
                <td><input class="form-control" name="level[]" type="text" id="level[]" readonly value="<?php echo $level; ?>" ></td>
                <td><input class="form-control" name="ex[]" type="text" id="ex[]" ></td>
                <td><div class="row d-print-none"> <button type="button" name="remove"  class="btn btn-danger btn_remove">X</button></div></td>

            </tr>
            <?php
            $itemCount++;
        }
    } else {
        echo 'No records found';
    }
    }


    ?>

    </tbody>

</table>

<div class="row d-print-none">
    <div class="col-12 text-right"> <button  class="btn btn-primary" type="submit" id="submit" onClick="" target="_blank" >Request</button></div>
</div>

<script>

    $('#submit').click(function(){
        $.ajax({
            url:"./ajax/cRequest.php",
            method:"POST",
            data:$('#add_pur').serialize(),
            success:function(data)
            {
                alert(data);





            }
        });
    });

</script>

<script>

    $("#po").on('click','.btn_remove', function(){
        $(this).closest('tr').remove();
    });
</script>

<?php

?>

