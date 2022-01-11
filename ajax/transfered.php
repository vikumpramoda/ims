<?php
include '../db_connector.php';
// Table 2 transered list - vikum 

$depot_id = $_SESSION['depot_id'];
$queryl = "SELECT *
                                    FROM main_stock r
                                    JOIN main_stock_item i ON r.id = i.id
                                    JOIN member m ON m.member_id = r.user
                                    WHERE r.depot = $depot_id AND r.approve = '1' 
                                    GROUP BY r.id ";

$resultl = mysqli_query($con,$queryl);
$countl  = mysqli_num_rows($resultl);

if ($resultl->num_rows > 0) {
    echo " <table class=\"table table-hover\" id=\"main_stock\"> 
    <tr> 
    <th>Item ID</th>
    <th>Previous Owner</th>
    <th>Transfered Date</th>
    <th>Remarks</th>
    <th></th>
    <th>Pending for Confirm</th>
    </tr> ";
    // output data of each row
    while($row = $resultl->fetch_assoc()) {
        ?> 
        
        <tr> 
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['remarks']; ?></td>

        <td >
        <a href="Info_transfer_list.php?id=<?php echo $row['id']?>">Show more ...</a>
        </td>  
        
        <td>
        <form action=" " class="form-horizontal" method="POST"  name="add_item" id="add_item">
        <input hidden class="form-control" name="id" type="text" value="<?php echo $row['id'];?>" id="id" readonly >
        <button type="submit" class="btn btn-outline-danger" name="fail" id="fail">Confirmed to Received for Us </button>
        </form> 
        </td>  
           
                </tr>

              
        <?php
    }

    echo "</table>";
} else {
    echo "0 results";
}
?>

<!-- form ID = #add_item -->
<script>
    $('#fail').click(function(){
        $.ajax({
            url:"./ajax/confirm_received.php",
            method:"POST",
            data:$('#add_item').serialize(),
            success:function(data)
            {
                
                alert(data);
                
            }
        });
    });

</script>



