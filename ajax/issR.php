
<?php
include('../db_connector.php');
//select.php
if(isset($_POST["employee_id"]))
{
    $output = '';

    $query = "SELECT r.req_number
              FROM req_items i
              INNER JOIN req r on r.req_number = i.req_number
              
              WHERE r.req_number = '".$_POST["employee_id"]."' and i.status = 'issue' group by r.req_number";


    $result = mysqli_query($con, $query);

    $output .= ' 
  
      <Border BorderBrush="Black" BorderThickness="3,3,0,0">
            <Border BorderBrush="Black" BorderThickness="1,1,3,3">';

    while($row = mysqli_fetch_array($result))
    {
        $output .= '
    <div class="form-group">
         <label for="item">Requisition Number</label>
         <input class="form-control" id="rqNUM" type="text" name="rqNUM" value="'.$row["req_number"].'" readonly>
    </div>
    
     
    
     ';
    }
    $output .= '</Border>
</Border>';
    echo $output;

    ?>
    <?php
    $q = "SELECT s.item_name , i.qty , i.reqID , i.issue_date ,d.depot_name
              FROM req_items i
              INNER join req r on i.req_number = r.req_number
              INNER join depot d on d.depot_id = i.issue_depot
              INNER JOIN items s on s.item_id = i.item_name 
              WHERE r.req_number = '".$_POST["employee_id"]."' and i.status = 'issue'";

    $r = mysqli_query($con, $q);
    ?>
    <table id="po" class="table table-hover">
        <thead>
        <tr>

            <th style="font-size: smaller">Item Name</th>
            <th style="font-size: smaller">Quantity</th>
            <th style="font-size: smaller">Issue Date</th>
            <th style="font-size: smaller">Issue Branch</th>



        </tr>
        </thead>
        <tbody>



        <?php
        $count = mysqli_num_rows($r);
        $itemCount = 1;

        if ($count > 0) {
            while ($row = mysqli_fetch_array($r)) {

                $id = $row['reqID'];
                $itemName = $row['item_name'];
                $qty = $row['qty'];
                $date = $row['issue_date'];
                $dep = $row['depot_name'];



                ?>
                <tr>

                    <td hidden><input class="form-control" name="id" type="text" id="id" readonly value="<?php echo $id; ?>" ></td>
                    <td><p style="font-size: smaller"><?php echo $itemName; ?></p></td>
                    <td><p style="font-size: smaller"><?php echo $qty; ?></p></td>
                    <td><p style="font-size: smaller"><?php echo $date; ?></p></td>
                    <td><p style="font-size: smaller"><?php echo $dep; ?></p></td>
                    <td><button class="btn btn-primary btn-xs view_data" style="font-size: smaller" id="<?php echo $id;?>">Done</button></td>


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

<script>
    $(document).on('click', '.view_data', function(){

        var employee_id = $(this).attr("id");
        $.ajax({
            url:"./ajax/receipt.php",
            method:"POST",
            data:{employee_id:employee_id},
            success:function(data){

            }
        });
    });

</script>

