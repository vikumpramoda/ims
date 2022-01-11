<?php
/**
 * Created by PhpStorm.
 * User: Sasini Hathurusinghe
 * Date: 31/05/2019
 * Time: 12:20 PM
 */

include('../db_connector.php');

if(isset($_POST["sub_id"]) && !empty($_POST["sub_id"])) {

//Get all state data
$query = "SELECT i.item_id, i.item_name, sum(r.qty) AS s 
          FROM req_items r ,items i 
           
          JOIN sub_cato s on s.sub_id = i.sub_id  
          WHERE s.sub_id =" . $_POST['sub_id'] . " AND r.item_name = i.item_id AND i.status = 'direct' and r.status = 'approved'
          GROUP BY i.item_id
          ";
$result = mysqli_query($con,$query);


?>


<table id="po" class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Item Code</th>

        <th>Item Name</th>
        <th>Quantity</th>

    </tr>
    </thead>
    <tbody>




    <?php
    $count = mysqli_num_rows($result);
    $itemCount = 1;
    if ($count > 0) {
        while ($row = mysqli_fetch_array($result)) {

            $itemType_category_id = $row['item_name'];
            $itemType_name = $row['s'];

            $item_ID = $row['item_id'];

            ?>
            <tr>
                <td><?php echo $itemCount; ?></td>
                <td><input class="form-control" name="item_id[]" type="text" id="item_id[]" readonly value="<?php echo $item_ID; ?>" ></td>

                <td><input class="form-control" name="item_name[]" type="text" id="item_name[]" readonly value="<?php echo $itemType_category_id; ?>" > </td>
                <td><input class="form-control" name="item_qty[]" type="text" id="item_qty[]" readonly value="<?php echo $itemType_name; ?>" ></td>
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
<div class="row d-print-none mt-2">

    <div class="col-12 text-left"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print for Quotation</a></div>
</div>
<div class="row d-print-none">
    <div class="col-12 text-right"> <button  class="btn btn-primary" type="submit" id="submit" onClick="" target="_blank" >submit for PO Process</button></div>
</div>

<script>

    $('#submit').click(function(){
        $.ajax({
            url:"./ajax/add_pur.php",
            method:"POST",
            data:$('#add_pur').serialize(),
            success:function(data)
            {
                alert(data);

                location.href = "generate_po.php"



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

