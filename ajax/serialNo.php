
<?php
//select.php

if(isset($_POST["employee_id"])) {
    $output = '';
    include '../db_connector.php';
    $query = "SELECT item_name, item_id
              FROM items
              WHERE item_id = '" . $_POST["employee_id"] . "' ";


    $result = mysqli_query($con, $query);

    $output .= ' 
  
      <Border BorderBrush="Black" BorderThickness="3,3,0,0">
            <Border BorderBrush="Black" BorderThickness="1,1,3,3">';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
    <div class="form-group">
         <label for="req_id">Item ID</label>
         <input class="form-control" id="req_id" type="text" name="req_id" value="' . $row["item_id"] . '" readonly>
    </div>
        <div class="form-group">
         <label for="req_id">Item Name</label>
         <input class="form-control" id="req_id" type="text" name="req_id" value="' . $row["item_name"] . '"  readonly>
    </div>
    <form name="add_name" id="add_name">
            <div class="table table-bordered">

                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                
            </div>
            <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
        </form>
 
    
     ';
    }
    $output .= '</Border>
</Border>';
    echo $output;

    ?>
    <?php
    $q = "SELECT g.total  , g.item_id ,g.grnItem_id ,g.qty , i.item_name
    FROM  grn_item g , items i
    WHERE g.grn_id = '" . $_POST["employee_id"] . "' AND g.item_id = i.item_id ";

    $r = mysqli_query($con, $q);
}
?>
</body>
</html>

<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });

        $('#submit').click(function(){5
            $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });

    });
</script>




