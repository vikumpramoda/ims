<?php
//good
include('db_connector.php');

$member_id  = $_SESSION['member_id'];
$query = "SELECT * FROM grn ORDER BY grn_id DESC";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | Bootstrap Modal with Dynamic MySQL Data using Ajax & PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jautocalc.js"></script>

</head>
<body>
<br /><br />
<div class="container" style="width:700px;">
    <h3 align="center">Insert Data Through Bootstrap Modal by using Ajax PHP</h3>
    <br />
    <div class="table-responsive">
        <div align="right">
            <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
        </div>
        <br />
        <div id="employee_table">
            <table class="table table-hover table-bordered">
                <tr>
                    <th width="70%">Purchase Order ID</th>
                    <th width="30%">Invoice Number</th>
                </tr>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row["pur_id"]; ?></td>
                        <td><input type="button" name="view" value="view" id="<?php echo $row["grn_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                    </tr>
                    <?php
                }
                ?>
            </table>


        </div>
    </div>
</div>
</body>
</html>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body ">
                <form method="post" id="insert_form">
                    <label>Invoice Number</label>
                    <input type="text" name="name" id="name" class="form-control name" />
                    <br />
                    <label>Remarks</label>
                    <input type="text" name="remarks" id="remarks" class="form-control remarks" />
                    <br />


                    <h4 align="center">Enter Item Details</h4>
                    <br />

                    <div class="table-repsonsive">
                        <span id="error"></span>
                        <!-- <table class="table table-bordered" id="item_table" >
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>

                                <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                            </tr>
                        </table>-->
                       <input type="button" value="Add" onClick="addRow('dataTable')" />
                        <table id="dataTable" class="form" border="1">
                            <tbody>
                            <tr id='row_0'>
                                <p>
                                <td>
                                    <label>Quantity</label>
                                    <input type="text" required="required" name="qty" oninput="calculate('row_0')" >
                                </td>
                                <td>
                                    <label for="price">Price</label>
                                    <input type="text" required="required" class="small" name="price" oninput="calculate('row_0')">
                                </td>
                                <td>
                                    <label for="total">Total</label>
                                    <input type="text" required="required" class="amount" name="total">
                                </td>
                                <td>
                                    <button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button>
                                </td>
                                </p>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                    Expense : <input type="text" id="expense"><br>

                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">GRN Details</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body" id="employee_detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>

    function calculateTableTotal() {
        var total = 0;

        $('#row_0 tr td input[type="text"]').each(function() {

            // find the amount input field
            var $input = $(this);
            total += parseInt($input.val());
        });
        $('#expense').val(sum);
    }

</script>

<script>
    $(document).ready(function(){
        $('#insert_form').on("submit", function(event){
            event.preventDefault();
            if($('#name').val() == "")
            {
                alert("Name is required");
            }
            else if($('#remarks').val() == "")
            {
                alert("Name is required");
            }

            else
            {
                $.ajax({
                    url:"add_newGrn.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("Inserting");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                    }
                });
            }
        });




        $(document).on('click', '.view_data', function(){
            //$('#dataModal').modal();
            var employee_id = $(this).attr("id");
            $.ajax({
                url:"./ajax/select.php",
                method:"POST",
                data:{employee_id:employee_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal('show');
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function(){

        $(document).on('click', '.add', function(){
            var html = '';
            html += '<tr id=\'row_0\'>';
            html += '<td><input type="text" name="item_name[]" class="form-control item_name " ></td>';
            html += '<td><input type="text" name="item_quantity[]" class="form-control item_quantity" oninput="calculate(\'row_0\')" ></td>';
            html += '<td><input type="text" name="unit_price[]" class="form-control unit_price" oninput="calculate(\'row_0\')" ></td>';
            html += '<td><input type="text" required="required" class="amount" name="total"></td>';
            html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
            $('#item_table').append(html);

        });

        $(document).on('click', '.remove', function(){
            $(this).closest('tr').remove();
        });

        $('#insert_form').on('submit', function(event){
            event.preventDefault();
            var error = '';
            $('.item_name').each(function(){
                var count = 1;
                if($(this).val() == '')
                {
                    error += "<p>Enter Item Name at "+count+" Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.item_quantity').each(function(){
                var count = 1;
                if($(this).val() == '')
                {
                    error += "<p>Enter Item Quantity at "+count+" Row</p>";
                    return false;
                }
                count = count + 1;
            });

            $('.unit_price').each(function(){
                var count = 1;
                if($(this).val() == '')
                {
                    error += "<p>Enter Item Unit Price at "+count+" Row</p>";
                    return false;
                }
                count = count + 1;
            });


            var form_data = $(this).serialize();
            if(error == '')
            {
                $.ajax({
                    url:"./ajax/add_newGrn.php",
                    method:"POST",
                    data:form_data,
                    success:function(data)
                    {

                    }
                });
            }
            else
            {
                $('#error').html('<div class="alert alert-danger">'+error+'</div>');
            }
        });

    });
</script>
<script>
    function addRow(tableID) {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        if (rowCount < 100) { // limit the user from creating fields more than your limits
            var row = table.insertRow(rowCount);

            var colCount = table.rows[0].cells.length;
            row.id = 'row_'+rowCount;
            for (var i = 0; i < colCount; i++) {


                var newcell = row.insertCell(i);
                newcell.outerHTML = table.rows[0].cells[i].outerHTML;
                    if(newcell === 2){
                newcell.outerHTML = '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
                }

            }

            var listitems= row.getElementsByTagName("input")
            for (i=0; i<listitems.length; i++) {
                listitems[i].setAttribute("oninput", "calculate('"+row.id+"')");

            }
        }
        else {
            alert("Maximum Passenger per ticket is 4.");

        }
    }

    function calculate(elementID) {
        var mainRow = document.getElementById(elementID);
        var myBox1 = mainRow.querySelectorAll('[name=item_quantity]')[0].value;
        var myBox2 = mainRow.querySelectorAll('[name=unit_price]')[0].value;
        var total = mainRow.querySelectorAll('[name=total]')[0];
        var myResult1 = myBox1 * myBox2;
        total.value = myResult1;



    }
</script>
