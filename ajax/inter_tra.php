<?php
/**
 * Created by PhpStorm.
 * User: Sasini Hathurusinghe
 * Date: 31/05/2019
 * Time: 12:20 PM
 */

include('../db_connector.php');

if(isset($_POST["pur_id"]) && !empty($_POST["pur_id"])) {

//Get all state data
$query = "SELECT i.id, i.item_id , i.qty , i.unit_price , i.Total , m.item_name , u.unit
          FROM purchase p , purchase_item i 
          JOIN items m on m.item_id = i.item_id  
          JOIN unit u on u.unit_id = m.unit
          WHERE i.pur_id =" . $_POST['pur_id'] . " AND i.status ='approved' 
          GROUP BY i.item_id
          ";
$result = mysqli_query($con,$query);


?>

<table id="po" class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Total</th>

    </tr>
    </thead>
    <tbody>




    <?php
    $count = mysqli_num_rows($result);
    $itemCount = 1;
    $q = 0;
    if ($count > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $q += $row['Total'];

            $id = $row['id'];
            $itemName = $row['item_name'];
            $qty = $row['qty'];
            $unit = $row['unit'];
            $tot = $row['Total'];
            $itemId = $row['item_id'];
            $pur = $row['id'];



            ?>

            <tr>
                <td><?php echo $itemCount; ?></td>
                <td hidden><input class="form-control" name="id[]" type="text" id="id[]" readonly value="<?php echo $id; ?>" ></td>
                <td><input class="form-control" name="item_name[]" type="text" id="item_name[]" readonly value="<?php echo $itemName; ?>" ></td>
                <td hidden><input class="form-control" name="item_id[]" type="text" id="item_id[]" value="<?php echo $itemId; ?>" > </td>
                <td><input class="form-control" name="item_qty[]" type="text" id="item_qty[]" readonly value="<?php echo $qty; ?>" ></td>
                <td><input class="form-control" name="unit[]" type="text" id="unit[]" readonly value="<?php echo $unit; ?>" > </td>
                <td><input class="form-control" name="tot[]" type="text" id="tot[]" readonly value="<?php echo $tot; ?>" ></td>
                <td><button type="button" name="remove"  class="btn btn-danger btn_remove">X</button></td>
                <td><input type="button" name="view" value="Details" id="<?php echo $row["item_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>


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

<div class="col-10">
    <h5 class="text-right">Total = Rs. <?php echo $q; ?></h5>
</div>

<div class="form-group">
    <label >Invoice Number</label>
    <input class="form-control" id="invo" name="invo"  type="text" placeholder="Invoice Number" required>
</div>

<div class="form-group">
    <label for="remarks">Remarks</label>
    <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
</div>


<div class="tile-footer">
    <button  class="btn btn-primary" type="submit" id="submit" onClick="">Submit</button>
</div>



<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">GRN Details</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>0

            </div>

            <div class="modal-body" id="employee_detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



<script>

    $('#submit').click(function(){
        $.ajax({
            url:"./ajax/add_grn.php",
            method:"POST",
            data:$('#add_grn').serialize(),
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

    $(document).on('click', '.view_data', function(){
        //$('#dataModal').modal();
        var employee_id = $(this).attr("id");
        $.ajax({
            url:"./ajax/serialNo.php",
            method:"POST",
            data:{employee_id:employee_id},
            success:function(data){
                $('#employee_detail').html(data);
                $('#dataModal').modal('show');
            }
        });
    });
</script>


