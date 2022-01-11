
<?php
//select.php
if(isset($_POST["employee_id"]))
{
    $output = '';
    include '../db_connector.php';
    $query = "SELECT g.pur_id , g.invoice , g.total ,g.member_id ,g.grn_date , g.remarks ,m.first_name
              FROM grn g, member m 
              WHERE g.grn_id = '".$_POST["employee_id"]."' and g.member_id = m.member_id ";


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
         <label for="req_id">Invoice Number</label>
         <input class="form-control" id="req_id" type="text" name="req_id" value="'.$row["invoice"].'"  readonly>
    </div>
        <div class="form-group">
         <label for="req_id">GRN Issue Officer</label>
         <input class="form-control" id="req_id" type="text" name="req_id" value="'.$row["first_name"].'"  readonly>
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
    $q = "SELECT g.total  , g.item_id ,g.grnItem_id ,g.qty , i.item_name
    FROM  grn_item g , items i
    WHERE g.grn_id = '".$_POST["employee_id"]."' and g.item_id = i.item_id ";

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

            $id = $row['grnItem_id'];
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

