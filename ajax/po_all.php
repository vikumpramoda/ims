
<?php
//select.php
if(isset($_POST["employee_id"]))
{
    $output = '';
    include '../db_connector.php';
    $query = "SELECT g.pur_id , g.approved_user , g.approved_date  ,g.status , g.remarks 
              FROM purchase g, member m 
              WHERE g.pur_id = '".$_POST["employee_id"]."' and g.user = m.member_id ";


    $result = mysqli_query($con, $query);

    $output .= ' 
  
      <Border BorderBrush="Black" BorderThickness="3,3,0,0">
            <Border BorderBrush="Black" BorderThickness="1,1,3,3">';

    while($row = mysqli_fetch_array($result))
    {
        $output .= '
    <div class="form-group">
         <label for="req_id">Purchase Order ID</label>
         <input class="form-control" id="req_id" type="text" name="req_id" value="'.$row["pur_id"].'" readonly>
    </div>
        <div class="form-group">
         <label for="req_id">Current Status</label>
         <input class="form-control" id="req_id" type="text" name="req_id" value="'.$row["status"].'"  readonly>
    </div>
        <div class="form-group">
         <label for="req_id">Approved Officer</label>
         <input class="form-control" id="req_id" type="text" name="req_id" value="'.$row["approved_user"].'"  readonly>
    </div>
      <div class="form-group">
         <label for="req_id">Approved Date</label>
         <input class="form-control" id="req_id" type="text" name="req_id" value="'.$row["approved_date"].'"  readonly>
    </div>
       
    <div class="form-group">
         <label for="req_id">Remarks</label>
         <textarea class="form-control" id="req_id" type="text" name="req_id"  readonly>'.$row["remarks"].'</textarea>
    </div>
    
     ';
    }
    $output .= '</Border>
</Border>';
    echo $output;

    ?>
    <?php
    $q = "SELECT g.total  ,g.id ,g.qty , i.item_name
    FROM  purchase_item g , items i
    WHERE g.pur_id = '".$_POST["employee_id"]."' and g.item_id = i.item_id ";

    $r = mysqli_query($con, $q);
    ?>
    <table id="po" class="table table-bordered">
        <thead>
        <tr>

            <th>Item Name</th>
            <th>Quantity</th>
            <th>Total</th>

        </tr>
        </thead>
        <tbody>



        <?php
        $count = mysqli_num_rows($r);
        $itemCount = 1;

        if ($count > 0) {
            while ($row = mysqli_fetch_array($r)) {

                $id = $row['id'];
                $itemName = $row['item_name'];
                $qty = $row['qty'];
                $tot = $row['total'];


                ?>
                <tr>

                    <td hidden><input class="form-control" name="id[]" type="text" id="id[]" readonly value="<?php echo $id; ?>" ></td>
                    <td><p><?php echo $itemName; ?></p></td>
                    <td><p><?php echo $qty; ?></p></td>
                    <td><p><?php echo $tot; ?></p></td>


                </tr>

                <?php
                $itemCount++;
            }
        } else {
            echo 'No records found';
        }

        ?>

        </tbody>

    </table>

    <?php
}

?>

